<?php
include '../../../dist/conexion.php';
if(isset($_POST)){
	$accion = filter_input(INPUT_POST, "Accion");
	if($accion=="jsonListarOrdenes"){
		jsonListarOrdenes();
	}
	if($accion == "jsonListarOrdenesPendientes"){
		jsonListarOrdenesPendientes();
	}
	if($accion == "jsonListarOrdenesAutorizadas"){
		jsonListarOrdenesAutorizadas();
	}
	if($accion == "ingresarFacturaOC"){
		$nroFactura = filter_input(INPUT_POST, "nroFactura");
		$orden = filter_input(INPUT_POST, "orden");
		jsoningresarFacturaOC($nroFactura, $orden);
	}
	if($accion=="jsonListarEmpresas"){
		jsonListarEmpresas();
	}
	if($accion=="jsonListarProveedores"){
		jsonListarProveedores();
	}
	if($accion=="jsonListarPlanCosteo"){
		jsonListarPlanCosteo();
	}
	if($accion=="jsonListarProductoFamilia"){
		jsonListarProductoFamilia();
	}
	if($accion=="jsonListarCentros"){
		jsonListarCentros();
	}
	if($accion=="guardarOC"){
		$empresa = filter_input(INPUT_POST, "empresa");
		$proveedor = filter_input(INPUT_POST, "proveedor");
		$condPago = filter_input(INPUT_POST, "condPago");
		$comentario = filter_input(INPUT_POST, "txtComentario");
		$p0 = filter_input(INPUT_POST, "p0");
		$p30 = filter_input(INPUT_POST, "p30");
		$p60 = filter_input(INPUT_POST, "p60");
		$p90 = filter_input(INPUT_POST, "p90");
		$p120 = filter_input(INPUT_POST, "p120");
		$p150 = filter_input(INPUT_POST, "p150");
		$p180 = filter_input(INPUT_POST, "p180");
		$costeo = filter_input(INPUT_POST, "costeo");
		$cuenta = filter_input(INPUT_POST, "cuenta");
		$lugar = filter_input(INPUT_POST, "lugar");
		$cotizaciones = filter_input(INPUT_POST, "cotizaciones");
		$masbarata = filter_input(INPUT_POST, "masbarata");
		$tablaProductos = filter_input(INPUT_POST, "tablaProductos");
		guardarOC($empresa, $proveedor, $condPago, $comentario, $p0, $p30, $p60, $p90, $p120, $p150, $p180, $costeo, $cuenta, $lugar, $cotizaciones, $masbarata, $tablaProductos);
	}
	if($accion=="autorizarOC"){
		$orden = filter_input(INPUT_POST, "orden");
		autorizarOC($orden);
	}
	if($accion=="traerOC"){
		$orden = filter_input(INPUT_POST, "orden");
		traerOC($orden);
	}
}

function jsonListarOrdenes(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarOrdenes();
	echo $json;
	$a = null;
}
function jsonListarOrdenesPendientes(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarOrdenesPendientes();
	echo $json;
	$a = null;
}
function jsonListarOrdenesAutorizadas(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarOrdenesAutorizadas();
	echo $json;
	$a = null;
}
function jsoningresarFacturaOC($nroFactura, $orden){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->ingresarFacturaOC($nroFactura, $orden);
	echo $json;
	$a = null;
}
function jsonListarEmpresas(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarEmpresas();
	echo $json;
	$a = null;
}
function jsonListarProveedores(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarProveedores();
	echo $json;
	$a = null;
}
function jsonListarPlanCosteo(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarPlanCosteo();
	echo $json;
	$a = null;
}
function jsonListarProductoFamilia(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarProductoFamilia();
	echo $json;
	$a = null;
}
function jsonListarCentros(){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->listarCentros();
	echo $json;
	$a = null;
}
function guardarOC($empresa, $proveedor, $condPago, $comentario, $p0, $p30, $p60, $p90, $p120, $p150, $p180, $costeo, $cuenta, $lugar, $cotizaciones, $masbarata, $tablaProductos){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->guardarOC($empresa, $proveedor, $condPago, $comentario, $p0, $p30, $p60, $p90, $p120, $p150, $p180, $costeo, $cuenta, $lugar, $cotizaciones, $masbarata, $tablaProductos);
	echo $json;
	$a = null;
}
function traerOC($orden){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->traerOC($orden);
	echo $json;
	$a = null;
}
function autorizarOC($orden){
	include '../../model/OC.php';
	$a = new OC();
	$json = $a->autorizarOC($orden);
	echo $json;
	$a = null;	
}