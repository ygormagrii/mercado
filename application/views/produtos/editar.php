<h1 class="text-center">Edição de Produtos</h1>

	<?php

	echo form_open("produtos/editar");

	echo form_label("Nome", "nome");
	echo form_input(array(
	    "name" => "nome",
	    "class" => "form-control",
	    "id" => "nome",
	    "maxlength" => "255",
	    "value" => set_value("nome", $produto["nome"])
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome");

	echo form_label("Tipo", "tipo");
	echo form_input(array(
	    "name" => "tipo",
	    "class" => "form-control",
	    "id" => "tipo",
	    "maxlength" => "255",
	    "value" => set_value("tipo", $produto["tipo"])
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome");


	echo form_label("Quantidade", "quantidade");
	echo form_input(array(
	    "name" => "quantidade",
	    "class" => "form-control",
	    "id" => "quantidade",
	    "maxlength" => "255",
	    "type" => "number",
	    "value" => set_value("quantidade", $produto["quantidade"])
	));

	#Exibe mensagem de erros do campo
	echo form_error("quantidade");

	echo form_label("Quantidade Recomendada", "quantidade_recomendada");
	echo form_input(array(
	    "name" => "quantidade_recomendada",
	    "class" => "form-control",
	    "id" => "quantidade_recomendada",
	    "maxlength" => "255",
	    "type" => "number",
	    "value" => set_value("quantidade_recomendada", $produto["quantidade_recomendada"])
	));
	#Exibe mensagem de erros do campo
	echo form_error("quantidade_recomendada");

    echo form_label("Nome do responsável", "nome_responsavel");
	echo form_input(array(
	    "name" => "nome_responsavel",
	    "class" => "form-control",
	    "id" => "nome_responsavel",
	    "maxlength" => "255",
	    "value" => set_value("nome_responsavel", $produto["nome_responsavel"])
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome_responsavel");

	echo form_textarea(array(
	    "name" => "descricao",
	    "class" => "form-control",
	    "id" => "descricao",
	    "value" => set_value("descricao", $produto["descricao"])
	));
	#Exibe mensagem de erros do campo
	echo form_error("descricao");


	echo form_label("Status", "status");
	if($produto["status"] == '1'){
		# Caso status = 1 chamar options ativo
		$options = array(
        	'1'         => 'Ativo',
        	'0'           => 'Inativo',
		);
	}else{
		# Caso status = 0 chamar options inativo
		$options = array(
        	'0'         => 'Inativo',
        	'1'           => 'Ativo',
		);
	}
	echo form_dropdown( "status", $options, "", 'class="form-control" id="status"');

	?>

	<?php

	echo form_hidden('produto_id', $produto["id"]);

	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-success",
	    "content" => "Salvar edição",
	    "type" => "submit"
	));

	?><a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a><?php

	echo form_close();


?>