<h1 class="text-center">Gerar Instruções de trabalho</h1>
	
	<?php 
	echo form_open("idt/novo");
	?>
	<label>Nome:</label>
	<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">

	<label>Data</label>
	<input type="date" name="data" value="" class="form-control" id="data" maxlength="255">
	
	<table class="table table-bordered table-hover">
		<thead>
		  <tr>        
			<th>Revisão</th>
			<th>Descrição das Alterações</th>
			<th>Data</th>
			<th>Aprovação</th> 
			
		  </tr>
		</thead>
		<tbody>
		 	
		  <tr>
			<td><input name="fname[]" type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		</tbody>
	  </table>
	</div>
</div>
<label>Descreva abaixo o processo de sua instrução de trabalho:</label>
<br />
<a href="<?= site_url("procedimentos/editar_image") ?>" target="_blank">Caso queira editar imagens de seu procedimento clique aqui</a>
<br /><br />
<textarea name="content" id="editor"  rows="10" cols="80">Descreva abaixo o processo de sua instrução de trabalho:</textarea>
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
	    "class" => "btn btn-primary",
	    "content" => "Gerar Analise de Risco",
	    "type" => "submit"
	));

	echo form_close();
?>