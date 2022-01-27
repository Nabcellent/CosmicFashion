<?php

namespace App\Filters;

use App\Libraries\OAuth\OAuth;
use App\Models\ApiUser;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use OAuth2\Request;

class OAuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     */
    public function before(RequestInterface $request, $arguments = null) {
        $oAuth = new OAuth();
        $request = Request::createFromGlobals();

        Services::eloquent();
        header('Content-Type: application/json');

        $apiKey = $request->headers('cf_api_key');
        $accessToken = $request->headers('authorization');

        if(!isset($apiKey) && !isset($accessToken)) {
            echo json_encode([
                'status'  => false,
                'code'  => 401,
                'message' => "Unauthorized access!"
            ]);
            die;
        }

        if($apiKey && !ApiUser::where('key', $apiKey)->exists()) {
            echo json_encode([
                'status'  => false,
                'code'  => 400,
                'message' => "Invalid api key!"
            ]);
            die;
        }

        if(!$apiKey && !$oAuth->server->verifyResourceRequest($request)) {
            $oAuth->server->getResponse()->send();
            echo json_encode([
                'status'  => false,
                'code'  => 400,
                'message' => "Invalid access token!"
            ]);
            die;
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        //
    }
}
