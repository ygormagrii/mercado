<?php

class Procedimentos_model extends CI_Model {

	public function buscaTodos($empresa_id){
		return $this->db->get_where("procedimentos", array("empresa_id" => $empresa_id))->result_array();
	}

    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

    public function buscaTipoTreinamentos($empresa_id){
        return $this->db->get_where("tipo_treinamentos", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaUsuarios($empresa_id){
        return $this->db->get_where("usuarios", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaImportados($empresa_id){
        return $this->db->get_where("procedimentos_importados", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

	public function salva($procedimentos) {
    	$this->db->insert("procedimentos", $procedimentos);
 	}

 	public function exclui($id) {
    	$this->db->where('id', $id);
		$this->db->delete("procedimentos");
 	}

    public function exclui_importados($id) {
        $this->db->where('id', $id);
        $this->db->delete("procedimentos_importados");
    }

 	public function edita($procedimentos) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('id', $procedimentos);
    	$this->db->set($procedimentos); 
    	$this->db->where("id", $id_produto); 
        $this->db->update("procedimentos"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
 	}

 	public function ativa($id) {
        $this->db->set('status', '1'); 
        $this->db->where("id", $id); 
        $this->db->update("procedimentos"); 
 	}

 	public function desativa($id) {
        $this->db->set('status', '0'); 
        $this->db->where("id", $id); 
        $this->db->update("procedimentos"); 
 	}

 	public function busca($id) {
		return $this->db->get_where("procedimentos", array("id" => $id))->row_array();
	}

    public function buscai($id) {
        return $this->db->get_where("procedimentos_importados", array("id" => $id))->row_array();
    }

    /** ESSA FUNÇÃO SALVA OS PROCEDIMENTOS IMPORTADOS **/
    public function salva_importacao($arquivo) {
        $this->db->insert("procedimentos_importados", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }
    
    /** ESSA FUNÇÃO SALVA AS AUDITORIAS INICIADAS **/
    public function salva_auditoria($arquivo, $procedimento_id) {


        $this->db->set('status_auditoria', '1');
        $this->db->where("id", $procedimento_id); 
        $this->db->update("procedimentos"); 

        $this->db->insert("auditorias", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    /** ESSA FUNÇÃO SALVA OS TREINAMENTOS INICIADAS **/
    public function salva_treinamento($arquivo, $procedimento_id) {


        $this->db->set('status_treinamento', '1');
        $this->db->where("id", $procedimento_id); 
        $this->db->update("procedimentos"); 

        $this->db->insert("treinamentos", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function salva_tipo_treinamento($arquivo) {

        $this->db->insert("tipo_treinamentos", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }
	
}