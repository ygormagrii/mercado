<h1 class="text-center">Abertura de Tickets</h1>

	<?php
	echo form_open("atendimento/novo");

	echo form_label("Título do chamado", "titulo");
	echo form_input(array(
	    "name" => "titulo",
	    "class" => "form-control",
	    "id" => "titulo",
	    "maxlength" => "255",
	    "value" => set_value("titulo", "")
	));
	#Exibe mensagem de erros do campo	
	echo form_error("titulo");

	echo form_label("Relate seu problema abaixo", "descricao");
	echo form_textarea(array(
	    "name" => "descricao",
	    "class" => "form-control",
	    "id" => "descricao",
	    "value" => set_value("descricao", "")
	));
	#Exibe mensagem de erros do campo
	echo form_error("descricao");
	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-primary",
	    "content" => "Abrir ticket",
	    "type" => "submit"
	));

	echo form_close();


?>