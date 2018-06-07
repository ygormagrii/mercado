<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/png" href="https://www.tagout.com.br/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Lotopro - Facilite tarefas</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url("css/") ?>bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?=base_url("css/") ?>animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=base_url("css/") ?>light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!-- Habilita Explicação de campos -->
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=base_url("css/") ?>demo.css" rel="stylesheet" />
    <link href="<?=base_url("css/") ?>header.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.1/classic/ckeditor.js"></script>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url("css/") ?>pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?=base_url("css/") ?>print.css" media="print" />

    <?php if(!$this->session->userdata("usuario_logado")) : ?>
            <link rel="stylesheet" href="<?=base_url("css/login.css") ?>">
            <script src="<?=base_url("js/login.js") ?>" type="text/javascript"></script>
    <?php endif ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="checkbox"]').change(function(){
                this.value = (Number(this.checked));
            });
        });
    </script>

</head>
<body>

<?php if($this->session->userdata("usuario_logado")) : ?>
<?php
                                
/*****************
    ********

     #### CHAMANDO DADOS DA SESSÃO DO USUÁRIO

    ********
******************/    

$nome = $this->session->userdata["usuario_logado"]["nome"];
$nivel = $this->session->userdata["usuario_logado"]["nivel"];
$id = $this->session->userdata["usuario_logado"]["id"];
$empresa_id = $this->session->userdata["usuario_logado"]["empresa_id"];
$foto = $this->session->userdata["usuario_logado"]["foto"];

?>

<div class="wrapper">
    <div class="sidebar" data-color="purple">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= site_url("login/autenticar") ?>" class="simple-text">
                    Lotopro Sistema
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo activate_menu('dashboard'); ?>">
                    <a href="<?= site_url("dashboard") ?>" >
                        <i class="pe-7s-user"></i>
                        <p>Painel de Controle</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('procedimentos'); ?>">
                    <a href="<?= site_url("procedimentos") ?>" >
                        <i class="pe-7s-note2"></i>
                        <p>Procedimentos</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('idt'); ?>">
                    <a href="<?= site_url("idt") ?>" >
                        <i class="pe-7s-news-paper"></i>
                        <p>Instruções de Trabalho</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('produtos'); ?>" >
                    <a href="<?= site_url("produtos") ?>">
                        <i class="pe-7s-lock"></i>
                        <p>Dispositivos</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('pdt'); ?>">
                    <a href="<?= site_url("pdt") ?>" >
                        <i class="pe-7s-users"></i>
                        <p>Permissões de Trabalho</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('analises'); ?>">
                    <a href="<?= site_url("analises") ?>" >
                        <i class="pe-7s-shield"></i>
                        <p>Análises de Risco</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('auditorias'); ?>">
                    <a href="<?= site_url("auditorias") ?>" >
                        <i class="pe-7s-search"></i>
                        <p>Auditorias</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('treinamentos'); ?>">
                    <a href="<?= site_url("treinamentos") ?>" >
                        <i class="pe-7s-notebook"></i>
                        <p>Treinamentos</p>
                    </a>
                </li>
                <li class="<?php echo activate_menu('etiquetas'); ?>">
                    <a href="<?= site_url("etiquetas") ?>" >
                        <i class="pe-7s-ticket"></i>
                        <p>Etiquetas de Bloqueio</p>
                    </a>
                </li>
                
                <li class="active-pro">
                    <a href="#">
                        <i class="pe-7s-bookmarks"></i>
                        <p>FAQ - Tire suas dúvidas</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src="http://lotopro.com.br/images/logo-footer.png" class="img-fluid" alt="logo mobile" style="width: 54%" />
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
            
                    <ul class="nav navbar-nav navbar-right ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                                <?php if($this->session->flashdata("success") || $this->session->flashdata("danger")) : ?>
                                <i class="fa fa-bell-o"></i><span class="badge">1</span>
                                <?php else : ?>
                                <i class="fa fa-bell-o"></i><span class="badge" style="display: none;">0</span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php 
                                        if($this->session->flashdata("success")) :
                                            $sucesso = $this->session->flashdata("success");
                                            echo "<a href='#' class='dropdown-item'><i class='fa fa-inbox'></i>".$sucesso."</a>";
                                        endif;

                                        if($this->session->flashdata("danger")) :
                                            $danger = $this->session->flashdata("danger");
                                            echo "<a href='#' class='dropdown-item'><i class='fa fa-inbox'></i>".$danger."</a>";
                                        endif;
                                ?></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action top-mobile"><img src="<?=$foto?>" class="avatar" alt="Avatar"> <?=$nome?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= site_url("atendimento") ?>" class="dropdown-item"><i class="fa fa-life-ring"></i> Atendimento</a></li>
                                <li><a href="<?= site_url("informacoes") ?>" class="dropdown-item"><i class="fa fa-info-circle"></i> Informações da empresa</a></li>
                                <li><a href="<?= site_url("usuarios") ?>" class="dropdown-item"><i class="fa fa-users"></i> Gerenciamento de Usuários</a></li>
                                <li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Faturamento</a></li>
                                <li class="divider dropdown-divider"></li>
                                <li><a href="<?= site_url("login/logout") ?>" class="dropdown-item"><i class="fa fa-power-off" aria-hidden="true"></i>
 Sair</a></li>
                            </ul>
                        </li>
                        <a href="<?= site_url("login/logout") ?>" class="btn btn-danger no-print no-mobile">Sair do sistema</a>
                    </ul>
                </div>
            </div>
        </nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
<?php endif ?>

        <?php if($this->session->flashdata("success")) : ?>
            <p style="display: none;"><?= $sucesso = $this->session->flashdata("success") ?></p>
            <?php echo "<script type='text/javascript'>
                $(document).ready(function(){

                    demo.initChartist();

                    $.notify({
                        icon: 'pe-7s-info',
                        message: '". $sucesso ."'

                    },{
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'center'
                        },
                        timer: 4000
                    });

                });
            </script>"; ?>
        <?php endif ?>
        <?php if($this->session->flashdata("danger")) : ?>
        <p style="display: none;"><?= $erro = $this->session->flashdata("danger") ?></p>
         <?php echo "<script type='text/javascript'>
                $(document).ready(function(){

                    demo.initChartist();

                    $.notify({
                        icon: 'pe-7s-key',
                        message: '". $erro ."'

                    },{
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'center'
                        },
                        timer: 4000
                    });

                });
            </script>"; ?>
        <?php endif ?>