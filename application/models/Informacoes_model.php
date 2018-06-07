<?php

class Informacoes_model extends CI_Model {

	public function buscaTodos($empresa_id){
		  return $this->db->get_where("informacoes", array("empresa_id" => $empresa_id))->result_array();
          #echo $this->db->last_query(); die;
	}

    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("informacoes", array("usuario_id" => $usuario_id))->row_array();
        #echo $this->db->last_query(); die;
    }

	public function salva($informacoes) {
    	$this->db->insert("informacoes", $informacoes);
 	}

    public function salvaUsuario($ed_inserido, $usuario_id) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $this->db->set("empresa_id", $ed_inserido); 
        $this->db->where("id", $usuario_id); 
        $this->db->update("usuarios"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

 	public function edita($informacoes) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_info = element('usuario_id', $informacoes);
    	$this->db->set($informacoes); 
    	$this->db->where("usuario_id", $id_info); 
        $this->db->update("informacoes"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
 	}
	
}