<?= anchor('pdt/','< VOLTAR', array("class" => "btn btn-primary no-print"))?> &nbsp;
<a href="javascript:print();" class="btn btn-success no-print">Imprimir / Baixar PDF</a>
<br /><br />
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr height="200" width="100%"> 
    		<th colspan="2"><img src="http://lotopro.com.br/images/logo2.png" style="margin-left: 23%;" /></th>
    		<th colspan="2" style="FONT-SIZE: 29PX;TEXT-ALIGN: CENTER;FONT-WEIGHT: BOLD;text-transform: uppercase;color: black;" class="title-print"><?=$produto["nome"]?></th>
    		
    	</tr>
    	<tr height="30"></tr>
        <tr>
			<th>Data</th>
			<th>Setor</th>
			<th>Máquina ou Local</th>
			<th>Funcionários envolvidos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
			<td><?=$produto["data"]?></td>
			<td><?=$produto["setor"]?></td>
			<td><?=$produto["maquina_ou_local"]?></td>
			<td><?=$produto["funcionarios"]?></td>
	    </tr>
    </tbody>
    <tfoot>
    	<tr>
    		<td colspan="2">Número: <?=$produto["id"]?></td>
    		<td>Data de Emissão: </td>
    		<td>Data da Revisão: </td>
    	</tr>
    	<tr border="0"><td colspan="4"><p style="text-align: center;">Este documento não pode ser cedido ou copiado sem prévia autorização da empresa <b>NOME DA SUA EMPRESA</b></p></td></tr>
    </tfoot>
</table>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr height="200" width="100%"> 
    		<th colspan="2"><img src="http://lotopro.com.br/images/logo2.png" style="margin-left: 23%;" /></th>
    		<th colspan="2" style="FONT-SIZE: 29PX;TEXT-ALIGN: CENTER;FONT-WEIGHT: BOLD;text-transform: uppercase;color: black;" class="title-print"><?=$produto["nome"]?></th>
    		
    	</tr>
    	<tr height="30"></tr>
    </thead> 
    <tbody>
    	<tr>
    		<td colspan="4" style="background-color: white;text-align: center;"><?=$produto["content"]?></td>
    	</tr>
    </tbody>
</table>

</div>
</div>