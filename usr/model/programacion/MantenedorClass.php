<?php

/**
*Mantenedor 
*/
//archivo de conexion
require("../../../dist/conexion.php");

class Mantenedor
{
		public $con;
	function __construct()
	{
$this->con = new Conexion;

	}
	
	function __destruct(){
	$this->con = null;
	}	
	
	
	function Agregar($tabla, $valores){
	$insert="insert into $tabla values ($valores)";
	$resultado=$this->con->Consultar($insert);
	if(!$resultado){echo "<script>alert('hubo un error')</script>";}

	}
	
	function Editar($tabla, $valores, $where){
	$update="update $tabla set $valores where $where";
	echo $update;
	$resultado=$this->con->Consultar($update);
	if(!$resultado){echo "hubo un error al actualizar los registros";}
	}
	
	function Eliminar($tabla,  $where){
	$delete="delete from $tabla  where $where";
	echo $delete;
	$resultado=$this->con->Consultar($delete);
	if(!$resultado){echo "hubo un error al Eliminar los registros";}
	}
	
	function Json($tabla, $where){
		if(isset($where)){$filtro="where $where";}else{$filtro="";}
	$query = "SELECT * from $tabla";
	$resultado = $this->con->Consultar($query);
	if(!$resultado){die("Error");
	}else{
	while($data = mysqli_fetch_assoc($resultado)){
	$arreglo["data"][]=array_map("utf8_encode",$data);
	}
	echo  json_encode($arreglo);
	}
	mysqli_free_result($resultado);
	}


	function JsonFallas(){
		
	$query = "SELECT ges_fallas.Rut,  ges_trabajadores.Nombre from ges_fallas inner join ges_trabajadores where ges_trabajadores.Rut=ges_fallas.Rut";
	$resultado = $this->con->Consultar($query);
	if(!$resultado){die("Error");
	}else{
	while($data = mysqli_fetch_assoc($resultado)){
	$arreglo["data"][]=array_map("utf8_encode",$data);
	}
	echo  json_encode($arreglo);
	}
	mysqli_free_result($resultado);
	}

				//nombre de la tabla
				function listarbox($var){
				$sql="select * from ".$var."";
				$rs=$this->con->Consultar($sql);
				if($rs==true){
				echo "<select name=".$var." id=".$var."  class='form-control' required>";
				echo "<option value=''></option>";	
				while($row=mysqli_fetch_array($rs)){
				
				echo "<option value=".$row['0'].">".$row['0']." &nbsp;--&nbsp; ".$row['1']."</option>";				
				}
				echo "</select>";
				}
				}

}