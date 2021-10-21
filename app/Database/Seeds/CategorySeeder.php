<?php

namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder {
    public function run() {
        $this->db->table('categories')->insertBatch([
            [
                'name'  => 'Men',
            ], [
                'name'  => 'Women',
            ], [
                'name'  => 'Children',
            ], [
                'name'  => 'Pets',
            ],
        ]);
    }
}
