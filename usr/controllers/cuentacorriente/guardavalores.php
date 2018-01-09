<?php
include("../../model/cuentacorriente/MantenedorClass.php");
$guarda = new Mantenedor;

$id=mysql_real_escape_string($_POST['idplanilla']);
$val=mysql_real_escape_string($_POST['val']);
$f=mysql_real_escape_string($_POST['f']);
$ch=mysql_real_escape_string($_POST['ch']);
$pro=mysql_real_escape_string($_POST['pro']);
$fle=mysql_real_escape_string($_POST['fle']);

$total=$f+$ch+$pro;

$tabla="cc_history";
$valores="Valor='$val', Efectivo='$f', Cheque='$ch', Promae='$pro', Flete_porteo='$fle', Total_ingreso_1='$total' ";
$where="Planilla='$id'";
$guarda->Editar($tabla, $valores, $where);