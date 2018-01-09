<?php

include ("../../../dist/conexion.php");

/**
* 
*/
class Usuarios
{
	Public $con;
	
	function __construct()
	{
		$this->con = new Conexion();
	}

	function __destruct(){
	$this->con = null;
	}	

public function verificapass(){
$password=$_POST['password'];
session_start();
$usr=$_SESSION["idusr"];
$sql="select conpss from int_lgn where rut='$usr'";
$rs = $this->con->Consultar($sql);
while ($row=mysqli_fetch_array($rs)){
$pass=$row['conpss'];
}
if (password_verify($password, $pass)) 
{
return 1;	
}
else
{
return 0;
}
}
public function updatepass($pass){
	session_start();
$usr=$_SESSION["idusr"];
$password = password_hash($pass, PASSWORD_DEFAULT);
 $sql="UPDATE `int_lgn` SET `conpss` = '$password' WHERE `int_lgn`.`rut` = '$usr';";
 $this->con->Consultar($sql);
 $sqlemail="select mail from int_lgn where rut='$usr' ";
 $rs=$this->con->Consultar($sqlemail);
while($rowmail=mysqli_fetch_array($rs))
	{
		$mail=$rowmail['mail'];
	}

$subject ="Sistema Transportes Cargo Pacifico ";
$message  = "Estimado Usuario,\n";
$message .= "\nRecientemente cambiaste la contraseña de tu intranet \n";
$message .= "\nRecuerda que tu nueva contraseña es $pass\n\n";
$message .= "\nRecuerda que puedes cambiar tu clave en cualquier momento desde la intranet\n";
$message .= "\nSaludos";
$message .= "\n\n\n .\nSistema Transportes Cargo Pacifico.";
$header="from: Transportes Cargo Pacífico <NoResponder@cargopacifico.cl>";
$to = $mail;
$send_contact=mail($to,$subject,$message,$header);
}

public function tblusuarios(){
$query = "SELECT ges_trabajadores.Rut, ges_trabajadores.Nombre, int_cargo.Descripcion as cargo, ges_centro_de_costos.Descripcion as centro from ges_trabajadores INNER JOIN int_cargo INNER JOIN ges_centro_de_costos where ges_trabajadores.Cargo_id=int_cargo.Id and ges_trabajadores.Estado=1 and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id order by Rut desc";
return	 $this->json($query);
}


public function consultapermisos($rut){
$query="SELECt int_permisos.Administrar_usuarios, int_permisos.Programacion_programador, int_permisos.programacion_deposito, int_permisos.Administrar_programacion, int_permisos.cc_usu, int_permisos.cc_admin, int_permisos.flota_1, int_permisos.flota_2, int_permisos.botelleros, int_lgn.mail FROM `int_permisos` inner join int_lgn WHERE int_permisos.rut='$rut' and int_lgn.rut='$rut'";
return $this->json($query);
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



public function crearusuario($adminusr, $progprog, $progdep, $adminprog, $cc_usu, $cc_admin, $flota, $botelleros, $rut, $mail, $usuarionombre)
{
	/*
$rs=$this->con->Consultar("select count(rut) as cant from int_permisos where rut='$rut'");
while($row=mysqli_fetch_array($rs)){
$cant=$row['cant'];
}
//consulta si ya existe un registro para el usuario
if($cant==1){
	$this->con->Consultar("UPDATE `int_permisos` SET `Administrar_usuarios` = '$adminusr', Programacion_programador='$progprog', programacion_deposito='$progdep', Administrar_programacion='$adminprog', cc_usu='$cc_usu', cc_admin='$cc_admin', flota_1='$flota', flota_2='$flota'  WHERE `int_permisos`.`rut` = '$rut'")
}
else{ */

$this->con->Consultar("insert into int_permisos values('$rut','$adminusr','$progprog','$progdep','$adminprog','$cc_usu','$cc_admin','$flota','$flota2','$botelleros')");

$pass= $this->generarCodigo(8);
$password = password_hash($pass, PASSWORD_DEFAULT);
$sqllogin="insert into int_lgn values('$rut','$password', '$mail')";
$this->con->Consultar($sqllogin);
$this->con->Consultar("insert into personaliza values('$rut', 'imageUsr/contacto.png')");


$subject ="Sistema Transportes Cargo Pacifico ";
$message  = "Estimado Usuario,\n";
$message .= "Para ingresar a la intranet y los sistemas de Trasportes Cargo Pacifico. debes ingresar con tu Rut y clave \n\n";
$message .= "Tu Contrasena  es: $pass\n\n";
$message .= "Recuerda que puedes cambiar tu clave en cualquier momento desde la intranet";
$message .= "Saludos";
$message .= "\n\n\n .\nSistema Transportes Cargo Pacifico.";
$header="from: Transportes Cargo Pacífico <NoResponder@cargopacifico.cl>";
$to = $mail;
$send_contact=mail($to,$subject,$message,$header);

//}
}


public function crearsocio($nombre, $mail, $rut){
//$pass= $this->generarCodigo(8);
$pass = $rut;
$password = password_hash($pass, PASSWORD_DEFAULT);
$sqllogin="insert into int_lgn values('$rut','$password', '$mail')";
$this->con->Consultar($sqllogin);
$this->con->Consultar("insert into int_permisos values('$rut','','','','','','','1','','')");
$this->con->Consultar("insert into ges_trabajadores values('$rut','$nombre','50','4','','','','','','1')");
$this->con->Consultar("insert into personaliza values('$rut', 'imageUsr/contacto.png')");
}

private function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

}


