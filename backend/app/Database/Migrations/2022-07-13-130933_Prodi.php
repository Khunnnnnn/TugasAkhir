<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
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
                      'prodi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama_prodi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
           
        ]);
        $this->forge->addKey('id', TRUE);
     $this->forge->createTable('prodis',true);
    }

    public function down()
    {
        $this->forge->dropTable('prodis');
    }
}
