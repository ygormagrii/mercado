<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){

		$this->load->model("produtos_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->produtos_model->buscaID($usuario_id);
        $nivel = $this->produtos_model->buscaNivel($usuario_id);
		$produtos = $this->produtos_model->buscaTodos($empresa_id["empresa_id"]);

		$dados = array("produtos" => $produtos, "nivel" => $nivel);
		$this->load->helper(array("currency"));
		$this->load->template("produtos/index.php", $dados);
	}

	public function formulario(){
		$this->load->template("produtos/formulario");
	}

	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, quantidade required
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("quantidade", "quantidade", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();
		$this->load->model("produtos_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->produtos_model->buscaID($usuario_id);
        $e_id = $empresa_id["empresa_id"];
		date_default_timezone_set("Brazil/East");
		$data = date('d/m/Y');

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("produtos_model");
		    $produto = array(
		        "nome" => $this->input->post("nome"),
		        "tipo" => $this->input->post("tipo"),
		        "descricao" => $this->input->post("descricao"),
		        "quantidade" => $this->input->post("quantidade"),
		        "quantidade_recomendada" => $this->input->post("quantidade_recomendada"),
		        "data" => $data,
		        "nome_responsavel" => $this->input->post("nome_responsavel"),
		        "foto" => $this->input->post("content"),
 		        "usuario_id" => $usuarioLogado["id"],
 		        "empresa_id" => $e_id
		    );
		    $this->produtos_model->salva($produto);
		    $this->session->set_flashdata("success", "Dispositivo salvo com sucesso");
		    redirect("/produtos");
	    }else{
	    	$this->load->template("produtos/formulario");
	    }
	}

    public function mostra($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->template("produtos/mostra", $dados);
    }

    public function atualiza_produto($id, $status){
    	// Chama o mdeolo de produtos
        $this->load->model("produtos_model");

       	//Busca produtos a partir do id do usuário e cria um array
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto"=>$produto);

        if($status == '1'){
			//Caso o produto já esteja ativado o cliente pode desativar
	        $this->produtos_model->desativa($id);
			$this->load->template("produtos/desativa", $dados);
			$this->session->set_flashdata("danger", "Dispositivo desativado com sucesso");
		    redirect("/produtos");

        }else{
	        //Atualiza o status ativando o produto
	        $this->produtos_model->ativa($id);
	        $this->load->template("produtos/ativa", $dados);
	        $this->session->set_flashdata("success", "Dispositivo ativo com sucesso");
		    redirect("/produtos");
		}

		//Carrega typografia e template de ativação
    	$this->load->helper("typography");
    }

    public function excluir($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto"=>$produto);

        $this->produtos_model->exclui($id);
        $this->session->set_flashdata("success", "Dispositivo excluido com sucesso");
        redirect("/produtos");

    	$this->load->helper("typography");
        $this->load->template("produtos/excluir", $dados);
    }


    public function form_editar($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto"=>$produto);
	    $this->load->template("produtos/editar", $dados);
    	$this->load->helper("typography");
	}

    public function editar(){

    	$produto_id = $this->input->post("produto_id");

        # Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, quantidade required
		$this->form_validation->set_rules("nome", "nome", "required|min_length[5]");
		$this->form_validation->set_rules("descricao", "descricao", "required|min_length[10]");
		$this->form_validation->set_rules("quantidade", "quantidade", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		$data = gmdate('d/m/Y');

		if($sucesso) {
			# Caso todas validações estejam corretas preparar dados e chamar modelo de atualização
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("produtos_model");
		    $produto = array(
		        "nome" => $this->input->post("nome"),
		        "tipo" => $this->input->post("tipo"),
		        "descricao" => $this->input->post("descricao"),
		        "quantidade" => $this->input->post("quantidade"),
		        "quantidade_recomendada" => $this->input->post("quantidade_recomendada"),
		        "data" => $data,
		        "nome_responsavel" => $this->input->post("nome_responsavel"),
		        "usuario_id" => $usuarioLogado["id"],
		        "status" => $this->input->post("status"),
		        "id" => $this->input->post("produto_id")
		    );
		    $this->produtos_model->edita($produto);
		    $this->session->set_flashdata("success", "Dispositivo alterado com sucesso");
		    redirect("/produtos");
	    }else{
	    	# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->load->model("produtos_model");
	        $produto = $this->produtos_model->busca($produto_id);
	        $dados = array("produto"=>$produto);
		    $this->load->template("produtos/editar", $dados);
	    	$this->load->helper("typography");
	    }

	}

}
		