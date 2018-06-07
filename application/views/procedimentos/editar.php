<h1 class="text-center">Edição de Produtos</h1>

	<?php

	echo form_open("procedimentos/editar");

	echo form_label("Nome", "nome");
	echo form_input(array(
	    "name" => "nome",
	    "class" => "form-control",
	    "id" => "nome",
	    "maxlength" => "255",
	    "value" => set_value("nome", $procedimentos["nome"])
	));
	#Exibe mensagem de erros do campo	
	echo form_error("procedimentos");

	echo form_label("Tipo", "tipo");
	echo form_input(array(
	    "name" => "tipo",
	    "class" => "form-control",
	    "id" => "tipo",
	    "maxlength" => "255",
	    "type" => "number",
	    "value" => set_value("tipo", $procedimentos["tipo"])
	));

	#Exibe mensagem de erros do campo
	echo form_error("tipo");

	echo form_textarea(array(
	    "name" => "descricao",
	    "class" => "form-control",
	    "id" => "descricao",
	    "value" => set_value("descricao", $procedimentos["descricao"])
	));
	#Exibe mensagem de erros do campo
	echo form_error("descricao");

	echo form_hidden('id', $procedimentos["id"]);
	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-primary",
	    "content" => "Salvar edição",
	    "type" => "submit"
	));

	echo form_close();


?>