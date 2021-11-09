<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\ChartAid;
use App\Models\Order;
use App\Models\OrdersDetail;
use Exception;
use JetBrains\PhpStorm\ArrayShape;
use Nabz\Models\DB;

class DashboardController extends BaseController {
    public function index(): string {
        $data = [
            'title' => "Dashboard",
        ];

        return view('Admin/dashboard', $data);
    }

    public function dashStats(): bool|string {
        $data = [
            "total_orders" => Order::count(),
            "weekly_sales" => $this->weeklyOrders(),
            "popular_products" => $this->popularProducts(),
        ];

        return json_encode($data);
    }

    public function weeklyOrders() {
        $frequency = 'weekly';

        try {
            $chartAid = new ChartAid($frequency, 'sum', 'amount');

            $revenue = Order::select(['created_at', 'amount'])->whereBetween('created_at', [
                $chartAid->chartStartDate(), now()])
                ->where('is_paid', true)->get()->groupBy(function($item) use ($chartAid) {
                    return $chartAid->chartDateFormat($item->created_at);
                });

            $revenue = $chartAid->chartDataSet($revenue);

            return collect($revenue['datasets'])->avg();
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return 0;
        }
    }

    public function popularProducts() {
        return OrdersDetail::join('products', 'orders_details.product_id', '=', 'products.id')
            ->select(['product_id', 'name', DB::raw("SUM(quantity) as value")])
            ->groupBy('product_id')->latest('value')->take(3)->get();
    }
}
