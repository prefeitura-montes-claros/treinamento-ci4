<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TiposContato extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nome' => [
				'type'       => 'VARCHAR',
				'constraint' => 45,
				'null'       => false,
			],
			'criado_em' => [
				'type'       => 'TIMESTAMP',
				'null'       => false,
			],
			'atualizado_em' => [
				'type'       => 'TIMESTAMP',
				'null'       => true,
			],
			'apagado_em' => [
				'type'       => 'TIMESTAMP',
				'null'       => true,
			],
		];
		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tipos_contato');
	}
	
	public function down()
	{
		//
		$this->forge->dropTable('tipos_contato');
	}
}
