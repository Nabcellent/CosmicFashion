<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Libraries\OAuth\OAuth;
use CodeIgniter\API\ResponseTrait;
use OAuth2\Request;

class AuthController extends BaseController
{
    use ResponseTrait;

    public function login() {
        $oAuth = new OAuth();

        $request = new Request();
        $response = $oAuth->server->handleTokenRequest($request->createFromGlobals());

        $code = $response->getStatusCode();
        $body = $response->getResponseBody();

        return $this->respond(json_decode($body), $code);
    }
}
