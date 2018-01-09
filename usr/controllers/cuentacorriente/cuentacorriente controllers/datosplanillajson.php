<?php
include("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$idPlanilla = $_POST['planilla'];
$sql="select Valor, Efectivo, Cheque, Promae, Flete_porteo from cc_history where Planilla=$idPlanilla";
$json->Json($sql);