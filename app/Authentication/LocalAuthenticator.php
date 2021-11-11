<?php namespace App\Authentication;

use App\Models\User;
use CodeIgniter\Events\Events;
use Exception;
use Illuminate\Support\Carbon;
use Myth\Auth\Exceptions\AuthException;
use Myth\Auth\Password;
use ReflectionException;

class LocalAuthenticator extends AuthenticationBase implements AuthenticatorInterface
{
    /**
     * Attempts to validate the credentials and log a user in.
     *
     * @param array $credentials
     * @param bool  $remember Should we remember the user (if enabled)
     *
     * @return bool
     * @throws Exception
     */
    public function attempt(array $credentials, bool $remember = null): bool {
        $this->user = $this->validate($credentials, true);

        if(empty($this->user)) {
            // Always record a login attempt, whether success or not.
            $ipAddress = service('request')->getIPAddress();
            $this->recordLoginAttempt($credentials['email'] ?? $credentials['username'], $ipAddress,
                $this->user->id ?? null, false);

            $this->user = null;
            return false;
        }

        if($this->user->isBanned()) {
            // Always record a login attempt, whether success or not.
            $ipAddress = service('request')->getIPAddress();
            $this->recordLoginAttempt($credentials['email'] ?? $credentials['username'], $ipAddress,
                $this->user->id ?? null, false);

            $this->error = lang('Auth.userIsBanned');

            $this->user = null;
            return false;
        }

        return $this->login($this->user, $remember);
    }

    /**
     * Checks to see if the user is logged in or not.
     *
     * @return bool
     * @throws Exception
     */
    public function check(): bool {
        if($this->isLoggedIn()) {
            return true;
        }

        if(empty($remember)) {
            return false;
        }

        if(empty($user)) {
            return false;
        }

        $this->login($user);

        return true;
    }

    /**
     * Checks the user's credentials to see if they could authenticate.
     * Unlike `attempt()`, will not log the user into the system.
     *
     * @param array $credentials
     * @param bool  $returnUser
     *
     * @return User|bool|array
     * @throws ReflectionException
     */
    public function validate(array $credentials, bool $returnUser = false): User|bool|array {
        // Can't validate without a password.
        if(empty($credentials['password']) || count($credentials) < 2) return false;

        // Only allowed 1 additional credential other than password
        $password = $credentials['password'];
        unset($credentials['password']);

        // Ensure that the fields are allowed validation fields
        if(!in_array(key($credentials), $this->config->validFields)) {
            throw AuthException::forInvalidFields(key($credentials));
        }

        // Can we find a user with those credentials?
        $user = User::where($credentials)->first();

        if(!$user) {
            $this->error = lang('Auth.badAttempt');
            return false;
        }

        // Now, try matching the passwords.
        if(!Password::verify($password, $user->password)) {
            $this->error = lang('Auth.invalidPassword');
            return false;
        }

        // Check to see if the password needs to be rehashed.
        // This would be due to the hash algorithm or hash
        // cost changing since the last time that a user
        // logged in.
        if(Password::needsRehash($user->password, $this->config->hashAlgorithm)) {
            $user->password = $password;
            $this->user->save();
        }

        return $returnUser
            ? $user
            : true;
    }

    /**
     * Record a login attempt
     *
     * @param string      $email
     * @param string|null $ipAddress
     * @param int|null    $userID
     *
     * @param bool        $success
     *
     * @return bool|int|string
     * @throws ReflectionException
     */
    public function recordLoginAttempt(string $email, string $ipAddress = null, int $userID = null, bool $success): bool|int|string {
        return $this->loginModel->insert([
            'ip_address'   => $ipAddress,
            'email'        => $email,
            'user_id'      => $userID,
            'logged_in_at' => Carbon::now(),
            'success'      => (int)$success
        ]);
    }


    /**
     * Logs a user out of the system.
     */
    public function logout() {
        // Destroy the session data - but ensure a session is still available for flash messages, etc.
        if(isset($_SESSION)) {
            foreach($_SESSION as $key => $value) {
                $_SESSION[$key] = NULL;
                unset($_SESSION[$key]);
            }
        }

        // Regenerate the session ID for a touch of added safety.
        session()->regenerate(true);

        // Handle user-specific tasks
        if($user = $this->user()) {
            // Take care of any remember me functionality
            $this->loginModel->purgeRememberTokens($user->id);
            $this->loginModel->updateLogoutTime($user->id);

            // Trigger logout event
            Events::trigger('logout', $user);

            $this->user = null;
        }
    }
}
