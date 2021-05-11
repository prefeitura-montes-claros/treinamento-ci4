<?php

namespace App\Models;

use CodeIgniter\Model;

class ContatoModel extends Model
{
	protected $table                = 'contatos';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes        = true;
	protected $allowedFields        = ['nome', 'tipo_contato_id', 'telefone', 'celular', 'email', 'apagado_em'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'criado_em';
	protected $updatedField         = 'atualizado_em';
	protected $deletedField         = 'apagado_em';

	// Validation
	protected $validationRules      = [
		'nome' => 'required|min_length[3]|max_length[45]',
		'tipo_contato_id' => 'required',
		'telefone' => 'max_length[15]',
		'celular' => 'max_length[15]',
		'email' => 'required|max_length[145]|valid_email',
	];
	protected $validationMessages   = [
		'nome' => [
            'required' => 'O Nome é obrigatório.',
            // 'min_length' => 'Informe o nome com mais de 3 caracteres',
            'max_length' => 'O Nome não pode conter mais de 45 caracteres',
        ],
	];


	/**
	 * Metodo responsavel por listar os contatos de forma tratada
	 */
	public function getContatos(int $id = null, bool $excluido = false)
	{
		$this
		->select('contatos.*, t.nome as tipo')
		->join('tipos_contato t', 'tipo_contato_id = t.id');
		
		if($id){
			return $this->find($id);
		} else {
			if($excluido){
				$this->onlyDeleted();
			} 
			
			return $this->orderBy('nome')->paginate(4);
		}

	}
}
