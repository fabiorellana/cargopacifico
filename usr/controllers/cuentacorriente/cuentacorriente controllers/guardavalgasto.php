<?php
include ("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla = $_POST['idplanilla'];
$monto    = $_POST['TxtMonto'];
$obs      = $_POST['TxtObs'];
$item     = $_POST['comboGAstos'];

$tabla   = "cc_gastos";
$valores = "'','$planilla','$item','$monto', '$obs'";
$save->Agregar($tabla, $valores);