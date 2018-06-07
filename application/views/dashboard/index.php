<?php 
if (!isset($this->session->userdata["usuario_logado"]["nivel"])): 
?>
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

<?php elseif($this->session->userdata("usuario_logado") && $this->session->userdata["usuario_logado"]["nivel"] != '0') : ?>

<script type="text/javascript">
    $(document).ready(function () {

    $('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>
<div class="container">
    <div class="row">

        <section class="content">
            <h2 class="text-left">Dashboard</h2>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">
                                <a href="http://lotopro.com.br/sistema/index.php/procedimentos"><button type="button" class="btn btn-danger" data-target="pagado"><i class="pe-7s-note2"></i> &nbsp;Procedimentos</button></a>
                                <a href="http://lotopro.com.br/sistema/index.php/idt"><button type="button" class="btn btn-danger" data-target="pendiente"><i class="pe-7s-news-paper"></i> &nbsp;Instruções de Trabalho</button></a>
                                <a href="http://lotopro.com.br/sistema/index.php/produtos"><button type="button" class="btn btn-danger" data-target="cancelado"><i class="pe-7s-lock"></i> &nbsp;Dispositivos</button></a>
                                <a href="http://lotopro.com.br/sistema/index.php/analises"><button type="button" class="btn btn-danger" data-target="analises"><i class="pe-7s-shield"></i> &nbsp;Análises de Risco</button></a>
                                <br /><br />
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>

                                    <?php foreach($procedimentos as $procedimento) : ?>
                                    <tr data-status="pagado">
                                        <td>
                                            <p class="pull-left">
                                                <?=$procedimento["usuario_id"]?>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <span class="media-meta pull-right no-mobile">Março 18, 2018</span>
                                                    <h4 class="title">
                                                        <a href="http://lotopro.com.br/sistema/index.php/procedimentos/<?=$procedimento["id"]?>"><?=$procedimento["nome"]?></a>
                                                        <span class="pull-right pagado no-mobile">Procedimentos Gerados</span>
                                                    </h4>
                                                    <p class="summary no-mobile"><a href="http://lotopro.com.br/sistema/index.php/procedimentos/<?=$procedimento["id"]?>" style="color: black;"><?= character_limiter($procedimento["fname"], 10) ?></a></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php foreach($idts as $idt) : ?>
                                    <tr data-status="pendiente">
                                        
                                        <td>
                                            <p class="pull-left">
                                                <?=$idt["usuario_id"]?>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <span class="media-meta pull-right no-mobile"><?=$idt["data"]?></span>
                                                    <h4 class="title">
                                                        <a href="http://lotopro.com.br/sistema/index.php/idt/<?=$idt["id"]?>"><?=$idt["nome"]?></a>
                                                        <span class="pull-right pendiente no-mobile">IT'S Geradas</span>
                                                    </h4>
                                                    <p class="summary no-mobile"><a href="http://lotopro.com.br/sistema/index.php/idt/<?=$idt["id"]?>" style="color: black;"><?= character_limiter($idt["fname"], 10) ?></a></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php foreach($dispositivos as $dispositivo) : ?>
                                    <tr data-status="cancelado">
                                       
                                        <td>
                                            <p class="pull-left">
                                                <?=$dispositivo["usuario_id"]?>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <span class="media-meta pull-right no-mobile"><?=$dispositivo["data"]?></span>
                                                    <h4 class="title">
                                                        <a href="http://lotopro.com.br/sistema/index.php/produtos/<?=$dispositivo["id"]?>"><?=$dispositivo["nome"]?></a>
                                                        <span class="pull-right cancelado no-mobile">Dispositivos Cadastrados</span>
                                                    </h4>
                                                    <p class="summary no-mobile"><a href="http://lotopro.com.br/sistema/index.php/produtos/<?=$dispositivo["id"]?>" style="color: black;"><?= character_limiter($dispositivo["descricao"], 10) ?></a></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php foreach($analises as $analise) : ?>
                                    <tr data-status="analises">
                                        
                                        <td>
                                            <p class="pull-left">
                                                <?=$analise["usuario_id"]?>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="media">
    
                                                <div class="media-body">
                                                    <span class="media-meta pull-right no-mobile"><?=$analise["data"]?></span>
                                                    <h4 class="title">
                                                        <a href="http://lotopro.com.br/sistema/index.php/analises/<?=$analise["id"]?>"><?=$analise["nome"]?></a>
                                                        <span class="pull-right text-info no-mobile">Análises de Risco Geradas</span>
                                                    </h4>
                                                    <p class="summary no-mobile"><a href="http://lotopro.com.br/sistema/index.php/analises/<?=$analise["id"]?>" style="color: black;"><?= character_limiter($analise["fname"], 10) ?></a></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<?= anchor('login/logout','Sair do sistema', array("class" => "btn btn-danger"))?>
            </div>

        </section>
        
    </div>
</div>

<?php elseif ($this->session->userdata["usuario_logado"]["nivel"] == '0'): ?>
    <?php redirect("/tutorial"); ?>
<?php endif; ?>