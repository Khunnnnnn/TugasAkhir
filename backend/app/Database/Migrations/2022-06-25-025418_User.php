<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()

    {

        //
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nidn' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'confirm_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_level' => [
                'type' => 'ENUM',
                'constraint' => ['superadmin', 'admin', 'dosen'],
                'default' => 'admin'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users', true);
    }


    public function down()
    {
        $this->forge->dropTable('users');
    }
}
