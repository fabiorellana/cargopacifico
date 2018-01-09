<?php
class Conexion{
	private $Servidor;
	private $UsuarioDeMysql;
	private $ClaveDeMysql;
	private $BaseDeDatos;
	private $Conectar;
	
	function Conexion(){
		$this->Servidor = "localhost";
		$this->UsuarioDeMysql = "cargopac_4dm1n";
		$this->ClaveDeMysql = "m1ch1g4n";
		$this->BaseDeDatos = "cargopac_sistcp";
		$this->ConectarAMysql();
	}
	private function ConectarAMysql(){
		$this->Conectar = mysqli_connect($this->Servidor,
				$this->UsuarioDeMysql,
				$this->ClaveDeMysql, $this->BaseDeDatos);
		//echo mysqli_connect_error();
		mysqli_set_charset($this->Conectar,"utf8");
	}
	public function Consultar($sql){
		$resultado = mysqli_query($this->Conectar, $sql);
		return $resultado;
	}
	public function NFilas($sql){
		return mysqli_num_rows($sql);
	}
	public function NColumnas($sql){
		return mysqli_num_fields($sql);
	}
	public function NomCampo($sql,$i){
		return mysqli_fetch_field_direct($sql,$i);
	}
	function __destruct(){
		mysqli_close($this->Conectar);
	}
}
?>