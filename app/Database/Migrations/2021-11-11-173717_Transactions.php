<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'order_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'payable_id'   => ['type' => 'INT', 'constraint' => 11],
            'payable_type' => ['type' => 'varchar', 'constraint' => 255],
            'amount'       => ['type' => 'DOUBLE', 'unsigned' => true, 'null' => true],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => 'pending'],
            'type'         => ['type' => 'VARCHAR', 'constraint' => 10], // Payment or Withdrawal... ?? Transfer 🤷🏽
            'description'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at timestamp',
            'updated_at timestamp ON UPDATE current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down() {
        $this->forge->dropTable('transactions');
    }
}
