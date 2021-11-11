<?php namespace App\Authentication;

use App\Models\Login;
use App\Models\LoginModel;
use App\Models\User;
use CodeIgniter\Events\Events;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Exceptions\AuthException;
use Myth\Auth\Exceptions\UserNotFoundException;
use ReflectionException;

class AuthenticationBase
{
    /**
     * @var User|null
     */
    protected User|bool|null $user;
    /**
     * @var Login
     */
    protected Login $loginModel;

    /**
     * @var string
     */
    protected string $error;

    /**
     * @var AuthConfig
     */
    protected AuthConfig $config;

    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * Returns the current error, if any.
     *
     * @return string
     */
    public function error(): string {
        return $this->error;
    }

    /**
     * Whether to continue instead of throwing exceptions,
     * as defined in config.
     *
     * @return bool
     */
    public function silent(): bool {
        return $this->config->silent;
    }


    /**
     * Logs a user into the system.
     * NOTE: does not perform validation. All validation should
     * be done prior to using the login method.
     *
     * @param User|null $user
     * @param bool      $remember
     *
     * @return bool
     * @throws ReflectionException
     * @throws Exception
     */
    public function login(User $user = null, bool $remember = false): bool {
        if(empty($user)) {
            $this->user = null;
            return false;
        }

        $this->user = $user;

        // Always record a login attempt
        $ipAddress = service('request')->getIPAddress();
        $this->recordLoginAttempt($user->email, $ipAddress, $user->id ?? null, true);

        // Regenerate the session ID to help protect against session fixation
        if(ENVIRONMENT !== 'testing') {
            session()->regenerate();
        }

        // Let the session know we're logged in
        session()->set('logged_in', $this->user->id);

        // When logged in, ensure cache control headers are in place
        service('response')->noCache();

        // trigger login event, in case anyone cares
        Events::trigger('login', $user);

        return true;
    }

    /**
     * Checks to see if the user is logged in.
     *
     * @return bool
     */
    public function isLoggedIn(): bool {
        if($userID = session('logged_in')) {
            // Store our current user object
            $this->user = User::find($userID);

            return $this->user instanceof User;
        }

        return false;
    }


    /**
     * Logs a user into the system by their ID.
     *
     * @param int  $id
     * @param bool $remember
     * @return bool
     * @throws \Exception
     */
    public function loginByID(int $id, bool $remember = false): bool {
        $user = $this->retrieveUser(['id' => $id]);

        if(empty($user)) {
            throw UserNotFoundException::forUserID($id);
        }

        return $this->login($user, $remember);
    }

    /**
     * Logs a user out of the system.
     */
    public function logout() {
        helper('cookie');

        // Destroy the session data - but ensure a session is still
        // available for flash messages, etc.
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
            'ip_address' => $ipAddress,
            'email'      => $email,
            'user_id'    => $userID,
            'date'       => date('Y-m-d H:i:s'),
            'success'    => (int)$success
        ]);
    }

    /**
     * Returns the User ID for the current logged in user.
     *
     * @return int|null
     */
    public function id(): ?int {
        return $this->user->id ?? null;
    }


    /**
     * Returns the User instance for the current logged in user.
     *
     * @return User|null
     */
    public function user(): ?User {
        return $this->user;
    }

    /**
     * Grabs the current user from the database.
     *
     * @param array $wheres
     * @return mixed
     */
    public function retrieveUser(array $wheres): mixed {
        if(!$this->user instanceof User) {
            throw AuthException::forInvalidModel('User');
        }

        return User::where($wheres)->first();
    }


    //--------------------------------------------------------------------
    // Model Setters
    //--------------------------------------------------------------------

    /**
     * Sets the model that should be used to work with
     * user accounts.
     *
     * @param User $model
     *
     * @return $this
     */
    public function setUserModel(User $model): static {
        $this->user = $model;

        return $this;
    }

    /**
     * Sets the model that should be used to record
     * login attempts (but failed and successful).
     *
     * @param LoginModel $model
     *
     * @return $this
     */
    public function setLoginModel(Login $model): static {
        $this->loginModel = $model;

        return $this;
    }
}

