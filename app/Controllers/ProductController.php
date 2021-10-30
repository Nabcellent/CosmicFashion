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
                'likeProducts' => Product::inRandomOrder()->with('subCategory')->take(8)->get(),
            ];

            return view('details', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
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
                $cart[$productId]['sub_total'] += (int)$product->price * $quantity;
            } else {
                $cart[$productId] = [
                    "name"         => $product->name,
                    "quantity"     => $quantity,
                    "price"        => $product->price,
                    "sub_total"    => (int)$product->price * $quantity,
                    "sub_category" => $product->subCategory->name,
                    "image"        => $product->image,
                    "discount"     => $product->discount,
                    'created_at'   => Carbon::now()
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

    public function update() {
        parse_str($this->request->getBody(), $input);

        try {
            if($input['product_id'] && $input['quantity']){
                $cart = session('cart');
                $unitPrice = $cart[$input['product_id']]["price"];
                $cart[$input['product_id']]["quantity"] = $input['quantity'];
                $cart[$input['product_id']]["sub_total"] = $unitPrice * (int)$input['quantity'];

                session()->set('cart', $cart);

                return json_encode([
                    'status'    => true,
                    'cartCount' => sizeof($cart),
                    'cartTotal' => cartDetails('total'),
                    'unitPrice' => $unitPrice,
                    'msg'       => 'Quantity updated successfully!'
                ]);
            }
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
            'cartItems' => session('cart'),
            'title'     => 'Cart'
        ];

        return view('cart', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return false|string
     */
    public function destroy(): bool|string {
        parse_str($this->request->getBody(), $input);

        if($input['product_id']) {
            $cart = session('cart');

            if(isset($cart[$input['product_id']])) {
                unset($cart[$input['product_id']]);

                session()->set('cart', $cart);
            }

            return json_encode([
                'status'    => true,
                'cartCount' => sizeof($cart),
                'cartTotal' => cartDetails('total'),
                'msg'       => 'Item removed successfully!'
            ]);
        }

        return json_encode([
            'status'    => false,
            'msg'       => 'Unable to remove item😪!'
        ]);
    }
}
