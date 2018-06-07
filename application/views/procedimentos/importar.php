<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Importe agora mesmo seu procedimento existente.</h3>
            <?php echo form_open_multipart('procedimentos/importar_novo');?>
            <br />
            <label class="text-warning">FORMATOS PERMITIDOS: Pdf, jpg, png, csv, doc</label><br />
            <label>Selecione seu arquivo:</label>
			<input type="file" name="userfile" size="20" required="" />
			<br />
			<label>Nomei este procedimento <span data-toggle="tooltip" data-placement="top" title="O campo Nome será utilizado para nomear este procedimento dentro de nosso sistema"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
			<input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255" required="">
			<select name="tipo" id="tipo" class="form-control" style="display: none;">
		      <option value="Bloqueio e Etiquetagem">Bloqueio e Etiquetagem</option>
		    </select>
		    <label>Descreva abaixo seu procedimento <span data-toggle="tooltip" data-placement="top" title="Descreva neste campo todos os detalhes, informações deste procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
		    <textarea type="text" name="descricao" value="" class="form-control" id="descricao" placeholder="Descreva aqui o procedimento importado" maxlength="255"> </textarea> 
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