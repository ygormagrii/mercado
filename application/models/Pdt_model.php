<?php

class Pdt_model extends CI_Model {

    public function buscaTodos($empresa_id){
        return $this->db->get_where("pdt", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }
    
    public function buscaImportados($empresa_id){
        return $this->db->get_where("pdt_importados", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaID($usuario_id) {
        return $this->db->get_where("usuarios", array("id" => $usuario_id))->row_array();
    }

    public function salva($produto) {
        $this->db->insert("pdt", $produto);
        #echo "Aqui:".$this->db->last_query(); die;
    }

    public function exclui($id) {
        $this->db->where('id', $id);
        $this->db->delete("pdt");
    }

    public function edita($produto) {
        # Chamei o helper de array, peguei o valor id do array e faço o update na tabela
        $id_produto = element('id', $produto);
        $this->db->set($produto); 
        $this->db->where("id", $id_produto); 
        $this->db->update("pdt"); 
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function ativa($id) {
        $this->db->set('status', '1'); 
        $this->db->where("id", $id); 
        $this->db->update("pdt"); 
    }

    public function desativa($id) {
        $this->db->set('status', '0'); 
        $this->db->where("id", $id); 
        $this->db->update("pdt"); 
    }

    public function busca($id) {
        return $this->db->get_where("pdt", array("id" => $id))->row_array();
    }

    /** ESSA FUNÇÃO SALVA OS PROCEDIMENTOS IMPORTADOS **/
    public function salva_importacao($arquivo) {
        $this->db->insert("pdt_importados", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }   
}