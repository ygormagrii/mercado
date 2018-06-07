<?php

/**

SEMPRE ALTERAR A VERSÃO DO CONTROLLER migrations.php 
PARA QUE A MIGRATION SEJA RODADA

*/

class Migration_Cria_tabela_de_informacoes extends CI_migration {
	
	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
			 	'type' => 'INT',
			 	'auto_increment' => TRUE
			),
			'endereco' => array(
				'type' => 'VARCHAR'
			),
			'complemento' => array(
				'type' => 'VARCHAR'
			),
			'cidade' => array(
				'type' => 'VARCHAR'
			),
			'estado' => array(
				'type' => 'VARCHAR'
			),
			'cep' => array(
				'type' => 'VARCHAR'
			),
			'pais' => array(
				'type' => 'VARCHAR'
			),
			'cnpj' => array(
				'type' => 'VARCHAR'
			),
			'telefone' => array(
				'type' => 'VARCHAR'
			),
			'celular' => array(
				'type' => 'VARCHAR'
			),
			'email' => array(
				'type' => 'VARCHAR'
			),
			'usuario_id' => array(
				'type' => 'INT'
			)
		));
		#Adiciona id como chave primaria
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('informacoes');
	}

	public function down() {
		$this->dbforge->drop_table('informacoes');
	}
}