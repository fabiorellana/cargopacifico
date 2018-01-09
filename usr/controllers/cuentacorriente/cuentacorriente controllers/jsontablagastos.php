<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$id=$_POST['planilla'];
$json ->Json("select cc_is_gastos.descripcion, cc_gastos.Monto, cc_gastos.Observacion, cc_gastos.id from cc_gastos inner join cc_is_gastos where Planilla='$id' and cc_gastos.Id_gasto=cc_is_gastos.id");