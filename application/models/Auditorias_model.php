<?php

class Auditorias_model extends CI_Model {

	public function buscaTodosProcedimentos(){
		return $this->db->query("SELECT * FROM procedimentos WHERE status = '0'")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

    public function buscaAuditorias($empresa_id){
    	$this->db->select('*');
		$this->db->from('auditorias');
		$this->db->join('auditorias_importados', 'auditorias.id = auditorias_importados.auditoria_id');
		$this->db->where('auditorias.empresa_id', $empresa_id);
		$query = $this->db->get();
		return $query->result_array();
        
        echo $this->db->last_query(); die;

        //return $this->db->get_where("auditorias", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

	public function buscaTodosIDT(){
		return $this->db->query("SELECT * FROM idt WHERE status = '0'")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaTodosProdutos(){
		return $this->db->query("SELECT * FROM produtos WHERE status = '0'")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaTodosAnalises(){
		return $this->db->query("SELECT * FROM analises WHERE status = '0'")->result_array();
		#echo $this->db->last_query(); die;
	}

 	public function busca($id) {
		return $this->db->get_where("clientes", array("id" => $id))->row_array();
	}

	/** ESSA FUNÇÃO SALVA OS PROCEDIMENTOS IMPORTADOS **/
    public function salva_importacao($arquivo) {
        $this->db->insert("auditorias_importados", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }	
	
	public function buscaImportados($empresa_id){
        return $this->db->get_where("auditorias_importados", array("empresa_id" => $empresa_id))->result_array();
    }
}