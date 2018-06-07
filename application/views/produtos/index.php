<?php 
    // VERIFICA SE USUÁRIO TEM NÍVEL PARA VISUALIZAR ESTÁ FUNCIONALIDADE
    foreach($nivel as $nivel) : 
        $nivel_procedimento = $nivel["dispositivos"];
    endforeach; 
?>
<?php if($this->session->userdata("usuario_logado") && $nivel_procedimento == '1') : ?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Dispositivos cadastrados</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th class="no-mobile">Dispositivo</th>
                        <th class="no-mobile">Uso</th>
                        <th class="no-mobile">Quantidade Atual</th>
                        <th class="no-mobile">Quantidade Recomendada</th>
                        <th class="no-mobile">Diferença</th>
                        <th class="no-mobile">Nome responsável</th>
                        <th class="no-mobile">Última alteração</th>
                        <th class="no-mobile">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($produtos as $produto) : ?>
                        <?php 
                            // Formata Status
                            $status = $produto["status"];
                            if($status == '1'){
                                $status = "<span class='btn btn-primary btn-sm btn-success'>EM USO (CLIQUE AQUI PARA DESATIVAR)</span>";
                            }else{
                                $status = "<span class='btn btn-primary btn-sm btn-danger'>FORA DE USO (CLIQUE AQUI PARA ATIVAR)</span>";
                            }

                            $diferenca = $produto["quantidade_recomendada"] - $produto["quantidade"];
                        ?>
                        <tr>
                            <td><?=$produto["id"] ?></td>
                            <td class="no-mobile"><?= anchor("produtos/{$produto['id']}", $produto["nome"]); ?></td>
                            <td class="no-mobile"><?= character_limiter($produto["descricao"], 10) ?></td>
                            <td class="no-mobile"><?=$produto["quantidade"] ?></td>
                            <td class="no-mobile"><?=$produto["quantidade_recomendada"] ?></td>
                            <td class="no-mobile"><?=$diferenca?></td>
                            <td class="no-mobile">YGOR</td>
                            <td class="no-mobile"><?=$produto["data"]?></td>
                            <td class="no-mobile"><?= anchor("produtos/{$produto['id']}/{$produto['status']}", $status); ?></td>
                            <td ><?= anchor("produtos/edit{$produto['id']}", "Editar"); ?></td>
                            <td><?= anchor("produtos/excluir/{$produto['id']}", "Excluir"); ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>

        <?= anchor('produtos/formulario','Adicionar Novo dispositivo', array("class" => "btn btn-success"))?>

        <?= anchor('login/logout','Sair do sistema', array("class" => "btn btn-danger"))?>

    </div>

</div>
</div>

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

<?php else:  ?>

<div class="col-md-12">
    <div class="pr-wrap">
        <div class="pass-reset">
            <label>
                Digite seu e-mail para recuperar sua senha</label>
            <input type="email" placeholder="Email" />
            <input type="submit" value="ENVIAR" class="pass-reset-submit btn btn-success btn-sm" />
        </div>
    </div>
    <div class="pr-sign">
        <div class="sign-form">
            <h4 class="text-center">Faça seu cadastro</h4>
            <?php 
                echo form_open("usuarios/novo");
                echo form_label("Nome", "nome");    
                echo form_input(array(
                "name" => "nome",
                    "id" => "nome",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_label("Email", "email");
                echo form_input(array(
                "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));
                echo form_button(array(
                    "class" => "pass-login-submit btn btn-success btn-sm",
                    "content" => "CADASTRAR",
                    "type" => "submit",
                    "style" => "margin-top: 15px;"
                ));
                echo form_close();
            ?>
        </div>
    </div>
    <div class="wrap">
        <p class="form-title">
            Login</p>
        <form class="login" method="post" action="<?= site_url("login/autenticar") ?>">
        <input type="text" placeholder="E-mail" id="email" name="email" maxlength="255" />
        <input type="password" placeholder="Senha" id="senha" name="senha" maxlength="255" />
        <input type="submit" value="Login" class="btn btn-success btn-sm" />

        <div class="remember-forgot">
            <div class="row">
                <div class="col-md-6">
                    <a href="javascription:void(0)" class="sign-in">Não tem cadastro?</a>
                </div>
                <div class="col-md-6 forgot-pass-content">
                    <a href="javascription:void(0)" class="forgot-pass">Esqueceu a senha?</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>


<?php endif ?>
