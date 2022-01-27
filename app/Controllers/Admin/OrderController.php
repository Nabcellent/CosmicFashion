<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Order;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class OrderController extends BaseController
{
    public function index(): string {
        $data = [
            'orders' => Order::with(['user', 'paymentType'])->withCount('ordersDetails')->take(10)->latest()->get(),
        ];

        return view('Admin/pages/orders/index', $data);
    }

    public function show($id): string|RedirectResponse {
        try {
            $data = [
                'order' => Order::with(['user', 'paymentType', 'ordersDetails'])->findOrFail($id),
            ];

            return view('Admin/pages/orders/show', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return goWithError('Unable to find order!', 'admin.orders.index');
        }
    }
}
