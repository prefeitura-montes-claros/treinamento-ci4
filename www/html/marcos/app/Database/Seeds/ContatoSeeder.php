<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContatoSeeder extends Seeder
{
	public function run()
	{
		//
		$model = model('ContatoModel');
		
		$data = [
			'nome' => 'Marcos Queiroz',
			'tipo_contato_id' => 1,
			'telefone' => '3180',
			'celular' => '38991485928',
			'email' => 'marcosq@live.com',
		];
		$model->insert($data);
	}
}
