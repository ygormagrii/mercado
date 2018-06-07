<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Auditorias - Procedimentos</h3>
            <?php echo form_open_multipart('procedimentos/auditorias_form');?>
            <br />
			<label>Nomei esta auditoria:</label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
			<label>Selecione abaixo o tipo de auditoria que deseja realizar:</label>
			<select name="tipo" id="tipo" class="form-control">
		      <option value="Auditoria interna">Auditoria interna</option>
		      <option value="Auditoria preventiva">Auditoria preventiva</option>
		      <option value="Auditoria apurativa">Auditoria apurativa</option>
		    </select>
		    <label>Descreva abaixo o processo de auditoria:</label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui o procedimento importado" maxlength="255"> </textarea> 
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">

			<input type="hidden" value="<?=$procedimentos['id']?>" name="procedimento_id" id="procedimento_id">
			<br /><br />

			<input type="submit" value="Iniciar Auditoria" class="btn btn-success" /> <?= anchor('procedimentos/','< Voltar', array("class" => "btn btn-primary"))?>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>