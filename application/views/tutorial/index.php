<?php if($this->session->userdata("usuario_logado") && $this->session->userdata["usuario_logado"]["nivel"] == '0') : ?>

<div class="stepwizard col-md-offset-3">
<div class="stepwizard-row setup-panel">
  <div class="stepwizard-step">
    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
    <p>Passo 1</p>
  </div>
  <div class="stepwizard-step">
    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
    <p>Passo 2</p>
  </div>
  <div class="stepwizard-step">
    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
    <p>Passo 3</p>
  </div>
</div>
</div>

<form role="form" action="<?=base_url("index.php/tutorial/finalizar") ?>" method="post">
<div class="row setup-content" id="step-1">
  <div class="col-xs-6 col-md-offset-3">
    <div class="col-md-12">
      <h3> Primeiro precisamos entender como podemos ajuda-lo</h3>
      <div class="form-group">
        <label class="control-label">Sua empresa pretende utilizar quais funções do Lotopro?</label>
        <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Digite sua resposta aqui" name="utilizar" id="utilizar" />
        <?php 
        #Exibe mensagem de erros do campo	
		echo form_error("nome"); 
		?>
      </div>
      <div class="form-group">
        <label class="control-label">Qual o número de funcionários?</label>
        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Digite sua resposta aqui" name="num_funcionarios" id="num_funcionarios" />
        <?php 
        #Exibe mensagem de erros do campo	
		echo form_error("nome"); 
		?>
      </div>
      <div class="form-group">
        <label class="control-label">Poderia discrever abaixo o setor de atuação?</label>
        <input type="text" required="required" class="form-control" placeholder="Digite sua resposta aqui" name="atuacao" id="atuacao">
        <?php 
        #Exibe mensagem de erros do campo	
		echo form_error("nome"); 
		?>
      </div>
      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
  </div>
</div>
<div class="row setup-content" id="step-2">
  <div class="col-xs-6 col-md-offset-3">
    <div class="col-md-12">
      <h3> Já possue alguma dessas documentações:</h3>
      <div class="form-group">
			<select name="documentacoes-atuais" class="form-control" id="documentacoes-atuais" multiselect>
			<option value="0">Procedimentos</option>
			<option value="1">Instruções de trabalho</option>
			<option value="2">Certificados</option>
			<option value="3">Auditorias</option>
			<option value="4">Permissões de trabalho</option>
			<option value="5">Análise de risco</option>
			</select>
      </div>
      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
  </div>
</div>
<div class="row setup-content" id="step-3">
  <div class="col-xs-6 col-md-offset-3">
    <div class="col-md-12">
      <h3> Agora faça a importação das documentações já existentes e convide seus funcionários</h3>
      <button class="btn btn-success btn-lg pull-right" type="submit" id="envia">Finalizar Settup</button>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $( "#envia" ).submit();

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<?php elseif($this->session->userdata["usuario_logado"]["nivel"] != '0'): ?>
    <?php redirect("/dashboard"); ?>
<? endif; ?>