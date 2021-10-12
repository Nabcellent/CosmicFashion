<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration {
    public function up() {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'price'       => [
                'type'       => 'FLOAT',
                'constraint' => '20',
                'unsigned'       => true,
            ],
            'stock'       => [
                'type'       => 'MEDIUMINT',
                'unsigned'       => true,
                'default' => 1,
            ],
            'discount'       => [
                'type'       => 'TINYINT',
                'default' => 0,
            ],
            'image'       => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
                'unique' => true,
            ],
            'description'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'status'       => [
                'type'       => 'BOOLEAN',
                'default' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('products');
    }

    public function down() {
        $this->forge->dropTable('products');
    }
}
