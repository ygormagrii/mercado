<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){

		$this->load->model("produtos_model");
		$produtos = $this->produtos_model->buscaTodos();

		$dados = array("produtos" => $produtos);
		$this->load->helper(array("currency"));
		$this->load->view("produtos/index.php", $dados);
	}

	public function formulario(){
		$this->load->view("produtos/formulario");
	}

	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required|min_length[5]");
		$this->form_validation->set_rules("descricao", "descricao", "required|min_length[10]");
		$this->form_validation->set_rules("preco", "preco", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("produtos_model");
		    $produto = array(
		        "nome" => $this->input->post("nome"),
		        "descricao" => $this->input->post("descricao"),
		        "preco" => $this->input->post("preco"),
		        "usuario_id" => $usuarioLogado["id"]
		    );
		    $this->produtos_model->salva($produto);
		    $this->session->set_flashdata("success", "Produto salvo com sucesso");
		    redirect("/");
	    }else{
	    	$this->load->view("produtos/formulario");
	    }
	}

    public function mostra($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->view("produtos/mostra", $dados);
    }

}
		