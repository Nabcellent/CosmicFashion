<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Libraries\OAuth\OAuth;
use App\Models\Role;
use App\Models\User;
use CodeIgniter\API\ResponseTrait;
use Exception;
use Myth\Auth\Password;
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

    public function register() {
        $rules = [
            'first_name'            => 'required|min_length[2]|max_length[50]',
            'last_name'             => 'required|min_length[2]|max_length[50]',
            'email'                 => 'required|valid_email|is_unique[users.email]',
            'gender'                => 'required|in_list[male,female]',
            'password'              => 'required|min_length[7]|max_length[20]',
            'password_confirmation' => 'required|matches[password]',
        ];
        $messages = [
            'password_confirmation' => [
                'matches' => 'Your passwords do not match.'
            ],
            'email'                 => ['is_unique' => 'The email provided is already in use.']
        ];

        $data = $this->request->getVar();

        try {
            $data['role_id'] = Role::whereName('Api User')->value('id');
            $data['username'] = $data['username'] ?? $data['email'];
            $data['key'] = uniqid('cf_api-', true);

            if(!$this->validate($rules, $messages)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $data['password'] = Password::hash($this->request->getVar('password'));

            $user = User::create($data);
            $apiUser = $user->apiUser()->create($data);
            $apiUser->user = $user;

            return $this->respondCreated($apiUser, 'User created successfully! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }
}
