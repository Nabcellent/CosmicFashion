<?php

namespace App\Controllers;

use App\Models\Product;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class ProductController extends BaseController
{
    public function index(): string {
        $data = [
            'products' => Product::all(),
            'title'    => 'Shop'
        ];

        return view('shop', $data);
    }

    public function show($id): string|RedirectResponse {
        try {
            $product = Product::with('subCategory')->findOrFail($id);

            $data = [
                'product' => $product,
                'title' => $product->name,
                'likeProducts' => Product::inRandomOrder()->take(5)->get(),
            ];

            return view('details', $data);
        } catch (Exception $e) {
            return toastError($e->getMessage(), 'Unable to fetch product');
        }
    }

    public function cart(): string {
        $data = [
            'cartItems' => null,
            'title'     => 'Cart'
        ];

        return view('cart', $data);
    }
}
