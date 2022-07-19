<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CapaianKurikulum extends Migration
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
            'prodi_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null' => true,
            ],
            'semester' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'mata_kuliah_kompetensi'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'kuliah_responsi_tutorial'     => [ //tipe data SMALLINT
                'type'           => 'INT',
                'constraint'     => '255',
            ],
            'seminar'     => [ //tipe data SMALLINT
                'type'           => 'INT',
                'constraint'     => '255',
            ],
            'praktikum'     => [ //tipe data SMALLINT
                'type'           => 'INT',
                'constraint'     => '255',
            ],
            'konversi_kredit_jam'     => [ //tipe data SMALLINT
                'type'           => 'INT',
                'constraint'     => '255',
            ],
            'sikap'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'pengetahuan'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'keterampilan_umum'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'keterampilan_khusus'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'dokumen_rencana_pembelajaran'     => [ //tipe data BOOLEAN 1
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'unit_penyelenggara'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],

            //prodi_id
            //matkul_id

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('capaiankurikulums', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('capaiankurikulums');

    }
}
