<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atendimento extends CI_Controller {

	 public function index() {

	 	$this->load->model("atendimento_model");
	 	$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->atendimento_model->buscaID($usuario_id);
        $nivel = $this->atendimento_model->buscaNivel($usuario_id);
		$atendimentos = $this->atendimento_model->buscaTodos($empresa_id["empresa_id"]);
		$dados = array("atendimentos" => $atendimentos, "nivel" => $nivel);

		$this->load->template("atendimento/index.php", $dados);

	}

	public function formulario(){
		$this->load->template("atendimento/formulario");
	}

 	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("titulo", "titulo", "required|min_length[5]");
		$this->form_validation->set_rules("descricao", "descricao", "required|min_length[10]");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("atendimento_model");
		    $produto = array(
		        "titulo" => $this->input->post("titulo"),
		        "descricao" => $this->input->post("descricao"),
		        "status" => "2",
		        "usuario_id" => $usuarioLogado["id"]
		    );
		    $this->atendimento_model->salva($produto);
		    $this->session->set_flashdata("success", "Ticket aberto com sucesso");
		    redirect("/atendimento");
	    }else{
	    	$this->load->template("atendimento/formulario");
	    }
	}  

	public function mostra($id){
        $this->load->model("atendimento_model");
        $atendimento = $this->atendimento_model->busca($id);
        $dados = array("atendimento"=>$atendimento);
    	$this->load->helper("typography");
        $this->load->template("atendimento/mostra", $dados);
    }

	public function excluir($id){
        $this->load->model("atendimento_model");
        $atendimento = $this->atendimento_model->busca($id);
        $dados = array("atendimentos"=>$atendimento);

        $this->atendimento_model->exclui($id);
        $this->session->set_flashdata("success", "Ticket excluido com sucesso");
        redirect("/atendimento");

    	$this->load->helper("typography");
        $this->load->template("atendimento/formulario", $dados);
    }

}