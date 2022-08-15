<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ewmp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_dosen'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'nama_dosen'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'dtps'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'ps_yang_diakreditasi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'ps_lain_dalam_pt'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'ps_lain_di_luar_pt'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'penelitian'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'pkm'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'tugas_tambahan_atau_penunjang'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'jumlah_sks'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'rata_rata_persemester'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
        ]);
        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        // FK ke Users
        // $this->forge->addForeignKey('id_dosen', 'users', 'id', 'CASCADE', 'CASCADE');
        // Membuat tabel news
        $this->forge->createTable('ewmps', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('ewmps');
    }
}
