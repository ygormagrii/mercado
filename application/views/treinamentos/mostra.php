<?= anchor('treinamentos/','< VOLTAR', array("class" => "btn btn-primary no-print"))?> &nbsp;
<a href="javascript:print();" class="btn btn-success no-print">Imprimir / Baixar PDF</a>
<br /><br />
<table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr height="200" width="100%"> 
    		<th colspan="2"><img src="http://lotopro.com.br/images/logo2.png" style="margin-left: 23%;" /></th>
    		<th colspan="2" style="FONT-SIZE: 29PX;TEXT-ALIGN: CENTER;FONT-WEIGHT: BOLD;text-transform: uppercase;color: black;" class="title-print"><?=$produto["nome"]?><br /> <span style="font-size: 12px;"><strong>Tipo de treinamento:</strong><?=$produto['tipo']?><br /> <span style="font-size: 12px;"><strong>Data do treinamento:</strong><?=$produto['data']?></span></th>
    		
    	</tr>
    	<tr height="30"></tr>
            <th colspan="4" class="text-center" style="font-size: 16px;background-color: red;color: white;font-weight: bold;" bgcolor="red">Funcionários participantes</th>
        <tr>
			<th>Código do Funcionário</th>
			<th>Nome do Funcionário</th>
            <th>Documento de identificação</th> 
			<th>Assinatura</th>
        </tr>

    </thead>
    <tbody>
        <tr class="tr-1">
			<td><input name="fname[]" type="text" readonly="true"></td>
			<td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
			<td><input name="fname[]" type="text" readonly="true"></td>
	    </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
    </tbody>
    <tfoot>
    	<tr>
    		<td colspan="2">ID Do Treinamento: <?=$produto["id"]?></td>      
    		<td>Data de Emissão: <?=$produto["data"]?></td>
    		<td>Data da Revisão: </td>
    	</tr>
    	<tr border="0"><td colspan="4"><p style="text-align: center;">Este documento não pode ser cedido ou copiado sem prévia autorização da empresa <b>NOME DA SUA EMPRESA</b></p></td></tr>
    </tfoot>
</table>

<div class="visible-print margem-bot" style="display: none;"><br /><br /><br /><br /></div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr height="200" width="100%"> 
    		<th colspan="2"><img src="http://lotopro.com.br/images/logo2.png" style="margin-left: 23%;" /></th>
    		<th colspan="2" style="FONT-SIZE: 29PX;TEXT-ALIGN: CENTER;FONT-WEIGHT: BOLD;text-transform: uppercase;color: black;" class="title-print"><?=$produto["nome"]?></th>
    		
    	</tr>
    	<tr height="30"></tr>
        <th colspan="4" class="text-center" style="font-size: 16px;background-color: green;color: white;font-weight: bold;">Etapas do treinamento</th>
        <tr>
            <th>Código da Etapa</th>
            <th>Nome da Etapa</th>
            <th>Status da Etapa</th>
            <th>Data de conclusão da Etapa</th>
        </tr>
    </thead> 
    <tbody>
    	<tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
        <tr class="tr-1">
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
            <td><input name="fname[]" type="text" readonly="true"></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">ID Do Treinamento: <?=$produto["id"]?></td>
            <td>Data de Emissão: <?=$produto["data"]?></td>
            <td>Data da Revisão: </td>
        </tr>
        <tr border="0"><td colspan="4"><p style="text-align: center;">Este documento não pode ser cedido ou copiado sem prévia autorização da empresa <b>NOME DA SUA EMPRESA</b></p></td></tr>
    </tfoot>
</table>

</div>
</div>