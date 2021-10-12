<?php

namespace App\Controllers;

use App\Models\Product;

class UserController extends BaseController {
    public function index() {
        $session = session();
        echo "Hello : " . $session->get('first_name');
    }

    public function account() {
        $data = [
            'title' => "My Account",
            'orders' => (new Product())->findAll(),
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
}
