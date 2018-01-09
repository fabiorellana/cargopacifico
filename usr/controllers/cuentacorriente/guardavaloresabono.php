<?php
include ("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla      = $_POST['idplanillaabono'];
$nfactura      = $_POST['nfacturaA'];
$comboabono    = $_POST['cAbono'];
$comboauto	   = $_POST['cAutorizacion'];
$obsabono      = $_POST['observacionA'];
$monto         = $_POST['montoabono'];

$tabla   = "cc_abono";
$valores = "'$planilla', '$nfactura', '$comboabono', '$monto', '$comboauto', '$obsabono'";
$save->Agregar($tabla, $valores);