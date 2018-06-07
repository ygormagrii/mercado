<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Importe agora mesmo sua lista de presença deste Treinamento.</h3>
            <?php echo form_open_multipart('treinamentos/importar_novo');?>
            <br />
            <label>Selecione seu arquivo:</label>
			<input type="file" name="userfile" size="20" required="" />
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">
			<input type="hidden" value="<?=$id?>" name="treinamento_id" id="treinamento_id">
			<br /><br />

			<input type="submit" value="Importar" class="btn btn-success" />
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>