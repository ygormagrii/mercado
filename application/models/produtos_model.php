<?php

class Produtos_model extends CI_Model {

	public function buscaTodos($empresa_id){
		return $this->db->get_where("produtos", array("empresa_id" => $empresa_id))->result_array();
	}
    
    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }
    
    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

	public function salva($produto) {
    	$this->db->insert("produtos", $produto);
 	}

 	public function exclui($id) {
    	$this->db->where('id', $id);
		$this->db->delete("produtos");
 	}

 	public function edita($produto) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('id', $produto);
    	$this->db->set($produto); 
    	$this->db->where("id", $id_produto); 
        $this->db->update("produtos"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
 	}

 	public function ativa($id) {
        $this->db->set('status', '1'); 
        $this->db->where("id", $id); 
        $this->db->update("produtos"); 
 	}

 	public function desativa($id) {
        $this->db->set('status', '0'); 
        $this->db->where("id", $id); 
        $this->db->update("produtos"); 
 	}

 	public function busca($id) {
		return $this->db->get_where("produtos", array("id" => $id))->row_array();
	}
	
}