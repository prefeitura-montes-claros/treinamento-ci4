<?php

namespace App\Controllers;

use App\Models\ContatoModel;
use App\Models\TipoContatoModel;

class Home extends BaseController
{
  protected $data;
  protected $modelContato;
  protected $modelTipo;
  
  public function __construct()
  {
    $this->modelContato = new ContatoModel();
    $this->modelTipo = new TipoContatoModel();
    
    $this->data['title'] = "Agenda";
    $this->data['tipos'] = $this->modelTipo->findAll();
    $this->data['msg'] = session()->getFlashdata('msg');
    $this->data['erros'] = session()->getFlashdata('erros');
    $this->data['base_url'] = base_url();
    // itens do menu
    $this->data['menus'] = [
      'Home' => base_url(),
      'Contatos' => base_url('contatos'),
      'Novo' => base_url('novo'),
      'Lixeira' => base_url('lixeira'),
    ];
    $this->data['versao'] = "0.0.1";
  }
  
  public function index(): string
  {
    $this->data['title'] = "Home";
    // renderiza o conteudo
    return $this->view->render('home/index.html', $this->data);
  }
  
  /**
  * Metodo para listar os contatos
  */
  public function contatos($excluido = false): string
  {
    // personalisa o title
    if($excluido){
      $this->data['title'] = "Lixeira | Contatos Excluidos";
    } else {
      $this->data['title'] = "Listagem de Contatos";
    }
    
    // carrega a lista de contatos
    $this->data['contatos'] = $this->modelContato->getContatos(null, $excluido); 
    $this->data['pager'] = $this->modelContato->pager->links();

    // renderiza o conteudo
    return $this->view->render('home/contatos.html', $this->data);
  }
  
  /**
  * Metodo responsavel por listar os itens excluidos
  */
  public function excluidos(): string
  {
    return $this->contatos(true);
  }
  
  /**
  * Metodo para exibir o contato
  */
  public function contato($id = null): string
  {
    // carrega o contato
    $this->data['contato'] = $this->modelContato->getContatos($id); 
    // altera o title da pagina
    $this->data['title'] = "Contato {$this->data['contato']['nome']}";
    // renderiza o conteudo
    return $this->view->render('home/contato.html', $this->data);
  }
  
  /**
  * Metodo para exibir o formulario de cadatasdro 
  */
  public function formulario($id = null): string
  {   
    $contatoPost = session()->getFlashdata('contato');
    
    if(!empty($contatoPost)){
      // se existir POST captura os dados enviados pelo formulario
      $this->data['contato'] = $contatoPost;
    }else if($id){
      // se existir ID, realiza a busca e carrega os dados
      $this->data['contato'] = $this->modelContato->find($id);
    } else {
      // se nada for passado, cria o array 
      $this->data['contato'] = ['id' => null, 'nome' => null, 'tipo_contato_id' => null, 'celular' => null, 'telefone' => null, 'email' => null];
    }
    
    $this->data['title'] = (isset($this->data['contato']['id']) ? 'Editar' : 'Novo')." Contato";

    // renderiza o conteudo
    return $this->view->render('home/formulario.html', $this->data);
  }
  
  /**
  * Metodo para inserir ou atualizar um registro
  */
  public function gravar()
  {
    $this->data['contato'] = $this->request->getPost();
    
    if($this->modelContato->save($this->data['contato']) === false){
      // captura os erros da validacao
      session()->setFlashdata('erros', $this->modelContato->errors());
      // captura os dados enviados pelo post
      session()->setFlashdata('contato', $this->data['contato']);			
      // carrega o ID
      $id = $this->request->getPost('id');
      // verifica se ID esta preenchido
      if($id){
        return redirect()->to("editar/{$id}");
      } else {
        return redirect()->to('novo');
      }
    } else {
      session()->setFlashdata('msg', ["text" => "Gravado com Sucesso", "type" => "success"]);
      return redirect()->to('contatos'); 
    }
  }
  
  /**
  * Metodo responsavel por excluir um registro
  */
  public function excluir($id)
  {
    if($this->modelContato->delete($id)){
      session()->setFlashdata('msg', ["text" => "Contato Excluído", "type" => "success"]);
    } else {
      session()->setFlashdata('msg', ["text" => "Erro ao tentar excluir o contato!", "type" => "danger"]);
    }
    return redirect()->back(); 
  }
  
  /**
  * Metodo responsavel por desfazer a exclusao de um registro
  */
  public function desfazer($id)
  {
    $data = ['apagado_em' => null];
    
    if($this->modelContato->update($id, $data)){
      session()->setFlashdata('msg', ["text" => "Exclusão desfeita", "type" => "success"]);
    } else {
      session()->setFlashdata('msg', ["text" => "Erro ao tentar realizar a operação!", "type" => "danger"]);
    }
    return redirect()->back(); 
  }
    
  /**
  * Metodo acessivel pelo terminal PHP
  */
  
  function welcome($nome)
  {
    echo "Bem vindo {$nome}";
  }
  
  function soma($a, $b)
  {
    $resultado = $a + $b;
    
    echo "A Soma de {$a} e {$b} é igual a {$resultado}";
  }
}

