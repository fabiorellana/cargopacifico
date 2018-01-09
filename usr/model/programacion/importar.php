<?php 
require("../../../dist/conexion.php");

/**
* 
*/
class Importar 
{
	public $con;
	
	function __construct()
	{
		
		$this->con = new Conexion;
	}

	function __destruct(){
		$this->con =null;
	}
}
