
<?php 
session_start();
include "../funciones/conexion.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$id_dpto=$_SESSION["dpto"];
if(!$idusr){session_destroy(); header("location:../");}
?>

<?php $id=$_GET['id'];
$sql="update int_notificaciones set estado=0 where id=$id";
mysql_query($sql, $cnn);
header("location:compartidos_conmigo.php");


?>