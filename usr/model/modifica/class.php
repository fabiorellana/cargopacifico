<?php
	

session_start();
require("../../../dist/conexion.php");
/**
* 
*/

class Centro 
{

	private $con;
	function __construct()
	{
		$this->con = new Conexion;
	}

	function __destruct(){

	$this->con = null;

	}


 public function traedatos(){

return $this->json("select * from ges_trabajadores");
}

public function guardamodificacion($rut, $nombre, $cargo, $cel, $centro, $ciudad, $dir, $emp, $estado, $id){
	$update="UPDATE `ges_trabajadores` SET `Nombre` = '$nombre', Rut='$rut', Cargo_id='$cargo', Celular='$cel', Centro_de_costo_id='$centro', Ciudad='$ciudad', Direccion='$dir', Empresa_id='$emp' , Estado='$estado' WHERE `ges_trabajadores`.`Rut` = '$id';";
	$this->con->Consultar($update);
}


private function json($sql){
try{
$ej = $this->con->Consultar($sql);
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


}