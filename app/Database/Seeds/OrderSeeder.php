<?php

namespace App\Database\Seeds;

use App\Models\Order;
use App\Models\PaymentType;
use App\Models\User;
use CodeIgniter\Database\Seeder;
use Exception;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    public function run() {
        service('eloquent');

        for($i = 0; $i < 1; $i++) Order::insert($this->fakeOrder());
    }

    /**
     * @return array
     * @throws Exception
     */
    private function fakeOrder(): array {
        $faker = Factory::create();

        return [
            'user_id'         => $faker->randomElement(User::pluck('id')->toArray()),
            'payment_type_id' => $faker->randomElement(PaymentType::pluck('id')->toArray()),
            'amount'          => $faker->randomFloat(2, 0, 1000),
            'is_paid'         => $faker->boolean(90),
            'status'          => $faker->randomElement(['pending', 'paid', 'pending payment']),
            'created_at'      => $faker->dateTimeThisMonth(),
            'updated_at'      => now()
        ];
    }
}
