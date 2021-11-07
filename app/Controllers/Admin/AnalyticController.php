<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Order;
use Exception;
use JetBrains\PhpStorm\ArrayShape;

class AnalyticController extends BaseController
{
    public function index() {
        return view('Admin/pages/analytics/index');
    }

    /**
     * @throws Exception
     */
    public function init(): bool|string {
        $frequency = $this->request->getVar('frequency') ?? 'all-time';

        $data = [
            'ordersPerGender' => $this->ordersPerGender()
        ];

        return json_encode($data);
    }

    public function ordersPerGender(): array {
        $data = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->selectRaw('gender as name, count(*) as value')->groupBy('users.gender')->get();

        $total = $data->sum('value');
        $percentages = [];

        foreach($data as $gender) {
            $percentages[$gender->name] = ($gender->value / $total) * 100;
        }

        return [
            'datasets' => $data->toArray(),
            'percent' => $percentages
        ];
    }
}
