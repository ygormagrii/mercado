<html>
<head>
    <link rel="stylesheet" href="<?=base_url('css/bootstrap.css')?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
</head>
<body>
    <div class="container">

    		<h1 class="text-center">Cadastro de Produtos</h1>

			<?php
			echo form_open("produtos/novo");

			echo form_label("Nome", "nome");
			echo form_input(array(
			    "name" => "nome",
			    "class" => "form-control",
			    "id" => "nome",
			    "maxlength" => "255",
			    "value" => set_value("nome", "")
			));
			#Exibe mensagem de erros do campo	
			echo form_error("nome");

			echo form_label("Preco", "preco");
			echo form_input(array(
			    "name" => "preco",
			    "class" => "form-control",
			    "id" => "preco",
			    "maxlength" => "255",
			    "type" => "number",
			    "value" => set_value("preco", "")
			));
			#Exibe mensagem de erros do campo
			echo form_error("preco");

			echo form_textarea(array(
			    "name" => "descricao",
			    "class" => "form-control",
			    "id" => "descricao",
			    "value" => set_value("descricao", "")
			));
			#Exibe mensagem de erros do campo
			echo form_error("descricao");

			echo form_button(array(
			    "class" => "btn btn-primary",
			    "content" => "Cadastrar",
			    "type" => "submit"
			));




			echo form_close();


			?>
	</div>

</body>
</html>