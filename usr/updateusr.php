<?php 
 include "../funciones/conexion.php";
$cnn=Conectar();
		 $name=$_POST['nombre'];
		 $cargo=$_POST['Cargo'];
		 $mail=$_POST['mail'];
		 $rut=$_POST['rut'];
		 
		 $update="UPDATE ges_trabajadores SET Nombre='$name', Cargo='$cargo', correo='$mail' where Rut='$rut'";
		 mysql_query($update, $cnn);
		 		  echo "<script>document.location ='editarusr.php'</script>";

		 
		 ?>


