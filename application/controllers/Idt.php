<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idt extends CI_Controller {

	public function index(){

		$this->load->model("idt_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->idt_model->buscaID($usuario_id);

        $nivel = $this->idt_model->buscaNivel($usuario_id);
		$produtos = $this->idt_model->buscaTodos($empresa_id["empresa_id"]);
		$idt_importados = $this->idt_model->buscaImportados($empresa_id["empresa_id"]);

		$dados = array("produtos" => $produtos, "idt_importados" => $idt_importados, "nivel" => $nivel);
		$this->load->helper(array("currency"));
		$this->load->template("idt/index.php", $dados);
	}

	public function formulario(){
		$this->load->template("idt/formulario");
	}

	public function novo(){

		# Carrega a biblioteca de validação
		$this->load->library("form_validation");

		# Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("data", "data", "required");

		# Configura para mensagens de erros aparecerem com essa configuração
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		
		#Roda validação
		$sucesso = $this->form_validation->run();

		if($sucesso) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
		    $this->load->model("idt_model");
		    $fname_array = $this->input->post("fname");
		    $fname = implode('; ', $fname_array);

			$usuarioLogado = $this->session->userdata("usuario_logado");
			$usuario_id = $usuarioLogado["id"];
			$empresa_id = $this->idt_model->buscaID($usuario_id);
			$e_id = $empresa_id["empresa_id"];

			$data = $this->input->post("data");
			date_default_timezone_set("Brazil/East");
			$data_fim = date('d/m/Y', strtotime($data));

		    $produto = array(
		    	"nome" => $this->input->post("nome"),
		        "fname" => "$fname",
		        "content" => $this->input->post("content"),
		        "data" => $data_fim,
		        "unidade" => $this->input->post("unidade"),
		        "local" => $this->input->post("local"),
		        "pontos_bloqueio" => $this->input->post("pontos_bloqueio"),
 		        "usuario_id" => $usuarioLogado["id"],
		        "empresa_id" => $e_id
		    );

		    $this->idt_model->salva($produto);
		    $this->session->set_flashdata("success", "IDT gerada com sucesso");
		    redirect("/idt");
	    }else{
	    	$this->load->template("idt/formulario");
	    }
	}

    public function mostra($id){
        $this->load->model("idt_model");
        $produto = $this->idt_model->busca($id);
        $dados = array("produto"=>$produto);
    	$this->load->helper("typography");
        $this->load->template("idt/mostra", $dados);
    }

    public function atualiza_produto($id, $status){
    	// Chama o mdeolo de produtos
        $this->load->model("idt_model");

       	//Busca produtos a partir do id do usuário e cria um array
        $produto = $this->idt_model->busca($id);
        $dados = array("produto"=>$produto);

        if($status == '1'){
			//Caso o produto já esteja ativado o cliente pode desativar
	        $this->idt_model->desativa($id);
			$this->load->template("idt/desativa", $dados);
			$this->session->set_flashdata("danger", "IDT desativado com sucesso");
		    redirect("/");

        }else{
	        //Atualiza o status ativando o produto
	        $this->idt_model->ativa($id);
	        $this->load->template("idt/ativa", $dados);
	        $this->session->set_flashdata("success", "IDT ativo com sucesso");
		    redirect("/");
		}

		//Carrega typografia e template de ativação
    	$this->load->helper("typography");
    }

    public function excluir($id){
        $this->load->model("idt_model");
        $produto = $this->idt_model->busca($id);
        $dados = array("produto"=>$produto);

        $this->idt_model->exclui($id);
        $this->session->set_flashdata("success", "IDT excluida com sucesso");
        redirect("/idt");

    	$this->load->helper("typography");
        $this->load->template("idt/excluir", $dados);
    }

    public function exclui_importados($id){
        $this->load->model("idt_model");
        $produto = $this->idt_model->buscai($id);
        $dados = array("produto"=>$produto);

        $this->idt_model->exclui_importados($id);
        $this->session->set_flashdata("success", "IDT excluida com sucesso");
        redirect("/idt");

    	$this->load->helper("typography");
        $this->load->template("idt/excluir", $dados);
    }

    public function form_editar($id){
        $this->load->model("idt_model");
        $produto = $this->idt_model->busca($id);
        $dados = array("produto"=>$produto);
	    $this->load->template("idt/editar", $dados);
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
		    $this->load->model("idt_model");
		    $produto = array(
		        "nome" => $this->input->post("nome"),
		        "descricao" => $this->input->post("descricao"),
		        "preco" => $this->input->post("preco"),
		        "usuario_id" => $usuarioLogado["id"],
		        "status" => $this->input->post("status"),
		        "id" => $this->input->post("produto_id")
		    );
		    $this->idt_model->edita($produto);
		    $this->session->set_flashdata("success", "Produto alterado com sucesso");
		    redirect("/");
	    }else{
	    	# Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
	    	$this->load->model("idt_model");
	        $produto = $this->idt_model->busca($produto_id);
	        $dados = array("produto"=>$produto);
		    $this->load->template("idt/editar", $dados);
	    	$this->load->helper("typography");
	    }

	}

	/**
		Começa aqui processo de importação de procedimentos.
	**/

	public function importar(){
        $this->load->model("idt_model");
    	$this->load->helper("typography");
        $this->load->template("idt/importar");
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
		        $this->load->view('idt/importar');
		        $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
		        redirect("/idt/importar");
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
	        $this->load->model("idt_model");
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

	    	$this->idt_model->salva_importacao($arquivo);
	    	$this->session->set_flashdata("success", "Sua importação foi realizada com sucesso");
	        redirect("/idt");
		}
	}

}
		