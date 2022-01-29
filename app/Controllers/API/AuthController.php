<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\Role;
use App\Models\User;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use JetBrains\PhpStorm\ArrayShape;
use Myth\Auth\Password;

class AuthController extends BaseController
{
    use ResponseTrait;

    /**
     * @throws Exception
     */
    public function login(): Response
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $rules = [
            'email'    => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]'
        ];

        if(!$this->validate($rules)) {
            return $this->respond($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $user = User::findEmail($email);

        if(!Password::verify($password, $user['password']))
            return $this->respond(['error' => "Invalid credentials!"], ResponseInterface::HTTP_BAD_REQUEST);

        if(!$user->apiUser)
            return $this->respond(['error' => "Invalid credentials!"], ResponseInterface::HTTP_BAD_REQUEST);

        return $this->respond($this->getJWTForUser($email), 200);
    }

    public function register(): Response
    {
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
            $data = $this->getJWTForUser($apiUser->user->email);

            return $this->respondCreated($data, 'User created successfully! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    #[ArrayShape(['message' => "string", 'user' => "mixed", 'access_token' => "string"])]
    private function getJWTForUser(string $emailAddress, int $responseCode = ResponseInterface::HTTP_OK): array
    {
        try {
            $user = User::findEmail($emailAddress);

            helper('jwt');

            return [
                'message'      => 'User authenticated successfully',
                'user'         => $user->apiUser,
                'access_token' => getSignedJWTForUser($emailAddress)
            ];
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $responseCode);
        }
    }
}
