<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Karyawans extends Seeder
{
	public function run()
    {
        $insert = [
            [
                'nip'       => '67011',
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'nama'      => 'Tamara',
            ],
            [
                'nip'       => '67012',
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'nama'      => 'Lucky',
            ],
            [
                'nip'       => '67013',
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'nama'      => 'Widodo',
            ],
            [
                'nip'       => '67014',
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'nama'      => 'Adi',
            ],
            [
                'nip'       => '67015',
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'nama'      => 'Prapto',
            ],
        ];

        foreach($insert as $data)
        {
            $this->db->table('karyawans')->insert($data);
        }
    }
}
