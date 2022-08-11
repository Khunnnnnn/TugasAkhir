<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetilDosen extends Migration
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
			'bidang_keahlian'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'kesesuaian'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'jabatan_akademik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'no_sertif_pendidik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'perusahaan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'files' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
                'null'           => true
			],
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);
        // FK ke Users
        $this->forge->addForeignKey('id_dosen', 'users', 'id','CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('detildosens', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('detildosens');
    }
}
