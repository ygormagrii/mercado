<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Importe agora mesmo sua Instrução de trabalho existente.</h3>
            <?php echo form_open_multipart('idt/importar_novo');?>
            <br />
            <label>Selecione seu arquivo:</label>
			<input type="file" name="userfile" size="20" />
			<br />
			<label>Nomei da IDT:</label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
			<label>Selecione abaixo o tipo desta IDT:</label>
			<select name="tipo" id="tipo" class="form-control">
		      <option value="auditoria-interna">Auditoria interna</option>
		      <option value="saab">Ação preventiva</option>
		      <option value="mercedes">Ação corretiva</option>
		      <option value="audi">Controle de produtos não-conforme</option>
		      <option value="audi">Controle de registros</option>
		      <option value="audi">Controle de documentos</option>
		    </select>
		    <label>Descreva abaixo sua IDT:</label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui sua IDT" maxlength="255"> </textarea> 
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">
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