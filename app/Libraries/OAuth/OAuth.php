<?php

namespace App\Libraries\OAuth;

use OAuth2\GrantType\UserCredentials;
use OAuth2\Server;
use OAuth2\Storage\Pdo;

class OAuth
{

    public Server $server;

    public function __construct() {
        $this->init();
    }

    private function init() {
        $connection = [
            'dsn'      => env('database.default.DSN'),
            'username' => env('database.default.username'),
            'password' => env('database.default.password'),
        ];

        $storage = new Pdo($connection);
        $this->server = new Server($storage);
        $this->server->addGrantType(new UserCredentials($storage));
    }
}