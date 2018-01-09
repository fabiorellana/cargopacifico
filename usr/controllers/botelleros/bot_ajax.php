<?php
include '../../../dist/conexion.php';
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
	if($accion == 'jsonbuscarCerosSinRevisar'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonbuscarCerosSinRevisar($quincena, $mes, $ano);
	}
	
	if($accion == 'jsonautorizarOcaCero'){
		$oca = filter_input(INPUT_POST, "oca");
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		$estado = filter_input(INPUT_POST, "estado");
		jsonautorizarOcaCero($oca, $quincena, $mes, $ano, $estado);
	}
	if($accion == 'jsonDuplicadas'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonDuplicadas($quincena, $mes, $ano);
	}
	if($accion =='jsonlistarCeros'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonlistarCeros($quincena, $mes, $ano);
	}
	if($accion =='jsonlistarDuplicados'){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		jsonlistarDuplicados($quincena, $mes, $ano);
	}
	if($accion=="jsonBuscaPolinomio"){
		$quincena = filter_input(INPUT_POST, "quincena");
		$mes = filter_input(INPUT_POST, "mes");
		$ano = filter_input(INPUT_POST, "ano");
		$zona = filter_input(INPUT_POST, "zona");
		jsonBuscaPolinomio($quincena, $mes, $ano, $zona);
	}
	if($accion=="jsonGuardarPolinomio"){
		    $quincena = filter_input(INPUT_POST, "quincena");
			$mes = filter_input(INPUT_POST, "mes");
			$ano = filter_input(INPUT_POST, "ano");
			$zona = filter_input(INPUT_POST, "zona");
            // procedimiento de guardado
            $fecha1 = filter_input(INPUT_POST, "fecha1");
            $dolar1 = filter_input(INPUT_POST, "dolar1");
            $uf1 = filter_input(INPUT_POST, "uf1");
            $petroleo1 = filter_input(INPUT_POST, "petroleo1");
            $icmo1 = filter_input(INPUT_POST, "icmo1");
            $fecha2 = filter_input(INPUT_POST, "fecha2");
            $dolar2 = filter_input(INPUT_POST, "dolar2");
            $uf2 = filter_input(INPUT_POST, "uf2");
            $petroleo2 = filter_input(INPUT_POST, "petroleo2");
            $icmo2 = filter_input(INPUT_POST, "icmo2");
            $var_dolar = filter_input(INPUT_POST, "var_dolar");
            $var_uf = filter_input(INPUT_POST, "var_uf");
            $var_petroleo = filter_input(INPUT_POST, "var_petroleo");
            $var_icmo = filter_input(INPUT_POST, "var_icmo");
            $pol_dolar = filter_input(INPUT_POST, "pol_dolar");
            $pol_uf = filter_input(INPUT_POST, "pol_uf");
            $pol_petroleo = filter_input(INPUT_POST, "pol_petroleo");
            $pol_icmo = filter_input(INPUT_POST, "pol_icmo");
            $ajuste_ccu = filter_input(INPUT_POST, "ajuste_ccu");
            $ajuste_calculado = filter_input(INPUT_POST, "ajuste_calculado");
            jsonGuardarPolinomio($quincena, $mes, $ano, $zona, $fecha1, $dolar1, $uf1, $petroleo1, $icmo1, $fecha2, $dolar2, $uf2, $petroleo2, $icmo2, $var_dolar, $var_uf, $var_petroleo, $var_icmo, $pol_dolar, $pol_uf, $pol_petroleo, $pol_icmo, $ajuste_ccu, $ajuste_calculado);
	}
	if($accion== "jsonEmpresas"){
		jsonEmpresas();
	}
	if($accion== "jsonGuardarEmpresa"){
		$nombreEmpresa = filter_input(INPUT_POST, "nombreEmpresa");
		jsonGuardarEmpresa($nombreEmpresa);
	}
	if($accion == "jsonEditarEmpresa"){
		$nombreEmpresaEdit = filter_input(INPUT_POST, "nombreEmpresaEdit");
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonEditarEmpresa($nombreEmpresaEdit, $emp_id);
	}
	if($accion == "jsonGuardarTracto"){
		$patenteTracto = filter_input(INPUT_POST, "patenteTracto");
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonGuardarTracto($patenteTracto, $emp_id);
	}
	if($accion == "jsonEditarTracto"){
		$patenteTracto = filter_input(INPUT_POST, "patenteTracto");
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonEditarTracto($patenteTracto, $emp_id);
	}
	if($accion == "jsonlistarTractos"){
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonlistarTractos($emp_id);
	}
	if($accion == "jsonGuardarRampla"){
		$patenteRampla = filter_input(INPUT_POST, "patenteRampla");
		$bahias = filter_input(INPUT_POST, "bahiasRampla");
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonGuardarRampla($patenteRampla, $bahias, $emp_id);
	}
	if($accion == "jsonEditarRampla"){
		$patenteRampla = filter_input(INPUT_POST, "patenteRampla");
		$bahias = filter_input(INPUT_POST, "bahiasRampla");
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonEditarRampla($patenteRampla, $bahias, $emp_id);
	}
	if($accion == "jsonlistarRamplas"){
		$emp_id = filter_input(INPUT_POST, "emp_id");
		jsonlistarRamplas($emp_id);
	}
}

