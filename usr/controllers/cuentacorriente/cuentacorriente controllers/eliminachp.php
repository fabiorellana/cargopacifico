<?php
$var=$_POST['id'];
require("../../model/cuentacorriente/MantenedorClass.php");
$elimina = new Mantenedor;

$elimina->con->Consultar("delete from cc_cheque_pendiente where id='$var'");