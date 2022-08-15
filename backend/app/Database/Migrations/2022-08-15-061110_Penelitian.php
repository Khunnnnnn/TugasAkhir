<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penelitian extends Migration
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
            'tema_sesuai_roadmap'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'judul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'tahun'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'sumber_dana_pt_mandiri'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'dana_pt_mandiri'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'sumber_dana_negri'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'sumber_luar_negri'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'dana_luar_negri'       => [
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
        $this->forge->createTable('penelitians', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('penelitians');
    }
}
