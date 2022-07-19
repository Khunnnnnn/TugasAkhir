<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nim' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('mahasiswas');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswas');

    }
}
