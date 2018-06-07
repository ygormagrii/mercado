<?php 
    // VERIFICA SE USUÁRIO TEM NÍVEL PARA VISUALIZAR ESTÁ FUNCIONALIDADE
    foreach($nivel as $nivel) : 
        $nivel_procedimento = $nivel["treinamentos"];
    endforeach; 
?>
<?php if($nivel_procedimento == '1') : ?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h2 class="title text-center">Treinamentos</h2>
        </div>
        <div class="content table-responsive table-full-width">

            <p class="text-center">Selecione abaixo o treinamento que deseja realizar: </p>
            <div class="text-center">
            <a href="http://lotopro.com.br/sistema/index.php/treinamentos/cadastra" class="btn btn-success"><i class="pe-7s-notebook"></i> Gerar um novo treinamento</a>
            <a href="http://lotopro.com.br/sistema/index.php/treinamentos/videos" class="btn btn-danger"><i class="pe-7s-lock"></i> Treinamentos para dispositivos</a>
            </div>
            <br />
            <br />
        </div>
    </div>
    <div class="card">
    <div class="header">
            <h2 class="title text-center">Treinamentos criados</h2>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Data do treinamento</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($procedimentos as $procedimento) : ?>
                        <tr>
                            <td><?=$procedimento["id"]?></td>
                            <td class="no-mobile"><?=$procedimento["nome"]?></td>
                            <td class="no-mobile"><?= character_limiter($procedimento["tipo"]) ?></td>
                            <td class="no-mobile"><?= character_limiter($procedimento["descricao"]) ?></td>
                            <td class="no-mobile"><?=$procedimento["data"]?></td>
                            <td><?= anchor("treinamentos/{$procedimento['id']}", "Download lista de presença"); ?></td>
                            <td><a href="http://lotopro.com.br/sistema/modelos_arquivos/Modelo-Treinamentos-Lotopro.pptx">Download do modelo de treinamento</a></td>

                            <?php $status_treinamentos = $procedimento["caminho_arquivo"];
                                if($status_treinamentos != ''){ 

                                    $caminho_arquivo = $procedimento["caminho_arquivo"]; 
                                    $pedacos = explode("/", $caminho_arquivo);
                                    $nome_arquivo = $pedacos[10];
                                    $termo = 'doc';
                                    $pattern = '/' . $termo . '/';

                                    if (preg_match($pattern, $nome_arquivo)) {
                                        $caminho_final = "https://view.officeapps.live.com/op/view.aspx?src=http://lotopro.com.br/sistema/".$pedacos[9]."/".$pedacos[10];
                                    }else{
                                        $caminho_final = "http://lotopro.com.br/sistema/".$pedacos[9]."/".$pedacos[10];
                                    }


                                ?>
                                <td class="text-success"><a href="<?=$caminho_final?>" class="text-success">Visualizar lista de presença</a></td>
                            <?php }else{ ?>
                                <td><?= anchor("treinamentos/importar/{$procedimento['id']}", "Importar Lista de presença preenchida"); ?></a></td>
                            <?php } ?>

                            <td><?= anchor("treinamentos/excluir/{$procedimento['id']}", "Excluir"); ?></td>
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

<?php endif; ?>