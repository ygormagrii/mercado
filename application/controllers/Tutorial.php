<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	 public function index() {

	 	$this->load->model("tutorial_model");
		$this->load->template("tutorial/index.php");

	}

	public function finalizar(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("utilizar", "utilizar", "required");
		$this->form_validation->set_rules("num_funcionarios", "required");
		$this->form_validation->set_rules("atuacao", "atuacao", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("tutorial_model");

		    /* Prepara array com os docs para salvar
		    $docs = array(
		        "nome" => $this->input->post("nome"),
		        "descricao" => $this->input->post("descricao"),
		        "preco" => $this->input->post("preco"),
		        "usuario_id" => $usuarioLogado["id"]
		    );
		    */
		    // $this->produtos_model->salva($produto);

		    //Atualiza o status ativando o produto
		    
		    $user_id = $usuarioLogado['id'];
		    
	        $this->tutorial_model->ativa($user_id);
	        $this->session->set_flashdata("success", "Settup configurado com sucesso");
		    redirect("/informacoes");
	    }else{
	    	$this->load->template("tutorial/index");
	    }
	}
   
}