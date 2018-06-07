
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Cadastro - Tipo treinamentos</h3>
            <?php echo form_open_multipart('treinamentos/treinamentos_modelo');?>
            <br />
			<label>Nome do Modelo de Treinamento:</label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">
			<br /><br />

			<input type="submit" value="Cadastrar Tipo de Treinamento" class="btn btn-success" /> <a href="javascript:history.back()" class="btn btn-primary"> < Voltar </a>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>