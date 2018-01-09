<?php
if(isset($_POST)){
	$accion = filter_input(INPUT_POST, "Accion");
	if($accion=="jsonPeriodo"){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonPeriodo($quincena, $mes, $ano);
	}
	if($accion == 'jsonMonto'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonMonto($quincena, $mes, $ano);
	}
	if($accion == 'jsonCeros'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonTramosCero($quincena, $mes, $ano);
	}
	if($accion == 'jsonDuplicadas'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonDuplicadas($quincena, $mes, $ano);
	}
}

function jsonPeriodo($quincena, $mes, $ano){
	include '../../Clases/Oca.php';
	$a = new Oca();
	$json = $a->buscarPeriodo($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}

function jsonMonto($quincena, $mes, $ano){
	include '../../Clases/Oca.php';
	$a = new Oca();
	$json = $a->montoPeriodo($quincena, $mes, $ano);
	echo json_encode(number_format($json));
	$a = null;
}
function jsonTramosCero($quincena, $mes, $ano){
	include '../../Clases/Oca.php';
	$a = new Oca();
	$json = $a->buscarCeros($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}
function jsonDuplicadas($quincena, $mes, $ano){
	include '../../Clases/Oca.php';
	$a = new Oca();
	$json = $a->buscarDuplicados($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}