<?php

namespace Config;

use App\Filters\Admin;
use App\Filters\Authenticate;
use App\Filters\BasicAuthFilter;
use App\Filters\LoginFilter;
use App\Filters\LogRequestFilter;
use App\Filters\OAuthFilter;
use App\Filters\PermissionFilter;
use App\Filters\RedirectIfAuthenticated;
use App\Filters\RoleFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public array $aliases = [
        'csrf'        => CSRF::class,
        'toolbar'     => DebugToolbar::class,
        'honeypot'    => Honeypot::class,
        'admin'       => Admin::class,
        'auth'        => Authenticate::class,
        'guest'       => RedirectIfAuthenticated::class,
        'login'       => LoginFilter::class,
        'role'        => RoleFilter::class,
        'permission'  => PermissionFilter::class,
        'oauth'       => OAuthFilter::class,
        'log_request' => LogRequestFilter::class,
        'basic_auth'  => BasicAuthFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            //            'csrf'  => ['except' => 'api/'],
            'login' => [
                'except' => [
                    '',
                    'home*',
                    'cart',
                    'test',
                    'login*',
                    'register*',
                    'sign-in*',
                    'sign-up*',
                    'shop*',
                    'check-email',
                    'delete-resource',
                    'api*',
                    'help*'
                ]
            ],
        ],
        'after'  => [
            'toolbar' => ['except' => ['api*']],
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public array $methods = [
        // 'post' => ['csrf']
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public array $filters = [
        'auth'        => ['before' => ['admin*', 'account*', 'profile*']],
        'oauth'       => ['before' => ['api/users*', 'api/transactions*']],
        'log_request' => ['after' => ['api*']],
        'basic_auth'  => ['before' => ['api/products']]
    ];
}
