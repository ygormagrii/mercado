<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacoes extends CI_Controller {

	 public function index() {

		$this->load->model("informacoes_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
		$usuario_id = $usuarioLogado["id"];
		$empresa_id = $this->informacoes_model->buscaID($usuario_id);
		$nivel = $this->informacoes_model->buscaNivel($usuario_id);
        $info = $this->informacoes_model->buscaTodos($empresa_id["empresa_id"]);
        $dados = array("informacoes"=>$info, "nivel" => $nivel);

		$this->load->template("informacoes/index.php", $dados);
    	$this->load->helper("typography");

	}


	public function salva(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("endereco", "endereco", "required|min_length[5]");
		$this->form_validation->set_rules("complemento", "complemento", "required");
		$this->form_validation->set_rules("cidade", "cidade", "required");
		$this->form_validation->set_rules("estado", "estado", "required");
		$this->form_validation->set_rules("cep", "cep", "required");
		$this->form_validation->set_rules("pais", "pais", "required");
		$this->form_validation->set_rules("cnpj", "cnpj", "required");
		$this->form_validation->set_rules("telefone", "telefone", "required");
		$this->form_validation->set_rules("celular", "celular", "required");
		$this->form_validation->set_rules("email", "email", "required");

		# Configurações para upload de logos
		$config['upload_path']          = './uploads/logos/';
		$config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf';
		$config['max_size']             = 4100;
		$config['max_width']            = 2024;
		$config['max_height']           = 1568;

		# Chama biblioteca de upload
		$this->load->library('upload', $config);

		# Validação pra verificar se o upload foi realizado com sucesso
		if ( ! $this->upload->do_upload('logo')){ 
		    $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		}else{
	        $data = array('upload_data' => $this->upload->data());
	       	$caminho_arquivo = $data['upload_data']['full_path'];
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array("caminho_arquivo" => $caminho_arquivo);
		}

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
			$usuario_id = $usuarioLogado["id"];

		    $this->load->model("informacoes_model");
		    $informacoes = array(
		        "endereco" => $this->input->post("endereco"),
		        "nome" => $this->input->post("nome"),
		        "logo" => $caminho_arquivo,
		        "complemento" => $this->input->post("complemento"),
		        "cidade" => $this->input->post("cidade"),
		        "estado" => $this->input->post("estado"),
		        "cep" => $this->input->post("cep"),
		        "pais" => $this->input->post("pais"),
		        "cnpj" => $this->input->post("cnpj"),
		        "telefone" => $this->input->post("telefone"),
		        "celular" => $this->input->post("celular"),
		        "email" => $this->input->post("email"),
		        "usuario_id" => $usuarioLogado["id"]
		    );
		    $this->informacoes_model->salva($informacoes);

		    // Busca empresa_id salvo na tabela informações
		    $ed_inserido = $this->informacoes_model->buscaID($usuario_id);
		    $this->informacoes_model->salvaUsuario($ed_inserido["empresa_id"], $usuario_id);

		    $this->session->set_flashdata("success", "Informações de sua empresa foram salvas com sucesso");
		    redirect("/informacoes");
	    }else{
	    	$this->load->template("/informacoes");
	    }
	}


	public function editar(){

        # Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("endereco", "endereco", "required|min_length[5]");
		$this->form_validation->set_rules("complemento", "complemento", "required");
		$this->form_validation->set_rules("cidade", "cidade", "required");
		$this->form_validation->set_rules("estado", "estado", "required");
		$this->form_validation->set_rules("cep", "cep", "required");
		$this->form_validation->set_rules("pais", "pais", "required");
		$this->form_validation->set_rules("cnpj", "cnpj", "required");
		$this->form_validation->set_rules("telefone", "telefone", "required");
		$this->form_validation->set_rules("celular", "celular", "required");
		$this->form_validation->set_rules("email", "email", "required");

		# Configurações para upload de logos
		$config['upload_path']          = './uploads/logos/';
		$config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf';
		$config['max_size']             = 4100;
		$config['max_width']            = 2024;
		$config['max_height']           = 1568;

		# Chama biblioteca de upload
		$this->load->library('upload', $config);

		# Validação pra verificar se o upload foi realizado com sucesso
		if ( ! $this->upload->do_upload('logo')){ 
		    $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		}else{
	        $data = array('upload_data' => $this->upload->data());
	       	$caminho_arquivo = $data['upload_data']['full_path'];
	    	$data_d = gmdate('d/m/Y');

	    	$arquivo = array("caminho_arquivo" => $caminho_arquivo);
		}

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			# Caso todas validações estejam corretas preparar dados e chamar modelo de atualização
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("informacoes_model");
		    $informacoes = array(
		        "endereco" => $this->input->post("endereco"),
		        "nome" => $this->input->post("nome"),
		        "logo" => $caminho_arquivo,
		        "complemento" => $this->input->post("complemento"),
		        "cidade" => $this->input->post("cidade"),
		        "estado" => $this->input->post("estado"),
		        "cep" => $this->input->post("cep"),
		        "pais" => $this->input->post("pais"),
		        "cnpj" => $this->input->post("cnpj"),
		        "telefone" => $this->input->post("telefone"),
		        "celular" => $this->input->post("celular"),
		        "email" => $this->input->post("email"),
		        "usuario_id" => $usuarioLogado["id"]
		    );

		    $this->informacoes_model->edita($informacoes);
		    $this->session->set_flashdata("success", "As informações de sua empresa foram alteradas com sucesso");
		    redirect("/informacoes");
	    }else{
	    	# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	redirect("/informacoes");
	    }

	}

}