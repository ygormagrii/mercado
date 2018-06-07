<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login Extends CI_Controller{
	public function autenticar() {
		
		$this->load->model("usuarios_model");	
		$email = $this->input->post("email");
		$nome = $this->input->post("nome");
		$senha = md5($this->input->post("senha"));
		$usuario = $this->usuarios_model->buscaPorEmailESenha($email, $senha);

		if($usuario) {
			$this->session->set_userdata(array("usuario_logado" => $usuario));
			$user_data = $this->session->userdata('usuario_logado');
			$nome = $user_data['nome'];
			$nivel = $user_data['nivel'];
			$empresa_id = $user_data['empresa_id'];
			$foto = $user_data['foto'];
			$this->session->set_flashdata("success", "Logado com sucesso! Seja bem-vindo(a) ".$nome);
			redirect("/");
			
		}else {
			$this->session->set_flashdata("danger", "Usuário ou senha inválidos");
			redirect("/");
		}

	}

	public function logout() {
        $this->session->unset_userdata("usuario_logado");
        $this->session->set_flashdata("success", "Deslogado com sucesso");
        redirect("/");
    }

}
