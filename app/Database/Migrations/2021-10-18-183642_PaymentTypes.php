<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentTypes extends Migration {
    public function up() {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 15],
            'description' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
            'is_deleted'  => ['type' => 'BOOLEAN', 'default' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('payment_types', true);
    }

    public function down() {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('payment_types', true);
        $this->db->enableForeignKeyChecks();
    }
}
