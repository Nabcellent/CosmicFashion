<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration {
    public function up() {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'payment_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'amount'          => ['type' => 'DOUBLE', 'unsigned' => true, 'default' => 0],
            'status'          => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'pending payment']],    // Bad datatype
            'created_at datetime default current_timestamp',
            'updated_at datetime DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted'      => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('payment_type_id', 'payment_types', 'id', '', 'CASCADE');
        $this->forge->createTable('orders', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('orders', true);
        $this->db->enableForeignKeyChecks();
    }
}
