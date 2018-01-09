<?php
//require("conexion.php");
class Oca{
	public $conn;
	public $fac_quincena;
	public $fac_mes;
	public $fac_ano;
	public $fac_transportista;
	public $fac_oca;
	public $fac_guias;
	public $fac_origen;
	public $fac_destino;
	public $fac_tramo;
	public $fac_fecha_hora_orden;
	public $fac_patente;
	public $fac_rampla;
	public $fac_bahias;
	public $fac_precio_vc;
	public $fac_valor_a_pagar;
	public $fac_fecha_hora_aprobacion;
	public $fac_fecha_hora_recepcion;
	
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
	public function insertaOca(){
		try{
			$sql="INSERT INTO bot_facturacion VALUES (
			'".$this->fac_quincena."', '".$this->fac_mes."','".$this->fac_ano."','".$this->fac_transportista."',
			'".$this->fac_oca."','".$this->fac_guias."','".$this->fac_origen."','".$this->fac_destino."','".$this->fac_tramo."',
			'".$this->fac_fecha_hora_orden."','".$this->fac_patente."','".$this->fac_rampla."','".$this->fac_bahias."',
			'".$this->fac_precio_vc."','".$this->fac_valor_a_pagar."','".$this->fac_fecha_hora_aprobacion."','".$this->fac_fecha_hora_recepcion."', null);";
			$this->conn->Consultar($sql);
		}
		catch (Exception $e){
			echo "Error".$e->getMessage();
		}
	}
	public function buscarPeriodo($quincena, $mes, $ano){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		return $v;
	}
	public function montoPeriodo($quincena, $mes, $ano){
		$sql="SELECT SUM(fac_valor_a_pagar) as Monto FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0] + 0;
		return $v;
	}
	public function buscarCeros($quincena, $mes, $ano){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano." and fac_valor_a_pagar=0;";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		return $v;
	}
	public function buscarCerosSinRevisar($quincena, $mes, $ano){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano." and fac_valor_a_pagar=0 AND fac_estado IS null;";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		return $v;
	}
	public function listarCeros($quincena, $mes, $ano){
		$sql="SELECT * FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano." and fac_valor_a_pagar=0;";
		$ej = $this->conn->Consultar($sql);
		$listaCeros = array();
		while ($row = mysqli_fetch_assoc($ej)){
			array_push($listaCeros, $row);
		}
		return json_encode($listaCeros);
	}
	function autorizarOcaCero($oca, $quincena, $mes, $ano, $estado){
		if($estado == 1){
			$sql = "UPDATE bot_facturacion SET fac_estado='AUTORIZADO' WHERE fac_oca='".$oca."' AND fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		}
		if($estado == 2){
			$sql = "UPDATE bot_facturacion SET fac_estado='A COBRO' WHERE fac_oca='".$oca."' AND fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		}
		if($estado == 0){
			$sql = "UPDATE bot_facturacion SET fac_estado=null WHERE fac_oca='".$oca."' AND fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		}
		$ej = $this->conn->Consultar($sql);	
		return json_encode(array("mensaje" => "OK"));
	}
	public function ocaDuplicada($oca){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_facturacion WHERE fac_oca = '".$oca."';";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		if($v>1){
			return true;
		}
		else{
			return false;
		}
	}
	public function buscarDuplicados($quincena, $mes, $ano){
		$sql = "SELECT fac_oca FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		$ej = $this->conn->Consultar($sql);
		$duplicadas = array();
		while ($row = mysqli_fetch_assoc($ej)){
			if($this->ocaDuplicada($row['fac_oca'])){
				array_push($duplicadas, $row['fac_oca']);
			}
		}
		return $duplicadas;
	}
	public function listarDuplicados($quincena, $mes, $ano){
		$sql = "SELECT * FROM bot_facturacion WHERE fac_quincena=".$quincena." AND fac_mes=".$mes." AND fac_ano=".$ano.";";
		$ej = $this->conn->Consultar($sql);
		$duplicadas = array();
		while ($row = mysqli_fetch_assoc($ej)){
			if($this->ocaDuplicada($row['fac_oca'])){
				$sql2 = "SELECT * FROM bot_facturacion WHERE fac_oca = '".$row['fac_oca']."';";
				$ej2 = $this->conn->Consultar($sql2);
				while ($row2 = mysqli_fetch_assoc($ej2)){
					array_push($duplicadas, $row2);
				}
			}
		}
		return json_encode($duplicadas);
	}
	public function buscaPolinomio($quincena, $mes, $ano, $zona){
		if($zona == "SIN ZONA"){
			$sql="SELECT * FROM bot_polinomio WHERE pol_quincena=".$quincena." AND pol_mes=".$mes." AND pol_ano=".$ano.";";
		}
		else{
			$sql="SELECT * FROM bot_polinomio WHERE pol_quincena=".$quincena." AND pol_mes=".$mes." AND pol_ano=".$ano." and pol_zona='".$zona."';";
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
			return json_encode(0);
		}
	}

	public function guardarPolinomio($quincena, $mes, $ano, $zona, $fecha1, $dolar1, $uf1, $petroleo1, $icmo1, $fecha2, $dolar2, $uf2, $petroleo2, $icmo2, $var_dolar, $var_uf, $var_petroleo, $var_icmo, $pol_dolar, $pol_uf, $pol_petroleo, $pol_icmo, $ajuste_ccu, $ajuste_calculado){
		$sql = "";
		if(json_decode($this->buscaPolinomio($quincena, $mes, $ano, $zona)) == 0){
			$sql = "INSERT INTO bot_polinomio(pol_quincena, pol_mes, pol_ano, pol_fecha1, pol_dolar1, pol_uf1, pol_petroleo1, pol_icmo1, pol_fecha2, pol_dolar2, pol_uf2, pol_petroleo2, pol_icmo2, pol_var_dolar, pol_var_uf, pol_var_petroleo, pol_var_icmo, pol_pol_dolar, pol_pol_uf, pol_pol_petroleo, pol_pol_icmo, pol_pol_ajuste_ccu, pol_ajuste_calculado, pol_zona) VALUES ('$quincena', '$mes', '$ano', '$fecha1', '$dolar1', '$uf1', '$petroleo1', '$icmo1', '$fecha2', '$dolar2', '$uf2', '$petroleo2', '$icmo2', '$var_dolar', '$var_uf', '$var_petroleo', '$var_icmo', '$pol_dolar', '$pol_uf', '$pol_petroleo', '$pol_icmo', '$ajuste_ccu', '$ajuste_calculado', '$zona');";	
		}
		else{
			$sql = "UPDATE bot_polinomio SET pol_fecha1='$fecha1', pol_dolar1=$dolar1, pol_uf1=$uf1, pol_petroleo1=$petroleo1, pol_icmo1=$icmo1, pol_fecha2='$fecha2', pol_dolar2=$dolar2, pol_uf2=$uf2, pol_petroleo2=$petroleo2, pol_icmo2=$icmo2, pol_var_dolar=$var_dolar, pol_var_uf=$var_uf, pol_var_petroleo=$var_petroleo, pol_var_icmo=$var_icmo, pol_pol_dolar=$pol_dolar, pol_pol_uf=$pol_uf, pol_pol_petroleo=$pol_petroleo, pol_pol_icmo=$pol_icmo, pol_pol_ajuste_ccu=$ajuste_ccu, pol_ajuste_calculado=$ajuste_calculado WHERE pol_quincena=$quincena AND pol_mes=$mes AND pol_ano=$ano AND pol_zona='$zona';";
		}
		$this->conn->Consultar($sql);
		return json_encode("OK");
	}

	public function validaTitulos(){
		$columna = "";
		$errores = 0;
		if(trim($this->fac_transportista) != "Transportista"){
			$columna .= "-A-";
			$errores++;
		}
		if(trim($this->fac_oca) != "Nro.Orden"){
			$columna .= "-B-";
			$errores++;
		}
		if(trim($this->fac_guias) !="G.Despacho"){
			$columna .= "-C-";
			$errores++;
		}
		if(trim($this->fac_origen) != "Origen"){
			$columna .= "-D-";
			$errores++;
		}
		if(trim($this->fac_destino) != "Destino"){
			$columna .= "-E-";
			$errores++;
		}
		if(trim($this->fac_tramo) != "Tramo"){
			$columna .= "-F-";
			$errores++;
		}
		if(trim($this->fac_fecha_hora_orden) != "Fecha-Hora Orden"){
			$columna .= "-G-";
			$errores++;
		}
		if(trim($this->fac_patente) != "Patente"){
			$columna .= "-H-";
			$errores++;
		}
		if(trim($this->fac_rampla) != "Rampla"){
			$columna .= "-I-";
			$errores++;
		}
		if(trim($this->fac_bahias) !="Bahias"){
			$columna .= "-J-";
			$errores++;
		}
		if(trim($this->fac_precio_vc) != "Precio Vc"){
			$columna .= "-K-";
			$errores++;
		}
		if(trim($this->fac_valor_a_pagar) != "Valor Orden"){
			$columna .= "-L-";
			$errores++;
		}
		if(trim($this->fac_fecha_hora_aprobacion) != "Fecha-Hora Aprob"){
			$columna .= "-M-";
			$errores++;
		}
		if(trim($this->fac_fecha_hora_recepcion) != "Fecha-Hora Recep"){
			$columna .= "-N-";
			$errores++;
		}
		if($errores==0){
			return "OK";
		}
		else{
			return "Chequear columna(s) ".$columna." de los titulos del archivo excel. Debe coincidir con los indicados en archivo de formato.";
		}
	}
	function listaEmpresas(){
		$sql = "SELECT emp_id, emp_nombre from bot_empresas;";
		$ej = $this->conn->Consultar($sql);
		$rowcount=mysqli_num_rows($ej);
			$retorno = array();
		if ($rowcount>0){
				while ($r = mysqli_fetch_assoc($ej)){
						array_push($retorno, $r);
				}
			return json_encode($retorno);
		}else{
			return json_encode(0);
		}
	}
	function guardarEmpresa($nombreEmpresa){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_empresas WHERE emp_nombre='".strtoupper($nombreEmpresa)."';";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		if($v == 0){
			$sql = "INSERT INTO bot_empresas (emp_nombre) values('".strtoupper($nombreEmpresa)."');";
			$ej = $this->conn->Consultar($sql);	
			return json_encode(array("mensaje" => "OK"));
		}
		else{
			return json_encode(array("mensaje" => "EMPRESA YA EXISTE"));
		}
	}
	function editarEmpresa($nombreEmpresaEdit, $emp_id){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_empresas WHERE emp_nombre='".strtoupper($nombreEmpresaEdit)."';";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		if($v == 0){
			$sql = "UPDATE bot_empresas SET emp_nombre = '".strtoupper($nombreEmpresaEdit)."' WHERE emp_id = ".$emp_id.";";
			$ej = $this->conn->Consultar($sql);	
			return json_encode(array("mensaje" => "OK"));
		}
		else{
			return json_encode(array("mensaje" => "EMPRESA YA EXISTE"));
		}
	}
	function guardarTracto($patente, $emp_id){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_tractos WHERE tra_patente='".strtoupper($patente)."';";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		if($v == 0){
			$sql = "INSERT INTO bot_tractos (tra_patente, tra_id_empresa) values('".strtoupper($patente)."', ".$emp_id.");";
			$ej = $this->conn->Consultar($sql);	
			return json_encode(array("mensaje" => "OK"));
		}
		else{
			return json_encode(array("mensaje" => "PATENTE YA EXISTE"));
		}
	}
	function editarTracto($patente, $emp_id){
		$sql = "UPDATE bot_tractos SET tra_id_empresa=".$emp_id." WHERE tra_patente='".strtoupper($patente)."';";
		$ej = $this->conn->Consultar($sql);	
		return json_encode(array("mensaje" => "OK"));
	}

	function listarTractos($emp_id){
		$sql = "SELECT * from bot_tractos WHERE tra_id_empresa = $emp_id;";
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
	function guardarRampla($patente, $bahias, $emp_id){
		$sql="SELECT COUNT(*) as Cuenta FROM bot_ramplas WHERE ram_patente='".strtoupper($patente)."';";
		$ej = $this->conn->Consultar($sql);
		$r = mysqli_fetch_array($ej);
		$v = $r[0];
		if($v == 0){
			$sql = "INSERT INTO bot_ramplas (ram_patente, ram_bahias, ram_id_empresa) values('".strtoupper($patente)."',".$bahias." , ".$emp_id.");";
			$ej = $this->conn->Consultar($sql);	
			
			return json_encode(array("mensaje" => "OK"));
		}
		else{
			return json_encode(array("mensaje" => "PATENTE YA EXISTE"));
		}
	}
	function editarRampla($patente, $bahias, $emp_id){
		$sql = "UPDATE bot_ramplas SET ram_id_empresa=".$emp_id.", ram_bahias=".$bahias." WHERE ram_patente='".strtoupper($patente)."';";
		$ej = $this->conn->Consultar($sql);	
		return json_encode(array("mensaje" => "OK"));
	}

	function listarRamplas($emp_id){
		$sql = "SELECT * from bot_ramplas WHERE ram_id_empresa = $emp_id;";
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
}