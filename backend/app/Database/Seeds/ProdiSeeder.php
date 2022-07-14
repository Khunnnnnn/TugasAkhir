<?php namespace App\Database\Seeds;

class ProdiSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $userData = [
                'prodi' => "D3 MANAJEMEN INFORMATIKA",
                'nama_prodi' => "suasnawa",
                            ];
            

            $this->db->table('prodis')->insert($userData);
        
    }
}