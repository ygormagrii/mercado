<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function index() {

        $this->load->model("usuarios_model");
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->usuarios_model->buscaID($usuario_id);
        $nivel = $this->usuarios_model->buscaBloqueio($usuario_id);
        $usuarios = $this->usuarios_model->buscaTodos($empresa_id["empresa_id"]);
        $dados = array("usuarios" => $usuarios, "nivel" => $nivel);

        $this->load->template("usuarios/index.php", $dados);

    }

	public function novo() {
        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );
        $this->load->model("usuarios_model");
        $this->usuarios_model->salva($usuario);
        $this->load->template("usuarios/novo");
	}

    public function formulario(){
        $this->load->model("usuarios_model");   
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->usuarios_model->buscaID($usuario_id);

        $usuarios = $this->usuarios_model->buscaTodos($empresa_id["empresa_id"]);
        $dados = array("usuarios" => $usuarios);

        $this->load->template("usuarios/formulario", $dados);
    }

    public function cadastra(){

        # Carrega a biblioteca de validação
        $this->load->library("form_validation");

        # Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("email", "email", "required|min_length[5]");
        $this->form_validation->set_rules("senha", "senha", "required");
        $this->form_validation->set_rules("status", "status", "required");

        # Configura para mensagens de erros aparecerem com essa configuração
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        #Roda validação
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $this->load->model("usuarios_model");

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $usuario_id = $usuarioLogado["id"];
            $empresa_id = $this->usuarios_model->buscaID($usuario_id);

            $usuarios = array(
                "nome" => $this->input->post("nome"),
                "email" => $this->input->post("email"),
                "senha" => md5($this->input->post("senha")),
                "status" => $this->input->post("status"),
                "foto" => $this->input->post("foto"),
                "cod" => $this->input->post("cod"),
                "empresa_id" => $empresa_id["empresa_id"],
                "nivel" => "1"
            );

            $salva = $this->usuarios_model->salva($usuarios);

            // Inicia processo de níveis de acesso

            $procedimentos = $this->input->post("procedimentos");
            $idt = $this->input->post("idt");
            $dispositivos = $this->input->post("dispositivos");
            $pdt = $this->input->post("pdt");
            $analise = $this->input->post("analise");
            $auditorias = $this->input->post("auditorias");
            $treinamentos = $this->input->post("treinamentos");
            $usuarios_n = $this->input->post("usuarios");
            $informacoes = $this->input->post("informacoes");

            if($procedimentos == NULL){$procedimentos = "0";}
            if($idt == NULL){$idt = "0";}
            if($dispositivos == NULL){$dispositivos = "0";}
            if($pdt == NULL){$pdt = "0";}
            if($analise == NULL){$analise = "0";}
            if($auditorias == NULL){$auditorias = "0";}
            if($treinamentos == NULL){$treinamentos = "0";}
            if($usuarios_n == NULL){$usuarios_n = "0";}
            if($informacoes == NULL){$informacoes = "0";}

            $nivel_acessos = array(
                "procedimentos" => $procedimentos,
                "idt" => $idt,
                "dispositivos" => $dispositivos,
                "pdt" => $pdt,
                "analise" => $analise,
                "auditorias" => $auditorias,
                "treinamentos" => $treinamentos,
                "usuarios" => $usuarios_n,
                "informacoes" => $informacoes,
                "usuario_id" => $salva["id"]
            );
            
            $this->usuarios_model->salvaNivel($nivel_acessos);
            $this->session->set_flashdata("success", "Usuário salvo com sucesso");
            redirect("/usuarios");
        }else{
            $this->session->set_flashdata("danger", "Oops, encontramos algum problema. Tente novamente");
            $this->load->template("usuarios/formulario");
        }
    }

    public function form_editar($id){
        $this->load->model("usuarios_model");
        $produto = $this->usuarios_model->busca($id);
        $nivel = $this->usuarios_model->buscaNivel($id);

        $dados = array("produto"=>$produto, "nivel"=>$nivel);
        #print_r($dados); die();
        $this->load->template("usuarios/editar", $dados);
        $this->load->helper("typography");
    }


    public function editar(){

        $produto_id = $this->input->post("id");

        # Carrega a biblioteca de validação
        $this->load->library("form_validation");

        # Campo nome como obrigatório e tamanho min 5caracteres, descricao tamanho min 10caracteres, preco required
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("senha", "senha", "required");

        # Configura para mensagens de erros aparecerem com essa configuração
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        #Roda validação
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            # Caso todas validações estejam corretas preparar dados e chamar modelo de atualização
             $this->load->model("usuarios_model");

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $usuario_id = $usuarioLogado["id"];
            $empresa_id = $this->usuarios_model->buscaID($usuario_id);
           
            $senha = md5($this->input->post("senha"));
            $produto = array(
                "nome" => $this->input->post("nome"),
                "email" => $this->input->post("email"),
                "senha" => $senha,
                "foto" => $this->input->post("foto"),
                "cod" => $this->input->post("cod"),
                "status" => $this->input->post("status"),
                "id" => $this->input->post("id"),
                "empresa_id" => $empresa_id["empresa_id"],
                "nivel" => "1"
            );

            // Inicia processo de níveis de acesso

            $procedimentos = $this->input->post("procedimentos");
            $idt = $this->input->post("idt");
            $dispositivos = $this->input->post("dispositivos");
            $pdt = $this->input->post("pdt");
            $analise = $this->input->post("analise");
            $auditorias = $this->input->post("auditorias");
            $treinamentos = $this->input->post("treinamentos");
            $usuarios_n = $this->input->post("usuarios");
            $informacoes = $this->input->post("informacoes");

            if($procedimentos == NULL){$procedimentos = "0";}
            if($idt == NULL){$idt = "0";}
            if($dispositivos == NULL){$dispositivos = "0";}
            if($pdt == NULL){$pdt = "0";}
            if($analise == NULL){$analise = "0";}
            if($auditorias == NULL){$auditorias = "0";}
            if($treinamentos == NULL){$treinamentos = "0";}
            if($usuarios_n == NULL){$usuarios_n = "0";}
            if($informacoes == NULL){$informacoes = "0";}

            $nivel_acessos = array(
                "procedimentos" => $procedimentos,
                "idt" => $idt,
                "dispositivos" => $dispositivos,
                "pdt" => $pdt,
                "analise" => $analise,
                "auditorias" => $auditorias,
                "treinamentos" => $treinamentos,
                "usuarios" => $usuarios_n,
                "informacoes" => $informacoes,
                "usuario_id" => $this->input->post("id")
            );

            $this->usuarios_model->editaNivel($nivel_acessos);
            $this->usuarios_model->edita($produto);
            $this->session->set_flashdata("success", "Usuário alterado com sucesso");
            redirect("/usuarios");
        }else{
            # Caso algum dado esteja errado enviar o cliente de volta para a tela de edição
            $this->load->model("usuarios_model");
            $produto = $this->usuarios_model->busca($produto_id);
            $dados = array("produto"=>$produto);
            $this->load->template("usuarios/editar", $dados);
            $this->load->helper("typography");
        }

    }



    public function formulario_senha($id){
        $this->load->model("usuarios_model");
        $usuarios = $this->usuarios_model->busca($id);
        $dados = array(
            "id" => $id
        );
        $this->load->template("usuarios/formulario_senha", $dados);
    }

    public function trocasenha() {

        # Carrega a biblioteca de validação
        $this->load->library("form_validation");

        $this->form_validation->set_rules("senha", "senha", "required");

        # Configura para mensagens de erros aparecerem com essa configuração
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        #Roda validação
        $sucesso = $this->form_validation->run();

        if($sucesso) {

            $this->load->model("usuarios_model");
            $usuarios = array(
                "senha" => $this->input->post("senha"),
                "id" => $this->input->post("id")
            );

            $this->usuarios_model->trocasenha($usuarios);

            $this->session->set_flashdata("success", "Senha trocada com sucesso");
            redirect("/usuarios");
        }else{

            # Como teve algum problema de validação, eu pego o ID do usuário coloco no array e chamo o form novamente
            $id = $this->input->post("id");
            $dados = array(
                "id" => $id
            );
            $this->load->template("usuarios/formulario_senha", $dados);
        }
    }

    public function excluir($id){
        $this->load->model("usuarios_model");
        $usuarios = $this->usuarios_model->busca($id);
        $dados = array("usuarios"=>$usuarios);

        $this->usuarios_model->exclui($id);
        $this->session->set_flashdata("success", "Usuário excluido com sucesso");
        redirect("/usuarios");

        $this->load->helper("typography");
        $this->load->template("usuarios/excluir", $dados);
    }
   
}