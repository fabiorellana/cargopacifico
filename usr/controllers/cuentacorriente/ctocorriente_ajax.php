<?php

if(isset($_POST)){


include '../../model/cuentacorriente/ccorriente.php';
$a = new Corriente();

	$accion = filter_input(INPUT_POST, "Accion");

			if($accion == "jsonGuardarAbono"){
			$idplanilla    = filter_input(INPUT_POST, "idplanillaabono");
			$nfactura      = filter_input(INPUT_POST, "nfacturaA");
			$comboabono    = filter_input(INPUT_POST, "cAbono");
			$comboauto	   = filter_input(INPUT_POST, "cAutorizacion");
			$obsabono      = filter_input(INPUT_POST, "observacionA");
			$montoA        = filter_input(INPUT_POST, "montoabono");	
			$json = $a->guardarAbono($idplanilla, $nfactura, $comboabono, $comboauto, $obsabono, $montoA);
			echo $json;
			}


				if($accion == "compara"){
				echo 	$a->compara();
			}



			if($accion == "jsonGuardarGastos"){
			$planillaG = filter_input(INPUT_POST, "idplanillagastos");
			$montoG    = filter_input(INPUT_POST, "montogastos");
			$obsG      = filter_input(INPUT_POST, "obsgastos");
			$itemG     = filter_input(INPUT_POST, "descripciongastos");
			$json = $a->guardarGastos($planillaG, $montoG, $obsG, $itemG);
			echo $json;
			}



		if($accion == "jsonGuardarChequeP"){
		$planillaP      = filter_input(INPUT_POST, "idplanilla");
		$nchequeP       = filter_input(INPUT_POST, "ncheque");
		$bancoP         = filter_input(INPUT_POST, "banco");
		$comboclienteP  = filter_input(INPUT_POST, "combocliente");
		$comboconceptoP = filter_input(INPUT_POST, "comboconcepto");
		$estadoP        = filter_input(INPUT_POST, "estado");
		$fechaRepoP     = filter_input(INPUT_POST, "fechaRepo");
		$txtobsP        = filter_input(INPUT_POST, "txtobs");
		$montoP         = filter_input(INPUT_POST, "monto");
		$json = $a->guardarChequeP($planillaP, $nchequeP, $bancoP, $comboclienteP, $comboconceptoP, $estadoP, $fechaRepoP, $txtobsP, $montoP);
		}




		if($accion == "jsonGuardarChequeC"){
		$planillaC      = filter_input(INPUT_POST, "planillachc");
		$nchequeC       = filter_input(INPUT_POST, "nCheque");
		$bancoC         = filter_input(INPUT_POST, "comboBanco");
		$comboclienteC  = filter_input(INPUT_POST, "comboCliente");
		$estadoC        = filter_input(INPUT_POST, "estado");
		$fechaRepoC     = filter_input(INPUT_POST, "fechaRepo");
		$txtobsC        = filter_input(INPUT_POST, "txtobs");
		$montoC         = filter_input(INPUT_POST, "monto");
		$json = $a->guardarChequeC($planillaC, $nchequeC, $bancoC, $comboclienteC, $estadoC, $fechaRepoC, $txtobsC, $montoC);
		echo $json;
		}


		
		if($accion == "jsonGuardarRetiro"){
		$planillaretiro      = filter_input(INPUT_POST, "idplanillaretiro");
		$montoR 		   	 = filter_input(INPUT_POST, "montoretiro");
		$motivoR        	 = filter_input(INPUT_POST, "motivoretiro");
		$retirado 			 = filter_input(INPUT_POST, "cRetiro");
		$json = $a->guardarRetiro($planillaretiro, $montoR, $motivoR, $retirado);
		echo $json;
		}


		
		if($accion == "buscaplanilla"){
		$idPlanilla = $_POST['planilla'];
		$sql="select Valor, Efectivo, Cheque, Promae, Flete_porteo, Gastos, Ch_pendiente, Ch_conta, Abono, Retiro from cc_history where Planilla='$idPlanilla'";
		echo  $a->datosplanilla($sql);
		}

		if($accion == "cargadatosplanilla"){
		$idPlanilla = $_POST['planilla'];
		$sql="SELECT count(Planilla) as cant, cc_history.Planilla as planilla_history, cc_history.Fecha as fecha_history, ges_centro_de_costos.Descripcion as centro_history, cc_history.Corte as corte_history, cc_history.Cargas as cargas_history, ges_trabajadores.Nombre as chofer_history from cc_history INNER JOIN ges_centro_de_costos on ges_centro_de_costos.id = cc_history.Centro INNER JOIN ges_trabajadores on ges_trabajadores.Rut = cc_history.Chofer where cc_history.Planilla='$idPlanilla'";
		echo $a->datosplanillatext($sql);
		}	

			if($accion == "guardavalores"){
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
			//Calculo de diferencias
			$dif 	= $total - $val + $total2;
			$sql = "UPDATE cc_history set Valor = '$val', Efectivo = '$f', Cheque = '$ch', Promae = '$pro', Flete_porteo = '$fle', Total_ingreso_1 = '$total', Total_ingreso = '$total2', Diferencias = '$dif' where Planilla='$id'";
			echo $a->guardavaloresplanilla($sql);
			}


			if($accion == "comboitemgasto"){		
			$sql="select * from cc_is_gastos;";
			echo $a->comboitemgasto($sql);
			}	

			if($accion == "combocobro"){
			$sql="select * from cc_is_producto;";
			echo $a->combocobro($sql);
			}	

			if($accion == "tblgasto"){	
			$plagasto = $_POST['planigasto'];
			$sql="SELECT cc_gastos.id as id_gasto, cc_gastos.Planilla as planilla_gasto, cc_is_gastos.descripcion as tipo_gasto, cc_gastos.Monto as monto_gasto, cc_gastos.Observacion as obs_gasto from cc_gastos INNER JOIN cc_is_gastos ON cc_is_gastos.idgastos = cc_gastos.Id_gasto where cc_gastos.Planilla = '$plagasto'";
			echo $a->tblgastos($sql);
			}	

			if($accion == "eliminagasto"){
			$id = $_POST['id_gasto'];
			$planillag = $_POST['planillagasto'];
			echo $a->eliminagasto($id, $planillag);
			}

			if($accion == "jsonComboBanco"){
			$sql = "select * from cc_is_banco";
			echo $a->comboBanco($sql);
			}


			if($accion == "jsonComboCliente"){
			$sql = "select * from cc_is_cliente";
			echo $a->comboCliente($sql);
			}

			if($accion == "jsonComboConcepto"){
			$sql = "select * from cc_is_concepto";
			echo $a->comboConcepto($sql);
			}
			
			if($accion == "jsonEliminaChequeP"){
			$id=$_POST['id_chp'];
			$planillachp = $_POST['planillaPendiente'];
			echo $a->eliminachequep($id, $planillachp);
			}
			
			if($accion == "jsonTablaChequeP"){
			$pchequep = $_POST['planichequep'];
			$sql="SELECT cc_cheque_pendiente.id as id_chp, cc_cheque_pendiente.planilla as planilla_chp, cc_cheque_pendiente.N_cheque as ncheque_chp, cc_is_banco.nombre as banco_chp, cc_is_cliente.Nombre as cliente_chp, cc_cheque_pendiente.Monto as monto_chp, cc_estado_chp.descripcion as estado_chp, cc_cheque_pendiente.observacion as obs_chp, cc_is_concepto.concepto as concepto_chp, DATE_FORMAT(cc_cheque_pendiente.Fecha, '%Y/%m/%d') as fecha_chp from cc_cheque_pendiente inner JOIN cc_is_banco ON cc_cheque_pendiente.Banco_id = cc_is_banco.id inner join cc_is_cliente ON cc_cheque_pendiente.cliente_id = cc_is_cliente.id inner JOIN cc_is_concepto ON cc_cheque_pendiente.concepto=cc_is_concepto.id inner join cc_estado_chp ON cc_cheque_pendiente.estado=cc_estado_chp.id where cc_cheque_pendiente.planilla = '$pchequep'";
			echo $a->tblchequep($sql);
			
			}
			
			if($accion == "jsonTablaChequeC"){
			$pchequec = $_POST['planichequec'];
			$sql="SELECT cc_cheque_contabilidad.id as idchc, cc_cheque_contabilidad.planilla as planilla_chc, cc_cheque_contabilidad.N_cheque as ncheque_chc, cc_is_banco.nombre as banco_chc, cc_is_cliente.Nombre as cliente_chc, cc_estado_chc.descripcion as estado_chc, DATE_FORMAT(cc_cheque_contabilidad.Fecha, '%Y/%m/%d') as fecha_chc, cc_cheque_contabilidad.Observacion as obs_chc, cc_cheque_contabilidad.Monto as monto_chc from cc_cheque_contabilidad inner join cc_is_banco ON cc_cheque_contabilidad.Banco_id = cc_is_banco.id inner join cc_is_cliente ON cc_cheque_contabilidad.Rut_cliente = cc_is_cliente.rut inner join cc_estado_chc ON cc_cheque_contabilidad.estado=cc_estado_chc.idestadochc where cc_cheque_contabilidad.planilla = '$pchequec'";
			echo $a->tblchequec($sql);
		
			}
			
			
			if ($accion=="permisoscentros") {
			echo $a->permisoscentros();	
			}
			
			
			
			if($accion == "jsonTablaAbono"){
			$pabono = $_POST['planiiabono'];
			$sql="SELECT cc_abono.id as id_abono, cc_abono.Planilla as planilla_abono, cc_abono.N_nota_credito as ncredito_abono, cc_is_abono.concepto as concepto_abono, cc_abono.monto as monto_abono, autorizaciones.Nombre as autorizado_abono, cc_abono.Observaciones as obs_abono FROM cc_abono INNER JOIN cc_is_abono ON cc_is_abono.codigo = cc_abono.Tipo_abono INNER JOIN autorizaciones ON autorizaciones.id = cc_abono.autoriza_id where cc_abono.Planilla = '$pabono'";
			echo $a->tblabono($sql);
			
			}
			
			if($accion == "jsonTablaRetiro"){
			$pretiro   = $_POST['planiretiro'];
			$sql       ="SELECT cc_retiro.id as id_retiro, cc_retiro.planilla as planilla_retiro, cc_retiro.motivo as motivo_retiro, cc_retiro.monto as monto_retiro, cc_is_retiro.Retiro as retirado_retiro FROM cc_retiro INNER JOIN cc_is_retiro ON cc_is_retiro.Codigo = cc_retiro.retirado where cc_retiro.planilla = '$pretiro'";
			echo $a->tblretiro($sql);
			}

			if($accion == "jsonEliminaChequeC"){
			$id = $_POST['idchc'];
			$planillachc = $_POST['planillaContabilidad'];
			echo $a->eliminachequec($id, $planillachc);
			}
			
			if($accion == "jsonComboAbono"){
			$sql = "select * from cc_is_abono";
			echo $a->comboAbono($sql);
			}

			if($accion == "jsonComboAutorizar"){
			$sql = "select * from autorizaciones";
			echo $a->comboAutorizar($sql);
			}

			if($accion == "jsonEliminaAbono"){
			$id=$_POST['id_abono'];
			$planillaabono = $_POST['planiabono'];
			echo $a->eliminaabono($id, $planillaabono);
			}

			if($accion == "jsonComboRetiro"){
			$sql = "select * from cc_is_retiro";
			echo $a->comboRetiro($sql);
			}

				if($accion == "jsonEliminaRetiro"){	
				$id = $_POST['id_retiro'];
				$planiretiro = $_POST['planillareti'];
				echo $a->eliminaretiro($id, $planiretiro);
				}
				
				if($accion == "jsonComboEstadoChp"){
				$sql = "select * from cc_estado_chp";
				echo $a->comboEstadoChp($sql);
				}
				
				if($accion == "jsonComboEstadoChc"){
				$sql = "select * from cc_estado_chc";
				echo $a->comboEstadoChc($sql);
				}
				
				if($accion == "jsonComboCentro"){				
				$centrousr=$_POST['centrousr'];
				foreach ($centrousr as $valor){
				$centrousr = $valor['centro'];
				if($centrousr==1000){
				$sql = "select id, Descripcion from ges_centro_de_costos where id not in(5,7,6,8,9,10,11,15)";
				}else{
				$sql = "select id, Descripcion from ges_centro_de_costos where id='$centrousr' ";
				}
				echo $a->comboCentro($sql);
				}
				}
				
				if($accion == "jsonTablaFiltro1"){
				
				$fecha1 = $_POST['fecha1F'];
				$fecha2 = $_POST['fecha2F'];
				$chofer = $_POST['choferF'];
				$centro = $_POST['centroF'];
				$planiFiltro = $_POST['planillaF'];
				$centrousr=$_POST['centrousr'];
				echo $json = $a->tablaFiltro1($fecha1, $fecha2, $chofer, $centro, $planiFiltro,  $centrousr);
				}	
				
				
				if($accion == "jsonComboChofer"){
				$centrousr='';
				$aux = $_POST['centrousr'];
				$x = array();
				foreach ($aux as $valor){
				$centrousr = $valor['centro'];
				if ($centrousr==1000) {
				$sql1 = "SELECT Rut, Nombre from ges_trabajadores where Cargo_id=7";
				}else{
				$sql = "SELECT Rut, Nombre from ges_trabajadores where Cargo_id=7 and Centro_de_costo_id='$centrousr'";
				array_push($x,json_decode($a->comboChofer($sql)));
				}
				
				}
				if ($centrousr==1000) {
				echo $a->comboChofer($sql1);
				}else{
				echo json_encode($x);
				}
				}
						
				
		
				
				if ($accion=="Readabono"){	
				$sql="select * from cc_is_abono";
				echo $a->Read($sql);		
				}	
				
				if ($accion=="guardaabono") {			
				$txtabono=$_POST['txtabono'];
				$sql="insert into cc_is_abono values('','$txtabono')";			
				$a->create($sql);		
				}	
				
				if ($accion=="eliminaabono"){			
				$id=$_POST['id'];
				$sql="delete from cc_is_abono where codigo='$id'";			
				$a->delete($sql);	
				}	
				
				if ($accion=="Readbanco") {	
				$sql="select * from cc_is_banco";
				echo $a->Read($sql);	
				}	
			
				if ($accion=="guardabanco") {			
				$txtbanco=$_POST['txtbanco'];
				$txtrutbanco=$_POST['txtrutbanco'];
				$txtdv=$_POST['txtdv'];
				$rut=$txtrutbanco."-".$txtdv;
				$sql="insert into cc_is_banco values('','$rut', '$txtbanco')";			
				$a->create($sql);		
				}	
				
				if ($accion=="eliminabanco") {			
				$id=$_POST['id'];
				$sql="delete from cc_is_banco where id='$id'";			
				$a->delete($sql);		
				}	
				
				
				if ($accion=="Readcheque"){
				$sql="select * from cc_is_cheque";
				echo $a->Read($sql);		
				}	
				
				if ($accion=="guardacheque"){	
				$txtdescripcion=$_POST['txtdescripcion'];
				$sql="insert into cc_is_cheque values('', '$txtdescripcion')";			
				$a->create($sql);	
				}	
				
				if ($accion=="eliminacheque"){			
				$id=$_POST['id'];
				$sql="delete from cc_is_cheque where codigo='$id'";			
				$a->delete($sql);	
				}	
				
				if ($accion=="Readcliente") {	
				$sql="select * from cc_is_cliente";
				echo $a->Read($sql);
				}	
				
				if ($accion=="guardacliente") {	
				$txtrut=$_POST['txtrut'];
				$txtdescripcion=$_POST['txtdescripcion'];
				$txtrazon=$_POST['txtrazon'];
				$txtdireccion=$_POST['txtdireccion'];
				$sql="insert into cc_is_cliente values('', '$txtrut','$txtdescripcion','$txtrazon','$txtdireccion')";			
				$a->create($sql);	
				}	
				
				if ($accion=="eliminacliente") {			
				$id=$_POST['id'];
				$sql="delete from cc_is_cliente where id='$id'";			
				$a->delete($sql);		
				}			
				
				
				if ($accion=="Readgastos") {	
				$sql="select * from cc_is_gastos";
				echo $a->Read($sql);	
				}	
				
				if ($accion=="guardaritemgasto"){	
				$txtgasto=$_POST['txtgasto'];
				$sql="insert into cc_is_gastos values('', '$txtgasto')";			
				$a->create($sql);	
				}	
				
				if ($accion=="eliminagastos") {			
				$id=$_POST['id'];
				$sql="delete from cc_is_gastos where idgastos='$id'";			
				$a->delete($sql);	
				}		
				
				
				
				
				if ($accion=="Readconceptos") {	
				$sql="select * from cc_is_concepto";
				echo $a->Read($sql);	
				}	
				
				if ($accion=="guardaconcepto") {	
				$txtconcepto=$_POST['txtconcepto'];
				$sql="insert into cc_is_concepto values('', '$txtconcepto')";			
				$a->create($sql);	
				}	
				
				if ($accion=="eliminaconcepto"){
				$id=$_POST['id'];
				$sql="delete from cc_is_concepto where id='$id'";			
				$a->delete($sql);	
				}	
				
				
				
				if ($accion=="Readproducto"){
				$sql="select * from cc_is_producto";
				echo $a->Read($sql);
				}	
				
				if ($accion=="guardaproducto") {
				$txtcodigo=$_POST['txtcodigo'];
				$txtproducto=$_POST['txtproducto'];
				$sql="insert into cc_is_producto values('$txtcodigo', '$txtproducto')";			
				$a->create($sql);	
				}	
				
				if ($accion=="eliminaproducto") {	
				$id=$_POST['id'];
				$sql="delete from cc_is_producto where Cod_ccu='$id'";			
				$a->delete($sql);	
				}	
				
				
				
				if ($accion=="Readretiros"){	
				$sql="select * from cc_is_retiro";
				echo $a->Read($sql);	
				}	
				
				if ($accion=="guardaretiro") {	
				$txtretiro=$_POST['txtretiro'];
				$sql="insert into cc_is_retiro values('', '$txtretiro')";			
				$a->create($sql);		
				}	
				
				if ($accion=="eliminaretiro") {		
				$id=$_POST['id'];
				$sql="delete from cc_is_retiro where Codigo='$id'";			
				$a->delete($sql);		
				}		
				
				
				if ($accion=="jsontblcobro"){
				$planilla=$_POST['planilla'];
				$sql="select  A.N_factura, B.Descripcion, A.Cantidad, A.Observacion, A.Total from cc_cobro A inner join cc_is_producto B on B.Cod_ccu=A.Cod_producto where A.planilla='$planilla' ";			
				echo $a->tblcobro($sql);
				}		
				
				if ($accion=="guardacobro") {		
				$planilla=$_POST['planilla'];
				$txtfactura=$_POST['txtfactura'];
				$comboproducto=$_POST['comboproducto'];
				$txtcantidadcobro=$_POST['txtcantidadcobro'];
				$txtobscobro=$_POST['txtobscobro'];
				$txtvalorcobro=$_POST['txtvalorcobro'];
				$sql="insert into cc_cobro values('$planilla','$txtfactura','$comboproducto','$txtcantidadcobro','$txtobscobro', '$txtvalorcobro')";			
				echo $a->guardacobro($sql);	
				}		
				
				
}