<?php

namespace App\Database\Seeds;

use App\Models\PenghunisModel;
use App\Models\KaryawansModel;
use CodeIgniter\Database\Seeder;

class Pakets extends Seeder
{
	public function run()
    {
        $penghunis = new PenghunisModel();
        $karyawans = new KaryawansModel();

        $insert = [
            [
                'tanggal_datang'    => date('Y-m-d'),
                'penghunis_id'      => $penghunis->getRandomId(),
                'karyawans_id'      => $karyawans->getRandomId(),
                'isi_paket'         => 'Beras',
                'tanggal_ambil'     => date('Y-m-d'),
            ],
            [
                'tanggal_datang'    => date('Y-m-d'),
                'penghunis_id'      => $penghunis->getRandomId(),
                'karyawans_id'      => $karyawans->getRandomId(),
                'isi_paket'         => 'Gula',
                'tanggal_ambil'     => date('Y-m-d'),
            ],
        ];

        foreach($insert as $data)
        {
            $this->db->table('pakets')->insert($data);
        }
    }
}
