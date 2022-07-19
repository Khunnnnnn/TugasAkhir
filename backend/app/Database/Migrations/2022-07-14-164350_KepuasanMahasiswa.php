<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KepuasanMahasiswa extends Migration
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
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'keandalan_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'keandalan_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'keandalan_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'keandalan_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tl_keandalan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'daya_tanggap_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'daya_tanggap_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'daya_tanggap_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'daya_tanggap_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tl_daya_tanggap' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'kepastian_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kepastian_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kepastian_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kepastian_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tl_kepastian' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'empati_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'empati_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'empati_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'empati_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tl_empati' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'tangible_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tangible_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tangible_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tangible_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tl_tangible' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],

            //prodi_id

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('prodi_id', 'prodis', 'id');
        $this->forge->createTable('kepuasan_mahasiswas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kepuasan_mahasiswas');
    }
}
