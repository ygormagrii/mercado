<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_loader{

	// Caso dados não tenha valor informamos valor vazio para ele
	public function template($nome, $dados = array()){
		$this->view("cabecalho.php");
		$this->view($nome, $dados);
		$this->view("rodape.php");
	}

}