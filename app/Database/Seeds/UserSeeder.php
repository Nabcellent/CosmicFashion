<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Exception;
use Faker\Factory;

class UserSeeder extends Seeder {
    /**
     * @throws Exception
     */
    public function run() {
        //to add 10 users. Change limit as desired
        for($i = 0; $i < 10; $i++)
            $this->db->table('users')->insert($this->generateClient());
    }

    /**
     * @throws Exception
     */
    private function generateClient(): array {
        $faker = Factory::create();
        return [
            'first_name' => $faker->firstName(),
            'last_name'  => $faker->firstName(),
            'gender'     => $faker->randomElement(['male', 'female']),
            'is_admin'   => $faker->boolean(20),
            'email'      => $faker->email,
            'password'   => password_hash('mike', PASSWORD_DEFAULT),
        ];
    }
}
