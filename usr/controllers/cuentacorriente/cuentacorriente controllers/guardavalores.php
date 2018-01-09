<?php
include ("../../model/cuentacorriente/MantenedorClass.php");
$guarda = new Mantenedor;

$id  = $_POST['idplanilla'];
$val = $_POST['val'];
$f   = $_POST['f'];
$ch  = $_POST['ch'];
$pro = $_POST['pro'];
$fle = $_POST['fle'];

$total = $f+$ch+$pro;

$tabla   = "cc_history";
$valores = "Valor='$val', Efectivo='$f', Cheque='$ch', Promae='$pro', Flete_porteo='$fle', Total_ingreso_1='$total' ";
$where   = "Planilla='$id'";
$guarda->Editar($tabla, $valores, $where);