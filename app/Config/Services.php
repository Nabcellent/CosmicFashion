<?php

namespace Config;

use App\Models\Login;
use App\Models\User;
use CodeIgniter\Config\BaseService;
use CodeIgniter\Model;
use Myth\Auth\Config\Auth as AuthConfig;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    public static function authentication(string $lib = 'local', Model $userModel = null, Model $loginModel = null, bool $getShared = true) {
        service('eloquent');

        if($getShared) {
            return self::getSharedInstance('authentication', $lib, $userModel, $loginModel);
        }
        
        $userModel = $userModel ?? new User();
        $loginModel = $loginModel ?? new Login();

        /** @var AuthConfig $config */
        $config = config('Auth');
        $class = $config->authenticationLibs[$lib];
        $instance = new $class($config);

        return $instance->setUserModel($userModel)->setLoginModel($loginModel);
    }
}
