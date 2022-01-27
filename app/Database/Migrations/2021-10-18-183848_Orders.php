<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up() {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'payment_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'amount'          => ['type' => 'DOUBLE', 'unsigned' => true, 'default' => 0],
            'is_paid'         => ['type' => 'BOOLEAN', 'default' => false],
            'status'          => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'paid', 'pending payment'],
                'DEFAULT'    => 'pending'
            ],    // Bad datatype
            'created_at timestamp default current_timestamp',
            'updated_at timestamp DEFAULT current_timestamp ON UPDATE current_timestamp',
            'is_deleted'      => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('payment_type_id', 'payment_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('orders', true);
        $this->db->enableForeignKeyChecks();
    }
}
