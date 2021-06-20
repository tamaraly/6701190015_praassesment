<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Penghunis extends Seeder
{
	public function run()
	{
		$insert = [
            [
                'nama'  => 'Tasya',
                'no_ktp'=> '1111111111111111',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung A'
            ],
            [
                'nama'  => 'Nada',
                'no_ktp'=> '2222222222222222',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung A'
            ],
            [
                'nama'  => 'Nafisah',
                'no_ktp'=> '3333333333333333',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung A'
            ],
            [
                'nama'  => 'Alif',
                'no_ktp'=> '4444444444444444',
                'foto'  => 'man.png',
                'unit'  => 'Gedung B'
            ],
            [
                'nama'  => 'Gunawan',
                'no_ktp'=> '5555555555555555',
                'foto'  => 'man.png',
                'unit'  => 'Gedung C'
            ],
            [
                'nama'  => 'Cantika',
                'no_ktp'=> '6666666666666666',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung D'
            ],
            [
                'nama'  => 'Talita',
                'no_ktp'=> '7777777777777777',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung F'
            ],
            [
                'nama'  => 'Brenda',
                'no_ktp'=> '8888888888888888',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung G'
            ],
            [
                'nama'  => 'Novia',
                'no_ktp'=> '9999999999999999',
                'foto'  => 'woman.png',
                'unit'  => 'Gedung G'
            ],

        ];

        foreach($insert as $data)
        {
            $this->db->table('penghunis')->insert($data);
        }
	}
}
