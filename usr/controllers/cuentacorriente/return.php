<?php
session_start();
include '../../../dist/conexion.php';

if(isset($_POST)){
	$accion = filter_input(INPUT_POST, "Accion");

	if($accion == "jsonGuardarAbono"){
		$planilla = filter_input(INPUT_POST, "idplanillaabono");
		jsonGuardarAbono($planilla);
	}
	if($accion == "jsonGuardarGastos"){
		$planilla = filter_input(INPUT_POST, "idplanillagastos");
		jsonGuardarGastos($planilla);
	}
	if($accion == "jsonGuardarChequeP"){
		$planilla = filter_input(INPUT_POST, "idplanilla");
		jsonGuardarChequeP($planilla);
	}
	if($accion == "jsonGuardarChequeC"){
		$planilla = filter_input(INPUT_POST, "planillachc");
		jsonGuardarChequeC($planilla);
	}
	if($accion == "jsonGuardarRetiro"){
		$planilla = filter_input(INPUT_POST, "idplanillaretiro");
		jsonGuardarRetiro($planilla);
	}

	if($accion == "buscaplanilla"){
		include '../../model/cuentacorriente/ccorriente.php';
		$a = new Corriente();
		$idPlanilla = $_POST['planilla'];
		$sql="select Valor, Efectivo, Cheque, Promae, Flete_porteo, Gastos, Ch_pendiente, Ch_conta, Abono, Retiro from cc_history where Planilla='$idPlanilla'";
		echo  $a->datosplanilla($sql);
		
	}

	if($accion == "cargadatosplanilla"){
		include '../../model/cuentacorriente/ccorriente.php';
		$a = new Corriente();
		$idPlanilla = $_POST['planilla'];
		$sql="select count(Planilla) as cant, Planilla, Fecha, Centro, Corte, Cargas, Chofer from cc_history where Planilla='$idPlanilla'";
		echo $a->datosplanillatext($sql);
	}	

	   	if($accion == "guardavalores"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id 	= $_POST['idplanilla'];
			$val 	= $_POST['val'];
			$f 		= $_POST['f'];
			$ch 	= $_POST['ch'];
			$pro 	= $_POST['pro'];
			$fle 	= $_POST['fle'];
			$gasto 	= $_POST['gasto'];
			$chp 	= $_POST['chpendiente'];
			$chc 	= $_POST['chconta'];
			$abo 	= $_POST['abonoh'];
			$ret 	= $_POST['retih'];
			//totales para cchistory
			$total 	= $f + $ch + $pro;
			$total2 = $gasto + $chp + $chc + $abo + $ret;
			$dif 	= $total - $val;

			$sql = "UPDATE cc_history set Valor = '$val', Efectivo = '$f', Cheque = '$ch', Promae = '$pro', Flete_porteo = '$fle', Total_ingreso_1 = '$total', Total_ingreso = '$total2', Diferencias = '$dif' where Planilla='$id'";
			$a->guardavaloresplanilla($sql);
		}

		if($accion == "comboitemgasto"){
			include '../../model/cuentacorriente/ccorriente.php ';
			$a = new Corriente();
			$sql="select * from cc_is_gastos";
			echo $a->comboitemgasto($sql);
		}	

		if($accion == "tblgasto"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql="SELECT cc_gastos.id, cc_gastos.Planilla, cc_is_gastos.descripcion, cc_gastos.Monto, cc_gastos.Observacion from cc_gastos INNER JOIN cc_is_gastos WHERE cc_is_gastos.idgastos = cc_gastos.Id_gasto";
			echo $a->tblgastos($sql);
		}	

		if($accion == "eliminagasto"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id = $_POST['id'];
			$planillag = $_POST['planillagasto'];
			echo $a->eliminagasto($id, $planillag);
		}

		if($accion == "jsonComboBanco")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_is_banco";
			echo $a->comboBanco($sql);
		}

		if($accion == "jsonComboCliente")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_is_cliente";
			echo $a->comboCliente($sql);
		}

		if($accion == "jsonComboConcepto")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_is_concepto";
			echo $a->comboConcepto($sql);
		}

		if($accion == "jsonEliminaChequeP"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id=$_POST['id'];
			$planillachp = $_POST['planillaPendiente'];
			echo $a->eliminachequep($id, $planillachp);
		}

		if($accion == "jsonTablaChequeP"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql="SELECT cc_cheque_pendiente.id, cc_cheque_pendiente.planilla, cc_cheque_pendiente.N_cheque, cc_is_banco.nombre, cc_is_cliente.Nombre, cc_cheque_pendiente.Monto, cc_estado_chp.descripcion, cc_cheque_pendiente.observacion, cc_is_concepto.concepto, cc_cheque_pendiente.Fecha from cc_cheque_pendiente inner JOIN cc_is_banco inner join cc_is_cliente inner JOIN cc_is_concepto inner join cc_estado_chp where cc_cheque_pendiente.Banco_id=cc_is_banco.id and cc_cheque_pendiente.cliente_id=cc_is_cliente.id and cc_cheque_pendiente.concepto=cc_is_concepto.id and cc_cheque_pendiente.estado=cc_estado_chp.id";

			echo $a->tblchequep($sql);
		}

		if($accion == "jsonTablaChequeC"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql="SELECT cc_cheque_contabilidad.planilla, cc_cheque_contabilidad.N_cheque, cc_is_banco.nombre, cc_is_cliente.Nombre, cc_estado_chc.descripcion, cc_cheque_contabilidad.Fecha, cc_cheque_contabilidad.Observacion, cc_cheque_contabilidad.Monto from cc_cheque_contabilidad inner join cc_is_banco inner join cc_is_cliente inner join cc_estado_chc where cc_cheque_contabilidad.Banco_id=cc_is_banco.id and cc_cheque_contabilidad.estado=cc_estado_chc.idestadochc";
			echo $a->tblchequec($sql);
		}

		if($accion == "jsonTablaAbono"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql="SELECT cc_abono.Planilla, cc_abono.N_nota_credito, cc_is_abono.concepto, cc_abono.monto, autorizaciones.Nombre, cc_abono.Observaciones FROM cc_abono INNER JOIN cc_is_abono INNER JOIN autorizaciones where cc_is_abono.codigo = cc_abono.Tipo_abono and autorizaciones.id = cc_abono.autoriza_id";
			echo $a->tblabono($sql);
		}

		if($accion == "jsonTablaRetiro"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql="SELECT cc_retiro.planilla, cc_retiro.motivo, cc_retiro.monto, cc_is_retiro.Retiro FROM cc_retiro INNER JOIN cc_is_retiro";
			echo $a->tblretiro($sql);
		}

		if($accion == "jsonEliminaChequeC"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id=$_POST['planilla'];
			echo $a->eliminachequec($id);
		}

		if($accion == "jsonComboAbono")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_is_abono";
			echo $a->comboAbono($sql);
		}

		if($accion == "jsonComboAutorizar")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from autorizaciones";
			echo $a->comboAutorizar($sql);
		}

		if($accion == "jsonEliminaAbono"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id=$_POST['Planilla'];
			echo $a->eliminaabono($id);
		}

		if($accion == "jsonComboRetiro")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_is_retiro";
			echo $a->comboRetiro($sql);
		}

		if($accion == "jsonEliminaRetiro"){
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$id=$_POST['planilla'];
			echo $a->eliminaretiro($id);
		}

		if($accion == "jsonComboEstadoChp")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_estado_chp";
			echo $a->comboEstadoChp($sql);
		}

		if($accion == "jsonComboEstadoChc")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select * from cc_estado_chc";
			echo $a->comboEstadoChc($sql);
		}

		if($accion == "jsonComboCentro")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "select id, Descripcion from ges_centro_de_costos";
			echo $a->comboCentro($sql);
		}

		if($accion == "jsonTablaFiltro1")
		{
			include '../../model/cuentacorriente/ccorriente.php';
			$a = new Corriente();
			$sql = "SELECT cc_history.Planilla as planilla_hs, cc_history.Valor, cc_history.Fecha as fecha_hs, ges_trabajadores.Nombre as chofer_hs, ges_centro_de_costos.Descripcion as centro_hs, cc_history.Total_ingreso_1 as total_ingresocajas_hs, cc_history.Total_ingreso as total_ingreso_hs, cc_history.Diferencias as diferencias_hs FROM cc_history INNER JOIN ges_centro_de_costos ON cc_history.Centro = ges_centro_de_costos.id inner join ges_trabajadores ON cc_history.Chofer=ges_trabajadores.Rut ORDER BY `centro_hs` ASC";
			echo $a->tablaFiltro1($sql);
		}


}

