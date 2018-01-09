<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$id=$_POST['planilla'];
$json ->Json("SELECT cc_is_cheque.codigo, cc_is_banco.nombre, cc_is_cliente.Nombre, cc_is_concepto.concepto, cc_cheque_pendiente.estado, cc_cheque_pendiente.observacion, cc_cheque_pendiente.monto from cc_cheque_pendiente inner join cc_is_cheque inner join cc_is_banco inner join cc_is_cliente inner join cc_is_concepto where planilla='$id' and cc_is_cheque.codigo=cc_cheque_pendiente.N_cheque and cc_cheque_pendiente.concepto = cc_is_concepto.id and cc_cheque_pendiente.Banco_id = cc_is_banco.id");