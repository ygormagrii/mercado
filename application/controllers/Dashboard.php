<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){

		$this->load->model("dashboard_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
        $usuario_id = $usuarioLogado["id"];
        $empresa_id = $this->dashboard_model->buscaID($usuario_id);

        if($empresa_id == NULL):
        	$procedimentos = "";
        	$idts = "";
        	$dispositivos = "";
        	$analises = "";
		else:
			$procedimentos = $this->dashboard_model->buscaTodosProcedimentos($empresa_id["empresa_id"]);
			$idts = $this->dashboard_model->buscaTodosIDT($empresa_id["empresa_id"]);
			$dispositivos = $this->dashboard_model->buscaTodosProdutos($empresa_id["empresa_id"]);
			$analises = $this->dashboard_model->buscaTodosAnalises($empresa_id["empresa_id"]);
		endif;

		$dados = array("procedimentos" => $procedimentos, "idts" => $idts, "dispositivos" => $dispositivos, "analises" => $analises);
		
		$this->load->helper(array("currency"));
		$this->load->template("dashboard/index.php", $dados);
	}

}
		