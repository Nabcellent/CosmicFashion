<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;

class UserController extends BaseController {
    public function index(): string {
        $data = [
            'title' => "My Profile",
        ];

        return view('profile', $data);
    }

    public function account(): string {
        $data = [
            'title' => "My Account",
            'orders' => Product::all(),
        ];

        return view('account', $data);
    }

    public function profile(): string {
        $data = [
            'title' => "My Account",
            'orders' => Product::all(),
        ];

        return view('account', $data);
    }

    public function update() {
        $rules = [
//            'username' => 'alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'username' => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];
    }


    public function checkEmailExists(): string {
        $exists = User::where('email', $this->request->getVar('email'))->exists();

        return $exists ? "false" : "true";
    }
}
