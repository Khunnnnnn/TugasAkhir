<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RipenDosen extends Migration
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
			'tahun_lulus'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'riwayat_pendidikan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'perguruan_tinggi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'jurusan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'program_studi'       => [
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
		$this->forge->createTable('ripendosens', TRUE);

    }

    public function down()
    {
        //
        $this->forge->dropTable('ripendosens');
    }
}
