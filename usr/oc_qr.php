<?php
    include('./lib/phpqrcode/qrlib.php');
    include '../dist/conexion.php';
    $orden = filter_input(INPUT_GET, "orden");
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
    include './model/OC.php';
    $a = new OC();
    $oc = json_decode($a->traerOC($orden));
    $a = null;
    $datos ="Orden: ".$orden."\n";
    $datos.="Rut Proveedor: ". toMoney($oc->cabecera->ProvRut, '')."-".$oc->cabecera->ProvDv."\n";
    $neto = 0;
	for($i=0;$i<count($oc->detalle);$i++){
		$neto += $oc->detalle[$i]->neto;
	}
	$datos .= "Monto Neto: ". toMoney($neto, "$"). "\n";

    if($oc->cabecera->OrAuN == ""){
    	$datos.="Orden NO AUTORIZADA";
    }
    else{
    	$datos.="Orden AUTORIZADA";
    }
QRcode::png($datos);