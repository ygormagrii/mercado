<?php 
    // VERIFICA SE USUÁRIO TEM NÍVEL PARA VISUALIZAR ESTÁ FUNCIONALIDADE
    foreach($nivel as $nivel) : 
        $nivel_procedimento = $nivel["usuarios"];
    endforeach; 
?>
<?php if($this->session->userdata("usuario_logado") && $nivel_procedimento == '1') : ?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Meus Usuários</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Status</th>
                	</tr>
                    </thead>
	                <tbody>
                        <?php foreach($usuarios as $usuario) : ?>
                        <?php 
                            // Formata Status
                            $status = $usuario["status"];
                            if($status == '1'){
                                $status = "<p class='text-danger'>Encerrado</p>";
                            }else{
                                $status = "<p class='text-success'>Ativado</p>";
                            }

                        ?>
                        <tr>
                            <td><?= character_limiter($usuario["id"], 10) ?></td>
                            <td><?= character_limiter($usuario["nome"], 20) ?></td>
                            <td><?=$status?></td>                            
                            <td><?= anchor("usuarios/editar/{$usuario['id']}", "Editar"); ?></td>
                            <td><?= anchor("usuarios/excluir/{$usuario['id']}", "Excluir"); ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>                	
            </div>
        </div>

        <?= anchor('usuarios/formulario','Adicionar um usuário', array("class" => "btn btn-primary"))?>

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

