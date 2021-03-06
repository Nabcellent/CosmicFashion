<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthTables extends Migration
{
    public function up() {
        /*
         * Users
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'role_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'DEFAULT' => 3],
            'first_name'       => ['type' => 'VARCHAR', 'constraint' => '25'],
            'last_name'        => ['type' => 'VARCHAR', 'constraint' => '25'],
            'email'            => ['type' => 'VARCHAR', 'constraint' => 60, 'unique' => true],
            'username'         => ['type' => 'VARCHAR', 'constraint' => 30, 'unique' => true, 'null' => true],
            'gender'           => ['type' => 'ENUM', 'constraint' => ['male', 'female']],
            'image'            => ['type' => 'VARCHAR', 'constraint' => '40', 'null' => true],
            'password'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'status'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_message'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'created_at timestamp',
            'updated_at timestamp ON UPDATE current_timestamp',
            'deleted_at'       => ['type' => 'timestamp', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'NULL', 'CASCADE');
        $this->forge->createTable('users', true);

        /*
         * Auth Login Attempts
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Only for successful logins
            'email'      => ['type' => 'varchar', 'constraint' => 255],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'success'    => ['type' => 'tinyint', 'constraint' => 1],
            'logged_in_at datetime default current_timestamp',
            'logged_out_at datetime',
            'is_deleted' => ['type' => 'BOOLEAN', 'default' => false]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->addKey('user_id');
        // NOTE: Do NOT delete the user_id or email when the user is deleted for security audits
        $this->forge->createTable('auth_logins', true);
    }

    //--------------------------------------------------------------------

    public function down() {
        // drop constraints first to prevent errors
        // @phpstan-ignore-line
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('auth_logins', true);
    }
}
