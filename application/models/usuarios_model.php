<?php

class Usuarios_model extends CI_Model {
    public function salva($usuario) {
        $this->db->insert("usuarios", $usuario);
    }

    public function buscaPorEmailESenha($email, $senha) {

    	// row_array para trazer somente a primeira linha dos resultados
    	$this->db->where("email", $email);
    	$this->db->where("senha", $senha);
    	$usuario = $this->db->get("usuarios")->row_array();
    	return $usuario;
    }
}

