<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditorias extends CI_Controller {

	public function index(){

		$this->load->model("auditorias_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->auditorias_model->buscaID($usuario_id);
        $nivel = $this->auditorias_model->buscaNivel($usuario_id);
		$procedimentos = $this->auditorias_model->buscaAuditorias($empresa_id["empresa_id"]);
		$auditorias_importados = $this->auditorias_model->buscaImportados($empresa_id["empresa_id"]);

		$dados = array("procedimentos" => $procedimentos, "nivel" => $nivel, "auditorias_importados" => $auditorias_importados);

		$this->load->helper(array("currency"));
		$this->load->template("auditorias/index.php", $dados);
	}

	/**
		Começa aqui processo de importação de procedimentos.
	**/

	public function importar($id){
        $this->load->model("auditorias_model");
    	$this->load->helper("typography");
    	$dados = array("id"=>$id);
        $this->load->template("auditorias/importar", $dados);
    }

	public function importar_novo(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf|docx';
		$config['max_size']             = 4100;
		$config['max_width']            = 2024;
		$config['max_height']           = 1568;

		$empresa_id = $_POST['empresa_id'];
		$auditoria_id = $_POST['auditoria_id'];

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
		        $error = array('error' => $this->upload->display_errors());
		        $this->load->view('auditorias/importar');
		        $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		        redirect("/auditorias/importar");
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
	        $this->load->model("auditorias_model");
	    	$this->load->helper("typography");
	    	$caminho_arquivo = $data['upload_data']['full_path'];
	    	$nome_arquivo = $data['upload_data']['file_name'];
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
		        "empresa_id" => $empresa_id,
		        "caminho_arquivo" => $caminho_arquivo,
		        "nome_arquivo" => $nome_arquivo,
		        "auditoria_id" => $auditoria_id
		    );

	    	$this->auditorias_model->salva_importacao($arquivo);
	    	$this->session->set_flashdata("success", "Sua importação foi realizada com sucesso");
	        redirect("/auditorias");
		}
	}

}
		