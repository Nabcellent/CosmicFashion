<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApiTokens extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'token'          => ['type' => 'varchar', 'constraint' => 40],
            'user_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'api_product_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'client_id'      => ['type' => 'varchar', 'constraint' => 80],
            'scope'          => ['type' => 'VARCHAR', 'constraint' => 4000, 'null' => true],
            'expires_at timestamp DEFAULT current_timestamp',
            'created_at timestamp DEFAULT current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted'     => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'api_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('api_product_id', 'api_products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('api_tokens', true);
    }

    public function down() {
        $this->forge->dropTable('api_tokens');
    }
}
