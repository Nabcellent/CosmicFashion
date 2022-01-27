<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\ChartAid;
use App\Models\Login;
use App\Models\Order;
use App\Models\OrdersDetail;
use Exception;
use Nabz\Models\DB;

class DashboardController extends BaseController
{
    public function index(): string {
        $data = [
            'title'       => "Dashboard",
            'bSProducts'  => OrdersDetail::with([
                'product' => function($query) {
                    $query->with([
                        'subCategory' => function($query) {
                            $query->select(['id', 'category_id', 'name']);
                        }
                    ])->select(['id', 'sub_category_id']);
                }
            ])->whereHas('order', function($query) {
                $query->whereStatus('paid');
            })->join('products', 'orders_details.product_id', '=', 'products.id')->select([
                'product_id',
                'image',
                'name',
                DB::raw("SUM(total) as revenue")
            ])->groupBy('product_id')->latest('revenue')->take(5)->get(),
            'activeUsers' => Login::with([
                'user' => function($query) {
                    $query->with('role')->select(['id', 'first_name', 'last_name', 'role_id', 'image']);
                }
            ])->whereHas('user')->whereNull('logged_out_at')->select(['user_id'])->distinct()->latest('id')->take(5)
                ->get(),
        ];

        $data['bSProducts']->totalRevenue = $data['bSProducts']->sum('revenue');

        return view('Admin/dashboard', $data);
    }

    /**
     * @throws Exception
     */
    public function dashStats(): bool|string {
        $data = [
            "total_orders"     => Order::count(),
            "weekly_sales"     => [
                'chart'  => ChartAid::weeklySales(),
                'amount' => $this->weeklySalesAvg()
            ],
            "popular_products" => $this->popularProducts(),
            'weekly_orders'    => ChartAid::weeklyOrders()
        ];

        return json_encode($data);
    }

    public function weeklySalesAvg() {
        $frequency = 'weekly';

        try {
            $chartAid = new ChartAid($frequency, 'sum', 'amount');

            $revenue = Order::select(['created_at', 'amount'])->whereBetween('created_at', [
                $chartAid->chartStartDate(),
                now()
            ])->where('is_paid', true)->get()->groupBy(function($item) use ($chartAid) {
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
        return OrdersDetail::join('products', 'orders_details.product_id', '=', 'products.id')->select([
            'product_id',
            'name',
            DB::raw("SUM(quantity) as value")
        ])->groupBy('product_id')->latest('value')->take(3)->get();
    }
}
