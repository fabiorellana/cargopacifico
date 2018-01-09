<?php
session_start();
//require("conexion.php");
class OC{
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
	
public function listarOrdenes(){
	$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom FROM `oc_orde` a left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut order by OrFec DESC;";
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
}
public function listarOrdenesPendientes(){
	$rut = $_SESSION['Rut'];
	//OrNeto
	$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom FROM `oc_orde` a left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut where a.OrAu=0 AND a.OrNeto <0 order by OrFec DESC;";
	// 16015062-9 Jesús Manzárraga
	// 13343263-9 Alfredo Fuentes
	//  8891222-5 Antonio Alonso
	//  
	//
	if($rut == "16015062-9"){
		$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom 
				FROM `oc_orde` a 
				left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) 
				LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut 
				where a.OrAu<20 order by OrFec DESC;";
	}
	if($rut == "13343263-9" ){
		$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom 
				FROM `oc_orde` a 
				left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) 
				LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut 
				where a.OrAu<40 order by OrFec DESC;";
	}
	if($rut == "8891222-5" || $rut=="13548819-4") {
		$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom
				FROM `oc_orde` a 
				left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) 
				LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut 
				where a.OrAu<50 order by OrFec DESC;";
	}
	
	$ej = $this->conn->Consultar($sql);
		$rowcount=mysqli_num_rows($ej);
		$retorno = array();
		if ($rowcount>0){
				while ($r = mysqli_fetch_assoc($ej)){
					if($rut == "16015062-9"){
						if(esDeRepuestos($r['OrCod'])){
							array_push($retorno, $r);
						}
					}
					else{
						if($rut == "8891222-5" || $rut=="13343263-9"){
							array_push($retorno, $r);	
						}
					}
				}
			return json_encode($retorno);
		}else{
			return json_encode(array());
		}
}
public function listarOrdenesAutorizadas(){
	$rut = $_SESSION['Rut'];
	//OrNeto
	$sql = "SELECT a.*, b.Nombre as Nombre, c.ProvNom as ProvNom FROM oc_orde a
			left join ges_trabajadores b on a.USURUT = substr(b.rut, 1, length(b.rut)-2) 
			LEFT JOIN oc_prov c on a.ProvRut = c.ProvRut 
			where a.OrAu IN(10, 30, 50) AND a.OrNFac=0
			order by OrFec DESC;";

	
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
}
public function listarEmpresas(){
	$sql = "SELECT a.*, b.ReGD, c.ProviD, d.ComuD
			FROM oc_empr as a 
				LEFT JOIN oc_regi as b on a.RegC=b.RegC
				LEFT JOIN oc_regilevel1 as c on a.ProviC=c.ProviC AND b.RegC=c.RegC
			    LEFT JOIN oc_regilevel1level2 as d on a.ComuC=d.ComuC AND b.RegC=d.RegC AND c.ProviC=d.ProviC;";
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
}
public function listarProveedores(){
		$sql = "SELECT * from oc_prov;";
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
	}
public function listarPlanCosteo(){
		$sql = "SELECT a.*, b.CuPlaD from oc_cuenlevel1 a left join oc_cuen b on b.CuPlaC=a.CuPlaC order by CuPlaD ASC;";
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
	}
public function listarProductoFamilia(){
		$sql = "SELECT a.*, b.FamD, b.FamDC FROM oc_famplevel1 a left join oc_famp b on b.FamC=a.FamC WHERE PDesPro <> '' order by FamD ASC, PDesPro ASC;";
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
	}
public function listarCentros(){
		$sql = "SELECT * FROM oc_centro order by CenDes ASC;";
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
	}
