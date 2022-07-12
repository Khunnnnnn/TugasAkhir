<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBimbinganta extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'tahun_akademik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'nama_mahasiswa'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'judul_ta' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'files' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
                'null'           => true
			],
			// Tambahan Profile Dosen_ID
            // Prodi_ID
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('tbl_bimbinganta', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_bimbinganta');
    }
}