function jsonGuardarAbono($planilla){
	include '../../model/cuentacorriente/ccorriente.php';
	$idplanilla    = $_POST['idplanillaabono'];
	$nfactura      = $_POST['nfacturaA'];
	$comboabono    = $_POST['cAbono'];
	$comboauto	   = $_POST['cAutorizacion'];
	$obsabono      = $_POST['observacionA'];
	$montoA         = $_POST['montoabono'];

	$a = new Corriente();
	$json = $a->guardarAbono($idplanilla, $nfactura, $comboabono, $comboauto, $obsabono, $montoA);
	echo $json;
	$a = null;
}
function jsonGuardarGastos($planilla){
	include '../../model/cuentacorriente/ccorriente.php';
	$planillaG = $_POST['idplanillagastos'];
	$montoG    = $_POST['montogastos'];
	$obsG      = $_POST['obsgastos'];
	$itemG     = $_POST['descripciongastos'];
	$a = new Corriente();
	$json = $a->guardarGastos($planillaG, $montoG, $obsG, $itemG  );
	echo $json;
	$a = null;
}
function jsonGuardarChequeP($planilla){
	include '../../model/cuentacorriente/ccorriente.php';
	$planillaP      = $_POST['idplanilla'];
	$nchequeP       = $_POST['ncheque'];
	$bancoP         = $_POST['banco'];
	$comboclienteP  = $_POST['combocliente'];
	$comboconceptoP = $_POST['comboconcepto'];
	$estadoP        = $_POST['estado'];
	$fechaRepoP     = $_POST['fechaRepo'];
	$txtobsP        = $_POST['txtobs'];
	$montoP         = $_POST['monto'];
	$a = new Corriente();
	$json = $a->guardarChequeP($planillaP, $nchequeP, $bancoP, $comboclienteP, $comboconceptoP, $estadoP, $fechaRepoP, $txtobsP, $montoP);
	$a = null;
}
function jsonGuardarChequeC($planilla){
	include '../../model/cuentacorriente/ccorriente.php';
	$planillaC      = $_POST['planillachc'];
	$nchequeC       = $_POST['nCheque'];
	$bancoC         = $_POST['comboBanco'];
	$comboclienteC  = $_POST['comboCliente'];
	$estadoC        = $_POST['estado'];
	$fechaRepoC     = $_POST['fechaRepo'];
	$txtobsC        = $_POST['txtobs'];
	$montoC         = $_POST['monto'];

	$a = new Corriente();
	$json = $a->guardarChequeC($planillaC, $nchequeC, $bancoC, $comboclienteC, $estadoC, $fechaRepoC, $txtobsC, $montoC);
	echo $json;
	$a = null;
}
function jsonGuardarRetiro($planilla){
	include '../../model/cuentacorriente/ccorriente.php';
	$planillaretiro      = $_POST['idplanillaretiro'];
	$montoR 		   	 = $_POST['montoretiro'];
	$motivoR        	 = $_POST['motivoretiro'];
	$retirado 			 = $_POST['cRetiro'];

	$a = new Corriente();
	$json = $a->guardarRetiro($planillaretiro, $montoR, $motivoR, $retirado);
	echo $json;
	$a = null;
}
