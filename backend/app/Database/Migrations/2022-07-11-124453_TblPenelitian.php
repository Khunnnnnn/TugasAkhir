<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPenelitian extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'tahun'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'sumber_dana_pt_mandiri' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'dana_pt_mandiri' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'sumber_dalam_negeri' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'dana_dalam_negeri' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'sumber_luar_negeri' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'dana_luar_negeri' => [
				'type'           => 'TEXT',
				'null'           => true,
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('tbl_penelitian', TRUE);
	}

    

    public function down()
    {
        //
		$this->forge->dropTable('tbl_penelitian');
    }
}
