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
$sql="select count(id) as id from notificaciones where id_usr=$idusr and estado <> 0";

	
	
$rs=mysql_query($sql, $cnn);
while($row=mysql_fetch_array($rs)){
	
	$cantidad=$row['id'];
	}
	echo $cantidad;
?>
         