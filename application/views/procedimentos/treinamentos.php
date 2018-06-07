
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Treinamentos - Procedimentos</h3>
            <?php echo form_open_multipart('procedimentos/treinamentos_form');?>
            <br />
			<label>Nomei este Treinamento:</label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255" required="" >
			<?= form_error("nome");?>
			<label>Selecione abaixo o tipo de treinamento que deseja realizar:</label>
			<select name="tipo" id="tipo" class="form-control">
			  <?php foreach($tipo_treinamentos as $tipo) : ?>
		      		<option value="<?=$tipo["nome"]?>"><?=$tipo["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>
		    <p style="font-size: 10px;"><?= anchor("procedimentos/tipo_treinamentos", "Adicionar tipo de treinamentos"); ?></p>
		    <label>Descreva abaixo o processo de treinamento:</label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui o treinamento" maxlength="255"> </textarea> 
			<br />
			<label>Selecione abaixo os usuários que devem realizar este treinamento:</label>
			<select name="usuarios" id="usuarios" class="form-control" multiple>
		      <?php foreach($usuarios as $usuario) : ?>
		      		<option value="<?=$usuario["nome"]?>"><?=$usuario["nome"]?></option>
		 	  <?php endforeach; ?>
		    </select>
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">

			<input type="hidden" value="<?=$procedimentos['id']?>" name="procedimento_id" id="procedimento_id">
			<br /><br />

			<input type="submit" value="Iniciar Treinamento" class="btn btn-success" /> <?= anchor('procedimentos/','< Voltar', array("class" => "btn btn-primary"))?>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>