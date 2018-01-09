<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$id=$_POST['planilla'];
$json ->Json("SELECT cc_abono.N_nota_credito, cc_is_abono.concepto, cc_abono.monto, autorizaciones.Nombre, cc_abono.Observaciones FROM cc_abono INNER JOIN cc_is_abono INNER JOIN autorizaciones where cc_abono.Tipo_abono = cc_is_abono.codigo and cc_abono.autoriza_id = autorizaciones.id and cc_abono.Planilla = '$id'");