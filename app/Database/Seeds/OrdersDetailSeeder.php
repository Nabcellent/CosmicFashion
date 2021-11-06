<?php

namespace App\Database\Seeds;

use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\Product;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrdersDetailSeeder extends Seeder
{
    public function run() {
        service('eloquent');

        Order::whereDoesntHave('ordersDetails')->each(function($detail) {
            for($i = 0; $i < mt_rand(1, 5); $i++) OrdersDetail::create($this->fakeOrdersDetail($detail->id));
        });
    }

    /**
     * @param $orderId
     * @return array
     */
    private function fakeOrdersDetail($orderId): array {
        $faker = Factory::create();

        $product = Product::inRandomOrder()->first();
        $quantity = $faker->numberBetween(1, 5);

        return [
            'order_id'   => $orderId,
            'product_id' => $product->id,
            'price'      => $product->price,
            'quantity'   => $quantity,
            'total'      => $quantity * (int)$product->price,
        ];
    }
}
