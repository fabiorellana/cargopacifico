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





 public function cargamatriz(){

$cc=$_SESSION['cc'];


$sql="select prog_ccc.id, prog_ccc.corte, prog_ccc.patente, ges_trabajadores.Nombre, ges_trabajadores.Rut, prog_ccc.centro from prog_ccc INNER join ges_trabajadores where centro='$cc' and ges_trabajadores.Rut=prog_ccc.id_conductor";

return $this->json($sql);



}



public function cargaprogramacion(){

$cc=$_SESSION['cc'];
$fecha =date("y") . "-" . date("m") . "-" . date("d");
$sql="select C.Planilla,
C.Corte_ccu,
C.N_cargas,
D.Nombre as Conductor,
D.Rut,
C.Fecha_ccu, 
A.patente,
B.km,
B.fecha
from prog_ccc A LEFT JOIN tcp_odometro B on A.patente =B.patente
RIGHT JOIN prog_programacion C on C.Corte_ccu = A.corte ,
ges_trabajadores D 
where C.cent_costo='$cc' and D.Rut=C.Conductor and C.Fecha_ccu='$fecha'  and C.cerrada = 0  ORDER BY `C`.`Corte_ccu` ASC
";
return $this->json($sql);



}

function cuentaodometrosingresados(){
$cc=$_SESSION['cc'];
$fecha =date("y") . "-" . date("m") . "-" . date("d");
$sql="select count(C.Planilla) as total, COUNT(B.fecha) as odometro from prog_ccc A LEFT JOIN tcp_odometro B on A.patente =B.patente RIGHT JOIN prog_programacion C on C.Corte_ccu = A.corte , ges_trabajadores D where C.cent_costo='$cc' and D.Rut=C.Conductor and C.Fecha_ccu='$fecha' ORDER BY `C`.`Corte_ccu` ASC";
return $this->json($sql);
}



public function import($sql){



$this->con->Consultar($sql);



}





public function guardaupdate($patente, $planilla , $conductor, $corte){

if($conductor!=''){
	$sqlconductor="UPDATE `prog_programacion` SET `Conductor` = '$conductor' WHERE `prog_programacion`.`Planilla` = '$planilla'";
	$this->con->Consultar($sqlconductor);
	$sql="UPDATE `prog_ccc` SET `id_conductor`='$conductor' WHERE `prog_ccc`.`corte` = '$corte'";
	$this->con->Consultar($sql);
}
if($patente!=''){
	$sql="UPDATE `prog_ccc` SET `patente`='$patente' WHERE `prog_ccc`.`corte` = '$corte'";
	$this->con->Consultar($sql);
}

}

public function cerrarprogramacion(){
$cc=$_SESSION['cc'];
$fecha =date("y") . "-" . date("m") . "-" . date("d");	
$sql="UPDATE `prog_programacion` SET `cerrada` = '1' WHERE Fecha_ccu='$fecha' and cent_costo='$cc'";
$this->con->Consultar($sql);
}



public function editarMatriz($corte, $patente, $conductor)

{

$sql="UPDATE `prog_ccc` SET `patente` = '$patente', id_conductor='$conductor' WHERE `prog_ccc`.`corte` = '$corte';";

$this->con->Consultar($sql);

}





public function combopatente(){
   $fecha =date("y") . "-" . date("m") . "-" . date("d");
$cc=$_SESSION['cc'];

$sql="select flo_patente from tcp_flota where flo_cod_cc='$cc' and flo_patente not in (select Patente from tcp_flota_estado_temporal where estado='TALLER' ) and flo_patente not in (select Z.patente from prog_programacion I, prog_ccc Z where I.Fecha_ccu='$fecha' and Z.corte=I.Corte_ccu )";

echo $this->json($sql);



}



public function comboconductores(){
$fecha =date("y") . "-" . date("m") . "-" . date("d");
$cc=$_SESSION['cc'];
$sql="select Rut, Nombre from ges_trabajadores where Centro_de_costo_id='$cc' and Cargo_id='7' and Rut not in (select Rut from prog_falla_conductores where prog_falla.Fecha='$fecha') and Rut not in (select Conductor from prog_programacion where Fecha_ccu='$fecha' )";
 echo $this->json($sql);



}



