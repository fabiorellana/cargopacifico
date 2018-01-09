<?php

/**
*Mantenedor 
*/
//archivo de conexion
require("../../../../dist/conexion.php");

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
	$resultado=$this->con->Consultar($update);
	if(!$resultado){echo "hubo un error al Eliminar los registros";}
	}
	
	function Json($tabla, $where){
		if(isset($where)){$filtro=" $where";}else{$filtro="";}
	$query = "SELECT * from $tabla $filtro";

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


	function JsonTrabajadoresPHP(){
		
	$query = "SELECT ges_trabajadores.Rut, ges_trabajadores.Nombre, int_cargo.Descripcion as cargo, ges_empresa.Nombre as empresa, ges_centro_de_costos.Descripcion as centro from ges_trabajadores INNER join int_cargo INNER join ges_empresa inner join ges_centro_de_costos where ges_trabajadores.Cargo_id=int_cargo.Id and ges_trabajadores.Empresa_id=ges_empresa.Id and ges_centro_de_costos.id=ges_trabajadores.Centro_de_costo_id";

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
				//nombre de la comlumna 1 y 2	
				function listarbox($var){
				$sql="select * from ".$var."";
				$rs=$this->con->Consultar($sql);
				if($rs==true){
				echo "<select name=".$var."  class='form-control'>";
				echo "<option value=''></option>";	
				while($row=mysqli_fetch_array($rs)){
				
				echo "<option value=".$row['0'].">".$row['0']." &nbsp;--&nbsp; ".$row['1']."</option>";				
				}
				echo "</select>";
				}
				}

}