<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukMahasiswa extends Migration
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
            'nama_produk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'deskripsi' => [
                'type'           => 'TEXT'
            ],
            'tahun'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'deskripsi_bukti'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'file_bukti'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('produk_mhss', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('produk_mhss');

    }
}
