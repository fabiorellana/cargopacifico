<?php 
 include "../funciones/conexion.php";
$cnn=Conectar();
		 $Fecha=$_POST['Fecha'];
		 $Titular=$_POST['Titular'];
		 $Noticia=$_POST['Noticia'];
		 $id=$_POST['id'];
		
		 
		 $update="UPDATE int_noticias SET fecha='$Fecha', titular='$Titular', noticia='$Noticia' where id='$id'";
		 mysql_query($update, $cnn);
		 		  echo "<script>document.location ='editarnoticia.php'</script>";

		 
		 ?>


