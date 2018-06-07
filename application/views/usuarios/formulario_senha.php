<h1 class="text-center">Criando novo usuário</h1>

	<?php

	echo form_open("usuarios/trocasenha");

	echo form_label("Senha", "senha");
	echo form_input(array(
	    "name" => "senha",
	    "class" => "form-control",
	    "id" => "senha",
	    "value" => set_value("senha", "")
	));

	#Exibe mensagem de erros do campo
	echo form_error("senha");

	echo form_hidden('id', $id);


	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-primary",
	    "content" => "Trocar senha",
	    "type" => "submit"
	));

	echo form_close();


?>