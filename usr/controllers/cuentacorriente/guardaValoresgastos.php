<?php
include("../../model/cuentacorriente/MantenedorClass.php");
$save = new Mantenedor;

$planilla=mysql_real_escape_string($_POST['idplanilla']);
$monto=mysql_real_escape_string($_POST['TxtMonto']);
$obs=mysql_real_escape_string($_POST['TxtObs']);
$item=mysql_real_escape_string($_POST['comboGAstos']);

$tabla = "cc_gastos";
$valores="'','$planilla','$item','$monto', '$obs'";
$save ->Agregar($tabla, $valores);