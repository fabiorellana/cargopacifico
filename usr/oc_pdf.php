<?php require ('include/valida.php');
error_reporting(1);
function toMoney($val,$symbol='$',$r=0)
{
    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 2) ? $j % 2 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $d : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $d,substr($i,$j)) ;
}
include '../dist/conexion.php';
require_once('./class.ezpdf.php');
$orden =filter_input(INPUT_GET, "oc");

    include './model/OC.php';
    $a = new OC();
    $oc = json_decode($a->traerOC($orden));
    $a = null;

$pdf = new Cezpdf('letter');
//$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(2,1,1.5,1.5);
$pdf->selectFont('./fonts/Helvetica.afm');


$options = array(
                'shadeCol'=>array(0.9,0.9,0.9),
                'xOrientation'=>'center',
                'width'=>500,
                'showLines'=>'0','showHeadings'=>1
            );

//$pdf->ezTable($data, $titles, '', $options);

$pdf->ezImage("../images/logo.jpg",-20,200,'none','left');
//$pdf->ezImage("./oc_qr.php?orden=".$orden,-20,200,'none','right');
$link = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$pdf->addPngFromFile($link."/oc_qr.php?orden=".$orden, 510, 705, 50);
$pdf->addText(210, 700, 14, "ORDEN DE COMPRA");
$pdf->addText(500, 700, 8, "Nro. ".$orden);

$pdf->addText(50,702,8,utf8_decode("Fecha de impresión: ").date("d/m/Y"));
$pdf->addText(50,694,8,utf8_decode("Hora de impresión: ").date("H:i:s"));
$pdf->setLineStyle(1);
$pdf->line(40, 690, 570, 690);
$date = new DateTime($oc->cabecera->OrFec);


$pdf->ezText(utf8_decode("<b>Fecha de emisión:</b> ").$date->format('d/m/Y'), 8);
$pdf->ezText("<b>Proveedor:</b> ".utf8_decode($oc->cabecera->ProvNom), 8);
$pdf->ezText("<b>RUT:</b> ".toMoney($oc->cabecera->ProvRut,'')."-".$oc->cabecera->ProvDv, 8);
$pdf->ezText(utf8_decode("<b>Dirección:</b> ").utf8_decode($oc->cabecera->ProvDir), 8);
$pdf->ezText("<b>Comuna:</b> ".utf8_decode($oc->cabecera->ComuD), 8);
//condiciones de Pago
$condicionPago = "";
if($oc->cabecera->OrD==1){
    $condicionPago.="Día";
}
if($oc->cabecera->OrD30==1){
    $condicionPago.="/30";
}
if($oc->cabecera->OrD60==1){
    $condicionPago.="/60";
}
if($oc->cabecera->OrD90==1){
    $condicionPago.="/90";
}
if($oc->cabecera->OrD120==1){
    $condicionPago.="/120";
}
if($oc->cabecera->OrD150==1){
    $condicionPago.="/150";
}
if($oc->cabecera->OrD180==1){
    $condicionPago.="/180";
}
$pdf->ezText(utf8_decode("<b>Condición de Pago:</b> Cheque ").utf8_decode($condicionPago), 8);
$pdf->ezText("<b>Entregar en:</b> ".utf8_decode($oc->cabecera->OrEnt), 8);
$pdf->ezText("\n", 8);
$pdf->ezText("<b>FACTURAR A:</b> ", 8);
$pdf->ezText("<b>RUT:</b> ".toMoney($oc->cabecera->EmpRut, '')."-".$oc->cabecera->EmpDv, 8);
$pdf->ezText("<b>Nombre:</b> ".utf8_decode($oc->cabecera->EmpNom), 8);
$pdf->ezText("<b>Giro:</b> ".utf8_decode($oc->cabecera->EmpGiro), 8);
$pdf->ezText(utf8_decode("<b>Dirección:</b> ").utf8_decode($oc->cabecera->EmpDir), 8);
$pdf->ezText(utf8_decode("<b>Comuna:</b> ").utf8_decode($oc->cabecera->EmpComuna), 8);
$pdf->line(40, 610, 570, 610);
$pdf->line(40, 540, 570, 540);
//$pdf->rectangle(40,500,450,20);
$pdf->ezText("\n", 8);
$productos = array();
$neto = 0;
for($i=0;$i<count($oc->detalle);$i++){
    array_push($productos, array("FamC"=>utf8_decode($oc->detalle[$i]->prodD), "CenCod"=>utf8_decode($oc->detalle[$i]->centD),"OrCan"=>toMoney($oc->detalle[$i]->cant, ''),"OrValU"=>toMoney($oc->detalle[$i]->valor, ''), "OrTotU"=>toMoney($oc->detalle[$i]->neto,'') ));
$neto += $oc->detalle[$i]->neto;
    //$pdf->ezText("FamC:".$oc->detalle[$i]->prodD, 8);
}
$titulos = array("FamC"=>"Producto", "CenCod"=>"Centro", "OrCan"=>"Cantidad", "OrValU"=>"Valor Unitario", "OrTotU"=>"Total");
$pdf->ezTable($productos, $titulos, "", array('width'=>525, 'cols'=>array("OrCan"=>array('justification'=>'right'),"OrValU"=>array('justification'=>'right'),"OrTotU"=>array('justification'=>'right'))));

$pdf->ezText("\nNETO: <b>".toMoney($neto, "$")."</b>", 10, array('justification' => 'right'));
$pdf->ezText("IVA: <b>".toMoney($neto * 0.19, "$")."</b>", 10, array('justification' => 'right'));
$pdf->ezText("Total: <b>".toMoney($neto * 1.19, "$")."</b>", 10, array('justification' => 'right'));

$pdf->ezText("\n<b>*****     ES REQUISITO ADJUNTAR ESTA OC A LA FACTURA     *****</b>", 10, array('justification' => 'center'));
$quienAutoriza = "";
if($oc->cabecera->OrAuN == ""){
    $quienAutoriza = "*** ORDEN DE COMPRA NO AUTORIZADA ***";
}
else{
    $quienAutoriza = "*** AUTORIZADA ***"; //.$oc->cabecera->OrAuN;
}
$pdf->ezText("\n\n".$quienAutoriza, 8, array('justification' => 'center'));



    $pdf->ezStream();
?>
