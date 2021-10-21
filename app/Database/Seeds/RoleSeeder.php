<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder {
    public function run() {
        $this->db->table('roles')->insertBatch([
            [
                'name'  => 'Red',
            ], [
                'name'  => 'Admin',
            ], [
                'name'  => 'Customer',
            ], [
                'name'  => 'Api User',
            ],
        ]);
    }
}
