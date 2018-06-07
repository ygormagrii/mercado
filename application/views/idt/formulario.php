<h1 class="text-center">Gerar Instruções de trabalho</h1>
	
	<?php 
	echo form_open("idt/novo");
	?>
	<label>Nome <span data-toggle="tooltip" data-placement="top" title="O campo Nome será utilizado para nomear esta Instrução de Trabalho dentro de nosso sistema e na documentação gerada"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
	<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
	<?= form_error("nome");?>
	<label>Data <span data-toggle="tooltip" data-placement="top" title="O campo Data será utilizado para identificar a data de geração desta Instrução de Trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
	<input type="date" name="data" value="" class="form-control" id="data" maxlength="255">
	<?= form_error("data");?>
	<label>Unidade <span data-toggle="tooltip" data-placement="top" title="O campo Unidade será utilizado para identificar a unidade de geração desta Instrução de Trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
	<input type="text" name="unidade" value="" class="form-control" id="unidade" maxlength="255">
	<?= form_error("unidade");?>
	<label>Local <span data-toggle="tooltip" data-placement="top" title="O campo Local será utilizado para identificar o local de geração desta Instrução de Trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
	<input type="text" name="local" value="" class="form-control" id="local" maxlength="255">
	<?= form_error("local");?>
	<label>Pontos de Bloqueio <span data-toggle="tooltip" data-placement="top" title="O campo Pontos de bloqueio será utilizado para identificar a quantidade de pontos à serem bloqueados neste procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
	<input type="text" name="pontos_bloqueio" value="" class="form-control" id="pontos_bloqueio" maxlength="255">
	<?= form_error("pontos_bloqueio");?>

	
	<table class="table table-bordered table-hover">
		<thead>
		  <tr>        
			<th>Revisão <span data-toggle="tooltip" data-placement="top" title="O campo Revisão será utilizado para identificar as revisões realizadas nesta Instrução de trabalho Ex: 01"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Descrição das Alterações <span data-toggle="tooltip" data-placement="top" title="O campo Descrição será utilizado para descrever a alteração realizada na Instrução de trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Data <span data-toggle="tooltip" data-placement="top" title="O campo Data será utilizado para controlar as datas das alterações"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Aprovação <span data-toggle="tooltip" data-placement="top" title="O campo Aprovação será utilizado para identificar o responsável por aprovar esta alteração Ex: Luiz Flaquer"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th> 
			
		  </tr>
		</thead>
		<tbody>
		 	
		  <tr>
			<td><input name="fname[]" type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		</tbody>
	  </table>
	</div>
</div>
<label>Descreva abaixo o processo de sua instrução de trabalho <span data-toggle="tooltip" data-placement="top" title="Abaixo descreva todas as etapas, instruções e observações necessárias para esta Instrução de Trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
<br />
<a href="<?= site_url("procedimentos/editar_image") ?>" target="_blank">Caso queira editar imagens de seu procedimento clique aqui</a>
<br /><br />
<style>
.ck-editor__editable {
    min-height: 400px;
}
</style>
<textarea name="content" id="editor"  rows="10000" cols="8000"></textarea>
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