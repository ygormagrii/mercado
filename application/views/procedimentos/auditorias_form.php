<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h3>Agora basta imprimir o arquivo abaixo</h3>
            <?php echo form_open_multipart('auditorias/auditorias_form');?>
            <br />
			<a href="http://lotopro.com.br/sistema/modelo_auditoria.pdf" class="btn btn-success text-center" target="_blank">Imprimir arquivo de apoio</a> <?= anchor('auditorias/','< Voltar', array("class" => "btn btn-info text-center"))?>
			</form>
			<br />

        </div>
         	<div class="container">
			
	</div>
</div>

</body>
</html>