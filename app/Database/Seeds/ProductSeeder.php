<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run() {
        $this->db->table('products')->insertBatch([
            [
                'user_id' => 1,
                'sub_category_id' => 1,
                'name' => 'Cozy Sofa',
                'price' => 150,
                'stock' => 3,
                'image' => '3.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Fancy Chair',
                'price' => 15,
                'stock' => 3,
                'image' => '4.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Chinese Teapot',
                'price' => 70,
                'stock' => 3,
                'image' => '5.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 4,
                'name' => 'Soft Pillow',
                'price' => 50,
                'stock' => 3,
                'image' => '6.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 5,
                'name' => 'Wooden casket',
                'price' => 30,
                'stock' => 3,
                'image' => '7.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 6,
                'name' => 'Awesome Armchair',
                'price' => 20,
                'stock' => 3,
                'image' => '8.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 7,
                'name' => 'Awesome Lamp',
                'price' => 90,
                'stock' => 3,
                'image' => '9.png',
            ],[
                'user_id' => 1,
                'sub_category_id' => 8,
                'name' => 'Cool Flower',
                'price' => 40,
                'stock' => 3,
                'image' => '1.png',
            ]
        ]);
    }
}
