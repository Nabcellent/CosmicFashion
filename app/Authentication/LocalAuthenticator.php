<?php namespace App\Authentication;

use App\Models\LoginModel;
use CodeIgniter\Events\Events;
use CodeIgniter\Router\Exceptions\RedirectException;
use Exception;
use Illuminate\Support\Carbon;
use Myth\Auth\Authentication\AuthenticationBase;
use Myth\Auth\Authentication\AuthenticatorInterface;
use Myth\Auth\Exceptions\AuthException;
use Myth\Auth\Password;
use ReflectionException;

class LocalAuthenticator extends AuthenticationBase implements AuthenticatorInterface {
    /**
     * @var LoginModel
     */
    protected $loginModel;

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
            $this->recordLoginAttempt($credentials['email'] ?? $credentials['username'], $ipAddress, $this->user->id ?? null, false);

            $this->user = null;
            return false;
        }

        if($this->user->isBanned()) {
            // Always record a login attempt, whether success or not.
            $ipAddress = service('request')->getIPAddress();
            $this->recordLoginAttempt($credentials['email'] ?? $credentials['username'], $ipAddress, $this->user->id ?? null, false);

            $this->error = lang('Auth.userIsBanned');

            $this->user = null;
            return false;
        }

        if(!$this->user->isActivated()) {
            // Always record a login attempt, whether success or not.
            $ipAddress = service('request')->getIPAddress();
            $this->recordLoginAttempt($credentials['email'] ?? $credentials['username'], $ipAddress, $this->user->id ?? null, false);

            $param = http_build_query([
                'login' => urlencode($credentials['email'] ?? $credentials['username'])
            ]);

            $this->error = lang('Auth.notActivated') . ' ' . anchor(route_to('resend-activate-account') . '?' . $param, lang('Auth.activationResend'));

            $this->user = null;
            return false;
        }

        return $this->login($this->user, $remember);
    }

    /**
     * Checks to see if the user is logged in or not.
     *
     * @return bool
     * @throws RedirectException
     */
    public function check(): bool {
        if($this->isLoggedIn()) {
            // Do we need to force the user to reset their password?
            if($this->user && $this->user->force_pass_reset) {
                throw new RedirectException(route_to('reset-password') . '?token=' . $this->user->reset_hash);
            }

            return true;
        }

        // Check the remember me functionality.
        helper('cookie');
        $remember = get_cookie('remember');

        if(empty($remember)) {
            return false;
        }

        [$selector, $validator] = explode(':', $remember);
        $validator = hash('sha256', $validator);

        $token = $this->loginModel->getRememberToken($selector);

        if(empty($token)) {
            return false;
        }

        if(!hash_equals($token->hashedValidator, $validator)) {
            return false;
        }

        // Yay! We were remembered!
        $user = $this->userModel->find($token->user_id);

        if(empty($user)) {
            return false;
        }

        $this->login($user);

        // We only want our remember me tokens to be valid
        // for a single use.
        $this->refreshRemember($user->id, $selector);

        return true;
    }

    /**
     * Checks the user's credentials to see if they could authenticate.
     * Unlike `attempt()`, will not log the user into the system.
     *
     * @param array $credentials
     * @param bool  $returnUser
     *
     * @return \Myth\Auth\Entities\User|bool|array
     * @throws ReflectionException
     */
    public function validate(array $credentials, bool $returnUser = false): \Myth\Auth\Entities\User|bool|array {
        // Can't validate without a password.
        if(empty($credentials['password']) || count($credentials) < 2) return false;

        // Only allowed 1 additional credential other than password
        $password = $credentials['password'];
        unset($credentials['password']);

        if(count($credentials) > 1) throw AuthException::forTooManyCredentials();

        // Ensure that the fields are allowed validation fields
        if(!in_array(key($credentials), $this->config->validFields)) {
            throw AuthException::forInvalidFields(key($credentials));
        }

        // Can we find a user with those credentials?
        $user = $this->userModel->where($credentials)->first();

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
            $this->userModel->save($user);
        }

        return $returnUser ? $user : true;
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
        helper('cookie');

        // Destroy the session data - but ensure a session is still available for flash messages, etc.
        if(isset($_SESSION)) {
            foreach($_SESSION as $key => $value) {
                $_SESSION[$key] = NULL;
                unset($_SESSION[$key]);
            }
        }

        // Regenerate the session ID for a touch of added safety.
        session()->regenerate(true);

        // Remove the cookie
        delete_cookie("remember");

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
