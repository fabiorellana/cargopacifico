<?php

	



session_start();

require("../../../dist/conexion.php");

/**

* 

*/



class Fallas 

{



	private $con;

	function __construct()

	{

		$this->con = new Conexion;

	}



	function __destruct(){



	$this->con = null;



	}


public function cargafallas($sql){

return $this->json($sql);
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