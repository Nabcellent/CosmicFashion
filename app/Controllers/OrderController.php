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
        if(self::storeCart(['payment_type_id' => $this->request->getVar('payment_method')])) {
            emptyCart();

            return redirect('orders.thanks');
        }

        return createFail('Unable to place order. kindly contact Admin.');
    }

    public function thanks(): string {
        $data = [
            'title'     => 'Thank you',
            'likeProducts' => Product::inRandomOrder()->with('subCategory')->take(8)->get(),
        ];

        return view('thanks', $data);
    }

    public static function storeCart(array $data): bool|Order {
        $cart = session('cart');

        $data['amount'] = cartDetails('total');
        $data['user_id'] = user_id();

        try {
            return DB::transaction(function() use ($cart, $data) {
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

                return $order;
            });
        } catch (Exception|Throwable $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);

            return false;
        }
    }
}
