<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController {
    public function index() {
        return view('Admin/dashboard');
    }
}
