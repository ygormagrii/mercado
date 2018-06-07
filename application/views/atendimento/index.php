<?php if($this->session->userdata("usuario_logado")) : ?>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Meus chamados</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Status</th>
                        <th></th>
                	</tr>
                    </thead>
	                <tbody>
                        <?php foreach($atendimentos as $atendimento) : ?>
                        <?php 
                            // Formata Status
                            $status = $atendimento["status"];
                            if($status == '1'){
                                $status = "<p class='text-danger'>Encerrado</p>";
                            }else{
                                $status = "<p class='text-success'>Ativado</p>";
                            }

                        ?>
                        <tr>
                            <td><?= character_limiter($atendimento["id"], 10) ?></td>
                            <td><?= character_limiter($atendimento["titulo"], 10) ?></td>
                            <td><?=$status?></td>                            
                            <td><?= anchor("atendimento/mostra/{$atendimento['id']}", "Visualizar"); ?></td>
                            <td><?= anchor("atendimento/excluir/{$atendimento['id']}", "Excluir"); ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>                	
            </div>
        </div>

        <?= anchor('atendimento/formulario','Abrir um chamado', array("class" => "btn btn-primary"))?>

    </div>

</div>
</div>

<?php endif ?>
