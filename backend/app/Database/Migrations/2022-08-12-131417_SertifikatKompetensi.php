<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SertifikatKompetensi extends Migration
{
    public function up()
    {
        //sertifikatkompetensis
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
			'nama_skema_sertif'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'no_sertif_kompetensi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'tanggal_sertif_kompetensi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'lembaga_sertifikasi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
            ],
			'dikeluarkan_oleh'       => [
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
		$this->forge->createTable('sertifikatkompetensis', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('sertifikatkompetensis');
    }
}
