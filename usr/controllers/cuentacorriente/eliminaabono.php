<?php
$var=$_POST['planilla'];
require("../../model/cuentacorriente/MantenedorClass.php");
$elimina = new Mantenedor;

$elimina->con->Consultar("delete from cc_abono where planilla='$var'");