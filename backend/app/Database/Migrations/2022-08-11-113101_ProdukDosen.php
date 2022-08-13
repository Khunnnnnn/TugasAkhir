<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukDosen extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_dosen'          => [
				'type'           => 'BIGINT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'nama_produk'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'deskripsi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'tahun'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'deskripsi_bukti'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'files'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			]
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);
        // FK ke Users
        $this->forge->addForeignKey('id_dosen', 'users', 'id','CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('produkdosens', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('produkdosens');
    }
}
