<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pakets extends Migration
{
	public function up()
	{
		# MASING-MASING KOLOM PADA TABEL PAKETS
        $this->forge->addField([
            'id'                => [
                'type'              => 'INT',
                'constraint'        => 6,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'tanggal_datang'    => [
                'type'              => 'DATE',
                'null'              => true,
            ],
            'penghunis_id'      => [
                'type'              => 'INT',
                'constraint'        => 6,
                'unsigned'          => true,
            ],
            'karyawans_id'      => [
                'type'              => 'INT',
                'constraint'        => 6,
                'unsigned'          => true,
            ],
            'isi_paket'         => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'tanggal_ambil'    => [
                'type'              => 'DATE',
                'null'              => true,
            ],
        ]);

        # MENAMBAHKAN RELASI --> id
        $this->forge->addForeignKey('penghunis_id', 'penghunis', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('karyawans_id', 'karyawans', 'id', 'NO ACTION', 'CASCADE');

        # MENAMBAHKAN PRIMARY KEY --> id
        $this->forge->addKey('id', TRUE);

        # MEMBUAT TABEL PAKETS
        $this->forge->createTable('pakets', TRUE);
	}

	public function down()
	{
		# MENGHAPUS TABEL PAKETS
        $this->forge->dropTable('pakets');
	}
}
