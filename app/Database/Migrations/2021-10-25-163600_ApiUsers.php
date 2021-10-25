<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApiUsers extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'username'   => ['type' => 'varchar', 'constraint' => 40, 'unique' => true],
            'key'        => ['type' => 'varchar', 'constraint' => 60, 'unique' => true],
            'created_at timestamp default current_timestamp',
            'updated_on timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('api_users', true);
    }

    public function down() {
        $this->forge->dropTable('api_users');
    }
}
