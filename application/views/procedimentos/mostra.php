    <?php 
	// CRIANDO ARRAY FNAME
	$fname = $produto["fname"];
	$fname_array = explode(";", $fname);
	#print_r($fname_array);
?>


<?= anchor('procedimentos/','< VOLTAR', array("class" => "btn btn-primary no-print"))?> &nbsp;
<a href="javascript:print();" class="btn btn-success no-print">Imprimir / Baixar PDF</a>
<br /><br />
<style type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 44px 0px 96px 0px;padding: 0px;border: none;width: 794px;}
#page_1 #id_1 {border:none;margin: 9px 0px 0px 256px;padding: 0px;border:none;width: 538px;overflow: hidden;}
#page_1 #id_2 {border:none;margin: 42px 0px 0px 28px;padding: 0px;border:none;width: 753px;overflow: hidden;}
#page_1 #id_2 #id_2_1 {float:left;border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 152px;overflow: hidden;}
#page_1 #id_2 #id_2_2 {float:left;border:none;margin: 3px 0px 0px 32px;padding: 0px;border:none;width: 569px;overflow: hidden;}
#page_1 #id_3 {border:none;margin: 15px 0px 0px 0px;padding: 0px;border:none;width: 794px;}

#page_1 #p1dimg1 {position:absolute;top:0px;left:-1px;z-index:-1;height:968px;}
#page_1 #p1dimg1 #p1img1 {width:759px;height:968px;}

#page_1 #p1inl_img1 {position:relative;width:1px;height:19px;}
#page_1 #p1inl_img2 {position:relative;width:1px;height:15px;}
#page_1 #p1inl_img3 {position:relative;width:1px;height:15px;}
#page_1 #p1inl_img4 {position:relative;width:1px;height:19px;}