public function guardaodometro($patente, $kms , $fecha, $planillaodo){
$cc=$_SESSION['cc'];
$sql="insert into tcp_odometro values('','$patente', '$fecha', '$kms', '$cc')";
$this->con->Consultar($sql);
$this->con->Consultar("UPDATE `tcp_flota` SET `flo_odometro` = '$kms' WHERE `tcp_flota`.`flo_patente` = '$patente';");
}



	public function lblcamiones(){

	$cc=$_SESSION['cc'];
    $fecha =date("y") . "-" . date("m") . "-" . date("d");
	$sql="select count(flo_patente) as cant from tcp_flota where flo_cod_cc='$cc' and flo_patente not in (select Patente from tcp_flota_estado_temporal where estado='TALLER' ) and flo_patente not in (select Z.patente from prog_programacion I, prog_ccc Z where I.Fecha_ccu='$fecha' and Z.corte=I.Corte_ccu )";

	return $this->json($sql);

	}



	public function lblconductores(){

	$cc=$_SESSION['cc'];
	$fecha =date("y") . "-" . date("m") . "-" . date("d");
	$sql="select count(Rut) as cant from ges_trabajadores where Centro_de_costo_id='$cc' and Cargo_id='7' and Rut not in (select Rut from prog_falla_conductores where prog_falla_conductores.Fecha='$fecha') and Rut not in (select Conductor from prog_programacion where Fecha_ccu='$fecha' )";

	echo $this->json($sql);

	}



	public function validaodometro($patente){

	$sql="SELECT max(km) as max FROM `tcp_odometro` WHERE patente='$patente'";

	$rs=$this->con->Consultar($sql);

	while ($row=mysqli_fetch_array($rs)) {

	 $max=$row['max'];

	}

	return $max;
	}

	public function selcorte(){
		$cc=$_SESSION['cc'];
		$sql = "SELECT A.corte as corte_ccc, B.Nombre as nombre_ccc, A.id_conductor as rut FROM prog_ccc A INNER JOIN ges_trabajadores B ON A.id_conductor = B.Rut WHERE A.centro = '$cc'";
		
		return $this->json($sql);
	}

	public function cargarut($cortef){
		$cc=$_SESSION['cc'];
		if($cortef == '')
		{
			$wherecorte = "";
		}else{
			$wherecorte="and A.corte = '$cortef'";
		}

		$sql = "SELECT A.corte as corte_ccc, A.id_conductor as rut_ccc, B.Nombre as nombre_ccc FROM prog_ccc A INNER JOIN ges_trabajadores B ON A.id_conductor = B.Rut WHERE A.centro = '$cc' $wherecorte";

		return $this->json($sql);
	}


	public function regprogramacion($planilla, $corte, $rutcond, $total_cajas, $carga, $cliente){
		$cc=$_SESSION['cc'];
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		//Prog_programacion
		$sql1 = "insert into prog_programacion values ('','$planilla','$corte', '$conductor', '$total_cajas','$carga','$cliente','$fecha','$cc', '','','', '0','0', '1','')";
		$this->con->Consultar($sql1);

		//CC_history
		$sql2 = "insert into cc_history values ('$planilla','$fecha','$cc','$corte','','$conductor','','','','','','','','','','','','','','')";
		$this->con->Consultar($sql2);

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





function cargaflota(){

$cc=$_SESSION['cc'];
	$fecha =date("y") . "-" . date("m") . "-" . date("d");
$sql="select flo_patente from tcp_flota where flo_cod_cc='$cc' and flo_patente not in (select Patente from tcp_flota_estado_temporal where estado='Taller' ) and flo_patente not in (select Z.patente from prog_programacion I, prog_ccc Z where I.Fecha_ccu='$fecha' and Z.corte=I.Corte_ccu )";

return $this->json($sql);

}





function cargaconductores(){

$cc=$_SESSION['cc'];
	$fecha =date("y") . "-" . date("m") . "-" . date("d");
$sql="select Rut, Nombre from ges_trabajadores where Centro_de_costo_id='$cc' and Cargo_id='7' and Rut not in (select Rut from prog_falla_conductores where prog_falla_conductores.Fecha='$fecha') and Rut not in (select Conductor from prog_programacion where Fecha_ccu='$fecha' )";

return $this->json($sql);

}



function conductorfalla($rut, $estado, $fecha){

	$sql="insert into prog_falla_conductores values('','$rut','$fecha','$estado')";

	$this->con->Consultar($sql);

}



function eliminafallaconductor($rut){

	$this->con->Consultar("delete from prog_falla_conductores where Rut='$rut'");

}



function cambiaestadocamion($patente, $mail, $estado, $obs){

	$verifica="select count(id) as cant from tcp_flota_estado_temporal where Patente='$patente'";

	$rs=$this->con->Consultar($verifica);	

	while($rw=mysqli_fetch_array($rs)){

		$cant=$rw['cant'];

	}

	if($cant==0){

	$sql="insert into tcp_flota_estado_temporal values('', '$patente', '$estado', '$obs', '$mail')";

	$this->con->Consultar($sql);

	$subject ="Sistema Transportes Cargo Pacifico ";
	$message  = "Estimado,\n";
	$message .= "El camion $patente se encuentra en taller por motivo: $obs \n\n";
	$message .= "\n\n";
	$message .= "Saludos";
	$message .= "\n\n\n .\nSistema Transportes Cargo Pacifico.";
	$header="from: Transportes Cargo Pacífico <NoResponder@cargopacifico.cl>";
	$to = $mail;
	$send_contact=mail($to,$subject,$message,$header);

	}else{

	$this->con->Consultar("delete from tcp_flota_estado_temporal where Patente='$patente'");



}

}







}