<?php

class Dashboard_model extends CI_Model {

	public function buscaTodosProcedimentos($empresa_id){
		return $this->db->query("SELECT * FROM procedimentos WHERE status = '0' and empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

	public function buscaTodosIDT($empresa_id){
		return $this->db->query("SELECT * FROM idt WHERE status = '0' and empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaTodosProdutos($empresa_id){
		return $this->db->query("SELECT * FROM produtos WHERE status = '0' and empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaTodosAnalises($empresa_id){
		return $this->db->query("SELECT * FROM analises WHERE status = '0' and empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

 	public function busca($id) {
		return $this->db->get_where("clientes", array("id" => $id))->row_array();
	}

	public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }
	
}