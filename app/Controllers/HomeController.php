<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;

class HomeController extends BaseController {
    public function index(): string {
        $data['newArrivals'] = Product::with('subCategory')->latest()->limit(8)->get();;

        return view('home', $data);
    }

    public function showContactUs(): string {
        return view('contact_us');
    }

    public function test(): string {
        return view('welcome');
    }
}
