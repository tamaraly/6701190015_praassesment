<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawans extends Migration
{
	public function up()
	{
        # MASING-MASING KOLOM PADA TABEL KARYAWANS
		$this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nip'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
        ]);

        # MENAMBAHKAN PRIMARY KEY --> id
        $this->forge->addKey('id', TRUE);

        # MEMBUAT TABEL KARYAWANS
        $this->forge->createTable('karyawans', TRUE);
	}

	public function down()
	{
        # MENGHAPUS TABEL KARYAWANS
		$this->forge->dropTable('karyawans');
	}
}
