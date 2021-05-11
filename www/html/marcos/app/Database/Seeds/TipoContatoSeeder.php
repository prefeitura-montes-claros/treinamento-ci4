<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoContatoSeeder extends Seeder
{
	public function run()
	{
		$model = model('TipoContatoModel');
		
		$data = [
			'nome' => 'Pessoal'
		];
		$model->insert($data);
		
		$data = [
			'nome' => 'Profissional'
		];
		$model->insert($data);
		
	}
}
