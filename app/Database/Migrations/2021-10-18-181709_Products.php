<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration {
    public function up() {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'sub_category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'name'            => ['type' => 'VARCHAR', 'constraint' => '25'],
            'price'           => ['type' => 'DOUBLE', 'unsigned' => true],
            'stock'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 1],
            'discount'        => ['type' => 'TINYINT', 'default' => 0,],
            'image'           => ['type' => 'VARCHAR', 'constraint' => '40', 'null' => true, 'unique' => true],
            'description'     => ['type' => 'TEXT', 'null' => true],
            'status'          => ['type' => 'BOOLEAN', 'default' => true],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted'      => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('sub_category_id', 'sub_categories', 'id', '', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down() {
        $this->forge->dropTable('products');
    }
}
