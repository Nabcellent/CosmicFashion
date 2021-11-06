<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaypalCallbacks extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'order_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'payload_id'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'pp_order_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'payer_email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'amount'      => ['type' => 'DOUBLE', 'unsigned' => true, 'null' => true],
            'status'      => ['type' => 'varchar', 'constraint' => 20],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('paypal_callbacks');
    }

    public function down() {
        $this->forge->dropTable('paypal_callbacks');
    }
}
