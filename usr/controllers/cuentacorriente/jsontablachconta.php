<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$id=$_POST['planilla'];
$json ->Json("SELECT cc_cheque_contabilidad.planilla, cc_cheque_contabilidad.N_cheque, cc_is_banco.nombre, cc_is_cliente.Nombre, cc_cheque_contabilidad.estado, cc_cheque_contabilidad.Fecha, cc_cheque_contabilidad.Observacion, cc_cheque_contabilidad.Monto from cc_cheque_contabilidad inner join cc_is_banco inner join cc_is_cliente  where cc_cheque_contabilidad.planilla='$id' and cc_cheque_contabilidad.Banco_id = cc_is_banco.id and cc_cheque_contabilidad.Rut_nombre = cc_is_cliente.id");