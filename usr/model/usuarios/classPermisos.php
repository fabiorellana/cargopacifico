<?php
include ("../../../dist/conexion.php");
/**
* 
*/
class Permisos
{
	
	Public $con;
	
	function __construct()
	{
		$this->con = new Conexion();
	}

	function __destruct(){
	$this->con = null;
	}	

function  guarda_centro_cc($rut,$centro1,$centro2,$centro3, $centroadmin){
	
	
	if($centroadmin){
		$centro=1000;
		$sql="insert into cc_permisos_centros values ('', '$rut', '$centro')";
		echo $sql;
		$this->con->Consultar($sql);
		}
	if($centro1){
		$centro=$centro1; 
		$sql="insert into cc_permisos_centros values ('', '$rut', '$centro')";
		$this->con->Consultar($sql);
		}
	if($centro2){
		$centro=$centro2; 
		$sql="insert into cc_permisos_centros values ('', '$rut', '$centro')";
		$this->con->Consultar($sql);
		}
	if($centro3){
		$centro=$centro3; 
		$sql="insert into cc_permisos_centros values ('', '$rut', '$centro')";
		$this->con->Consultar($sql);
		}
	
	
	
	}

		function crear_permiso_usr($rut, $adminusr, $todo, $gncia,  $noticias, $ff, $prog, $gestion, $ges_tra, $admin_prog, $cc_usu, $cc_admin  ){
		
		$sqlpermisos="insert into int_permisos values('$rut','$adminusr','$todo','$gncia','$noticias','$ff','$prog', '$gestion', '$ges_tra','$admin_prog', '$cc_usu', '$cc_admin')";
		$this->con->Consultar($sqlpermisos);
		}	


			function update_permiso($rut, $dpto, $gerencia){
			
			//ver id deultimo usr agregado
			$sqlidpermiso="SELECT @@identity AS id from int_permisos";
			$rsidpermiso=$this->con->Consultar($sqlidpermiso);
			while($rowidpermiso=mysqli_fetch_array($rsidpermiso)){
			$ultimopermiso=$rowidpermiso['id'];
			}	
			$sql_update="update ges_trabajadores set id_permiso = '$ultimopermiso', id_dpto='$dpto', id_grencia='$gerencia' where Rut='$rut'";
			$this->con->Consultar($sql_update);
			}


	function crea_login($rut, $mail, $password){

	$sqllogin="insert into int_lgn values('$rut','$password', '$mail')";
			$this->con->Consultar($sqllogin);
}


function guarda_log($id_usr, $cc, $descripcion){

	$time = date('g:i:s');
	$fecha =date("y") . "-" . date("m") . "-" . date("d");
	$sql_log="insert into reg_log values('', '$id_usr', '$cc', '$fecha $time', '$descripcion')";
	$this->con->Consultar($sql_log);

}

function enviamail($destinatario, $asunto, $cuerpo){
	
	
require '../../lib/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'noreplycargotcp@gmail.com';
$mail->Password = 'm1ch1g4n';
$mail->setFrom('noreplycargotcp@gmail.com');
$mail->IsHTML(true);
$mail->addAddress($destinatario);
$mail->Subject = $asunto;
$mail->Body = $cuerpo;
//send the message, check for errors
if (!$mail->send()) {
    echo "<script>alert('error $mail->ErrorInfo')</script>ERROR: " . $mail->ErrorInfo;
} else {
   echo "<script>alert('Correo enviado exitosamente')</script>";
}


	
	}
}