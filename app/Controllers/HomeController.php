<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;

class HomeController extends BaseController {
    public function index(): string {

        //  Create connections
        //  Prepare Mysqli..... a lot of other nonsense like mysqli_fetch_assoc... blah blah blah...
        //  SELECT * FROM users WHERE email = nabcellent.dev@gmail.com;

        //  With eloquent...
        $users = User::where('email', 'nabcellent.dev@gmail.com;')->get();

        $data['newArrivals'] = Product::latest()->limit(8)->get();;

        return view('home', $data);
    }

    public function showContactUs(): string {
        return view('contact_us');
    }

    public function test(): string {
        return view('welcome');
    }
}
