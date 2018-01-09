<?php
require("../../../model/gestion/Programacion/class.php");

$a = new Ges_prog;

if(isset($_POST)){
	$funcion =  filter_input(INPUT_POST, "funcion");

	if($funcion=="tblprogramacion"){
		$centro=$_POST['centro'];
		$fecha=$_POST['fecha'];
		$centrousr = $_POST['centrousr'];
		echo $a->tblprogramacion($centro, $fecha, $centrousr);
	}

	if($funcion=="cargadatosmodaleditar"){
		$planilla=$_POST['planilla'];
		echo $a->cargadatosmodaleditar($planilla);
	}


    if($funcion=="comboconductor"){
	    $centro=$_POST['centro'];
		echo $a->comboconductores($centro);
	}

	if($funcion=="cargaprogramados"){
		$planilla=$_POST['planilla'];
		echo $a->cargaprogramados($planilla);
	}

	if($funcion=="comboayudante"){
		$centro=$_POST['centro'];
		echo $a->comboayudante($centro);
	}

	if($funcion == "jsonComboCentro"){
		$centrousr = $_POST['centrousr'];
	   echo $a->comboCentro($centrousr);
	}

	if($funcion == "updateayudante1"){
		$rut1 = $_POST['rut1'];
		$planilla1 = $_POST['pla1'];
		$vuelta1 = $_POST['vuelta1'];
		echo $a->modificarAyudante1($rut1, $planilla1, $vuelta1);
	}

	if($funcion == "updateayudante2"){
		$rut2 = $_POST['rut2'];
		$planilla2 = $_POST['pla2'];
		$vuelta2 = $_POST['vuelta2'];
		echo $a->modificarAyudante2($rut2, $planilla2, $vuelta2);
	}

	if($funcion == "updateayudante3"){
		$rut3 = $_POST['rut3'];
		$planilla3 = $_POST['pla3'];
		$vuelta3 = $_POST['vuelta3'];
		echo $a->modificarAyudante3($rut3, $planilla3, $vuelta3);
	}

	if($funcion == "updateconductor"){
		$rutchofer = $_POST['rutch'];
		$planillachofer = $_POST['plan'];
		echo $a->modificarConductor($rutchofer, $planillachofer);
	}

	if($funcion == "cantfallasconductores"){
		echo $a->cantfallasconductores();
	}

	if($funcion == "cantfallasayudantes"){
		echo $a->cantfallasayudantes();
	}

	if($funcion == "tblFallaA"){
		echo $a->tblFallaA();
	}

	if($funcion == "tblFallaC"){
		echo $a->tblFallaC();
	}

	if($funcion == "permisoscentros"){
		echo $a->permisoscentros();
	}
}