<?php
include("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla=mysql_real_escape_string($_POST['idplanilla']);
$ncheque=mysql_real_escape_string($_POST['ncheque']);
$banco=mysql_real_escape_string($_POST['banco']);
$combocliente=mysql_real_escape_string($_POST['combocliente']);
$comboconcepto=mysql_real_escape_string($_POST['comboconcepto']);
$estado=mysql_real_escape_string($_POST['estado']);
$fechaRepo=mysql_real_escape_string($_POST['fechaRepo']);
$txtobs=mysql_real_escape_string($_POST['txtobs']);
$monto=mysql_real_escape_string($_POST['monto']);


$tabla = "cc_cheque_pendiente";
$valores="'','$planilla','$ncheque','$banco','$combocliente','$comboconcepto','$monto','$estado','$fechaRepo','$txtobs'";
$save ->Agregar($tabla, $valores);