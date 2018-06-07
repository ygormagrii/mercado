<h1 class="text-center">Criando novo usuário</h1>

	<?php
	echo form_open("usuarios/editar");

	echo form_label("Nome do usuário", "nome");
	echo form_input(array(
	    "name" => "nome",
	    "class" => "form-control",
	    "id" => "nome",
	    "maxlength" => "255",
	    "value" => set_value("nome", $produto["nome"])
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome");

	echo form_label("E-mail", "email");
	echo form_input(array(
	    "name" => "email",
	    "class" => "form-control",
	    "id" => "email",
	    "value" => set_value("email", $produto["email"])
	));
	#Exibe mensagem de erros do campo
	echo form_error("email");

	echo form_label("Senha", "senha");

	echo form_input(array(
	    "name" => "senha",
	    "class" => "form-control",
	    "id" => "senha",
	    "required" => "required",
	    "value" => set_value("senha", '')
	));

	#Exibe mensagem de erros do campo
	echo form_error("senha");

	echo form_label("Foto do perfil", "foto");
	echo form_input(array(
	    "name" => "foto",
	    "class" => "form-control",
	    "id" => "foto",
	    "placeholder" => "URL de sua foto",
	    "value" => set_value("foto", $produto["foto"])
	));

	#Exibe mensagem de erros do campo
	echo form_error("foto");

	echo form_label("Código de identificação", "cod");
	echo form_input(array(
	    "name" => "cod",
	    "class" => "form-control",
	    "id" => "cod",
	    "placeholder" => "Código de identificaçã",
	    "value" => set_value("cod", $produto["cod"])
	));

	#Exibe mensagem de erros do campo
	echo form_error("cod");

	echo form_hidden('status', "0");

	?>
	<label>Nível de Acesso:</label>
	<div class="form-check">
	  <?php if($nivel["procedimentos"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="procedimentos" name="procedimentos" <?=$status?>>
	  <label class="form-check-label" for="procedimentos">
	    Procedimentos
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["idt"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="idt" name="idt" <?=$status?>>
	  <label class="form-check-label" for="idt">
	    Gerar / Visualizar Instruções de Trabalho
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["dispositivos"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="dispositivos" name="dispositivos" <?=$status?>>
	  <label class="form-check-label" for="dispositivos">
	    Cadastrar / Visualizar Dispositivos
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["pdt"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="pdt" name="pdt" <?=$status?>>
	  <label class="form-check-label" for="pdt">
	     Gerar / Visualizar Permissões de Trabalho
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["analise"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="analise" name="analise" <?=$status?>>
	  <label class="form-check-label" for="analise">
	     Gerar / Visualizar Análises de Risco
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["auditorias"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="auditorias" name="auditorias" <?=$status?>>
	  <label class="form-check-label" for="auditorias">
	     Gerar / Visualizar Auditorias
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["treinamentos"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="treinamentos" name="treinamentos" <?=$status?>>
	  <label class="form-check-label" for="treinamentos">
	     Gerar / Visualizar Treinamentos
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["informacoes"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="informacoes" name="informacoes" <?=$status?>>
	  <label class="form-check-label" for="informacoes">
	     Visualizar / Editar Informações da Empresa
	  </label>
	</div>
	<div class="form-check">
	  <?php if($nivel["usuarios"] == '1'): $status = "checked"; else: $status = ""; endif; ?>
	  <input class="form-check-input" type="checkbox" value="1" id="usuarios" name="usuarios" <?=$status?>>
	  <label class="form-check-label" for="usuarios">
	     Cadastrar / Editar / Visualizar Funcionários da empresa cadastrados no sistema
	  </label>
	</div>

	<?php

	echo form_hidden('id', $produto["id"]);

	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-success",
	    "content" => "Salvar Edição",
	    "type" => "submit"
	));

	echo form_close();


?>