<?php

class Treinamentos_model extends CI_Model {

	public function buscaTodosProcedimentos($empresa_id){

		//SELECT * FROM procedimentos_importados WHERE empresa_id = $empresa_id

		$this->db->select('id, empresa_id, nome');
		$this->db->from('procedimentos');
		$this->db->where('empresa_id', $empresa_id);

		$query1 = $this->db->get();
		return $query1->result_array();		
		#echo $this->db->last_query(); die;
	}

	public function buscaTodosProcedimentosImportados($empresa_id){
		$this->db->select('id, empresa_id, nome');
		$this->db->from('procedimentos_importados');
		$this->db->where('empresa_id', $empresa_id);
		
		$query2 = $this->db->get();
		return $query2->result_array();
	}

	public function buscaInstrucoes($empresa_id){
		return $this->db->query("SELECT * FROM idt WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaInstrucoesImportados($empresa_id){
		return $this->db->query("SELECT * FROM idt_importados WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaDispositivos($empresa_id){
		return $this->db->query("SELECT * FROM produtos WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaAuditorias($empresa_id){
		return $this->db->query("SELECT * FROM auditorias WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaAuditoriasImportadas($empresa_id){
		return $this->db->query("SELECT * FROM auditorias_importados WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaPdt($empresa_id){
		return $this->db->query("SELECT * FROM pdt WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaAnalises($empresa_id){
		return $this->db->query("SELECT * FROM analises WHERE empresa_id = $empresa_id")->result_array();
		#echo $this->db->last_query(); die;
	}

	public function buscaNivel($usuario_id){
        return $this->db->get_where("nivel", array("usuario_id" => $usuario_id))->result_array();
    }

	public function buscaTreinamentos($empresa_id){
        return $this->db->get_where("treinamentos", array("empresa_id" => $empresa_id))->result_array();
        echo $this->db->last_query(); die;
    }

    public function buscaTipoTreinamentos($empresa_id){
        return $this->db->get_where("tipo_treinamentos", array("empresa_id" => $empresa_id))->result_array();
    }

    public function buscaUsuarios($empresa_id){
        return $this->db->get_where("usuarios", array("empresa_id" => $empresa_id))->result_array();
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
		return $this->db->get_where("treinamentos", array("id" => $id))->row_array();
	}

	public function exclui($id) {
    	$this->db->where('id', $id);
		$this->db->delete("treinamentos");
 	}
	

	/** ESSA FUNÇÃO SALVA OS TREINAMENTOS INICIADAS **/
    public function salva_treinamento($arquivo, $procedimento_id) {


        $this->db->set('status_treinamento', '1');
        $this->db->where("id", $procedimento_id); 
        $this->db->update("procedimentos"); 

        $this->db->set('status_treinamento', '1');
        $this->db->where("id", $procedimento_id); 
        $this->db->update("procedimentos_importados"); 

        $this->db->insert("treinamentos", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    public function salva_tipo_treinamento($arquivo) {

        $this->db->insert("tipo_treinamentos", $arquivo);
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }

    /** ESSA FUNÇÃO SALVA OS TREINAMENTOS IMPORTADOS **/
    public function salva_importacao($arquivo, $treinamentos_id) {
        $this->db->set($arquivo);
		$this->db->where('id', $treinamentos_id);
		$this->db->update('treinamentos');
        #PARA DEBUGAR
        #echo $this->db->last_query(); die;
    }	
	
	public function buscaImportados($empresa_id){
        return $this->db->get_where("treinamentos", array("empresa_id" => $empresa_id))->result_array();
    }

}