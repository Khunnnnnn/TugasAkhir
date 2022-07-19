<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ipkmahasiswa extends Migration
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
                'null' => true
                           ],
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'jumlah_lulusan' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'ipk_min' => [
                'type'           => 'FLOAT',
                'constraint'     => '11',
            ],
            'ipk_max' => [
                'type'           => 'FLOAT',
                'constraint'     => '11',
            ],
            'ipk_avg' => [
                'type'           => 'FLOAT',
                'constraint'     => '11',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('prodi_id', 'prodis', 'id');
        $this->forge->createTable('ipkmahasiswas',true);
    }

    public function down()
    {
        $this->forge->dropTable('ipkmahasiswas');
    }
}
