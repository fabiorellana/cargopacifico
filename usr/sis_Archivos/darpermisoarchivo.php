<?php 
session_start();
include "../funciones/conexion.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$id_dpto=$_SESSION["dpto"];
if(!$idusr){session_destroy(); header("location:../");}
?>
<?php 

                    
					
$idusrcomparte=$_GET['id'];
$tipo=$_GET['tipo'];
$id_archivo=$_GET['key_archivo'];


	if($tipo=="dpto"){	
	$sql="insert into int_permisos_archivos values ('','0','$idusrcomparte','$id_archivo','0')";
	}else{		
	$sql="insert into int_permisos_archivos values('','$idusrcomparte','0','$id_archivo','0' )";
	}
		echo $sql;
		$insertnotificacion="insert into int_notificaciones values('','$id_archivo','0','0','1','$idusrcomparte', '$idusr')";
	mysql_query($insertnotificacion, $cnn);
		mysql_query($sql,$cnn);
		
		header("location:misarchivos.php")
?>