<h1 class="text-center">Cadastro de Análise de Risco</h1>
	
	<?php 
	echo form_open("analises/novo");
	?>
	<label>Nome:</label>
	<span data-toggle="tooltip" data-placement="top" title="O campo Nome nomeia a Análise de risco no sistema e no documento final gerado"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
	<?= form_error("nome");?>
	<label>Data:</label>
	<span data-toggle="tooltip" data-placement="top" title="O campo Data será utilizado para identificar a data de geração deste procedimento no sistema"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
	<input type="date" name="data" value="" class="form-control" id="data" maxlength="255">
	<?= form_error("data");?>
	<table class="table table-bordered table-hover">
		<thead>
		  <tr>        
			<th>Etapas do trabalho <span data-toggle="tooltip" data-placement="top" title="O campo Etapas do trabalho deve ser preenchido com os tópicos do processo que envolvem essa Análise de risco"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Riscos <span data-toggle="tooltip" data-placement="top" title="O campo Riscos deve ser preenchido com os riscos envolvidos nesta etapa"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Medidas preventivas e protetivas <span data-toggle="tooltip" data-placement="top" title="O campo Medidas preventivas e protetivas deve ser preenchido com as devidas ações de segurança para esta Análise"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Responsáveis <span data-toggle="tooltip" data-placement="top" title="O campo Responsáveis deve ser preenchido com o nome dos responsáveis de cada etapa do processo"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			
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
		</tbody>
	  </table>
	  <br />
	  <table class="table table-bordered table-hover">
		<thead>
		  <tr>        
			<th>Nome dos funcionários envolvidos no trabalho <span data-toggle="tooltip" data-placement="top" title="O campo Nome dos funcionários deve ser preenchido com o nome dos funcionários envolvidos neste trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Empresa (s) <span data-toggle="tooltip" data-placement="top" title="O campo Empresa (s) deve ser preenchido com o nome da empresa à realizar este análise"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			<th>Assinatura (s) <span data-toggle="tooltip" data-placement="top" title="O campo Assinatura (s) deve ser preenchido com a assinatura do responsável pelo processo"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
			
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		  <tr>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
			<td><input name="fname[]"  type="text"></td>
		  </tr>
		</tbody>
	  </table>
	</div>
</div>

<?php	

	echo form_button(array(
	    "class" => "btn btn-success",
	    "content" => "Gerar Analise de Risco",
	    "type" => "submit"
	));

	?><a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a><?php

	echo form_close();
?>