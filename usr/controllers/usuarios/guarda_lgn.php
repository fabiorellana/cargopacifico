Trabajando...

<?php 
error_reporting(0);
print_r($_POST);
require("../../model/usuarios/classPermisos.php");

$objpermisos = new Permisos;

if($_POST['Btn_permisos']=="Crear"){

  if(isset($_POST['ckadminusr'])){
	  $adminusr=1;

  }

  if(isset($_POST['cktodo'])){
	$todo=1;
    
  }

  if(isset($_POST['ckgerencia'])){

    $gncia=1;
  }

  if(isset($_POST['cknoticias'])){
	$noticias=1;
    
  }
if(isset($_POST['ckff'])){

    $ff=1;
  }
  if(isset($_POST['ckprogramacion'])){

    $prog=1;
  }
 
   if(isset($_POST['ckgestion_trabajadores'])){

    $ges_tra=1;
  }
  if(isset($_POST['ckgestion_prog'])){

    $admin_prog=1;
  }
   if(isset($_POST['cc_usu'])){

    $cc_usu=1;
  }
   if(isset($_POST['cc_admin'])){

    $cc_admin=1;
	$centroadmin=1000;
  }
 

  
 $dpto=$_POST['select_dpto'];
 $gerencia=$_POST['select_gerencia'];
 $rutpassw=$_POST['txtrut'];
 $rut=$_POST['txtrut'];
 $mail=$_POST['txtmail'];
 
 // centros  cuenta corriente
  $centro1=$_POST['listcentro1'];
  $centro2=$_POST['listcentro2'];
  $centro3=$_POST['listcentro3'];

  $objpermisos->guarda_centro_cc($rut,$centro1,$centro2,$centro3, $centroadmin);
  $password = password_hash($rutpassw, PASSWORD_DEFAULT);
  $objpermisos->crear_permiso_usr($rut, $adminusr, $todo, $gncia,  $noticias, $ff, $prog, $gestion, $ges_tra, $admin_prog, $cc_usu, $cc_admin );
  $objpermisos->update_permiso($rut, $dpto, $gerencia);
  $objpermisos->crea_login($rut, $mail, $password );

  //guarda imagen personaliza
  $objpermisos->con->Consultar("insert into personaliza values('$rut', 'imageUsr/logo.png')");

 $descripcion="Usuario creado rut $rut";
 $objpermisos->guarda_log($id_usr, $cc, $descripcion);
$destinatario = $mail; 
$asunto = "Datos de sesion Rut ".$rut.""; 
$cuerpo = "            <div align='center' <h2>  Nuevo Usuario registrado</h2></div>

    <div align='center'><h4>Hola Usuario Rut ".$rut."</h4> </div>
<br>
 Bienvenido a la nueva aplicacion web de gestion de archivos Transporte Cargo pacifico.
 <br>
 
 Acontinuacion se detallan las instrucciones para iniciar sesion en la aplicacion
 <br>
 1. Ingresa a  http://www.cargopacifico.cl
 <br>
 <br>
 2. En la esquina superior derecha click sobre Intranet
 <br>
 <br>
 tus datos para iniciar sesion son:
 <br>
 			<div align='center'>
			<strong>Usuario: ".$rut."</strong><br><br>
 			<strong>Contrasena: ".$rutpassw."</strong>
   			</div>									
   <br>
   			Te recordamos que la contraseña es temporal, el sistema al primer inicio te solicitara una nueva contrasena.
			<br>
			la contrasena puede ser cambiada en cualquier momento en el menu de tu sesion, barra de navegacion, tu nombre cambiar contrasena.
   <br>
   <br>
   
   <br>
   
   		<div align='center'>Atte. Webmaster - archivos TCP.</div>

"; 
 $objpermisos->enviamail($destinatario, $asunto, $cuerpo);
}
 echo "<script>document.location ='../../crear-usr.php'</script>"; 
?>