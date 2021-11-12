<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'quantity'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 1],
            'price'      => ['type' => 'DOUBLE', 'unsigned' => true],
            'discount'   => ['type' => 'TINYINT', 'default' => 0],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cart', true);
    }

    public function down() {
        $this->forge->dropTable('cart', true);
    }
}
