<?php

namespace App\Controllers\API;

use App\Models\ApiUser;
use App\Models\Role;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Exception;
use Myth\Auth\Password;

class UserController extends ResourceController
{
    protected $format = 'json';

    public function __construct() { Services::eloquent(); }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index(): mixed {
        $users = User::all();

        return $this->respond($users);
    }

    /**
     * Return the properties of a resource object
     *
     * @param null $id
     * @return mixed
     */
    public function show($id = null): mixed {
        try {
            $user = User::findOrFail($id);

            return $this->respond($user);
        } catch (Exception $e) {
            return $this->failNotFound('User not found.');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new() {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create(): mixed {
        $rules = [
            'first_name'            => 'required|min_length[2]|max_length[50]',
            'last_name'             => 'required|min_length[2]|max_length[50]',
            'email'                 => 'required|valid_email|is_unique[users.email]',
            'gender'                => 'required|in_list[male,female]',
            'role_id'               => "required|in_list[" . implode(',',
                    Role::where('name', '<>', 'Red')->pluck('id')->toArray()) . "]",
            'password'              => 'required|min_length[7]|max_length[20]',
            'password_confirmation' => 'required|matches[password]',
        ];
        $messages = [
            'password_confirmation' => [
                'matches' => 'Your passwords do not match.'
            ],
            'email'                 => ['is_unique' => 'The email provided is already in use.']
        ];

        try {
            if(!$this->validate($rules, $messages)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $data = $this->request->getVar();
            $data['password'] = Password::hash($this->request->getVar('password'));

            $user = User::create($data);

            return $this->respondCreated($user, 'User created successfully! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null) {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param null $id
     * @return mixed
     */
    public function update($id = null): mixed {
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name'  => 'required|min_length[2]|max_length[50]',
            'email'      => "required|valid_email|is_unique[users.email,id,$id]",
            'gender'     => 'required|in_list[male,female]',
        ];
        $messages = [
            'email' => ['is_unique' => 'The email provided is already in use.']
        ];

        try {
            if(!$this->validate($rules, $messages)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $data = $this->request->getRawInput();

            $user = User::findOrFail($id)->update($data);

            return $this->respondUpdated($user, 'User updated successfully! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null) {
        try {
            $user = User::findOrFail($id)->delete();

            return $this->respondDeleted($user);
        } catch (Exception $e) {
            return $this->failNotFound('User not found.');
        }
    }
}