public function nombreTrabajador(){
	$sql = "SELECT Nombre FROM ges_trabajadores where Rut = '".$_SESSION['Rut']."';";
	$ej = $this->conn->Consultar($sql);
	$rowcount=mysqli_num_rows($ej);
	if ($rowcount>0){
		$r = mysqli_fetch_assoc($ej);
		return $r['Nombre'];
	}else{
		return "";
	}
}
private function solicitarAutorizacion($orden, $quien){
	// Enviar correo con Link para autorizar OC
	// Si $quien es 1, Jesús Manzárraga
	// Si $quien es 0, Alfredo Fuentes
		$rutJesus="16015062-9";
	 	$rutAlfredo = "13343263-9";
	 	$rutGerente = "8891222-5";
		$rut = "";
	if($quien == 1){
		//$rut = $rutJesus;
		$to = "kyousef@cargopacifico.cl";
	}
	if($quien == 2){
		//$rut = $rutAlfredo;
		$to = "kyousef@cargopacifico.cl";
	}
	if($quien == 3){
		//$rut = $rutGerente;
		$to = "kyousef@cargopacifico.cl";
	}
	//$cadena = base64_encode($rut."|".$orden);

		$subject ="Aviso Intranet TCP";
		$message  = "Estimado,\n";
		$message .= "\tActualmente tiene Ordenes de Compra por autorizar.\n\n";
		$message .= "\nIngrese a la Intranet para poder autorizar las OC pendientes.\n\n";
		$message .= "Para revisar ingrese http://intranet.cargopacifico.cl/usr/oc_autorizar.php";;

		$message .= "\n\n\n Atte.\nIntranet Cargo Pacífico.";

		$header="from: Intranet TCP <noresponder@cargopacifico.cl>";

		//$to = htmlentities($_POST["email"]);
		$send_contact=mail($to,$subject,$message,$header);
}
public function ingresarFacturaOC($nroFactura, $orden){
		try{
			$sql = "UPDATE oc_orde SET OrNFac=$nroFactura, OrCerr=0 WHERE OrCod=$orden;";
			$ej = $this->conn->Consultar($sql);

			return json_encode(array("mensaje" => "OK"));
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
			return json_encode(array("mensaje" => "ERROR"));
		}
}
public function autorizarOC($orden){
	// 16015062-9 Jesús Manzárraga
	// 13343263-9 Alfredo Fuentes
	//  8891222-5 Antonio Alonso
	try{
		$neto = $this->traerNeto($orden);
		$aurut = $_SESSION['Rut'];
		$aunombre = $this->nombreTrabajador();
		$nivel = 0;
		if($aurut == "16015062-9"){
				$nivel = 20;
			}
		if($aurut == "13343263-9"){
			if($neto<=600000){
				$nivel = 30;
			}
			else{
				$nivel = 40;
			}
			}
		if($aurut == "8891222-5"){
				$nivel = 50;
			}
		if($aunombre == ""){
				return json_encode(array("mensaje" => "ERROR"));
			}
			$sql = "UPDATE oc_orde SET OrAu=$nivel, OrAuR='$aurut', OrAuN='$aunombre' WHERE OrCod=$orden;";
			$ej = $this->conn->Consultar($sql);

			if($nivel == 40){
				solicitarAutorizacion($orden, 3);
			}
			return json_encode(array("mensaje" => "OK"));
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
			return json_encode(array("mensaje" => "ERROR"));
		}
}
public function guardarOC($empresa, $proveedor, $condPago, $comentario, $p0, $p30, $p60, $p90, $p120, $p150, $p180, $costeo, $cuenta, $lugar, $cotizaciones, $masbarata, $tablaProductos){
		try{
			$aux = json_decode($tablaProductos);
			$neto = 0;
			$iva = 0;
			$total = 0;
			$codOC = substr(date('Y'),2, 2). substr($_SESSION['Rut'],0,4);
			$sql ="SELECT OrCod from oc_orde where OrCod LIKE '".$codOC."%' ORDER BY OrCod DESC LIMIT 1;";
			$ej = $this->conn->Consultar($sql);
			$rowcount=mysqli_num_rows($ej);
			if ($rowcount>0){
				$r = mysqli_fetch_array($ej);
				$correlativo = str_pad((substr($r[0],6,4) + 1), 4, "0", STR_PAD_LEFT); ;
				$cod = $codOC . $correlativo;
			}
			else{
				$cod = $codOC . "0001";
			}
			for($i=0; $i<count($aux); $i++){
				$neto += $aux[$i]->neto;
			}
			$deRepuestos = 1;
			for($i=0; $i<count($aux); $i++){
				if($aux[$i]->FamC != 2){
					$deRepuestos = 0;
				}
			}
				$autoriza=10;
				$aurut = $_SESSION['Rut'];
				$aunombre = $this->nombreTrabajador();
			
			if($deRepuestos == 1){
				// solicitar autorización a Jesús Manzárraga
				$this->solicitarAutorizacion($cod,1);
				$autoriza=0;
				$aurut = 0;
				$aunombre = "";
			}
			if($deRepuestos == 0){
				// solicitar autorización a Alfredo Fuentes
				$this->solicitarAutorizacion($cod,2);
				$autoriza=0;
				$aurut = 0;
				$aunombre = "";
			}

			$iva = $neto * 0.19;
			$total = $neto + $iva;
			$sql = "INSERT INTO oc_orde(OrCod, OrFec, ProvRut, OrConP, OrDes, OrNeto, OrIva, OrTot, CuPlaC, CuCod, OrD, OrD30, OrD60, OrD90, OrD120, OrD150, OrD180, USURUT, EmpRut, OrEnt, OrAu, OrAuR, OrAuN, OrCotD, OrCot, OrCotE, OrCotED, OrNFac, OrCerr) VALUES (".$cod.", '".date('Y-m-d H:i:s')."', '".$proveedor."', 2, 0, ".$neto.", ".round($iva).",".round($total).", ".$costeo.", ".$cuenta.", ".$p0.", ".$p30.", ".$p60.", ".$p90.", ".$p120.", ".$p150.", ".$p180.", '".$_SESSION['Rut']."', '".$empresa."', '".$lugar."', ".$autoriza.", '".$aurut."', '".$aunombre."', '".$comentario."', $cotizaciones, $masbarata, '', 0, 1);";
			
			$ej = $this->conn->Consultar($sql);

			for($i=0; $i<count($aux); $i++){
				//echo $aux[$i]->neto;
				$sql2 = "INSERT INTO oc_ordelevel1(OrCod, FamC, PCodPro, CenCod, OrCan, OrValU, OrTotU) VALUES (".$cod.", ".$aux[$i]->fam.", ".$aux[$i]->prod.", ".$aux[$i]->cent.", ".$aux[$i]->cant.", ".$aux[$i]->valor.", ".$aux[$i]->neto.");";
				//echo $sql2;
				$this->conn->Consultar($sql2);
			}
			return json_encode(array("mensaje" => "OK"));
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
			return json_encode(array("mensaje" => "ERROR"));
		}
	}
