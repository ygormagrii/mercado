
<?= anchor('produtos/','< VOLTAR', array("class" => "btn btn-primary"))?>
<h2><?= $produto["nome"] ?></h2><br>


Última edição: <?= $produto["data"] ?><br>
<?= auto_typography($produto["descricao"]) ?><br>
<?= $produto["foto"]; ?>

<br />