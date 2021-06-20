<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penghunis extends Migration
{
	public function up()
	{
		# MASING-MASING KOLOM PADA TABEL PENGHUNIS
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'no_ktp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20'
            ],
            'foto'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'unit'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
        ]);

        # MENAMBAHKAN PRIMARY KEY --> id
        $this->forge->addKey('id', TRUE);

        # MEMBUAT TABEL PENGHUNIS
        $this->forge->createTable('penghunis', TRUE);
	}

	public function down()
	{
		# MENGHAPUS TABEL PENGHUNIS
        $this->forge->dropTable('penghunis');
	}
}
