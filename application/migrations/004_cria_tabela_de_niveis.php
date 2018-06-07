<?php

/**

SEMPRE ALTERAR A VERSÃO DO CONTROLLER migrations.php 
PARA QUE A MIGRATION SEJA RODADA

*/

class Migration_Cria_tabela_de_niveis extends CI_migration {
	
	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
			 	'type' => 'INT',
			 	'auto_increment' => TRUE
			),
			'nivel' => array(
				'type' => 'VARCHAR'
			)
		));
		#Adiciona id como chave primaria
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('niveis');
	}

	public function down() {
		$this->dbforge->drop_table('niveis');
	}
}