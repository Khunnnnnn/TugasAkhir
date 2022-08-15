<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BabBukuJurnal extends Migration
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
            'judul'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'kategori_jurnal'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'nama_jurnal'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'keterangan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'volume'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'tahun'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'nomor'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'halaman'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null' => true,
            ],
            'sitasi'       => [
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
        $this->forge->createTable('babbukujurnals', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('babbukujurnals');
    }
}
