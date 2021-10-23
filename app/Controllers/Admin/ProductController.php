<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index(): string {
        return view('Admin/pages/products/index');
    }

    public function create(): string {
        return view('Admin/pages/products/upsert');
    }
}
