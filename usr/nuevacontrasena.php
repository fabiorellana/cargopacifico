<?php 
session_start();
include "../funciones/conexion.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$id_dpto=$_SESSION["dpto"];
echo "<script>alert($idusr. . $id_dpto)</script>";
if(!$idusr){session_destroy(); header("location:../");}


		
		
?>

<?php 
$mail=$_GET['mail'];
$idusr=$_GET['idusr'];

$destinatario = $mail; 

$nueva=substr(md5(uniqid()), 0, 8);

  $password = password_hash( $nueva, PASSWORD_DEFAULT);
		  $update="UPDATE int_lgn SET conpss = '$password' WHERE int_lgn.id_usr = $idusr";
		  echo $update;
		  mysql_query($update, $cnn);
$asunto = "Cambio de contraseña"; 
$cuerpo = "              Cambio de contrasena exitoso!

 							Su nueva contraseña: ".$nueva."
   
   			Te recordamos que la contraseña es temporal, el sistema al primer inicio te solicitara una nueva contraseña.
			la contraseña puede ser cambiada en cualquier momento en el menu de tu sesión, barra de navegacion, tu nombre cambiar contraseña.
   
   
   														Atte. Webmaster - archivos TCP.

"; 


require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'mail.cargopacifico.cl';
$mail->Port = 465;
$mail->Username = 'web@cargopacifico.cl';
$mail->Password = 'm1ch1g4n';
$mail->setFrom('web@cargopacifico.cl');
$mail->addAddress($destinatario);
$mail->Subject = $asunto;
$mail->Body = $cuerpo;
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
 		  echo "<script>document.location ='editarusr.php'</script>";

}


?>