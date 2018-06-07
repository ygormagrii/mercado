<h1 class="text-center">Criando novo usuário</h1>

	<?php
	echo form_open("usuarios/cadastra");

	echo form_label("Nome do usuário", "nome");
	echo form_input(array(
	    "name" => "nome",
	    "class" => "form-control",
	    "id" => "nome",
	    "maxlength" => "255",
	    "value" => set_value("nome", "")
	));
	#Exibe mensagem de erros do campo	
	echo form_error("nome");

	echo form_label("E-mail", "email");
	echo form_input(array(
	    "name" => "email",
	    "class" => "form-control",
	    "id" => "email",
	    "value" => set_value("email", "")
	));
	#Exibe mensagem de erros do campo
	echo form_error("email");

	echo form_label("Senha", "senha");
	echo form_input(array(
	    "name" => "senha",
	    "class" => "form-control",
	    "id" => "senha",
	    "value" => set_value("senha", "")
	));

	#Exibe mensagem de erros do campo
	echo form_error("senha");

	echo form_label("Foto do perfil", "foto");
	echo form_input(array(
	    "name" => "foto",
	    "class" => "form-control",
	    "id" => "foto",
	    "placeholder" => "URL de sua foto",
	    "value" => set_value("foto", "")
	));

	#Exibe mensagem de erros do campo
	echo form_error("foto");

	echo form_label("Código de identificação", "cod");
	echo form_input(array(
	    "name" => "cod",
	    "class" => "form-control",
	    "id" => "cod",
	    "placeholder" => "Código de identificaçã",
	    "value" => set_value("cod", "")
	));

	#Exibe mensagem de erros do campo
	echo form_error("cod");

	echo form_hidden('status', "0");

	?>
	<label>Nível de Acesso:</label>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="procedimentos" name="procedimentos">
	  <label class="form-check-label" for="procedimentos">
	    Procedimentos
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="idt" name="idt">
	  <label class="form-check-label" for="idt">
	    Gerar / Visualizar Instruções de Trabalho
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="dispositivos" name="dispositivos">
	  <label class="form-check-label" for="dispositivos">
	    Cadastrar / Visualizar Dispositivos
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="pdt" name="pdt">
	  <label class="form-check-label" for="pdt">
	     Gerar / Visualizar Permissões de Trabalho
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="analise" name="analise">
	  <label class="form-check-label" for="analise">
	     Gerar / Visualizar Análises de Risco
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="auditorias" name="auditorias">
	  <label class="form-check-label" for="auditorias">
	     Gerar / Visualizar Auditorias
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="treinamentos" name="treinamentos">
	  <label class="form-check-label" for="treinamentos">
	     Gerar / Visualizar Treinamentos
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="informacoes" name="informacoes">
	  <label class="form-check-label" for="informacoes">
	     Visualizar / Editar Informações da Empresa
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" value="1" id="usuarios" name="usuarios">
	  <label class="form-check-label" for="usuarios">
	     Cadastrar / Editar / Visualizar Funcionários da empresa cadastrados no sistema
	  </label>
	</div>

	<?php


	echo "<p></p><br />";
	echo form_button(array(
	    "class" => "btn btn-primary",
	    "content" => "Adicionar usuário",
	    "type" => "submit"
	));

	echo form_close();


?>