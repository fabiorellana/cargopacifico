<?php 
require("../Clases/class.cuentacorriente.php");
$objet=new Consultas;

$n_planilla=$_POST['var'];
$var="select * from ges_programacion where Planilla=".$n_planilla."";
$objet->consultar($var);
echo '<br>';


?>


	

