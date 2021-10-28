<?php

namespace App\Controllers;

use App\Models\Product;
use Carbon\Carbon;
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
                'product'      => $product,
                'title'        => $product->name,
                'likeProducts' => Product::inRandomOrder()->take(5)->get(),
            ];

            return view('details', $data);
        } catch (Exception $e) {
            return toastError($e->getMessage(), 'Unable to fetch product');
        }
    }

    public function store() {
        try {
            $productId = $this->request->getVar('product_id');
            $quantity = (int)$this->request->getVar('quantity');

            $product = Product::findOrFail($productId);

            $session = session();
            $cart = $session->get('cart') ?? [];

            if(isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    "title"      => $product->title,
                    "quantity"   => $quantity,
                    "price"      => $product->price,
                    "sub_total"  => (int)$product->price * $quantity,
                    "image"      => $product->image,
                    "discount"   => $product->discount,
                    'created_at' => Carbon::now()
                ];
            }

            $session->set('cart', $cart);

            return json_encode([
                'status'    => true,
                'cartCount' => sizeof($cart),
                'cartTotal' => cartDetails('total'),
                'msg'       => 'Item added to cart successfully!'
            ]);

//            return redirect()->back()->with('toast_success', 'Product added to cart successfully!');
        } catch (Exception $e) {
            return json_encode([
                'status'  => false,
                'msg'     => 'unable to add item.',
                'content' => $e->getMessage()
            ]);
        }
    }

    public function showCart(): string {
        $data = [
            'cartItems' => null,
            'title'     => 'Cart'
        ];

        return view('cart', $data);
    }
}
