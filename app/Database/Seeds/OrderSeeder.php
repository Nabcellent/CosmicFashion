<?php

namespace App\Database\Seeds;

use App\Models\Order;
use App\Models\PaymentType;
use App\Models\User;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    public function run() {
        service('eloquent');

        for($i = 0; $i < 10; $i++) Order::create($this->fakeOrder());
    }

    /**
     * @throws Exception
     */
    private function fakeOrder(): array {
        $faker = Factory::create();

        return [
            'user_id'         => $faker->randomElement(User::pluck('id')->toArray()),
            'payment_type_id' => $faker->randomElement(PaymentType::pluck('id')->toArray()),
            'amount'          => $faker->randomFloat(2, 0, 1000),
            'is_paid'         => $faker->boolean(75),
            'status'          => $faker->randomElement(['pending', 'paid', 'pending payment']),
            'created_at'      => $faker->dateTimeThisMonth()
        ];
    }
}
