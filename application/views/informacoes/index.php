<?php 
    // VERIFICA SE USUÁRIO TEM NÍVEL PARA VISUALIZAR ESTÁ FUNCIONALIDADE
    foreach($nivel as $nivel) : 
        $nivel_procedimento = $nivel["informacoes"];
    endforeach; 
?>
<?php if($this->session->userdata("usuario_logado") && $nivel_procedimento == '1') : ?>

  <?php 

  if($informacoes):

  foreach($informacoes as $info) : 
      
      // Formata os Campos
      $nome = $info["nome"];
      $logo = $info["logo"];
      $endereco = $info["endereco"];
      $complemento = $info["complemento"];
      $cidade = $info["cidade"];
      $estado = $info["estado"];
      $cep = $info["cep"];
      $pais = $info["pais"];
      $cnpj = $info["cnpj"];
      $telefone = $info["telefone"];
      $celular = $info["celular"];
      $email = $info["email"];

  endforeach
?>
<script src="<?=base_url("js/jquery.mask.min.js") ?>" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function($){
	   $("#cep").mask("99999-999");
	   $("#celular").mask("(99) 99999-9999");
	   $("#telefone").mask("(99) 9999-9999");
	   $("#cnpj").keydown(function(){
	    try {
	        $("#cnpj").unmask();
	    } catch (e) {}

	    var tamanho = $("#cnpj").val().length;

	    if(tamanho < 11){
	        $("#cnpj").mask("999.999.999-99");
	    } else if(tamanho >= 11){
	        $("#cnpj").mask("99.999.999/9999-99");
	    }

	    // ajustando foco
	    var elem = this;
	    setTimeout(function(){
	        // mudo a posição do seletor
	        elem.selectionStart = elem.selectionEnd = 10000;
	    }, 0);
	    // reaplico o valor para mudar o foco
	    var currentValue = $(this).val();
	    $(this).val('');
	    $(this).val(currentValue);
	});	
});
</script>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form class="form-horizontal" role="form" method="post" action="<?= site_url("informacoes/editar") ?>" enctype="multipart/form-data" accept-charset="utf-8" >
          <fieldset>

            <!-- Form Name -->
            <legend class="text-center">Informações de sua empresa</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Nome</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Nome fantasia ou Razão social" class="form-control" name="nome" id="nome" value="<?=$nome?>" required>
              </div>
            </div>

            <?php if($logo != ""): ?>
            <!-- Text input-->
              <p class="text-success text-center" style="margin-left: 17%;margin-top: -8px;">Logo já importado</p>
              <input type="hidden" name="logo" id="logo" value="<?=$logo?>">
            <?php else: ?> 

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Logo</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="logo" id="logo">
              </div>
            </div>

            <?php endif; ?>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Endereço</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Address Line 1" class="form-control" name="endereco" id="endereco" value="<?=$endereco?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Complemento</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Address Line 2" class="form-control" name="complemento" id="complemento" value="<?=$complemento?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Cidade</label>
              <div class="col-sm-10">
                <input type="text" placeholder="City" class="form-control" name="cidade" id="cidade" value="<?=$cidade?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Estado</label>
              <div class="col-sm-4">
                <input type="text" placeholder="State" class="form-control" name="estado" id="estado" value="<?=$estado?>" required>
              </div>

              <label class="col-sm-2 control-label" for="textinput">CEP</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Post Code" class="form-control" name="cep" id="cep" value="<?=$cep?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">País</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Country" class="form-control" name="pais" id="pais" value="<?=$pais?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">CNPJ</label>
              <div class="col-sm-10">
                <input type="text" placeholder="CPF / CNPJ" class="form-control" name="cnpj" id="cnpj" value="<?=$cnpj?>" required>
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Telefone</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Tel" class="form-control" name="telefone" id="telefone" value="<?=$telefone?>" required>
              </div>

              <label class="col-sm-2 control-label" for="textinput">Celular</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Tel2" class="form-control" name="celular" id="celular" value="<?=$celular?>" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">E-mail</label>
              <div class="col-sm-10">
                <input type="text" placeholder="E-mail" class="form-control" name="email" id="email" value="<?=$email?>" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="pull-right">
                  <button type="submit" class="btn btn-success">Salvar</button>
                </div>
              </div>
            </div>

          </fieldset>
        </form>
      </div><!-- /.col-lg-12 -->
  </div><!-- /.row -->

  <?php else: ?>

   <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form class="form-horizontal" role="form" method="post" action="<?= site_url("informacoes/salva") ?>">
          <fieldset>

            <!-- Form Name -->
            <legend class="text-center">Informações de sua empresa</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Endereço</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Address Line 1" class="form-control" name="endereco" id="endereco" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Complemento</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Address Line 2" class="form-control" name="complemento" id="complemento" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Cidade</label>
              <div class="col-sm-10">
                <input type="text" placeholder="City" class="form-control" name="cidade" id="cidade" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Estado</label>
              <div class="col-sm-4">
                <input type="text" placeholder="State" class="form-control" name="estado" id="estado" required>
              </div>

              <label class="col-sm-2 control-label" for="textinput">CEP</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Post Code" class="form-control" name="cep" id="cep" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">País</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Country" class="form-control" name="pais" id="pais" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">CNPJ</label>
              <div class="col-sm-10">
                <input type="text" placeholder="CPF / CNPJ" class="form-control" name="cnpj" id="cnpj" required>
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Telefone</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Tel" class="form-control" name="telefone" id="telefone" required>
              </div>

              <label class="col-sm-2 control-label" for="textinput">Celular</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Tel2" class="form-control" name="celular" id="celular" required>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">E-mail</label>
              <div class="col-sm-10">
                <input type="text" placeholder="E-mail" class="form-control" name="email" id="email" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="pull-right">
                  <button type="submit" class="btn btn-success">Salvar</button>
                </div>
              </div>
            </div>

          </fieldset>
        </form>
      </div><!-- /.col-lg-12 -->
  </div><!-- /.row -->

  <?php endif ?>

<?php elseif($nivel_procedimento == '0'):  ?>
    
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <br /><br />
                <div class="alert alert-danger" role="alert">Infelizmente você ainda não possui acesso a essa funcionalidade. Solicite para seu superior e tente novamente.</div>
                <a href="javascript:history.back()" class="btn btn-primary no-print">&lt; VOLTAR</a>
                <br /><br />
            </div>
        </div>
    </div>

<?php else: ?>
  <p>...</p>
<?php endif; ?>
