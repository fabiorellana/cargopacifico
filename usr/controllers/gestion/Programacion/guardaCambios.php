<?php
require("../../../model/gestion/MantenedorClass.php");
$update = new Mantenedor;
$conductor=$_POST['selectConductor'];
$Planilla=$_POST['planilla'];

$ayu1=$_POST['ayu1'];
if($ayu1){
$valor="ayu1='".$ayu1."'";
$where="Planilla = '".$Planilla."'";
$update->Editar("ges_programacion", $valor, $where);
}

$ayu2=$_POST['ayu2'];
if($ayu2){
$valor="ayu2='".$ayu2."'";
$where="Planilla = '".$Planilla."'";
$update->Editar("ges_programacion", $valor, $where);
}

$ayu3=$_POST['ayu3'];
if($ayu3){
$valor="ayu3='".$ayu3."'";
$where="Planilla = '".$Planilla."'";
$update->Editar("ges_programacion", $valor, $where);
}

$where="Planilla = '".$Planilla."'";
$update->Editar("ges_solicita_cambio", "estado=0", $where);


header("location:../../../admin_programacion.php");
