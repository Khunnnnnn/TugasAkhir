<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PersentaseKepuasaan extends Migration
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
            'kepuasaanlls_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null' => true
            ],
            'etika1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'etika2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'etika3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'etika4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_etika' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'keahlianbidang1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'keahlianbidang2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'keahlianbidang3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'keahlianbidang4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_bidang' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'bahasaasing1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'bahasaasing2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'bahasaasing3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'bahasaasing4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_bahasa' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'penggunaanti1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'penggunaanti2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'penggunaanti3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'penggunaanti4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_ti' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'komunikasi1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'komunikasi2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'komunikasi3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'komunikasi4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_komunikasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'kerjasama1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'kerjasama2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'kerjasama3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'kerjasama4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_kerjasama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'pengembangandiri1' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'pengembangandiri2' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'pengembangandiri3' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

            'pengembangandiri4' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'tindak_pengembangan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('kepuasaanlls_id', 'kepuasaanlulusan', 'id');
        $this->forge->createTable('persentasekepuasaan', true);
    }

    public function down()
    {
        $this->forge->dropTable('kepuasaanlulusan');
    }
}
