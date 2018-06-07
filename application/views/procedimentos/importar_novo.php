<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Parabéns! Seu procedimento foi importado com sucesso!</h3>
        </div>
        <div class="content table-responsive table-full-width">

			<ul>
			<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?= anchor('procedimentos/importar','Importar outro procedimento', array("class" => "btn btn-primary"))?>

	<?= anchor('procedimentos/formulario','Novo procedimento', array("class" => "btn btn-success"))?>

	<?= anchor('login/logout','Logout', array("class" => "btn btn-danger"))?>
</div>
