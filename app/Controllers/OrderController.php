<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\PaymentType;
use App\Models\Product;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use Nabz\Models\DB;
use Throwable;

class OrderController extends BaseController
{
    public function index(): string {
        $data = [
            'cartItems' => session('cart'),
            'title'     => 'Checkout',
            'paymentTypes' => PaymentType::all()
        ];

        return view('checkout', $data);
    }

    public function store(): RedirectResponse {
        $cart = session('cart');

        $data = [
            'user_id' => user()->id,
            'payment_type_id' => $this->request->getVar('payment_method'),
            'amount' => cartDetails('total'),
        ];

        try {
            DB::transaction(function() use ($cart, $data) {
                $order = Order::create($data);

                foreach($cart as $productId => $item) {
                    $order->ordersDetails()->create([
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                        'total' => $item['sub_total'],
                        'created_at' => $item['created_at']
                    ]);
                }
            });

            session()->set('cart', []);

            return redirect('orders.thanks');
        } catch (Exception|Throwable $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return toastError($e->getMessage(), 'Unable to place order. kindly contact Admin.');
        }
    }

    public function thanks(): string {
        $data = [
            'title'     => 'Thank you',
            'likeProducts' => Product::inRandomOrder()->with('subCategory')->take(8)->get(),
        ];

        return view('thanks', $data);
    }
}
