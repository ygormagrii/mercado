<?php

/**

SEMPRE ALTERAR A VERSÃO DO CONTROLLER migrations.php 
PARA QUE A MIGRATION SEJA RODADA

*/

class Migration_Cria_tabela_de_usuarios extends CI_migration {
	
	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
			 	'type' => 'INT',
			 	'auto_increment' => TRUE
			),
			'nome' => array(
				'type' => 'VARCHAR'
			),
			'email' => array(
				'type' => 'VARCHAR'
			),
			'senha' => array(
				'type' => 'VARCHAR'
			),
			'status' => array(
				'type' => 'VARCHAR'
			),
			'nivel' => array(
				'type' => 'VARCHAR'
			),
			'empresa_id' => array(	
				'type' => 'INT'
			)
		));
		#Adiciona id como chave primaria
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('usuarios');
	}

	public function down() {
		$this->dbforge->drop_table('usuarios');
	}
}