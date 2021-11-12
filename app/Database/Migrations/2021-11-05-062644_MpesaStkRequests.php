<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MpesaStkRequests extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'                  => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'order_id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'phone'               => ['type' => 'VARCHAR', 'constraint' => 12],
            'amount'              => ['type' => 'DOUBLE', 'unsigned' => true],
            'reference'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'status'              => ['type' => 'varchar', 'constraint' => 20, 'default' => 'Requested'],
            'complete'            => ['type' => 'BOOLEAN', 'default' => false],
            'merchant_request_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'checkout_request_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mpesa_stk_requests');
    }

    public function down() {
        $this->forge->dropTable('mpesa_stk_requests');
    }
}
