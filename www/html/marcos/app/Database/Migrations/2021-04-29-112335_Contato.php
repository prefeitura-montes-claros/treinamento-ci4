<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contato extends Migration
{
	public function up()
	{
		//
		$fields = [
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'tipo_contato_id' => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'null' => false,
			],      
			'nome' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
				'null'		=> false,
			],      
			'telefone' => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
				'null'		=> true,
			],      
			'celular' => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
				'null'		=> true,
			],      
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => '145',
				'null'		=> false,
			],
			'criado_em' => [
				'type'       => 'TIMESTAMP',
				'null'       => true,
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
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('tipo_contato_id', 'tipos_contato', 'id');
		$this->forge->createTable('contatos');
	}
	
	public function down()
	{
		//
		$this->forge->dropTable('contatos');
	}
}
