<?php

namespace App\Database\Seeds;

use App\Models\Role;
use CodeIgniter\Database\Seeder;
use Exception;
use Faker\Factory;

class UserSeeder extends Seeder {
    /**
     * @throws Exception
     */
    public function run() {
        service('eloquent');

        //to add 10 users. Change limit as desired
        $this->db->table('users')->insert([
            'first_name'  => 'Re.d',
            'last_name' => '_beard',
            'gender' => 'male',
            'role_id' => Role::where('name', 'Red')->first()->id,
            'email' => 'nabcellent.dev@gmail.com',
            'password' => password_hash('CosmicFashion.', PASSWORD_DEFAULT),
        ]);

        for($i = 0; $i < 10; $i++) $this->db->table('users')->insert($this->fakeUser());
    }

    /**
     * @throws Exception
     */
    private function fakeUser(): array {
        $faker = Factory::create();

        return [
            'first_name' => $faker->firstName(),
            'last_name'  => $faker->lastName(),
            'gender'     => $faker->randomElement(['male', 'female']),
            'role_id'    => $faker->randomElement(Role::all()->pluck('id')->toArray()),
            'email'      => $faker->email,
            'password'   => password_hash('mike', PASSWORD_DEFAULT),
        ];
    }
}
