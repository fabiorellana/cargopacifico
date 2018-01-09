	<?php
	require("../../model/usuarios/class.php");
	$a= new Usuarios;
	
	
	if(isset($_POST)){
	
	$funcion =  filter_input(INPUT_POST, "funcion");

	

	if($funcion=="tblusuarios"){
	$json= $a->tblusuarios();
	echo $json;

	}

	if($funcion=="verificapass"){
	$json= $a->verificapass();
	echo $json;

	}

	if($funcion=="updatepass"){
	$password=$_POST['pas1'];
	echo $a->updatepass($password);
	}
	

if($funcion=="consultapermisos"){
	$rut=$_POST['rut'];
	echo	 $a->consultapermisos($rut);
	}

	
	if($funcion=="crearusuarios"){
	$adminusr= $_POST['adminusr'];
	$progprog= $_POST['progprog'];
	$progdep= $_POST['progdep'];
	$adminprog= $_POST['adminprog'];
	$cc_usu= $_POST['cc_usu'];
	$cc_admin= $_POST['cc_admin'];
	$flota= $_POST['flota'];
	$flota2= $_POST['flota2'];
	$botelleros= $_POST['botelleros'];
	$rut= $_POST['rut'];
	$mail= $_POST['mail'];
	$usuarionombre=$_POST['usrnombre'];
	$a->crearusuario($adminusr, $progprog, $progdep, $adminprog, $cc_usu, $cc_admin, $flota, $botelleros, $rut, $mail, $flota2, $usuarionombre);

	}
	
	
		if($funcion=="crearsocio"){
	$nombre =$_POST['nombre'];
	$mail =$_POST['correo'];
	$rut= $_POST['rut_completo'];
	$a->crearsocio($nombre, $mail, $rut);
	}

	



	
	
	
	}
