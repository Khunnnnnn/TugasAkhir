<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MataKuliah extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_matkul' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'sks' => [
                'type'           => 'INT'
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('matakuliahs');
    }

    public function down()
    {
        $this->forge->dropTable('matakuliahs');
    }
}
