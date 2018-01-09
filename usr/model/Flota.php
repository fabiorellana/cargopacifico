<?php

class Flota{
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
	public function listarFlota($socio){
		try{
			$sql = "SELECT soc_descripcion from tcp_socio WHERE UPPER(soc_rut) = '".strtoupper($socio)."';";
			$ej = $this->conn->Consultar($sql);
			$rowcount=mysqli_num_rows($ej);
			if ($rowcount>0){
				$r = mysqli_fetch_assoc($ej);
			}
			if($r['soc_descripcion']=='TCP'){
				$sql="SELECT 
						A.*, 
						C.flo_condicion as flo_estado, 
						UPPER(C.flo_detalle) AS flo_detalle,
						DATEDIFF(CURDATE(), C.flo_fecha_salida) as Dias
					FROM 
						tcp_flota A, 
						tcp_flota_estado C 
					WHERE 
						A.flo_patente = C.flo_patente AND 
						C.id in (SELECT MAX(id) from tcp_flota_estado where flo_patente = A.flo_patente);";
			}
			else{
				$sql="SELECT 
						A.*, 
						C.flo_condicion as flo_estado, 
						UPPER(C.flo_detalle) AS flo_detalle,
						DATEDIFF(CURDATE(), C.flo_fecha_salida) as Dias
					FROM 
						tcp_flota A, 
						tcp_socio B, 
						tcp_flota_estado C 
					WHERE 
						UPPER(B.soc_rut) = '".strtoupper($socio)."' AND 
						A.flo_socio=B.soc_descripcion AND 
						A.flo_patente = C.flo_patente AND 
						C.id in (SELECT MAX(id) from tcp_flota_estado where flo_patente = A.flo_patente);";
			}
			
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
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function listarFlotaTaller($socio){
		try{
			$sql = "SELECT soc_descripcion from tcp_socio WHERE UPPER(soc_rut) = '".strtoupper($socio)."';";
			$ej = $this->conn->Consultar($sql);
			$rowcount=mysqli_num_rows($ej);
			if ($rowcount>0){
				$r = mysqli_fetch_assoc($ej);
			}
			
			if($r['soc_descripcion']=='TCP'){
				$sql="SELECT 
							A.*, 
						    C.flo_condicion as flo_estado, 
						    UPPER(C.flo_detalle) AS flo_detalle,
						    DATEDIFF(CURDATE(), C.flo_fecha_salida) as Dias
						FROM
							tcp_flota A, 
						    tcp_flota_estado C 
						WHERE  
							A.flo_patente = C.flo_patente AND 
						    C.id in (SELECT MAX(id) from tcp_flota_estado where flo_patente = A.flo_patente) AND 
						    C.flo_condicion='TALLER';";
			}
			else{
				$sql="SELECT A.*, 
						C.flo_condicion as flo_estado, 
						UPPER(C.flo_detalle) AS flo_detalle,
						DATEDIFF(CURDATE(), C.flo_fecha_salida) as Dias
					  FROM 
					  	tcp_flota A, 
					  	tcp_socio B, 
					  	tcp_flota_estado C 
					  WHERE
					  	UPPER(B.soc_rut) = '".strtoupper($socio)."' AND 
					  	A.flo_socio=B.soc_descripcion AND 
					  	A.flo_patente = C.flo_patente AND 
					  	C.id in (SELECT MAX(id) from tcp_flota_estado where flo_patente = A.flo_patente) AND 
					  	C.flo_condicion='TALLER';";
			}
			
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
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function listarFlotaTrabajos($patente){
		try{
			$sql="SELECT flo_fecha_ingreso, flo_fecha_salida, flo_detalle FROM tcp_flota_estado WHERE flo_patente='".$patente."' AND flo_condicion='TALLER' ORDER BY id DESC;";
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
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function detallePatente($patente){
		try{
			//$sql="SELECT A.*, B.flo_lugar from tcp_flota A LEFT JOIN tcp_flota_estado B ON A.flo_patente=B.flo_patente WHERE A.flo_patente='".$patente."' ORDER BY B.id DESC LIMIT 1;";
			$sql="SELECT
					A.*, 
					B.flo_lugar 
				from 
					tcp_flota A LEFT JOIN tcp_flota_estado B
                    	ON A.flo_patente=B.flo_patente AND
                        B.id = (SELECT MAX(id) FROM tcp_flota_estado where flo_patente=A.flo_patente)
				WHERE
					A.flo_patente='".$patente."';";
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
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function listaCentrosCosto(){
		try{
			$sql="SELECT DISTINCT(flo_ccosto) as flo_ccosto FROM tcp_flota ORDER BY 1;";
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
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function insertaEstado($patente, $condicion, $f1, $f2, $detalle, $lugar){
		try{
			$sql="INSERT INTO tcp_flota_estado(flo_patente, flo_condicion, flo_fecha_ingreso, flo_fecha_salida, flo_detalle, flo_lugar) VALUES ('".$patente."', '".$condicion."', '".$f1."', '".$f2."', '".$detalle."', '".$lugar."')";
			$ej = $this->conn->Consultar($sql);
			return json_encode(array("mensaje" => "OK"));
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
			return json_encode(array("mensaje" => "ERROR"));
		}
	}
}