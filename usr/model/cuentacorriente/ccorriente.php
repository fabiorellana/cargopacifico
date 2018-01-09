<?php

session_start();
require("../../../dist/conexion.php");

class Corriente{
	public $conn;

	function __construct(){
		try{
			$this->conn = new Conexion();
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	function __destruct(){
		$this->conn = null;
	}

	//$this->json();
				private function json($sql){
				try{
				$ej = $this->conn->Consultar($sql);
				$rowcount=mysqli_num_rows($ej);
				$retorno = array();
				if ($rowcount>0){
				while ($r = mysqli_fetch_assoc($ej)){
				array_push($retorno, $r);
				}
				return json_encode($retorno);
				}else{
				return json_encode(array());
				}
				}catch (Exception $e){
				echo "Error".$e->getMessage();
				}
				}

	function datosplanilla($sql){
		return $this->json($sql);
	}

	function datosplanillatext($sql){
	return $this->json($sql);
	}

	function guardavaloresplanilla($sql){
		$this->conn->Consultar($sql);
	}

	public function comboitemgasto($sql){	
		return	$this->json($sql);
	}

	public function combocobro($sql){	
		return	$this->json($sql);
	}

	public function permisoscentros(){
		$rut=$_SESSION["Rut"];
		$sql="SELECT A.centro, B.Descripcion from cc_permisos_centros A left JOIN ges_centro_de_costos B on A.centro=B.id where Rut='$rut'";
		
		return $this->json($sql);
	}

	public function tblgastos($sql){
	return	$this->json($sql);
	}

	public function tblcobro($sql)
	{
	return	$this->json($sql);
	}

	public function guardacobro($sql)
	{	echo $sql;
		$this->conn->Consultar($sql);
	}

	

	public function eliminagasto($id, $planillag){
		//Consulta del monto
		$sql2 = "select Monto from cc_gastos where id = '$id'";
		$rs = $this->conn->Consultar($sql2);
		while($row = mysqli_fetch_array($rs))
		{
			$montogastos = $row['Monto'];
		}

		//Actualizar la tabla cc_history
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$planillag'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}

		$montoupdate = $monto - $montogastos;

		//Actualizar la tabla cc_history de la fila Gastos
		$sqlactualizacchistory2 = "SELECT Gastos from cc_history where Planilla = '$planillag'";
		$rs = $this->conn->Consultar($sqlactualizacchistory2);
		while($row = mysqli_fetch_array($rs))
		{
			$mGastoE = $row['Gastos'];
		}

		$montoupdateG = $mGastoE - $montogastos;

		//Elimina el monto de la tabla cc_gastos
		$sql = "delete from cc_gastos where id='$id'";
		$this->conn->Consultar($sql);

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillag'; ";
		$this->conn->Consultar($updatesql);
		$updatesql2="UPDATE `cc_history` SET `Gastos` = '$montoupdateG' WHERE `cc_history`.`Planilla` = '$planillag'; ";
		$this->conn->Consultar($updatesql2);

	}

	public function comboBanco($sql){
		return $this->json($sql);
	}

	public function comboCliente($sql){
		return $this->json($sql);
	}

	function comboConcepto($sql){
		return $this->json($sql);
	}

	function comboEstadoChp($sql){
		return $this->json($sql);
	}

	function comboEstadoChc($sql){
		return $this->json($sql);
	}

	function eliminachequep($id, $planillachp){
		//Consulta del monto
		$sql2 = "select Monto from cc_cheque_pendiente where id = '$id'";
		$rs = $this->conn->Consultar($sql2);
		while($row = mysqli_fetch_array($rs))
		{
			$montopendiente = $row['Monto'];
		}

		//Actualizar la tabla cc_history
		$sqlactualizacchistory="select * from cc_history where Planilla='$planillachp'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}

		$montoupdate = $monto - $montopendiente;

		//Actualizar la tabla cc_history de la fila Ch_pendiente
		$sqlactualizacchistory2 = "SELECT Ch_pendiente from cc_history where Planilla = '$planillachp'";
		$rs = $this->conn->Consultar($sqlactualizacchistory2);
		while($row = mysqli_fetch_array($rs))
		{
			$mPendienteE = $row['Ch_pendiente'];
		}

		$montoupdateP = $mPendienteE - $montopendiente;


		//Elimina el monto de la tabla cc_gastos
		$sql = "delete from cc_cheque_pendiente where id='$id'";
		$this->conn->Consultar($sql);

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillachp'; ";
		$this->conn->Consultar($updatesql);
		$updatesql2="UPDATE `cc_history` SET `Ch_pendiente` = '$montoupdateP' WHERE `cc_history`.`Planilla` = '$planillachp'; ";
		$this->conn->Consultar($updatesql2);
	}

	function tblchequep($sql){
	return	$this->json($sql);
	}

	function tblchequec($sql){
	return	$this->json($sql);
	}

	function eliminachequec($id, $planillachc){
		//Consulta del monto
		$sql2 = "select Monto from cc_cheque_contabilidad where id = '$id'";
		$rs = $this->conn->Consultar($sql2);
		while($row = mysqli_fetch_array($rs))
		{
			$montocontabilidad = $row['Monto'];
		}

		//Actualizar la tabla cc_history
		$sqlactualizacchistory="select * from cc_history where Planilla='$planillachc'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}

		$montoupdate = $monto - $montocontabilidad;

		//Actualizar la tabla cc_history de la fila Ch_conta
		$sqlactualizacchistory2 = "SELECT Ch_conta from cc_history where Planilla = '$planillachc'";
		$rs = $this->conn->Consultar($sqlactualizacchistory2);
		while($row = mysqli_fetch_array($rs))
		{
			$mContabilidadE = $row['Ch_conta'];
		}

		$montoupdateC = $mContabilidadE - $montocontabilidad;

		//Elimina el monto de la tabla cc_gastos
		$sql = "delete from cc_cheque_contabilidad where id='$id'";
		$this->conn->Consultar($sql);

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillachc'; ";
		$this->conn->Consultar($updatesql);
		$updatesql2="UPDATE `cc_history` SET `Ch_conta` = '$montoupdateC' WHERE `cc_history`.`Planilla` = '$planillachc'; ";
		$this->conn->Consultar($updatesql2);
	}

	function eliminaabono($id, $planillaabono){
		//Consulta del monto
		$sql2 = "select monto from cc_abono where id = '$id'";
		$rs = $this->conn->Consultar($sql2);
		while($row = mysqli_fetch_array($rs))
		{
			$montoabono = $row['monto'];
		}

		//Actualizar la tabla cc_history
		$sqlactualizacchistory="select * from cc_history where Planilla='$planillaabono'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}

		$montoupdate = $monto - $montoabono;


		//Actualizar la tabla cc_history de la fila Abono
		$sqlactualizacchistory2 = "SELECT Abono from cc_history where Planilla = '$planillaabono'";
		$rs = $this->conn->Consultar($sqlactualizacchistory2);
		while($row = mysqli_fetch_array($rs))
		{
			$mAbonoE = $row['Abono'];
		}

		$montoupdateA = $mAbonoE - $montoabono;


		//Elimina el monto de la tabla cc_abono
		$sql = "delete from cc_abono where id='$id'";
		$this->conn->Consultar($sql);

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillaabono'; ";
		$this->conn->Consultar($updatesql);
		$updatesql2="UPDATE `cc_history` SET `Abono` = '$montoupdateA' WHERE `cc_history`.`Planilla` = '$planillaabono'; ";
		$this->conn->Consultar($updatesql2);
	}

	function comboAbono($sql){
		return $this->json($sql);
	}

	function comboAutorizar($sql){
		return $this->json($sql);
	}

	function tblabono($sql){
		return $this->json($sql);
	}

	function comboRetiro($sql){
		return $this->json($sql);
	}

	function tblretiro($sql){
		return $this->json($sql);
	}
	
	function eliminaretiro($id, $planiretiro){
		//Consulta del monto
		$sql2 = "select monto from cc_retiro where id = '$id'";
		$rs = $this->conn->Consultar($sql2);
		while($row = mysqli_fetch_array($rs))
		{
			$montoretiro = $row['monto'];
		}

		//Actualizar la tabla cc_history
		$sqlactualizacchistory="select * from cc_history where Planilla='$planiretiro'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}

		$montoupdate = $monto - $montoretiro;

		//Actualizar la tabla cc_history de la fila Retiro
		$sqlactualizacchistory2 = "SELECT Retiro from cc_history where Planilla = '$planiretiro'";
		$rs = $this->conn->Consultar($sqlactualizacchistory2);
		while($row = mysqli_fetch_array($rs))
		{
			$mRetiroE = $row['Retiro'];
		}

		$montoupdateR = $mRetiroE - $montoretiro;


		//Elimina el monto de la tabla cc_retiro
		$sql = "delete from cc_retiro where id='$id'";
		$this->conn->Consultar($sql);

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planiretiro'; ";
		$this->conn->Consultar($updatesql);
		$updatesql2="UPDATE `cc_history` SET `Retiro` = '$montoupdateR' WHERE `cc_history`.`Planilla` = '$planiretiro'; ";
		$this->conn->Consultar($updatesql2);
	}

	function comboCentro($sql){
		return $this->json($sql);
	}

	function comboChofer($sql){
		return $this->json($sql);
	}

	function comboTrabajadores($sql){
		return $this->json($sql);
	}

	public function tablaFiltro1($fecha1, $fecha2, $chofer, $centro, $planiFiltro,  $centrousr){
		foreach ($centrousr as $valor)
   		{
   		$centrousr = $valor['centro'];
		if($fecha1=='' and $fecha2==''){
		$wherefecha="";
		}else{
		$wherefecha="and A.Fecha between '$fecha1' and '$fecha2'";
		}
		if($chofer==''){
		$wherechofer="";
		}else{
		$wherechofer="and A.Chofer = '$chofer'";
		}
		if($centro==''){
		$wherecentro="";
		}else{
		$wherecentro="and A.Centro = '$centro'";
		}
		if($planiFiltro==''){
		$whereplanilla="";
		}else{
		$whereplanilla="and A.Planilla = '$planiFiltro'";
		}
		//$centrousr == 1000 administrador
		if($centrousr==1000){
			$sql = "SELECT A.Planilla as planilla_hs, A.Valor as valor_hs, A.Fecha as fecha_hs, C.Nombre as chofer_hs, B.Descripcion as centro_hs, A.Total_ingreso_1 as total_ingresocajas_hs, A.Total_ingreso as total_ingreso_hs, A.Diferencias as diferencias_hs, A.Retiro, A.Cobros, A.Efectivo, A.Cheque, A.Promae, A.Abono, A.Ch_pendiente, A.Ch_conta, A.Flete_porteo FROM cc_history A INNER JOIN ges_centro_de_costos B ON A.Centro = B.id INNER JOIN ges_trabajadores C ON A.Chofer = C.Rut WHERE A.Corte = 0 $wherefecha $wherechofer $wherecentro $whereplanilla";
		}else{
			$sql = "SELECT A.Planilla as planilla_hs, A.Valor as valor_hs, A.Fecha as fecha_hs, C.Nombre as chofer_hs, B.Descripcion as centro_hs, A.Total_ingreso_1 as total_ingresocajas_hs, A.Total_ingreso as total_ingreso_hs, A.Diferencias as diferencias_hs, A.Retiro, A.Cobros,  A.Efectivo, A.Chequ, A.Promae, A.Abono, A.Ch_pendiente, A.Ch_conta, A.Flete_porteo FROM cc_history A INNER JOIN ges_centro_de_costos B ON A.Centro = B.id INNER JOIN ges_trabajadores C ON A.Chofer = C.Rut WHERE A.Corte = 0   $wherefecha $wherechofer $wherecentro $whereplanilla";
		}
		
		
		return $this->json($sql);
	}
	}
							
	public function guardarAbono($idplanilla, $nfactura, $comboabono, $comboauto, $obsabono, $montoA){
		$sql="insert into cc_abono values ('','$idplanilla','$nfactura','$comboabono', '$montoA', '$comboauto', '$obsabono')";
		$this->conn->Consultar($sql);
		
		//Sumar los montos de la fila Tota_ingreso
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$idplanilla'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);

		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}
	 	$montoupdate = $monto + $montoA;

	 	//Sumar los montos de la fila Abono
		$sqlactualizacchistory2 = "SELECT Abono from cc_history where Planilla = '$idplanilla'";
		$rs=$this->conn->Consultar($sqlactualizacchistory2);
		while($row=mysqli_fetch_array($rs))
		{
			$mAbono = $row['Abono'];
		}

		$montoupdateA = $mAbono + $montoA;

	 	$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$idplanilla'; ";
	 	$this->conn->Consultar($updatesql);

	 	$updatesql2 = "UPDATE `cc_history` SET `Abono` = '$montoupdateA' WHERE `cc_history`.`Planilla` = '$idplanilla'; ";
	 	$this->conn->Consultar($updatesql2);
	}
			
	public function guardarGastos($planillaG, $montoG, $obsG, $itemG ){
		$sql="insert into cc_gastos values ('','$planillaG','$itemG','$montoG', '$obsG')";
		$this->conn->Consultar($sql);
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$planillaG'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
				{
					$monto=$row['Total_ingreso'];		
				}
		$montoupdate = $monto + $montoG;

		//Sumar los montos de la fila Gastos
		$sqlactualizacchistory2 = "SELECT Gastos from cc_history where Planilla = '$planillaG'";
		$rs=$this->conn->Consultar($sqlactualizacchistory2);
		while($row=mysqli_fetch_array($rs))
		{
			$mGastos = $row['Gastos'];
		}

		$montoupdateG = $mGastos + $montoG;

		$updatesql = "UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillaG'; ";
		$this->conn->Consultar($updatesql);

		$updatesql2 = "UPDATE `cc_history` SET `Gastos` = '$montoupdateG' WHERE `cc_history`.`Planilla` = '$planillaG'; ";
		$this->conn->Consultar($updatesql2);
		
	}

	public function guardarChequeP($planillaP, $nchequeP, $bancoP, $comboclienteP, $comboconceptoP, $estadoP, $fechaRepoP, $txtobsP, $montoP){
		$sql="insert into cc_cheque_pendiente values('','$planillaP','$nchequeP','$bancoP','$comboclienteP','$comboconceptoP','$montoP','$estadoP', STR_TO_DATE('$fechaRepoP', '%Y/%m/%d'),'$txtobsP')";
		$this->conn->Consultar($sql);

		//Sumar los montos de la fila Total_ingreso
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$planillaP'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
			{
				$monto=$row['Total_ingreso'];		
			}
		$montoupdate =	$monto + $montoP;

		//Sumar los montos de la fila Ch_pendiente
		$sqlactualizacchistory2 = "SELECT Ch_pendiente from cc_history where Planilla = '$planillaP'";
		$rs=$this->conn->Consultar($sqlactualizacchistory2);
		while($row=mysqli_fetch_array($rs))
		{
			$mPendiente = $row['Ch_pendiente'];
		}

		$montoupdateP = $mPendiente + $montoP;

		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillaP'; ";
		$this->conn->Consultar($updatesql);

		$updatesql2 = "UPDATE `cc_history` SET `Ch_pendiente` = '$montoupdateP' WHERE `cc_history`.`Planilla` = '$planillaP'; "; 
		$this->conn->Consultar($updatesql2);
			
		
	}
			
	public function guardarChequeC($planillaC, $nchequeC, $bancoC, $comboclienteC, $estadoC, $fechaRepoC, $txtobsC, $montoC){
		$sql="insert into cc_cheque_contabilidad values('','$planillaC','$nchequeC','$bancoC','$comboclienteC','$montoC', STR_TO_DATE('$fechaRepoC', '%Y/%m/%d'),'$txtobsC','$estadoC')";
		$this->conn->Consultar($sql);
		
		//Sumar los montos de la fila Total_ingreso
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$planillaC'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}
		$montoupdate = $monto + $montoC;

		//Sumar los montos de la fila Ch_conta
		$sqlactualizacchistory2 = "SELECT Ch_conta from cc_history where Planilla = '$planillaC'";
		$rs=$this->conn->Consultar($sqlactualizacchistory2);
		while($row=mysqli_fetch_array($rs))
		{
			$mContabilidad = $row['Ch_conta'];
		}

		$montoupdateC = $mContabilidad + $montoC;

		$updatesql = "UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillaC'; ";
		$this->conn->Consultar($updatesql);

		$updatesql2 = "UPDATE `cc_history` SET `Ch_conta` = '$montoupdateC' WHERE `cc_history`.`Planilla` = '$planillaC'; ";
		$this->conn->Consultar($updatesql2);
	}
			
	public function guardarRetiro($planillaretiro, $montoR, $motivoR, $retirado){
		$sql="insert into cc_retiro values('','$planillaretiro','$motivoR','$montoR','$retirado')";
		$this->conn->Consultar($sql);
		
		//Sumar los montos de la fila Total_ingreso
		$sqlactualizacchistory="select Total_ingreso from cc_history where Planilla='$planillaretiro'";
		$rs=$this->conn->Consultar($sqlactualizacchistory);
		while($row=mysqli_fetch_array($rs))
		{
			$monto=$row['Total_ingreso'];		
		}
		$montoupdate = $monto + $montoR;

		//Sumar los montos de la fila Retiro
		$sqlactualizacchistory2 = "SELECT Retiro from cc_history where Planilla = '$planillaretiro'";
		$rs=$this->conn->Consultar($sqlactualizacchistory2);
		while($row=mysqli_fetch_array($rs))
		{
			$mRetiro = $row['Retiro'];
		}

		$montoupdateR = $mRetiro + $montoR;
		$updatesql="UPDATE `cc_history` SET `Total_ingreso` = '$montoupdate' WHERE `cc_history`.`Planilla` = '$planillaretiro'; ";
		$this->conn->Consultar($updatesql);

		$updatesql2 = "UPDATE `cc_history` SET `Retiro` = '$montoupdateR' WHERE `cc_history`.`Planilla` = '$planillaretiro'; ";
		$this->conn->Consultar($updatesql2);
	}


    public function Read($sql)
    {
    return  $this->json($sql);
    }

    public function create($sql)
    {
    $this->conn->Consultar($sql);
    }


   public function delete($sql)
    {
    $this->conn->Consultar($sql);
    }

public function importar($sql)
{
	$this->conn->Consultar($sql);
}



		public  function sacaplanilla2(){
		$select = "select credito, planilla2 from excelprueba where planilla2<>''";
		$rs = $this->conn->Consultar($select);
		while($row=mysqli_fetch_array($rs)) {
		
		}
		}

			public function compara(){
		$compara="select planilla, credito from excelprueba2";
		$rs=$this->conn->Consultar($compara);
		$array=  array();
		while($row=mysqli_fetch_assoc($rs)){
				
			$planilla2=$row['planilla'];
			$credito=$row['credito'];
			 $x="select debito from excelprueba where Planilla='$planilla2'";
			$rs1=$this->conn->Consultar($x);
				
			while($row1=mysqli_fetch_assoc($rs1)){
			$debito=$row1['debito'];
			}
				$creditopositivo=$credito * -1;
				
				
				$suma=$credito+$debito;

				$this->conn->Consultar("update excelprueba set credito='$creditopositivo', debito = '$suma', diferencias='$suma', sumado='1' where Planilla='$planilla2'");

					
					$rr=$this->conn->Consultar("select * from excelprueba where planilla='$planilla2'");
					while($rr=mysqli_fetch_assoc($rr)){
						array_push($array, $rr);
					}
					
					
					
				
		}
			
echo json_encode($array);

			}
	


}