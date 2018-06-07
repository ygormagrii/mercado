<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdt extends CI_Controller {

    public function index(){

        $this->load->model("pdt_model");
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->pdt_model->buscaID($usuario_id);
        $nivel = $this->pdt_model->buscaNivel($usuario_id);
        $produtos = $this->pdt_model->buscaTodos($empresa_id["empresa_id"]);

        $dados = array("produtos" => $produtos, "nivel" => $nivel);
        $this->load->helper(array("currency"));
        $this->load->template("pdt/index.php", $dados);
    }

    public function formulario(){
        $this->load->template("pdt/formulario");
    }

    public function novo(){

        # Carrega a biblioteca de validação
        $this->load->library("form_validation");

        # Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("data", "data", "required");
        $this->form_validation->set_rules("setor", "setor", "required");
        $this->form_validation->set_rules("funcionarios", "funcionários envolvidos", "required");        

        # Configura para mensagens de erros aparecerem com essa configuração
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        #Roda validação
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $this->load->model("pdt_model");

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $usuario_id = $usuarioLogado["id"];
            $empresa_id = $this->pdt_model->buscaID($usuario_id);
            $e_id = $empresa_id["empresa_id"];

            $produto = array(
                "nome" => $this->input->post("nome"),
                "content" => $this->input->post("content"),
                "data" => $this->input->post("data"),
                "setor" => $this->input->post("maquina_ou_local"),
                "maquina_ou_local" => $this->input->post("maquina_ou_local"),
                "funcionarios" => $this->input->post("funcionarios"),
                "usuario_id" => $usuarioLogado["id"],
                "empresa_id" => $e_id
            );

            $this->pdt_model->salva($produto);
            $this->session->set_flashdata("success", "pdt gerada com sucesso");
            redirect("/pdt");
        }else{
            $this->load->template("pdt/formulario");
        }
    }

    public function mostra($id){
        $this->load->model("pdt_model");
        $produto = $this->pdt_model->busca($id);
        $dados = array("produto"=>$produto);
        $this->load->helper("typography");
        $this->load->template("pdt/mostra", $dados);
    }

    public function atualiza_produto($id, $status){
        // Chama o mdeolo de produtos
        $this->load->model("pdt_model");

        //Busca produtos a partir do id do usuário e cria um array
        $produto = $this->pdt_model->busca($id);
        $dados = array("produto"=>$produto);

        if($status == '1'){
            //Caso o produto já esteja ativado o cliente pode desativar
            $this->pdt_model->desativa($id);
            $this->load->template("pdt/desativa", $dados);
            $this->session->set_flashdata("danger", "pdt desativado com sucesso");
            redirect("/");

        }else{
            //Atualiza o status ativando o produto
            $this->pdt_model->ativa($id);
            $this->load->template("pdt/ativa", $dados);
            $this->session->set_flashdata("success", "pdt ativo com sucesso");
            redirect("/");
        }

        //Carrega typografia e template de ativação
        $this->load->helper("typography");
    }

    public function excluir($id){
        $this->load->model("pdt_model");
        $produto = $this->pdt_model->busca($id);
        $dados = array("produto"=>$produto);

        $this->pdt_model->exclui($id);
        $this->session->set_flashdata("success", "pdt excluida com sucesso");
        redirect("/pdt");

        $this->load->helper("typography");
        $this->load->template("pdt/excluir", $dados);
    }


    public function form_editar($id){
        $this->load->model("pdt_model");
        $produto = $this->pdt_model->busca($id);
        $dados = array("produto"=>$produto);
        $this->load->template("pdt/editar", $dados);
        $this->load->helper("typography");
    }

    public function editar(){

        $produto_id = $this->input->post("produto_id");

        # Carrega a biblioteca de validação
        $this->load->library("form_validation");

        # Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
        $this->form_validation->set_rules("nome", "nome", "required|min_length[5]");

        # Configura para mensagens de erros aparecerem com essa configuração
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        #Roda validação
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            # Caso todas validações estejam corretas preparar dados e chamar modelo de atualização
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $this->load->model("pdt_model");
            $produto = array(
                "id" => $this->input->post("produto_id"),
                "nome" => $this->input->post("nome"),
                "content" => $this->input->post("content"),
                "data" => $this->input->post("data"),
                "setor" => $this->input->post("maquina_ou_local"),
                "maquina_ou_local" => $this->input->post("maquina_ou_local"),
                "funcionarios" => $this->input->post("funcionarios"),
                "usuario_id" => $usuarioLogado["id"]
            );
            $this->pdt_model->edita($produto);
            $this->session->set_flashdata("success", "pdt alterado com sucesso");
            redirect("/");
        }else{
            # Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
            $this->load->model("pdt_model");
            $produto = $this->pdt_model->busca($produto_id);
            $dados = array("produto"=>$produto);
            $this->load->template("pdt/editar", $dados);
            $this->load->helper("typography");
        }

    }

    /**
        Começa aqui processo de importação de procedimentos.
    **/

    public function importar(){
        $this->load->model("pdt_model");
        $this->load->helper("typography");
        $this->load->template("pdt/importar");
    }

    public function importar_novo(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|csv|doc|xls|pdf';
        $config['max_size']             = 4100;
        $config['max_wpdth']            = 2024;
        $config['max_height']           = 1568;

        $empresa_id = $_POST['empresa_id'];
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pdt/importar');
                $this->session->set_flashdata("danger", "ERRO: Por favor tente novamente.");
                redirect("/pdt/importar");
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->model("pdt_model");
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

            $this->pdt_model->salva_importacao($arquivo);
            $this->session->set_flashdata("success", "Sua importação foi realizada com sucesso");
            redirect("/pdt");
        }
    }

}
        