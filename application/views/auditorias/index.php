<?php 
    // VERIFICA SE USUÁRIO TEM NÍVEL PARA VISUALIZAR ESTÁ FUNCIONALIDADE
    foreach($nivel as $nivel) : 
        $nivel_procedimento = $nivel["auditorias"];
    endforeach; 
?>
<?php if($this->session->userdata("usuario_logado") && $nivel_procedimento == '1') : ?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h2 class="title text-center">Auditorias</h2>
        </div>
        <div class="content table-responsive table-full-width">

        	<p class="text-center">Selecione abaixo o que deseja auditar: </p>
        	<div class="text-center">
        	<?= anchor('procedimentos/','Auditar Procedimentos', array("class" => "btn btn-primary"))?>

        	<?= anchor('produtos/','Auditar Dispositivos', array("class" => "btn btn-success"))?>
        	</div>
        	<br />
        	<br />
        </div>
    </div>
    <div class="card">
    <div class="header">
            <h2 class="title text-center">Auditorias geradas</h2>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Data de auditoria</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($procedimentos as $procedimento) : ?>
                        <?php $caminho_arquivo = substr($procedimento["caminho_arquivo"], -25);?>
                        <tr>
                            <td><?=$procedimento["id"]?></td>
                            <td><?=$procedimento["nome"]?></td>
                            <td><?= character_limiter($procedimento["tipo"]) ?></td>
                            <td><?= character_limiter($procedimento["descricao"]) ?></td>
                            <td><?=$procedimento["data"]?></td>
                            <td><?= anchor("auditorias/importar/{$procedimento['id']}", "Importar arquivo preenchido"); ?></a></td>
                            <td><a href="http://lotopro.com.br/sistema/<?=$caminho_arquivo?>" target="_blank">Visualizar arquivo preenchido</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

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
    <p>...</p>
<?php endif; ?>