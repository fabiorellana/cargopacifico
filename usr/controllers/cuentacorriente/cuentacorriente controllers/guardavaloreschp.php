<?php
include ("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla      = $_POST['idplanilla'];
$ncheque       = $_POST['ncheque'];
$banco         = $_POST['banco'];
$combocliente  = $_POST['combocliente'];
$comboconcepto = $_POST['comboconcepto'];
$estado        = $_POST['estado'];
$fechaRepo     = $_POST['fechaRepo'];
$txtobs        = $_POST['txtobs'];
$monto         = $_POST['monto'];

$tabla   = "cc_cheque_pendiente";
$valores = "'','$planilla','$ncheque','$banco','$combocliente','$comboconcepto','$monto','$estado','$fechaRepo','$txtobs'";
$save->Agregar($tabla, $valores);