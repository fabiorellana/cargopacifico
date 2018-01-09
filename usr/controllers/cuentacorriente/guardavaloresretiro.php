<?php
include ("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla      = $_POST['idplanillaretiro'];
$monto 		   = $_POST['montoretiro'];
$motivo        = $_POST['motivoretiro'];

$tabla   = "cc_retiro";
$valores = "'$planilla','$motivo','$monto'";
$save->Agregar($tabla, $valores);