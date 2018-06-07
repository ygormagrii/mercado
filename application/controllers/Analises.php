<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analises extends CI_Controller {

	public function index(){

		$this->load->model("analises_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->analises_model->buscaID($usuario_id);
        $nivel = $this->analises_model->buscaNivel($usuario_id);
		$produtos = $this->analises_model->buscaTodos($empresa_id["empresa_id"]);

		$dados = array("produtos" => $produtos, "nivel" => $nivel);
		$this->load->helper(array("currency"));
		$this->load->template("analises/index.php", $dados);
	}

	public function formulario(){
		$this->load->template("analises/formulario");
	}

	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("data", "data", "required");
		$this->form_validation->set_rules("nome", "nome", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("analises_model");
		    $fname_array = $this->input->post("fname");
		    $fname = implode('; ', $fname_array);

		    $usuarioLogado = $this->session->userdata("usuario_logado");
            $usuario_id = $usuarioLogado["id"];
            $empresa_id = $this->analises_model->buscaID($usuario_id);
            $e_id = $empresa_id["empresa_id"];

		    $produto = array(
		    	"nome" => $this->input->post("nome"),
		        "data" => $this->input->post("data"),
		        "fname" => "$fname",
		        "usuario_id" => $usuarioLogado["id"],
		        "empresa_id" => $e_id
		    );

		    $this->analises_model->salva($produto);
		    $this->session->set_flashdata("success", "Análise de risco gerada com sucesso");
		    redirect("/analises");
	    }else{
	    	$this->load->template("analises/formulario");
	    }
	}

    public function mostra($id){
        $this->load->model("analises_model");
        $produto = $this->analises_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->template("analises/mostra", $dados);
    }

    public function atualiza_produto($id, $status){
    	// Chama o mdeolo de produtos
        $this->load->model("analises_model");

       	//Busca produtos a partir do id do usuário e cria um array
        $produto = $this->analises_model->busca($id);
        $dados = array("produto"=>$produto);

        if($status == '1'){
			//Caso o produto já esteja ativado o cliente pode desativar
	        $this->analises_model->desativa($id);
			$this->load->template("analises/desativa", $dados);
			$this->session->set_flashdata("danger", "Produto desativado com sucesso");
		    redirect("/");

        }else{
	        //Atualiza o status ativando o produto
	        $this->analises_model->ativa($id);
	        $this->load->template("analises/ativa", $dados);
	        $this->session->set_flashdata("success", "Produto ativo com sucesso");
		    redirect("/");
		}

		//Carrega typografia e template de ativação
    	$this->load->helper("typography");
    }

    public function excluir($id){
        $this->load->model("analises_model");
        $produto = $this->analises_model->busca($id);
        $dados = array("produto"=>$produto);

        $this->analises_model->exclui($id);
        $this->session->set_flashdata("success", "Análise excluida com sucesso");
        redirect("/analises");

    	$this->load->helper("typography");
        $this->load->template("analises/excluir", $dados);
    }


    public function form_editar($id){
        $this->load->model("analises_model");
        $produto = $this->analises_model->busca($id);
        $dados = array("produto"=>$produto);
	    $this->load->template("analises/editar", $dados);
    	$this->load->helper("typography");
	}

    public function editar(){

    	$produto_id = $this->input->post("produto_id");

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
		    $this->load->model("analises_model");
		    $produto = array(
		        "nome" => $this->input->post("nome"),
		        "descricao" => $this->input->post("descricao"),
		        "preco" => $this->input->post("preco"),
		        "usuario_id" => $usuarioLogado["id"],
		        "status" => $this->input->post("status"),
		        "id" => $this->input->post("produto_id")
		    );
		    $this->analises_model->edita($produto);
		    $this->session->set_flashdata("success", "Produto alterado com sucesso");
		    redirect("/");
	    }else{
	    	# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->load->model("analises_model");
	        $produto = $this->analises_model->busca($produto_id);
	        $dados = array("produto"=>$produto);
		    $this->load->template("analises/editar", $dados);
	    	$this->load->helper("typography");
	    }

	}

}
		