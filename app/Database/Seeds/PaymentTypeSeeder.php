<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run() {
        $this->db->table('payment_types')->insertBatch([
            [
                'name'        => 'Mpesa',
                'description' => 'success',
            ],
            [
                'name'        => 'PayPal',
                'description' => 'primary',
            ],
            [
                'name'        => 'Cash',
                'description' => 'danger',
            ],
            [
                'name'        => 'Wallet',
                'description' => 'warning',
            ],
        ]);
    }
}
