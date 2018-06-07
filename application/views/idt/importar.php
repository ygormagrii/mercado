<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Importe agora mesmo sua Instrução de trabalho existente.</h3>
            <?php echo form_open_multipart('idt/importar_novo');?>
            <br />
            <label class="text-warning">FORMATOS PERMITIDOS: Pdf, jpg, png, csv, doc, xls</label><br />
            <label>Selecione seu arquivo:</label>
			<input type="file" name="userfile" size="20" required="" />
			<br />
			<label>Nomei da IDT <span data-toggle="tooltip" data-placement="top" title="O campo Nome será utilizado para nomear esta Instrução de Trabalho dentro de nosso sistema"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255" required="">
			<label>Selecione abaixo o tipo desta IDT <span data-toggle="tooltip" data-placement="top" title="O campo Tipo será utilizado para categorizar esta Instrução de Trabalho dentro de nosso sistema"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<select name="tipo" id="tipo" class="form-control">
		      <option value="Bloqueio e Etiquetagem">Bloqueio e Etiquetagem</option>
		    </select>
		    <label>Descreva abaixo sua IDT <span data-toggle="tooltip" data-placement="top" title="Descreva neste campo as etapas e detalhes de sua Instrução de trabalho"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui sua IDT" maxlength="255"> </textarea> 
			<?php $empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"]; ?>
			<input type="hidden" value="<?=$empresa_id?>" name="empresa_id" id="empresa_id">
			<br /><br />

			<input type="submit" value="Importar" class="btn btn-success" />
			<a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>