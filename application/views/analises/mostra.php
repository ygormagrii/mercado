<?php 
	// CRIANDO ARRAY FNAME
	$fname = $produto["fname"];
	$fname_array = explode(";", $fname);
	#print_r($fname_array);
?>

<?= anchor('analises/','< VOLTAR', array("class" => "btn btn-primary no-print"))?> &nbsp;
<a href="javascript:print();" class="btn btn-success no-print">Imprimir / Baixar PDF</a>
<br /><br />
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr height="200" width="100%"> 
    		<th><img src="http://lotopro.com.br/images/logo2.png" style="margin-left: 23%;" /></th>
    		<th colspan="2" style="FONT-SIZE: 29PX;TEXT-ALIGN: CENTER;FONT-WEIGHT: BOLD;text-transform: uppercase;color: black;" class="title-print"><?=$produto["nome"]?></th>
    		<th>
    			<p></p>
    			<p style="text-align: center;font-size: 19px;color: black;">Data: <?=$produto["data"]?></p>
    		</th>
    	</tr>
    	<tr height="30"></tr>
    </thead>
    <thead>
        <tr>
			<th>Etapas do trabalho</th>
			<th>Riscos</th>
			<th>Medidas preventivas e protetivas</th>
			<th>Responsáveis</th>
        </tr>
    </thead>
    <tbody>
        <tr>
			<td><input name="fname[]" value="<?=$fname_array[0]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[1]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[2]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[3]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td><input name="fname[]" value="<?=$fname_array[4]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[5]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[6]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[7]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td><input name="fname[]" value="<?=$fname_array[8]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[9]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[10]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[11]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td><input name="fname[]" value="<?=$fname_array[12]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[13]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[14]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[15]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td><input name="fname[]" value="<?=$fname_array[16]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[17]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[18]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[19]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td><input name="fname[]" value="<?=$fname_array[20]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[21]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[22]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[23]?>" type="text" readonly="true"></td>
	    </tr>
    </tbody>
    <tr height="30"></tr>
    <thead>
        <tr>
			<th colspan="2">Nome dos funcionários envolvidos no trabalho</th>
			<th>Empresa (s)</th>
			<th>Assinatura (s)</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
			<td colspan="2"><input name="fname[]" value="<?=$fname_array[24]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[25]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[26]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td colspan="2"><input name="fname[]" value="<?=$fname_array[27]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[28]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[29]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td colspan="2"><input name="fname[]" value="<?=$fname_array[30]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[31]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[32]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td colspan="2"><input name="fname[]" value="<?=$fname_array[33]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[34]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[35]?>" type="text" readonly="true"></td>
	    </tr>
	    <tr>
			<td colspan="2"><input name="fname[]" value="<?=$fname_array[36]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[37]?>" type="text" readonly="true"></td>
			<td><input name="fname[]" value="<?=$fname_array[38]?>" type="text" readonly="true"></td>
	    </tr>
    </tbody>
    <tfoot>
    	<tr border="0"><td colspan="4"><p style="text-align: center;"><b>Observação: Todas as pessoas envolvidas deverão receber as orientações referentes a esta Análise de Risco.</b></p></td></tr>
    </tfoot>
</table>

</div>
</div>