<?php

class Idt_model extends CI_Model {

	public function buscaTodos($empresa_id){
		return $this->db->get_where("idt", array("empresa_id" => $empresa_id))->result_array();
	}

    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

    public function buscaImportados($empresa_id){
        return $this->db->get_where("idt_importados", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

	public function salva($produto) {
    	$this->db->insert("idt", $produto);
        #echo "Aqui:".$this->db->last_query(); die;
 	}

 	public function exclui($id) {
    	$this->db->where('id', $id);
		$this->db->delete("idt");
 	}

    public function exclui_importados($id) {
        $this->db->where('id', $id);
        $this->db->delete("idt_importados");
    }

 	public function edita($produto) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('id', $produto);
    	$this->db->set($produto); 
    	$this->db->where("id", $id_produto); 
        $this->db->update("idt"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
 	}

 	public function ativa($id) {
        $this->db->set('status', '1'); 
        $this->db->where("id", $id); 
        $this->db->update("idt"); 
 	}

 	public function desativa($id) {
        $this->db->set('status', '0'); 
        $this->db->where("id", $id); 
        $this->db->update("idt"); 
 	}

 	public function busca($id) {
		return $this->db->get_where("idt", array("id" => $id))->row_array();
	}

    public function buscai($id) {
        return $this->db->get_where("idt_importados", array("id" => $id))->row_array();
    }

    /** ESSA FUNÇÃO SALVA OS PROCEDIMENTOS IMPORTADOS **/
    public function salva_importacao($arquivo) {
        $this->db->insert("idt_importados", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }	
}