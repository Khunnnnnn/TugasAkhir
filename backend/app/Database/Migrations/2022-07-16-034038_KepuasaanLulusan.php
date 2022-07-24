<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KepuasaanLulusan extends Migration
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
            'prodi_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null' => true
            ],
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'jmlh_lulusan' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'jmlh_terlacak' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('prodi_id', 'prodis', 'id');
        $this->forge->createTable('kepuasaanlulusan', true);
        
    }

    public function down()
    {
        $this->forge->dropTable('kepuasaanlulusan');
    }
}
