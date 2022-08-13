<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LuaranDosen extends Migration
{
    public function up()
    {
        //
        //
        $this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'keterangan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'tahun'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'jenis_luaran'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			]
		]);
        // Membuat primary key
		$this->forge->addKey('id', TRUE);
        // FK ke Users
        // $this->forge->addForeignKey('id_dosen', 'users', 'id','CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('luarandosens', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('luarandosens');
    }
}
