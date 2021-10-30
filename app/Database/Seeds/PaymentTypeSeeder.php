<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run() {
        $this->db->table('payment_types')->insertBatch([
            [
                'name' => 'Mpesa',
                'descriptions' => 'success',
            ],
            [
                'name' => 'PayPal',
                'descriptions' => 'primary',
            ],
            [
                'name' => 'Cash',
                'descriptions' => 'danger',
            ],
            [
                'name' => 'Other',
                'descriptions' => 'warning',
            ],
        ]);
    }
}
