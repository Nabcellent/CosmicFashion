<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApiProductPaths extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'path'       => ['type' => 'ENUM', 'constraint' => ['userdetails', 'products', 'transactions']],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('api_product_paths', true);
    }

    public function down() {
        $this->forge->dropTable('api_product_paths');
    }
}
