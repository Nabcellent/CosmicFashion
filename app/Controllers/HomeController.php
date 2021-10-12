<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController extends BaseController {
    public function index(): string {
        $data['newArrivals'] = (new Product())->findAll();

        return view('home', $data);
    }

    public function showContactUs(): string {
        return view('contact_us');
    }

    public function test(): string {
        return view('welcome');
    }
}
