<?php 
 include "../funciones/conexion.php";
$cnn=Conectar();
		 $id=$_GET['id'];
	
		
		 
		 $update="delete from int_noticias where id = $id";
		 mysql_query($update, $cnn);
		 echo "<script>document.location ='editarnoticia.php'</script>";

		 
		 ?>


