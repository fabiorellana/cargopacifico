<?php
session_start();
include '../../../dist/conexion.php';

if(isset($_POST)){
	$accion = filter_input(INPUT_POST, "Accion");

	if($accion=="jsonListarFlota"){
		$socio = $_SESSION['Rut'];
		jsonListarFlota($socio);
	}
	if($accion=="jsonListarFlotaTaller"){
		$socio = $_SESSION['Rut'];
		jsonListarFlotaTaller($socio);
	}
	if($accion =="jsonListarFlotaTrabajos"){
		$patente = filter_input(INPUT_POST, "patente");
		jsonListarFlotaTrabajos($patente);
	}
	if($accion == "jsonDetallePatente"){
		$patente = filter_input(INPUT_POST, "patente");
		jsonDetallePatente($patente);
	}
	if($accion == "jsonCentrosCosto"){
		jsonCentrosCosto();
	}
	if($accion == "insertaEstado"){
		$patente = filter_input(INPUT_POST, "patente");
		$condicion = filter_input(INPUT_POST, "condicion");
		$f1 = filter_input(INPUT_POST, "f1");
		$f2 = filter_input(INPUT_POST, "f2");
		$detalle = filter_input(INPUT_POST, "detalle");
		$lugar = filter_input(INPUT_POST, "lugar");
		insertaEstado($patente, $condicion, $f1, $f2, $detalle, $lugar);
	}

}
function jsonListarFlota($socio){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->listarFlota($socio);
	echo $json;
	$a = null;
}
function jsonListarFlotaTaller($socio){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->listarFlotaTaller($socio);
	echo $json;
	$a = null;
}
function jsonListarFlotaTrabajos($patente){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->listarFlotaTrabajos($patente);
	echo $json;
	$a = null;
}
function jsonDetallePatente($patente){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->detallePatente($patente);
	echo $json;
	$a = null;
}
function jsonCentrosCosto(){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->listaCentrosCosto();
	echo $json;
	$a = null;
}
function insertaEstado($patente, $condicion, $f1, $f2, $detalle, $lugar){
	include '../../model/Flota.php';
	$a = new Flota();
	$json = $a->insertaEstado($patente, $condicion, $f1, $f2, $detalle, $lugar);
	echo $json;
	$a = null;
	
}