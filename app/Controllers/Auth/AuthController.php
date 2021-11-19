<?php namespace App\Controllers\Auth;

use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;
use Illuminate\Support\Arr;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Password;

class AuthController extends Controller
{
    protected mixed $auth;

    /**
     * @var AuthConfig
     */
    protected mixed $config;

    /**
     * @var Session
     */
    protected mixed $session;

    public function __construct() {
        service('eloquent');
        // Most services in this controller require the session to be started - so fire it up!
        $this->config = config('Auth');
        $this->session = service('session');
        $this->auth = service('authentication');
    }

    //--------------------------------------------------------------------
    // Login/out
    //--------------------------------------------------------------------

    /**
     * Displays the login form, or redirects
     * the user to their destination/home if
     * they are already logged in.
     */
    public function login(): string|RedirectResponse {
        // No need to show a login form if the user is already logged in.
        if($this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        // Set a return URL if none is specified
        $_SESSION['redirect_url'] = previous_url() ?? site_url('/');

        $data = [
            'config' => $this->config,
            'title'  => 'Sign In'
        ];

        return $this->_render($this->config->views['login'], $data);
    }

    /**
     * Attempts to verify the user's credentials
     * through a POST request.
     */
    public function attemptLogin(): bool|string|RedirectResponse {
        $rules = [
            'email'    => 'required',
            'password' => 'required',
        ];

        if($this->config->validFields == ['email']) $rules['email'] .= '|valid_email';

        if(!$this->validate($rules)) {
            return json_encode(['status' => false, 'message' => Arr::first($this->validator->getErrors())]);
        }

        $username = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = (bool)$this->request->getPost('remember');

        // Determine credential type
        $type = filter_var($username, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        // Try to log them in...
        if(!$this->auth->attempt([$type => $username, 'password' => $password], $remember)) {
            return json_encode(['status' => false, 'message' => $this->auth->error() ?? lang('Auth.badAttempt')]);
        }

        $userCart = User::find($this->auth->user()->id)->cart();

        if($userCart->exists()) {
            $cart = session('cart') ?? [];

            foreach($userCart->with('product')->get() as $item) {
                $cart[$item['product_id']] = [
                    "name"         => $item->product->name,
                    "quantity"     => $item->quantity,
                    "price"        => $item->price,
                    "sub_total"    => (int)$item->price * $item->quantity,
                    "sub_category" => $item->product->subCategory->name,
                    "image"        => $item->product->image,
                    "discount"     => $item->discount,
                    'created_at'   => $item->created_at
                ];
            }

            session()->set('cart', $cart);
        }

        $redirectURL = site_url('/');
        unset($_SESSION['redirect_url']);

        return json_encode(['status' => true, 'url' => $redirectURL]);
    }

    /**
     * Log the user out.
     */
    public function logout(): RedirectResponse {
        $cart = session('cart');

        if(!empty($cart)) {
            foreach($cart as $productId => $item) {
                Cart::updateOrCreate(['user_id' => user()->id, 'product_id' => $productId], $item);
            }
        }

        if($this->auth->check()) {
            $this->auth->logout();
        }

        return redirect()->to(site_url('/login'));
    }

    //------------------------------------------------------------------------------------------------
    // Register
    //------------------------------------------------------------------------------------------------

    /**
     * Displays the user registration page.
     */
    public function register(): string|RedirectResponse {
        // check if already logged in.
        if($this->auth->check()) {
            return redirect()->back();
        }

        // Check if registration is allowed
        if(!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $data = [
            'config' => $this->config,
            'title'  => 'Sign Up'
        ];

        return $this->_render($this->config->views['register'], $data);
    }

    /**
     * Attempt to register a new user.
     */
    public function attemptRegister(): bool|string|RedirectResponse {
        // Validate basics first since some password rules rely on these fields
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name'  => 'required|min_length[2]|max_length[50]',
            'email'      => 'required|valid_email|is_unique[users.email]',
            'gender'     => 'required|in_list[male,female]',
        ];

        $messages = [
            'password_confirmation' => [
                'matches' => 'Your passwords do not match.'
            ],
            'email'                 => ['is_unique' => 'The email provided is already in use.']
        ];

        if(!$this->validate($rules, $messages)) {
            return json_encode(['status' => false, 'message' => Arr::first($this->validator->getErrors())]);
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'              => 'required|min_length[7]|max_length[20]', //|strong_password
            'password_confirmation' => 'required|matches[password]',
        ];

        if(!$this->validate($rules, $messages)) {
            return json_encode(['status' => false, 'message' => Arr::first($this->validator->getErrors())]);
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields,
            ['role_id']);
        $newUser = $this->request->getPost($allowedPostFields);
        $newUser['role_id'] = Role::where('name', 'Customer')->first()->id;
        $newUser['password'] = Password::hash($newUser['password']);

        User::create($newUser);

        // Success!
        Services::session()->setFlashdata('toast_success', 'Registration successful! ✔');
        return json_encode(['status' => true, 'url' => route_to('login')]);
    }

    //--------------------------------------------------------------------
    // Forgot Password
    //--------------------------------------------------------------------

    /**
     * Displays the forgot password form.
     */
    public function forgotPassword(): string|RedirectResponse {
        if($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        return $this->_render($this->config->views['forgot'], ['config' => $this->config]);
    }

    /**
     * Attempts to find a user account with that password
     * and send password reset instructions to them.
     */
    public function attemptForgot(): RedirectResponse {
        if($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        $users = model(UserModel::class);

        $user = $users->where('email', $this->request->getPost('email'))->first();

        if(is_null($user)) {
            return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
        }

        // Save the reset hash /
        $user->generateResetHash();
        $users->save($user);

        $resetter = service('resetter');
        $sent = $resetter->send($user);

        if(!$sent) {
            return redirect()->back()->withInput()->with('error', $resetter->error() ?? lang('Auth.unknownError'));
        }

        return redirect()->route('reset-password')->with('message', lang('Auth.forgotEmailSent'));
    }

    /**
     * Displays the Reset Password form.
     */
    public function resetPassword(): string|RedirectResponse {
        if($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        $token = $this->request->getGet('token');

        return $this->_render($this->config->views['reset'], [
            'config' => $this->config,
            'token'  => $token,
        ]);
    }

    /**
     * Verifies the code with the email and saves the new password,
     * if they all pass validation.
     *
     * @return mixed
     */
    public function attemptReset(): mixed {
        if($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        $users = model(UserModel::class);

        // First things first - log the reset attempt.
        $users->logResetAttempt($this->request->getPost('email'), $this->request->getPost('token'),
            $this->request->getIPAddress(), (string)$this->request->getUserAgent());

        $rules = [
            'token'        => 'required',
            'email'        => 'required|valid_email',
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if(!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = $users->where('email', $this->request->getPost('email'))
            ->where('reset_hash', $this->request->getPost('token'))->first();

        if(is_null($user)) {
            return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
        }

        // Reset token still valid?
        if(!empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp()) {
            return redirect()->back()->withInput()->with('error', lang('Auth.resetTokenExpired'));
        }

        // Success! Save the new password, and cleanup the reset hash.
        $user->password = $this->request->getPost('password');
        $user->reset_hash = null;
        $user->reset_at = date('Y-m-d H:i:s');
        $user->reset_expires = null;
        $user->force_pass_reset = false;
        $users->save($user);

        return redirect()->route('login')->with('message', lang('Auth.resetSuccess'));
    }

    /**
     * Activate account.
     *
     * @return mixed
     */
    public function activateAccount(): mixed {
        $users = model(UserModel::class);

        // First things first - log the activation attempt.
        $users->logActivationAttempt($this->request->getGet('token'), $this->request->getIPAddress(),
            (string)$this->request->getUserAgent());

        $throttler = service('throttler');

        if($throttler->check(md5($this->request->getIPAddress()), 2, MINUTE) === false) {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests',
                [$throttler->getTokentime()]));
        }

        $user = $users->where('activate_hash', $this->request->getGet('token'))->where('active', 0)->first();

        if(is_null($user)) {
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $user->activate();

        $users->save($user);

        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    }

    /**
     * Resend activation account.
     *
     * @return mixed
     */
    public function resendActivateAccount(): mixed {
        if($this->config->requireActivation === null) {
            return redirect()->route('login');
        }

        $throttler = service('throttler');

        if($throttler->check(md5($this->request->getIPAddress()), 2, MINUTE) === false) {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests',
                [$throttler->getTokentime()]));
        }

        $login = urldecode($this->request->getGet('login'));
        $type = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $users = model(UserModel::class);

        $user = $users->where($type, $login)->where('active', 0)->first();

        if(is_null($user)) {
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $activator = service('activator');
        $sent = $activator->send($user);

        if(!$sent) {
            return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
        }

        // Success!
        return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));

    }

    protected function _render(string $view, array $data = []) {
        return view($view, $data);
    }
}
