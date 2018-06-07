<h1 class="text-center">Gerar Procedimento</h1>
    
    <?php 
    echo form_open("procedimentos/novo");
    ?>
    <label>Título</label>
    <span data-toggle="tooltip" data-placement="top" title="O campo Título nomeia o procedimento no sistema e na geração do arquivo final"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
    <input type="text" name="nome" value="" class="form-control" id="nome" maxlength="255">
    <?= form_error("nome");?>
    <select name="tipo" id="tipo" class="form-control" style="display: none;">
      <option value="Bloqueio e Etiquetagem">Bloqueio e Etiquetagem</option>
    </select>
    <?= form_error("tipo");?>
    <label>Data</label>
    <span data-toggle="tooltip" data-placement="top" title="O campo Data será utilizado para identificar a data de geração do procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span>
    <input type="date" name="data" value="" class="form-control" id="data" maxlength="255">
    <?= form_error("data");?>
    <label>Unidade <span data-toggle="tooltip" data-placement="top" title="O campo Unidade será utilizado para identificar a unidade de geração deste Procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
    <input type="text" name="unidade" value="" class="form-control" id="unidade" maxlength="255">
    <?= form_error("unidade");?>
    <label>Local <span data-toggle="tooltip" data-placement="top" title="O campo Local será utilizado para identificar o local de geração deste Procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
    <input type="text" name="local" value="" class="form-control" id="local" maxlength="255">
    <?= form_error("local");?>
    <table class="table table-bordered table-hover">
        <thead>
          <tr>        
            <th>Código <span data-toggle="tooltip" data-placement="top" title="O campo Código é utilizado para identificar o procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
            <th>Revisão <span data-toggle="tooltip" data-placement="top" title="O campo Revisão é utilizado para identificaro o responsável pela revisão do procedimento. Ex: Luiz Araujo"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
            <th>Data <span data-toggle="tooltip" data-placement="top" title="O campo Data será utilizado para identificar a data de início do procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></th>
          </tr>
        </thead>
        <tbody>
            
          <tr>
            <td><input name="fname[]" type="text"></td>
            <td><input name="fname[]"  type="text"></td>
            <td><input name="fname[]"  type="text" placeholder="dd/mm/aaaa"></td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
<br />
<label>Aprovação final feita por <span data-toggle="tooltip" data-placement="top" title="O campo Aprovação final será utilizado para identificar o responsável por aprovar este procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
<input type="text" name="aprovado" value="" class="form-control" id="aprovado" maxlength="255">
<?= form_error("aprovado");?>
<br />
<label>Descreva abaixo o seu procedimento <span data-toggle="tooltip" data-placement="top" title="O campo Descrição serve para descrever todas etapas, detalhes e informações do procedimento"><img src="http://lotopro.com.br/sistema/duvidas.png"></span></label>
<style>
.ck-editor__editable {
    min-height: 400px;
}
</style>
<textarea name="content" id="editor"  rows="1000" cols="8000"></textarea>
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
        "class" => "btn btn-success",
        "content" => "Gerar Procedimento",
        "type" => "submit"
    ));

    ?><a href="javascript:history.back()" class="btn btn-primary">&lt; Voltar</a><?php

    echo form_close();
?>