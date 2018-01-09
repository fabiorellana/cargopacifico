<?php 
session_start();
include "../../funciones/funciones.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$id_dpto=$_SESSION["dpto"];
//echo "<script>alert($idusr. . $id_dpto)</script>";
if(!$idusr){session_destroy(); header("location:../");}

 
		
?>
<?php 
$sql="select ges_trabajadores.Nombre, int_notificaciones.id from int_notificaciones INNER JOIN ges_trabajadores where int_notificaciones.id_usr_origen=ges_trabajadores.Rut and rut_usr='$idusr' and int_notificaciones.estado <> 0";
echo $sql;


$rs=mysql_query($sql, $cnn);
while($row=mysql_fetch_array($rs)){
	
	$name=$row['Nombre'];
	
	
?>

 				<li>
                     <a href="desactivarnotificacion.php?id=<?php echo $row['id']?>">
                      <i style="color:#F1EE41" class="fa fa-users text-aqua"></i><?php echo $name?> te compartio un archivo
                    </a>
                  </li> 
				  
				  
				  <?php }?>