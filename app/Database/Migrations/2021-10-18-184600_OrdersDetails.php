<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersDetails extends Migration {
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'order_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'price'      => ['type' => 'DOUBLE', 'unsigned' => true],
            'quantity'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 1],
            'total'      => ['type' => 'DOUBLE', 'unsigned' => true],
            'created_at timestamp',
            'updated_at timestamp ON UPDATE current_timestamp',
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders_details', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('orders_details', true);
        $this->db->enableForeignKeyChecks();
    }
}
