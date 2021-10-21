<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubCategories extends Migration {
    public function up() {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 25, 'null' => false],
            'is_deleted'  => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'categories', 'id', '', 'CASCADE');
        $this->forge->createTable('sub_categories', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('sub_categories', true);
        $this->db->enableForeignKeyChecks();
    }
}
