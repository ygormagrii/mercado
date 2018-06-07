<h1 class="text-center">Gerar Permissão de trabalho</h1>
	
	<?php 
	echo form_open("pdt/novo");
	?>
	<label>Nome:</label>
	<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
	<?= form_error("nome");?>
	<label>Data:</label>
	<input type="date" name="data" value="" class="form-control" id="data" maxlength="255">
	<?= form_error("data");?>
	<label>Setor:</label>
	<input type="text" name="setor" value="" class="form-control" id="setor" maxlength="255">
	<?= form_error("setor");?>
	<label>Máquina ou Local:</label>
	<input type="text" name="maquina_ou_local" value="" class="form-control" id="maquina_ou_local" maxlength="255">

	<label>Funcionários envolvidos:</label>
	<input type="text" name="funcionarios" value="" class="form-control" id="funcionarios" maxlength="255">
	<?= form_error("funcionarios");?>
	</div>
</div>
<br />
<label>Descreva abaixo o processo de sua permissão de trabalho:</label>

<textarea name="content" id="editor"  rows="10" cols="80">
	<h4>Descreva aqui os procedimentos que devem ser seguidos para essa permissão de trabalho:</h4>
	<ul>
		<li>Etapa 1</li>
		<p>TESTE TESTE TESTE TESTE</p>
		<li>Etapa 2</li>
		<li>Etapa 3</li>
		<li>Etapa 4</li>
		<li>Etapa 5</li>
	</ul>
</textarea>
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

	echo form_button(array(
	    "class" => "btn btn-success",
	    "content" => "Gerar Analise de Risco",
	    "type" => "submit"
	));

	?><a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a><?php

	echo form_close();
?>