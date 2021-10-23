<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index(): string {
        return view('Admin/pages/users/index');
    }

    public function create(): string {
        return view('Admin/pages/users/upsert');
    }
}
