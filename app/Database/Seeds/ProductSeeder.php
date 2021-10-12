<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run() {
        $this->db->table('products')->insertBatch([
            [
                'title' => 'Cozy Sofa',
                'price' => 150,
                'stock' => 3,
                'image' => '3.png',
            ],[
                'title' => 'Fancy Chair',
                'price' => 15,
                'stock' => 3,
                'image' => '4.png',
            ],[
                'title' => 'Chinese Teapot',
                'price' => 70,
                'stock' => 3,
                'image' => '5.png',
            ],[
                'title' => 'Soft Pillow',
                'price' => 50,
                'stock' => 3,
                'image' => '6.png',
            ],[
                'title' => 'Wooden casket',
                'price' => 30,
                'stock' => 3,
                'image' => '7.png',
            ],[
                'title' => 'Awesome Armchair',
                'price' => 20,
                'stock' => 3,
                'image' => '8.png',
            ],[
                'title' => 'Awesome Lamp',
                'price' => 90,
                'stock' => 3,
                'image' => '9.png',
            ],[
                'title' => 'Cool Flower',
                'price' => 40,
                'stock' => 3,
                'image' => '1.png',
            ]
        ]);
    }
}
