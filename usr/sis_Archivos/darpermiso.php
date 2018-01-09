<?php 
session_start();
include "../funciones/conexion.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$id_dpto=$_SESSION["dpto"];
//if(!$idusr){session_destroy(); header("location:../");}
?>
<?php 
$idusr=$_GET['id'];
$tipo=$_GET['tipo'];
$id_carpeta=$_GET['key_carpeta'];


	if($tipo=="dpto"){	
	$sql="insert into int_permisos_archivos values ('','0','$idusr','0','$id_carpeta')";
	}else{		
	$sql="insert into int_permisos_archivos values('','$idusr','0','0','$id_carpeta' )";
	}
		
		mysql_query($sql,$cnn);
		
		header("location:misarchivos.php")
?>