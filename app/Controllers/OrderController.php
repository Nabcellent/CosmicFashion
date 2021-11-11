<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;
use Dompdf\Dompdf;
use Exception;
use Nabz\Models\DB;
use Throwable;

class OrderController extends BaseController
{
    public function index(): string|RedirectResponse {
        if(empty(session('cart'))) {
            return goWithInfo('Your cart is empty🛒. Wanna add something first? 😁', 'shop.index');
        }

        $data = [
            'cartItems'    => session('cart'),
            'title'        => 'Checkout',
            'paymentTypes' => PaymentType::all()
        ];

        return view('checkout', $data);
    }

    public function store(): RedirectResponse {
        $walletPaymentId = PaymentType::whereName('wallet')->value('id');
        $orderData['payment_type_id'] = $this->request->getVar('payment_method');

        if((int)$this->request->getVar('payment_method') === $walletPaymentId) {
            $userWallet = User::find(user_id())->wallet;

            if($userWallet && $userWallet->amount >= cartDetails('total')) {
                $userWallet->amount -= cartDetails('total');
                $userWallet->save();

                $orderData['is_paid'] = true;
                $orderData['status'] = 'paid';
                $orderData['type'] = 'payment';
            } else {
                $balance = $userWallet->balance ?? 0;
                return goWithInfo("Sorry! Your wallet balance($balance) is insufficient to complete the order.");
            }
        }

        if(self::storeCart($orderData, $userWallet ?? null)) {
            emptyCart();

            return redirect('orders.thanks');
        }

        return createFail('Unable to place order. kindly contact Admin.');
    }

    public function thanks(): string {
        $data = [
            'title'        => 'Thank you',
            'likeProducts' => Product::inRandomOrder()->with('subCategory')->take(8)->get(),
        ];

        return view('thanks', $data);
    }

    public static function storeCart(array $data, $wallet = null): bool|Order {
        $cart = session('cart');

        $data['amount'] = cartDetails('total');
        $data['user_id'] = user_id();

        try {
            return DB::transaction(function() use ($wallet, $cart, $data) {
                $order = Order::create($data);
                $data['order_id'] = $order->id;

                foreach($cart as $productId => $item) {
                    $order->ordersDetails()->create([
                        'product_id' => $productId,
                        'price'      => $item['price'],
                        'quantity'   => $item['quantity'],
                        'total'      => $item['sub_total'],
                        'created_at' => $item['created_at']
                    ]);
                }

                if(isset($wallet)) {
                    $wallet->transaction()->create($data);
                }

                return $order;
            });
        } catch (Exception | Throwable $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);

            return false;
        }
    }

    public function receipt(int $id): string {
        $data = [
            'order' => Order::with(["user", "ordersDetails"])->findOrFail($id),
        ];

        return view('receipt', $data);
    }

    public function receiptPDF(int $id): string {
        $order = Order::with(['ordersDetails', 'user'])->findOrFail($id);

        $view = view('receipt_template', ['order' => $order]);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        $dompdf->setPaper('A5');    // (Optional) Setup the paper size and orientation
        $dompdf->render();              // Render the HTML as PDF
        $dompdf->stream();              // Output the generated PDF to Browser

        return view('receipt', $order);
    }
}
