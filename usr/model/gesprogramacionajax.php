<?php
require("../../../model/gestion/Programacion/class.php");

$a = new Ges_prog;

	if(isset($_POST)){

	

	$funcion =  filter_input(INPUT_POST, "funcion");


	if($funcion=="tblprogramacion"){
	$centro=$_POST['centro'];
	$fecha=$_POST['fecha'];
	echo $a->tblprogramacion($centro, $fecha);
	}

	if($funcion=="cargadatosmodaleditar"){
		$Planilla=$_POST['Planilla'];
	echo $a->cargadatosmodaleditar($Planilla);
	}


	

if($funcion == "jsonComboCentro")
{
   echo $a->comboCentro();
}

	}