<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController {
    public function index(): string {
        $data = [
            'products' => Product::all(),
            'title'    => 'Shop'
        ];

        return view('shop', $data);
    }

    public function cart(): string {
        $data = [
            'cartItems' => null,
            'title'    => 'Cart'
        ];

        return view('cart', $data);
    }
}
