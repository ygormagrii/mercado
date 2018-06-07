<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedimentos extends CI_Controller {

	public function index(){

		$this->load->model("procedimentos_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->procedimentos_model->buscaID($usuario_id);

        $nivel = $this->procedimentos_model->buscaNivel($usuario_id);
		$procedimentos = $this->procedimentos_model->buscaTodos($empresa_id["empresa_id"]);
		$procedimentos_importados = $this->procedimentos_model->buscaImportados($empresa_id["empresa_id"]);

		$dados = array("procedimentos" => $procedimentos, "procedimentos_importados" => $procedimentos_importados, "nivel" => $nivel);
		$this->load->helper(array("currency"));
		$this->load->template("procedimentos/index.php", $dados);
	}

	public function formulario(){
		$this->load->template("procedimentos/formulario");
	}

	public function editar_image(){
		$this->load->template("procedimentos/editar_image");
	}

	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("tipo", "tipo", "required");
		$this->form_validation->set_rules("data", "data", "required");
		$this->form_validation->set_rules("aprovado", "aprovação", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("procedimentos_model");

		    $fname_array = $this->input->post("fname");
		    $fname = implode('; ', $fname_array);

		    $usuarioLogado = $this->session->userdata("usuario_logado");
	        $usuario_id = $usuarioLogado["id"];
	        $empresa_id = $this->procedimentos_model->buscaID($usuario_id);
	        $e_id = $empresa_id["empresa_id"];
	        $data = $this->input->post("data");
			date_default_timezone_set("Brazil/East");
			$data_fim = date('d/m/Y', strtotime($data));

		    $procedimentos = array(
		        "nome" => $this->input->post("nome"),
		        "tipo" => $this->input->post("tipo"),
		        "data" => $data_fim,
		        "fname" => "$fname",
		        "content" => $this->input->post("content"),
		        "unidade" => $this->input->post("unidade"),
		        "local" => $this->input->post("local"),
		        "usuario_id" => $usuarioLogado["id"],
		        "empresa_id" => $e_id
		    );
		    $this->procedimentos_model->salva($procedimentos);
		    $this->session->set_flashdata("success", "Procedimento salvo com sucesso");
		    redirect("/procedimentos");
	    }else{
	    	$this->load->template("procedimentos/formulario");
	    }
	}

    public function mostra($id){
        $this->load->model("procedimentos_model");
        $produto = $this->procedimentos_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->template("procedimentos/mostra", $dados);
    }

   public function atualiza_procedimentos($id, $status){
    	// Chama o mdeolo de Procedimentoss
        $this->load->model("procedimentos_model");

       	//Busca Procedimentoss a partir do id do usuário e cria um array
        $Procedimentos = $this->procedimentos_model->busca($id);
        $dados = array("Procedimentos"=>$Procedimentos);

        if($status == '1'){
			//Caso o Procedimentos já esteja ativado o cliente pode desativar
	        $this->procedimentos_model->desativa($id);
			$this->load->template("procedimentos/desativa", $dados);
			$this->session->set_flashdata("danger", "Procedimentos desativado com sucesso");
		    redirect("/procedimentos");

        }else{
	        //Atualiza o status ativando o Procedimentos
	        $this->procedimentos_model->ativa($id);
	        $this->load->template("procedimentos/ativa", $dados);
	        $this->session->set_flashdata("success", "Procedimentos ativo com sucesso");
		    redirect("/procedimentos");
		}

		//Carrega typografia e template de ativação
    	$this->load->helper("typography");
    }

    public function excluir($id){
        $this->load->model("procedimentos_model");
        $Procedimentos = $this->procedimentos_model->busca($id);
        $dados = array("procedimentos"=>$Procedimentos);

        $this->procedimentos_model->exclui($id);
        $this->session->set_flashdata("success", "Procedimentos excluido com sucesso");
        redirect("/procedimentos");

    	$this->load->helper("typography");
        $this->load->template("procedimentos/excluir", $dados);
    }

    public function excluir_importados($id){
        $this->load->model("procedimentos_model");
        $Procedimentos = $this->procedimentos_model->buscai($id);
        $dados = array("procedimentos"=>$Procedimentos);

        $this->procedimentos_model->exclui_importados($id);
        $this->session->set_flashdata("success", "Procedimentos excluido com sucesso");
        redirect("/procedimentos");

    	$this->load->helper("typography");
        $this->load->template("procedimentos/excluir", $dados);
    }

    public function form_editar($id){
        $this->load->model("procedimentos_model");
        $procedimentos = $this->procedimentos_model->busca($id);
        $dados = array("procedimentos"=>$procedimentos);
	    $this->load->template("procedimentos/editar", $dados);
    	$this->load->helper("typography");
	}

    public function editar(){

    	$procedimentos_id = $this->input->post("id");

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
			# Caso todas validações estejam corretas preparar dados e chamar modelo de atualização
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("procedimentos_model");
		    $procedimentos = array(
		        "nome" => $this->input->post("nome"),
		        "descricao" => $this->input->post("descricao"),
		        "preco" => $this->input->post("preco"),
		        "usuario_id" => $usuarioLogado["id"],
		        "status" => $this->input->post("status"),
		        "id" => $this->input->post("procedimentos_id")
		    );
		    $this->procedimentos_model->edita($procedimentos);
		    $this->session->set_flashdata("success", "Procedimentos alterado com sucesso");
		    redirect("/");
	    }else{
	    	# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->load->model("procedimentos_model");
	        $procedimentos = $this->procedimentos_model->busca($procedimentos_id);
	        $dados = array("procedimentos"=>$procedimentos);
		    $this->load->template("procedimentos/editar", $dados);
	    	$this->load->helper("typography");
	    }

	}

	/**
		Começa aqui processo de importação de procedimentos.
	**/

	public function importar(){
        $this->load->model("procedimentos_model");
    	$this->load->helper("typography");
        $this->load->template("procedimentos/importar");
    }

    public function audita($id){
    	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model("procedimentos_model");
    	$this->load->helper("typography");
        $procedimentos = $this->procedimentos_model->busca($id);
        $dados = array("procedimentos"=>$procedimentos);
        $this->load->template("procedimentos/auditorias", $dados);
    }

    public function auditorias_form(){
		
		$this->load->model("procedimentos_model");
    	$this->load->helper("typography");
    	 # Carrega a biblioteca de validação
		$this->load->library("form_validation");
        $this->load->template("procedimentos/auditorias_form");

		$empresa_id = $_POST['empresa_id'];
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];
		$procedimento_id = $_POST['procedimento_id'];

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("descricao", "descricao", "required");
		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
	        $this->load->model("procedimentos_model");
	    	$this->load->helper("typography");
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
		        "empresa_id" => $empresa_id,
		        "procedimento_id" => $procedimento_id,
		        "nome" => $nome,
		        "tipo" => $tipo,
		        "descricao" => $descricao,
		        "data" => $data_d
		    );

	    	$this->procedimentos_model->salva_auditoria($arquivo, $procedimento_id);
	    	$this->session->set_flashdata("success", "Sua Auditoria foi iniciada com sucesso");
		}else{
			# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->session->set_flashdata("warning", "Encontramos algum erro ao gerar sua Auditoria, tente novamente.");
		    redirect("/procedimentos");
		}
	}


	/** TREINAMENTOS **/

	public function treinamento($id){
    	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model("procedimentos_model");
    	$this->load->helper("typography");

    	$usuarioLogado = $this->session->userdata("usuario_logado");
		$usuarioLogado = $this->session->userdata("usuario_logado");
	    $usuario_id = $usuarioLogado["id"];
        $procedimentos = $this->procedimentos_model->busca($id);
        $empresa_id = $this->procedimentos_model->buscaID($usuario_id);
        $e_id = $empresa_id["empresa_id"];
        $tipo_treinamentos = $this->procedimentos_model->buscaTipoTreinamentos($e_id);
        $usuarios = $this->procedimentos_model->buscaUsuarios($e_id);

        $dados = array("procedimentos"=>$procedimentos, "tipo_treinamentos"=>$tipo_treinamentos, "usuarios"=>$usuarios);
        $this->load->template("procedimentos/treinamentos", $dados);
    }


    public function tipo_treinamentos(){
    	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model("procedimentos_model");
        $this->load->template("procedimentos/tipo_treinamentos");
    }

    public function treinamentos_form(){
		
		
		$this->load->model("procedimentos_model");
    	$this->load->helper("typography");
    	 # Carrega a biblioteca de validação
		$this->load->library("form_validation");
        $this->load->template("procedimentos/treinamentos_form");

		$empresa_id = $_POST['empresa_id'];
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];
		$procedimento_id = $_POST['procedimento_id'];

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
		        "empresa_id" => $empresa_id,
		        "procedimento_id" => $procedimento_id,
		        "nome" => $nome,
		        "tipo" => $tipo,
		        "descricao" => $descricao,
		        "data" => $data_d
		    );

	    	$this->procedimentos_model->salva_treinamento($arquivo, $procedimento_id);
	    	$this->session->set_flashdata("success", "Seu Treinamento foi criado com sucesso");
		}else{
			# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->session->set_flashdata("warning", "Encontramos algum erro ao gerar seu Treinamento, tente novamente.");
		    redirect("/procedimentos");
		}
	}

	public function treinamentos_modelo(){
		
		$this->load->model("procedimentos_model");
    	$this->load->helper("typography");
    	 # Carrega a biblioteca de validação
		$this->load->library("form_validation");
        $this->load->template("procedimentos/treinamentos_form");

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

	    	$this->procedimentos_model->salva_tipo_treinamento($arquivo);
	    	$this->session->set_flashdata("success", "Seu Tipo de Treinamento foi criado com sucesso");
	    	redirect("/procedimentos");
		}else{
			# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->session->set_flashdata("warning", "Encontramos algum erro ao gerar seu Tipo de Treinamento, tente novamente.");
		    redirect("/procedimentos");
		}
	}

	public function importar_novo(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf|docx';
		$config['max_size']             = 4100;
		$config['max_width']            = 2024;
		$config['max_height']           = 1568;

		$empresa_id = $_POST['empresa_id'];
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
		        $error = array('error' => $this->upload->display_errors());
		        $this->load->view('procedimentos/importar');
		        $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		        redirect("/procedimentos/importar");
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
	        $this->load->model("procedimentos_model");
	    	$this->load->helper("typography");
	    	$caminho_arquivo = $data['upload_data']['full_path'];
	    	$nome_arquivo = $data['upload_data']['file_name'];
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array(
		        "empresa_id" => $empresa_id,
		        "caminho_arquivo" => $caminho_arquivo,
		        "nome_arquivo" => $nome_arquivo,
		        "nome" => $nome,
		        "tipo" => $tipo,
		        "descricao" => $descricao,
		        "data" => $data_d
		    );

	    	$this->procedimentos_model->salva_importacao($arquivo);
	    	$this->session->set_flashdata("success", "Sua importação foi realizada com sucesso");
	        redirect("/procedimentos");
		}
	}

}
		