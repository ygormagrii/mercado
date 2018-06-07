<script type="text/javascript">

    $(document).ready(function(){

        $('#procedimentos').hide();
        $('#instrucoes').hide();
        $('#dispositivos').hide();
        $('#auditorias').hide();
        $('#pdt').hide();
        $('#analises').hide();
        $('#opcoes').hide();

        $('#tipo').change(function(){
            if ( this.value == 'Instrução de trabalho')
            {    
                $('#procedimentos').hide();
		        $('#instrucoes').show();
		        $('#dispositivos').hide();
		        $('#auditorias').hide();
		        $('#pdt').hide();
		        $('#analises').hide();
		        $('#opcoes').show();
            }
            if ( this.value == 'Procedimentos')
            {
                $('#procedimentos').show();
		        $('#instrucoes').hide();
		        $('#dispositivos').hide();
		        $('#auditorias').hide();
		        $('#pdt').hide();
		        $('#analises').hide();
		        $('#opcoes').show();
            }
            if ( this.value == 'Dispositivos')
            {
                $('#procedimentos').hide();
		        $('#instrucoes').hide();
		        $('#dispositivos').show();
		        $('#auditorias').hide();
		        $('#pdt').hide();
		        $('#analises').hide();
		        $('#opcoes').show();
            }
            if ( this.value == 'Auditorias')
            {
                $('#procedimentos').hide();
		        $('#instrucoes').hide();
		        $('#dispositivos').hide();
		        $('#auditorias').show();
		        $('#pdt').hide();
		        $('#analises').hide();
		        $('#opcoes').show();
            }
            if ( this.value == 'Permissões de trabalho')
            {
                $('#procedimentos').hide();
		        $('#instrucoes').hide();
		        $('#dispositivos').hide();
		        $('#auditorias').hide();
		        $('#pdt').show();
		        $('#analises').hide();
		        $('#opcoes').show();
            }
            if ( this.value == 'Análises de risco')
            {
                $('#procedimentos').hide();
		        $('#instrucoes').hide();
		        $('#dispositivos').hide();
		        $('#auditorias').hide();
		        $('#pdt').hide();
		        $('#analises').show();
		        $('#opcoes').show();
            }

        });
    });

</script>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Treinamentos</h3>
            <?php echo form_open_multipart('treinamentos/treinamentos_form');?>
            <br />
			<label>Nomei este Treinamento <span data-toggle="tooltip" data-placement="top" title="O campo Título nomeia o treinamento no sistema e na geração do arquivo final"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255" required="" >
			<?= form_error("nome");?>
			<label>Selecione abaixo o tipo de treinamento que deseja realizar <span data-toggle="tooltip" data-placement="top" title="O campo Tipo de treinamento define qual modelo de treinamento será gerado."><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>

			<!-- SELEEÇÃO DO TIPO DE TREINAMENTO -->
			<select name="tipo" id="tipo" class="form-control">
			  <?php foreach($tipo_treinamentos as $tipo) : ?>
		      		<option value="<?=$tipo["nome"]?>"><?=$tipo["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>

		    <!-- LISTAGEM DE PROCEDIMENTOS -->
		    <label id="opcoes">Selecione uma opção <span data-toggle="tooltip" data-placement="top" title="O campo Opção de treinamento seleciona qual serã o arquivo a ser treinado"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<select name="procedimentos" id="procedimentos" class="form-control">
			  <?php foreach($lista_procedimentos as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		 	  <?php foreach($lista_procedimentos_i as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>

		    <!-- LISTAGEM DE IDTS -->
			<select name="instrucoes" id="instrucoes" class="form-control">
			  <?php foreach($lista_instrucoes as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		 	  <?php foreach($lista_instrucoes_i as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>

		    <!-- LISTAGEM DE AUDITORIAS -->
			<select name="auditorias" id="auditorias" class="form-control">
			  <?php foreach($lista_auditorias as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		 	   <?php foreach($lista_auditorias_i as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome_arquivo"]?></option>
		 	  <?php endforeach; ?>
		    </select>

		    <!-- LISTAGEM DE PDT -->
			<select name="pdt" id="pdt" class="form-control">
			  <?php foreach($lista_pdt as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>

		    <!-- LISTAGEM DE ANALISES -->
			<select name="analises" id="analises" class="form-control">
			  <?php foreach($lista_analises as $proce) : ?>
		      		<option value="<?=$proce["id"]?>"><?=$proce["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>


		    <label>Descreva abaixo o processo de treinamento <span data-toggle="tooltip" data-placement="top" title="O campo Descrição é utilizado para detalhar, explicar o processo de treinamento."><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui o treinamento" maxlength="255"> </textarea> 
			<br />
			<label>Selecione abaixo os usuários que devem realizar este treinamento <span data-toggle="tooltip" data-placement="top" title="O campo Usuários é uma listagem dos usuários cadastrados em sua empresa, selecione quais deseja incluir neste treinamento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<select name="usuarios" id="usuarios" class="form-control" multiple>
		      <?php foreach($usuarios as $usuario) : ?>
		      		<option value="<?=$usuario["nome"]?>"><?=$usuario["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">

			<br /><br />

			<input type="submit" value="Iniciar Treinamento" class="btn btn-success" /> <?= anchor('treinamentos/','< Voltar', array("class" => "btn btn-primary"))?>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>