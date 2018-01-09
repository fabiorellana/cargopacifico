<?php 
include "usr/model/login/class.php";
$id=$_SESSION["idusr"];
error_reporting(0);
$redirige= new Login();
$redirige->redirigir($id);
//require('usr/include/valida.php');
?>
Redirigiendo...