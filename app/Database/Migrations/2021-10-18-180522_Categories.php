<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 25],
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('categories', true);
        $this->db->enableForeignKeyChecks();
    }
}
