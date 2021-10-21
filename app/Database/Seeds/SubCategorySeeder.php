<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubCategorySeeder extends Seeder {
    public function run() {
        $this->db->table('sub_categories')->insertBatch([
            [
                'category_id'  => 1,
                'name'  => 'Formal',
            ], [
                'category_id'  => 1,
                'name'  => 'Casual',
            ], [
                'category_id'  => 1,
                'name'  => 'Sports',
            ],[
                'category_id'  => 2,
                'name'  => 'Formal',
            ], [
                'category_id'  => 2,
                'name'  => 'Casual',
            ], [
                'category_id'  => 2,
                'name'  => 'Sports',
            ],[
                'category_id'  => 3,
                'name'  => 'Formal',
            ], [
                'category_id'  => 3,
                'name'  => 'Casual',
            ], [
                'category_id'  => 3,
                'name'  => 'Sports',
            ],[
                'category_id'  => 4,
                'name'  => 'Dogs',
            ], [
                'category_id'  => 4,
                'name'  => 'Cats',
            ], [
                'category_id'  => 4,
                'name'  => 'Other',
            ],
        ]);
    }
}
