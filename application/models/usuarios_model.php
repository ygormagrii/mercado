<?php

class Usuarios_model extends CI_Model {

    public function salva($usuarios) {
        $this->db->insert("usuarios", $usuarios);
        $last_id = $this->db->insert_id();
        return $this->db->get_where("usuarios", array("id" => $last_id))->row_array();
        #echo $this->db->last_query(); die;
    }

    public function buscaBloqueio($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

    public function salvaNivel($nivel_acessos) {
        $this->db->insert("nivel", $nivel_acessos);
        #echo $this->db->last_query(); die;
    }

    public function buscaTodos($empresa_id){
        return $this->db->get_where("usuarios", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

    public function busca($id) {
        return $this->db->get_where("usuarios", array("id" => $id))->row_array();
    }

    public function buscaNivel($id) {
        return $this->db->get_where("nivel", array("usuario_id" => $id))->row_array();
        #echo $this->db->last_query(); die;
    }   

    public function buscaPorEmailESenha($email, $senha) {

    	// row_array para trazer somente a primeira linha dos resultados
    	$this->db->where("email", $email);
    	$this->db->where("senha", $senha);
    	$usuario = $this->db->get("usuarios")->row_array();
    	return $usuario;
    }

    public function trocasenha($usuarios) {

        // Pego aqui com element os dados do array enviado pelo controller
        $id = element('id', $usuarios);
        $senha = element('senha', $usuarios);

        $this->db->set('senha', md5($senha)); 
        $this->db->where("id", $id); 
        $this->db->update("usuarios"); 

        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function edita($produto) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('id', $produto);
        $this->db->set($produto); 
        $this->db->where("id", $id_produto); 
        $this->db->update("usuarios"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function editaNivel($nivel_acessos) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('usuario_id', $nivel_acessos);
        $this->db->set($nivel_acessos); 
        $this->db->where("usuario_id", $id_produto); 
        $this->db->update("nivel"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function exclui($id) {
        $this->db->where('id', $id);
        $this->db->delete("usuarios");
    }
}

