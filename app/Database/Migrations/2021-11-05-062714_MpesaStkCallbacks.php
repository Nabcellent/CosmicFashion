<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MpesaStkCallbacks extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'                   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'checkout_request_id'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'merchant_request_id'  => ['type' => 'VARCHAR', 'constraint' => 255,],
            'result_code'          => ['type' => 'INTEGER'],
            'result_desc'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'amount'               => ['type' => 'DOUBLE', 'unsigned' => true, 'null' => true],
            'phone'                => ['type' => 'VARCHAR', 'constraint' => 12, 'null' => true],
            'balance'              => ['type' => 'INTEGER', 'null' => true],
            'mpesa_receipt_number' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'transaction_date timestamp default current_timestamp null',
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('checkout_request_id', 'mpesa_stk_requests', 'checkout_request_id', 'CASCADE',
            'CASCADE');
        $this->forge->createTable('mpesa_stk_callbacks');
    }

    public function down() {
        $this->forge->dropTable('mpesa_stk_callbacks');
    }
}