.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: bold 13px 'Arial';line-height: 16px;}
.ft1{font: bold 14px 'Arial';line-height: 15px;}
.ft2{font: bold 12px 'Arial';line-height: 15px;}
.ft3{font: bold 9px 'Arial';line-height: 11px;}
.ft4{font: bold 37px 'Arial';line-height: 24px;}
.ft5{font: bold 15px 'Arial';color: #ffffff;margin-left: 38px;line-height: 0px;position: relative;top: -4px;left: -8px;}
.ft6{font: bold 19px 'Arial';color: #ffffff;line-height: 22px;}
.ft7{font: bold 7px 'Arial';line-height: 7px;position: relative; bottom: 4px;left: 9px;}
.ft8{font: bold 15px 'Arial';line-height: 18px;}
.ft9{font: bold 7px 'Arial';line-height: 7px;}
.ft10{font: bold 12px 'Arial';color: #ff0000;line-height: 15px;}
.ft11{font: bold 10px 'Arial';line-height: 12px;}
.ft12{font: bold 13px 'Arial';margin-left: 4px;line-height: 16px;}
.ft13{font: 1px 'Arial';line-height: 3px;}
.ft14{font: bold 13px 'Arial';color: #ffffff;line-height: 16px;}
.ft15{font: bold 13px 'Arial';line-height: 14px;}
.ft16{font: bold 12px 'Arial';line-height: 14px;}
.ft17{font: bold 13px 'Arial';line-height: 15px;}
.ft18{font: 1px 'Arial';line-height: 4px;}
.ft19{font: bold 12px 'Arial';color: #ffffff;line-height: 15px;}
.ft20{font: 1px 'Arial';line-height: 11px;}
.ft21{font: bold 13px 'Arial';line-height: 13px;}
.ft22{font: 1px 'Arial';line-height: 13px;}
.ft23{font: 1px 'Arial';line-height: 1px;}
.ft24{font: 1px 'Arial';line-height: 15px;}
.ft25{font: 1px 'Arial';line-height: 6px;}
.ft26{font: 1px 'Arial';line-height: 10px;}
.ft27{font: 1px 'Arial';line-height: 14px;}
.ft28{font: bold 8px 'Arial';margin-left: 2px;line-height: 10px;}
.ft29{font: bold 8px 'Arial';line-height: 10px;}

.p0{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p2{text-align: left;padding-left: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p3{text-align: right;padding-left: 65px;margin-top: 10px;margin-bottom: 0px;text-indent: -49px;position: relative;top: 7px;left: -17px;}
.p4{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;}
.p5{text-align: left;padding-left: 49px;padding-right: 34px;margin-top: 22px;margin-bottom: 0px;text-indent: -49px;}
.p6{text-align: left;padding-left: 308px;margin-bottom: 0px;z-index: 9999;position: relative;top: 0px;}
.p7{text-align: center;padding-left: 42px;padding-right: 38px;margin-top: 3px;margin-bottom: 0px;}
.p8{text-align: left;padding-left: 154px;margin-bottom: 0px;}
.p9{text-align: left;padding-left: 26px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 80px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: left;padding-left: 74px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: left;padding-left: 48px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p13{text-align: left;padding-left: 59px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p14{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p15{text-align: left;padding-left: 255px;margin-top: 134px;margin-bottom: 0px;}
.p16{text-align: left;padding-left: 46px;padding-right: 60px;margin-top: 4px;margin-bottom: 0px;}
.p17{text-align: right;padding-right: 18px;margin-top: 28px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 50px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 55px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 348px;vertical-align: bottom;}
.td4{border-left: #000000 1px solid;border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 157px;vertical-align: bottom;}
.td5{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 198px;vertical-align: bottom;}
.td6{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 197px;vertical-align: bottom;}
.td7{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 170px;vertical-align: bottom;}
.td8{border-left: #000000 1px solid;border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 157px;vertical-align: bottom;}
.td9{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 198px;vertical-align: bottom;}
.td10{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 197px;vertical-align: bottom;}
.td11{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 170px;vertical-align: bottom;}
.td12{border-left: #000000 1px solid;border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 157px;vertical-align: bottom;background: #ff0000;}
.td13{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 198px;vertical-align: bottom;}
.td14{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 197px;vertical-align: bottom;}
.td15{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 170px;vertical-align: bottom;}
.td16{border-left: #000000 1px solid;border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 157px;vertical-align: bottom;background: #ff0000;}

.tr0{height: 21px;}
.tr1{height: 15px;}
.tr2{height: 7px;}
.tr3{height: 11px;}
.tr4{height: 19px;}
.tr5{height: 3px;}
.tr6{height: 18px;}
.tr7{height: 14px;}
.tr8{height: 4px;}
.tr9{height: 24px;}
.tr10{height: 13px;}
.tr11{height: 16px;}
.tr12{height: 6px;}
.tr13{height: 10px;}

.t0{width: 88px;font: bold 5px 'Arial';position: relative;top: 1.5px;}
.t1{width: 403px;margin-left: 1px;margin-top: 3px;font: bold 7px 'Arial';}
.t2{width: 726px;margin-left: 44px;margin-top: 159px;font: bold 13px 'Arial';}

</style>
</head>

<div id="page_1">
<div id="p1dimg1">
<img src="http://lotopro.com.br/sistema/cabecalho5.gif" alt="" style="width: 801px;height: 965px;"></div>

<div class="dclr"></div>
<div id="id_1">
<p class="p0 ft0" style="margin-left: 6.2%;"><nobr><?=$produto["nome"]?></nobr></p>
</div>
<div id="id_2">
<div id="id_2_1">
<table cellpadding="0" cellspacing="0" class="t0">
<tbody><tr>
    <td class="tr0 td0"><p class="p1 ft1">N° de</p></td>
    <td rowspan="2" class="tr1 td1"><p class="p2 ft2"><?=$produto["id"]?></p></td>
</tr>
<tr>
    <td class="tr2 td0"><p class="p1 ft1">Identificação:</p></td>
</tr>
</tbody></table>
</div>
<div id="id_2_2">
<p class="p4 ft8"><span class="ft7" style="left: 0px;top: -4px;">Unidade: </span><?=$produto["unidade"]?><span class="ft7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Local: </span>&nbsp;&nbsp; <?=$produto["local"]?></p>
<table cellpadding="0" cellspacing="0" class="t1">
<tbody><tr>
    <td class="tr3 td2"><p class="p1 ft9" style="position: relative;top: -2px;">Data:</p></td>
    <td class="tr3 td3"><p class="p1 ft3" style="padding-top: 3.5px;"><?=$produto["data"]?></p></td>
</tr>
</tbody></table>
</div>
</div>
<div id="id_3">
<table id="example" class="table table-striped table-bordered" style="width:100%"> 
    <tbody>
    	<tr>
    		<td colspan="4" style="background-color: white;"><?=$produto["content"]?></td>
    	</tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Número: <?=$produto["id"]?></td>
            <td>Data de Emissão: <?=$fname_array[2]?></td>
            <td>Data da Revisão: </td>
        </tr>
        <tr border="0"><td colspan="4"><p style="text-align: center;">Este documento não pode ser cedido ou copiado sem prévia autorização da empresa <b><?=$produto["unidade"]?></b></p></td></tr>
    </tfoot>
</table>

</div>
</div>