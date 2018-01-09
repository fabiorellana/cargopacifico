<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$json = new Mantenedor;
$id=$_POST['planilla'];
$json ->Json("SELECT * FROM cc_retiro where planilla = '$id'");