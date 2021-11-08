<?php

namespace App\Database\Seeds;

use App\Models\Role;
use CodeIgniter\Database\Seeder;
use Exception;
use Faker\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run() {
        service('eloquent');

        //to add 10 users. Change limit as desired
        $this->db->table('users')->insert([
            'first_name' => 'Re.d',
            'last_name'  => '_beard',
            'gender'     => 'male',
            'role_id'    => Role::where('name', 'Red')->first()->id,
            'email'      => 'nabcellent.dev@gmail.com',
            'image'      => '2.jpg',
            'password'   => Password::hash('CosmicFashion.'),
        ]);

        for($i = 0; $i < 10; $i++) $this->db->table('users')->insert($this->fakeUser());
    }

    /**
     * @throws Exception
     */
    #[ArrayShape([
        'first_name' => "string",
        'last_name'  => "string",
        'gender'     => "mixed",
        'role_id'    => "mixed",
        'email'      => "string",
        'password'   => "string"
    ])]
    private function fakeUser(): array {
        $faker = Factory::create();

        return [
            'first_name' => $faker->firstName(),
            'last_name'  => $faker->lastName(),
            'gender'     => $faker->randomElement(['male', 'female']),
            'role_id'    => $faker->randomElement(Role::where('id', '<>', 1)->pluck('id')->toArray()),
            'email'      => $faker->email,
            'password'   => Password::hash('mike'),
        ];
    }
}