public function traerOC($orden){
	$detalle = array();
	$sql = "SELECT oc_orde.*, oc_prov.*, oc_regilevel1level2.ComuD, oc_empr.*, x.ComuD as EmpComuna FROM oc_orde
			LEFT JOIN oc_prov on oc_orde.ProvRut=oc_prov.ProvRut
			LEFT JOIN oc_regilevel1level2 on oc_prov.Pcomuc=oc_regilevel1level2.ComuC and oc_prov.Pprovic = oc_regilevel1level2.ProviC and oc_prov.Pregc=oc_regilevel1level2.RegC
			LEFT JOIN oc_empr on oc_orde.EmpRut=oc_empr.EmpRut
			LEFT JOIN oc_regilevel1level2 as x on oc_empr.ComuC=x.ComuC and oc_empr.ProviC = x.ProviC and oc_empr.RegC=x.RegC
            where OrCod =".$orden.";";
	$ej = $this->conn->Consultar($sql);
	$rowcount=mysqli_num_rows($ej);
	if ($rowcount>0){
		$r = mysqli_fetch_assoc($ej);
		$cabecera = $r;
		//fam:fam, prod:prod, cent:cent, cant:cant, valor:valor, neto:cant*valor
		$sql2 = "SELECT a.OrCan as cant, a.OrValU as valor, a.OrTotU as neto,b.FamD as famD, c.PDesPro as prodD, d.CenDes as centD FROM 
				oc_ordelevel1 a LEFT JOIN oc_famp b on a.FamC = b.FamC
				LEFT JOIN oc_famplevel1 c on a.PCodPro = c.PCodPro and c.FamC = b.FamC
				LEFT JOIN oc_centro d ON a.CenCod = d.CenCod where a.OrCod = ".$orden.";";
		$ej2 = $this->conn->Consultar($sql2);
		$rowcount2=mysqli_num_rows($ej2);
		if ($rowcount>0){
			while ($r2 = mysqli_fetch_assoc($ej2)){
							array_push($detalle, $r2);
					}
			return json_encode(array("mensaje" => "OK", "cabecera" => $cabecera, "detalle" => $detalle));
		}
		else{
		return json_encode(array("mensaje" => "ERROR"));
		}
	}else{
		return json_encode(array("mensaje" => "ERROR"));
	}
}
private function traerNeto($orden){
	$sql = "SELECT OrNeto FROM oc_orde where OrCod =".$orden.";";
	$ej = $this->conn->Consultar($sql);
	$rowcount=mysqli_num_rows($ej);
	if ($rowcount>0){
		$r = mysqli_fetch_assoc($ej);
		return $r["OrNeto"];
	}else{
		return 0;
	}
}
private function esDeRepuestos($orden){
	$sql = "SELECT FamC FROM oc_ordelevel1 where OrCod =".$orden.";";
	$ej = $this->conn->Consultar($sql);
	$rowcount=mysqli_num_rows($ej);
	$repuesto = 1;
	if ($rowcount>0){
		while ($r = mysqli_fetch_assoc($ej)){
			if($r["FamC"] != 2){
				$repuesto = 0;
			}
		}
		return $repuesto;
	}else{
		return 0;
	}
}
}
}