function jsonPeriodo($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->buscarPeriodo($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}

function jsonMonto($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->montoPeriodo($quincena, $mes, $ano);
	echo json_encode(number_format($json));
	$a = null;
}
function jsonTramosCero($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->buscarCeros($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}
function jsonbuscarCerosSinRevisar($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->buscarCerosSinRevisar($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}
function jsonautorizarOcaCero($oca, $quincena, $mes, $ano, $estado){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->autorizarOcaCero($oca, $quincena, $mes, $ano, $estado);
	echo json_encode($json);
	$a = null;
}

function jsonDuplicadas($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->buscarDuplicados($quincena, $mes, $ano);
	echo json_encode($json);
	$a = null;
}
function jsonlistarCeros($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->listarCeros($quincena, $mes, $ano);
	echo $json;
	$a = null;
}
function jsonlistarDuplicados($quincena, $mes, $ano){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->listarDuplicados($quincena, $mes, $ano);
	echo $json;
	$a = null;
}
function jsonBuscaPolinomio($quincena, $mes, $ano, $zona){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->buscaPolinomio($quincena, $mes, $ano, $zona);
	echo $json;
	$a = null;
}
function jsonGuardarPolinomio($quincena, $mes, $ano, $zona, $fecha1, $dolar1, $uf1, $petroleo1, $icmo1, $fecha2, $dolar2, $uf2, $petroleo2, $icmo2, $var_dolar, $var_uf, $var_petroleo, $var_icmo, $pol_dolar, $pol_uf, $pol_petroleo, $pol_icmo, $ajuste_ccu, $ajuste_calculado){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->guardarPolinomio($quincena, $mes, $ano, $zona, $fecha1, $dolar1, $uf1, $petroleo1, $icmo1, $fecha2, $dolar2, $uf2, $petroleo2, $icmo2, $var_dolar, $var_uf, $var_petroleo, $var_icmo, $pol_dolar, $pol_uf, $pol_petroleo, $pol_icmo, $ajuste_ccu, $ajuste_calculado);
	echo $json;
	$a = null;
}
function jsonEmpresas(){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->listaEmpresas();
	echo $json;
	$a = null;
}
function jsonGuardarEmpresa($nombreEmpresa){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->guardarEmpresa($nombreEmpresa);
	echo $json;
	$a = null;
}
function jsonEditarEmpresa($nombreEmpresaEdit, $emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->editarEmpresa($nombreEmpresaEdit, $emp_id);
	echo $json;
	$a = null;
}
function jsonGuardarTracto($patenteTracto, $emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->guardarTracto($patenteTracto, $emp_id);
	echo $json;
	$a = null;
}
function jsonEditarTracto($patenteTracto, $emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->editarTracto($patenteTracto, $emp_id);
	echo $json;
	$a = null;
}
function jsonlistarTractos($emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->listarTractos($emp_id);
	echo $json;
	$a = null;
}
function jsonGuardarRampla($patenteRampla, $bahias, $emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->guardarRampla($patenteRampla, $bahias, $emp_id);
	echo $json;
	$a = null;
}
function jsonEditarRampla($patenteRampla, $bahias, $emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->editarRampla($patenteRampla, $bahias, $emp_id);
	echo $json;
	$a = null;
}
function jsonlistarRamplas($emp_id){
	include '../../model/Oca.php';
	$a = new Oca();
	$json = $a->listarRamplas($emp_id);
	echo $json;
	$a = null;
}