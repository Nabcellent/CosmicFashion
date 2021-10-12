<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class LoginController extends BaseController {
    public function index() {
        echo view('auth/login',['title' => 'Sign In']);
    }

    public function login(): RedirectResponse {
        $session = session();

        $user = new User();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        try {
            $user = $user->findByEmail($email);

            $authenticatePassword = password_verify($password, $user['password']);

            if($authenticatePassword) {
                $user['isLoggedIn'] = true;
                unset($user['password']);

                $session->set($user);

                return redirect('/');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect('get.login')->withInput();
            }
        } catch(Exception $e) {
            $session->setFlashdata('msg', 'Invalid Credentials!');

            return redirect('get.login')->withInput();
        }
    }
}
