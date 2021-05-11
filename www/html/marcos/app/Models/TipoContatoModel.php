<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoContatoModel extends Model
{
	protected $table                = 'tipos_contato';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes        = true;
	protected $allowedFields        = ['nome'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'criado_em';
	protected $updatedField         = 'atualizado_em';
	protected $deletedField         = 'apagado_em';

	// Validation
	protected $validationRules      = [
		'nome' => 'required|min_length[3]|max_length[45]',
	];
	protected $validationMessages   = [];
}
