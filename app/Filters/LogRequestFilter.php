<?php

namespace App\Filters;

use App\Libraries\OAuth\OAuth;
use App\Models\ApiProductPath;
use App\Models\ApiUser;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use OAuth2\Request;

class LogRequestFilter implements FilterInterface
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
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null): mixed
    {
        //
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
        helper('auth');

        $server = (new OAuth())->server;
        $authRequest = Request::createFromGlobals();

        $data['path'] = match (true) {
            str_contains($request->getPath(), 'users') => 'userdetails',
            str_contains($request->getPath(), 'products') => 'products',
            str_contains($request->getPath(), 'auth') => 'auth',
            default => 'transactions',
        };

        $apiKey = $authRequest->headers('cf_api_key');
        if(isset($apiKey) && ApiUser::where('key', $apiKey)->exists()) {
            $data['user_id'] = ApiUser::where('key', $apiKey)->first()->user_id;
        } else if($server->verifyResourceRequest($authRequest)) {
            $data['user_id'] = $server->getAccessTokenData($authRequest)['user_id'];
        } else if(logged_in()) {
            $data['user_id'] = user_id();
        }

        ApiProductPath::create($data);
    }
}
