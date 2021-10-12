<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class RegisterController extends BaseController {
    public function index() {
        echo view('auth/register', ['title' => 'Sign Up']);
    }

    public function store(): string|RedirectResponse {
        $rules = [
            'first_name'             => 'required|min_length[2]|max_length[50]',
            'last_name'             => 'required|min_length[2]|max_length[50]',
            'email'            => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[7]|max_length[20]',
            'password_confirmation' => 'matches[password]'
        ];

        $messages = [
            'password_confirmation' => [
                'matches' => 'passwords do not match'
            ]
        ];

        if($this->validate($rules, $messages)) {
            $userModel = new User();

            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'gender'     => $this->request->getVar('gender'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            try {
                $userModel->save($data);

                return createOk('Registration successful! ✔', 'get.login');
            } catch(ReflectionException $e) {
                return createFail('Unable to create user');
            }
        } else {
            session()->setFlashdata('msg', $this->validator->getErrors());

            return redirect()->back()->withInput();
        }
    }
}
