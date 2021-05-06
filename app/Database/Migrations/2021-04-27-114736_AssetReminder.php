<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AssetReminder extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'				=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'no_kontrak'		=> ['type' => 'VARCHAR', 'constraint' => 255],
			'jenis_aset'		=> ['type' => 'VARCHAR', 'constraint' => 255],
			'lokasi'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'tanggal_mulai'		=> ['type' => 'DATETIME', 'null' => true],
			'tanggal_berakhir'	=> ['type' => 'DATETIME', 'null' => true],
			'saldo'				=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'created_at'		=> ['type' => 'DATETIME', 'null' => true],
			'updated_at'		=> ['type' => 'DATETIME', 'null' => true],
		]);

		$this->forge->addKey('id');
		$this->forge->createTable('tb_aset');
	}

	public function down()
	{
		$this->forge->dropTable('tb_aset');
	}
}
