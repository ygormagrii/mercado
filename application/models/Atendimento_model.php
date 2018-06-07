<?php

class Atendimento_model extends CI_Model {

	public function buscaTodos($empresa_id){
        return $this->db->get_where("atendimento", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }
    
    public function buscaID($usuario_id) {
        return $this->db->get_where("atendimento", array("id" => $usuario_id))->row_array();
    }

	public function salva($atendimento) {
    	$this->db->insert("atendimento", $atendimento);
 	}

 	public function exclui($id) {
    	$this->db->where('id', $id);
		$this->db->delete("atendimento");
 	}

 	public function busca($id) {
		return $this->db->get_where("atendimento", array("id" => $id))->row_array();
	}
	
}