<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekognisiDosen extends Migration
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
			'rekognisi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'bidang_keahlian'       => [
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
			],
			'tingkat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'tahun'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);
        // FK ke Users
        $this->forge->addForeignKey('id_dosen', 'users', 'id','CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('rekognisidosens', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('rekognisidosens');
    }
}
