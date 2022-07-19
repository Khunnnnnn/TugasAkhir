<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Integrasi extends Migration
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
            'bentuk_integrasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'tahun'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'file_bukti' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ]

            //Penelitian_id
            //pkm_id
            //matkul_id

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('integrasis', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('integrasis');

    }
}
