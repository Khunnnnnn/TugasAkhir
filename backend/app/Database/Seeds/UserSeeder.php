<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $userData = [
            'nidn' => "123456",
            'email' => "sony@gmail.com",
            'password' => password_hash('123456', PASSWORD_BCRYPT),
            'status_level' => "admin"
        ];


        $this->db->table('users')->insert($userData);
    }
}
