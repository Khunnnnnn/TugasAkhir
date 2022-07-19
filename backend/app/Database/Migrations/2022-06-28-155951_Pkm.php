<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pkm extends Migration
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
            'tema_sesuai_roadmap' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,
            ],
            'judul_kegiatan'     => [
                'type'           => 'TEXT',
                'null'  => true,

            ],
            'lokasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,

            ],
            'tahun'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,
            ],
            'sumber_dana_pt_mandiri' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'null'  => true,

            ],
            'dana_pt_mandiri'       => [ //tipe data BIGINT
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,

            ],
            'sumber_dalam_negri'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,

            ],
            'dana_dalam_negri' => [ //tipe data BIGINT
                'type'           => 'INT',
                'constraint'     => 50,
                'null'  => true,

            ],
            'sumber_luar_negri'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'  => true,

            ],
            'dana_luar_negri' => [ //tipe data BIGINT
                'type'           => 'INT',
                'constraint'     => 50,
                'null'  => true,

            ],

             //mitra_id

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('pkms', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('pkms');

    }
}
