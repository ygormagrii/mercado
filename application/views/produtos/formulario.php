	<h1 class="text-center">Cadastro de Produtos</h1>

	<?php
	echo form_open("produtos/novo");

	echo form_label("Nome", "nome");
	?>
	<span data-toggle="tooltip" data-placement="top" title="O campo Nome nomeia o produto cadastrado"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<?php
	echo form_input(array(
	    "name" => "nome",
	    "class" => "form-control",
	    "id" => "nome",
	    "maxlength" => "255",
	    "value" => set_value("nome", "")
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome");

	?>
	<label>Tipo: </label>
	<span data-toggle="tooltip" data-placement="top" title="O campo Tipo identifica o cadastro coletivo ou individual do item"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
    <select name="tipo" id="tipo" class="form-control">
      <option value="Individual">Individual</option>
      <option value="Coletivo">Coletivo</option>
    </select>
    <?= form_error("tipo");?>

    <?php

	echo form_label("Quantidade Atual", "quantidade");
	?>
	<span data-toggle="tooltip" data-placement="top" title="O campo Quantidade atual é a quantidade atual em estoque do produto cadastrado"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<?php
	echo form_input(array(
	    "name" => "quantidade",
	    "class" => "form-control",
	    "id" => "quantidade",
	    "maxlength" => "255",
	    "type" => "number",
	    "value" => set_value("quantidade", "")
	));
	#Exibe mensagem de erros do campo
	echo form_error("quantidade");

	echo form_label("Quantidade Recomendada", "quantidade_recomendada");
	?>
	<span data-toggle="tooltip" data-placement="top" title="O campo Quantidade recomendada é a quantidade ideal que a empresa precisa ter em estoque deste item"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<?php
	echo form_input(array(
	    "name" => "quantidade_recomendada",
	    "class" => "form-control",
	    "id" => "quantidade_recomendada",
	    "maxlength" => "255",
	    "type" => "number",
	    "value" => set_value("quantidade_recomendada", "")
	));
	#Exibe mensagem de erros do campo
	echo form_error("quantidade_recomendada");

	echo form_textarea(array(
	    "name" => "descricao",
	    "class" => "form-control",
	    "id" => "descricao",
	    "value" => set_value("descricao", ""),
	    "placeholder" => "Descreva aqui o uso do dispositivo"
	));

	echo form_label("Nome do responsável", "nome_responsavel");
	?>
	<span data-toggle="tooltip" data-placement="top" title="O campo Nome do Responsável serve para identificar o responsável por controlar este item"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<?php
	echo form_input(array(
	    "name" => "nome_responsavel",
	    "class" => "form-control",
	    "id" => "nome_responsavel",
	    "maxlength" => "255",
	    "value" => set_value("nome_responsavel", "")
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome_responsavel");

	?>
	<br />
	<label>Carregue abaixo a imagem de seu dispositivo e detalhe a mesma caso queira:</label>

	<textarea name="content" id="editor"  rows="90" cols="80"></textarea>
	<br />
	<script>
	    ClassicEditor
	    .create( document.querySelector( '#editor' ), {
	        cloudServices: {
	            tokenUrl: 'https://16591.cke-cs.com/token/dev/3s5ahj74zZGkPOvvcf5PNDOUVIKBGUi2YT7GdXr0trkJyAMzQrp5H2kv34qU',
	            uploadUrl: 'https://16591.cke-cs.com/easyimage/upload/'
	        }
	    } )

	    .then( editor => {
	        console.log( editor );
	    } )
	    .catch( error => {
	        console.error( error );
	    } );
	        
	</script>
	<?php 
	#Exibe mensagem de erros do campo
	echo form_error("descricao");
	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-success",
	    "content" => "Cadastrar",
	    "type" => "submit"
	));

	?><a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a><?php
	
    echo form_close(); ?>