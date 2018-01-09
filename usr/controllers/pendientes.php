<?php 
session_start();
$fecha =date("y") . "-" . date("m") . "-" . date("d");
require("../../funciones/funciones.php");
$cnn=Conectar();
$cc=$_SESSION["cc"];
$sql="select count(id) as cant from ges_solicita_cambio where estado='1'";

$rs=mysql_query($sql, $cnn);
while($row=mysql_fetch_array($rs)){
	
	echo $row['cant'];
	
	}

?>