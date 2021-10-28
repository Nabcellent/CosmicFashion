<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductImages extends Migration {
    public function up() {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'product_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'image'       => ['type' => 'VARCHAR', 'constraint' => '40', 'unique' => true],
            'is_deleted'  => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id', '', 'CASCADE');
        $this->forge->createTable('product_images', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('product_images', true);
        $this->db->enableForeignKeyChecks();
    }
}
