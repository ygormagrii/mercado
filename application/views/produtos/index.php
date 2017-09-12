<html lang="en">
    <head>
        <link rel="stylesheet" href="<?=base_url("css/bootstrap.css") ?>">
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

        <?php if(!$this->session->userdata("usuario_logado")) : ?>
                <link rel="stylesheet" href="<?=base_url("css/login.css") ?>">
                <script src="<?=base_url("js/login.js") ?>" type="text/javascript"></script>
        <?php endif ?>
    </head>
    <body>
    <div class="container">

        <?php if($this->session->flashdata("success")) : ?>
        <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
        <?php endif ?>
        <?php if($this->session->flashdata("danger")) : ?>
        <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
        <?php endif ?>

        <?php if($this->session->userdata("usuario_logado")) : ?>
        <h1> Produtos</h1>
        <table class="table">
            <?php foreach($produtos as $produto) : ?>
            <tr>
                <td><?= anchor("produtos/{$produto['id']}", $produto["nome"]); ?></td>
                <td>
                    <?= character_limiter($produto["descricao"], 10) ?>
                </td>
                <td><?= numeroEmReais(html_escape($produto["preco"])) ?></td>
            </tr>
        <?php endforeach ?>
        </table>
        
        <?= anchor('produtos/formulario','Novo produto', array("class" => "btn btn-primary"))?>

        <?= anchor('login/logout','Logout', array("class" => "btn btn-primary"))?>

        <?php else:  ?>

        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Digite seu e-mail para recuperar sua senha</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
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
                            "content" => "Cadastrar",
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
        <div>
    </body>
</html>