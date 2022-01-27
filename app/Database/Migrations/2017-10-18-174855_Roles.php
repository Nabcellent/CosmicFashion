<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Nabz\Support\Facades\Schema;

class Roles extends Migration {
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 15, 'unique' => true],
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('roles', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('roles', true);
        $this->db->enableForeignKeyChecks();
    }
}
