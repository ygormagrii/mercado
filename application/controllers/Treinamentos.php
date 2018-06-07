<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treinamentos extends CI_Controller {

	public function index(){

		$this->load->model("treinamentos_model");

		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->treinamentos_model->buscaID($usuario_id);
        $nivel = $this->treinamentos_model->buscaNivel($usuario_id);
		$procedimentos = $this->treinamentos_model->buscaTreinamentos($empresa_id["empresa_id"]);

		$dados = array("procedimentos" => $procedimentos, "nivel" => $nivel);
		$this->load->helper(array("currency"));
		$this->load->template("treinamentos/index.php", $dados);
	}

	public function excluir($id){
        $this->load->model("treinamentos_model");
        
        $this->treinamentos_model->exclui($id);
        $this->session->set_flashdata("success", "Treinamento excluido com sucesso");
        redirect("/treinamentos");
    }


   	/** TREINAMENTOS **/

   	public function mostra($id){
        $this->load->model("treinamentos_model");
        $produto = $this->treinamentos_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->template("treinamentos/mostra", $dados);
    }

    public function videos(){
        $this->load->model("treinamentos_model");
    	$this->load->helper("typography");
        $this->load->template("treinamentos/videos");
    }

	public function cadastra(){
    	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model("treinamentos_model");
    	$this->load->helper("typography");

    	$usuarioLogado = $this->session->userdata("usuario_logado");
		$usuarioLogado = $this->session->userdata("usuario_logado");
	    $usuario_id = $usuarioLogado["id"];
        $procedimentos = $this->treinamentos_model->busca($usuario_id);
        $empresa_id = $this->treinamentos_model->buscaID($usuario_id);
        $e_id = $empresa_id["empresa_id"];
        $tipo_treinamentos = $this->treinamentos_model->buscaTipoTreinamentos($e_id);
        $lista_procedimentos = $this->treinamentos_model->buscaTodosProcedimentos($e_id);
        $lista_procedimentos_i = $this->treinamentos_model->buscaTodosProcedimentosImportados($e_id);
        $lista_instrucoes = $this->treinamentos_model->buscaInstrucoes($e_id);
        $lista_instrucoes_i = $this->treinamentos_model->buscaInstrucoesImportados($e_id);
        $lista_dispositivos = $this->treinamentos_model->buscaDispositivos($e_id);
        $lista_auditorias = $this->treinamentos_model->buscaAuditorias($e_id);
        $lista_auditorias_i = $this->treinamentos_model->buscaAuditoriasImportadas($e_id);
        $lista_pdt = $this->treinamentos_model->buscaPdt($e_id);
        $lista_analises = $this->treinamentos_model->buscaAnalises($e_id);

        $usuarios = $this->treinamentos_model->buscaUsuarios($e_id);

        $dados = array("tipo_treinamentos"=>$tipo_treinamentos, "usuarios"=>$usuarios, "lista_procedimentos"=>$lista_procedimentos, "lista_procedimentos_i"=> $lista_procedimentos_i, "lista_instrucoes"=>$lista_instrucoes, "lista_instrucoes_i"=>$lista_instrucoes_i, "lista_dispositivos"=>$lista_dispositivos, "lista_auditorias"=>$lista_auditorias, "lista_auditorias_i"=>$lista_auditorias_i, "lista_pdt"=>$lista_pdt, "lista_analises"=>$lista_analises);

        #print_r($dados);die();
        $this->load->template("treinamentos/cadastra", $dados);
    }

    
	public function tipo_treinamentos(){
    	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model("treinamentos_model");
        $this->load->template("treinamentos/tipo_treinamentos");
    }

    public function treinamentos_form(){
		
		
		$this->load->model("treinamentos_model");
    	$this->load->helper("typography");
    	 # Carrega a biblioteca de validação
		$this->load->library("form_validation");
        $this->load->template("treinamentos/treinamentos_form");

		$empresa_id = $_POST['empresa_id'];
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];
		
		if($_POST['procedimentos']){
			$nome_opcao = $_POST['procedimentos'];
		}else if($_POST['instrucoes']){
			$nome_opcao = $_POST['instrucoes'];
		}else if($_POST['dispositivos']){
			$nome_opcao = $_POST['dispositivos'];
		}else if($_POST['auditorias']){
			$nome_opcao = $_POST['auditorias'];
		}else if($_POST['pdt']){
			$nome_opcao = $_POST['pdt'];
		}else if($_POST['analises']){
			$nome_opcao = $_POST['analises'];
		}


		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required");
		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
	        $this->load->model("treinamentos_model");
	    	$this->load->helper("typography");
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
		        "empresa_id" => $empresa_id,
		        "nome" => $nome,
		        "tipo" => $tipo,
		        "opcao_id" => $nome_opcao,
		        "descricao" => $descricao,
		        "data" => $data_d
		    );

	    	$this->treinamentos_model->salva_treinamento($arquivo, $nome_opcao);
	    	$this->session->set_flashdata("success", "Seu Treinamento foi criado com sucesso");
	    	redirect("/treinamentos");
		}else{
			# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->session->set_flashdata("warning", "Encontramos algum erro ao gerar seu Treinamento, tente novamente.");
		    redirect("/treinamentos");
		}
	}

	public function treinamentos_modelo(){
		
		$this->load->model("treinamentos_model");
    	$this->load->helper("typography");
    	 # Carrega a biblioteca de validação
		$this->load->library("form_validation");
        $this->load->template("treinamentos/treinamentos_form");

		$empresa_id = $_POST['empresa_id'];
		$nome = $_POST['nome'];

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required");
		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
	        $this->load->model("procedimentos_model");
	    	$this->load->helper("typography");
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
	    		"nome" => $nome,
		        "empresa_id" => $empresa_id
		    );

	    	$this->treinamentos_model->salva_tipo_treinamento($arquivo);
	    	$this->session->set_flashdata("success", "Seu Tipo de Treinamento foi criado com sucesso");
	    	redirect("/treinamentos");
		}else{
			# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->session->set_flashdata("warning", "Encontramos algum erro ao gerar seu Tipo de Treinamento, tente novamente.");
		    redirect("/treinamentos");
		}
	}


	/**
		Começa aqui processo de importação de treinamentos.
	**/

	public function importar($id){
        $this->load->model("treinamentos_model");
    	$this->load->helper("typography");
    	$dados = array("id"=>$id);
        $this->load->template("treinamentos/importar", $dados);
    }

	public function importar_novo(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf|docx';
		$config['max_size']             = 4100;
		$config['max_width']            = 2024;
		$config['max_height']           = 1568;

		$empresa_id = $_POST['empresa_id'];
		$treinamento_id = $_POST['treinamento_id'];

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
		        $error = array('error' => $this->upload->display_errors());
		        $this->load->view('treinamentos/importar');
		        $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		        redirect("/treinamentos/importar");
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
	        $this->load->model("treinamentos_model");
	    	$this->load->helper("typography");
	    	$caminho_arquivo = $data['upload_data']['full_path'];
	    	$nome_arquivo = $data['upload_data']['file_name'];
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
		        "empresa_id" => $empresa_id,
		        "caminho_arquivo" => $caminho_arquivo,
		        "nome_arquivo" => $nome_arquivo
		    );

	    	$this->treinamentos_model->salva_importacao($arquivo, $treinamento_id);
	    	$this->session->set_flashdata("success", "Sua importação foi realizada com sucesso");
	        redirect("/treinamentos");
		}
	}

}
		