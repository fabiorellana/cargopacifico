			<?php
			session_start();
			print_r($_POST);
			require("../../model/programacion/class.php");
			$envia = new Programacion;
			
			$mensaje=$_POST['txtreclamo'];
			$Id_planilla=$_POST['txt_idplanilla'];
			$descripcion="Solicitud de cambio realizada para planilla N° $Id_planilla ";
			$idusr= $_SESSION["Rut"];
			$cc=$_SESSION["cc"];
			$envia->guarda_log($idusr, $cc, $descripcion);
			$envia->envia_solicitud_cambio($idusr, $mensaje, $Id_planilla);
			
			/*consulta usuarios que tienen el sistema de admin programacion
			$sql_usu="SELECT mail FROM int_lgn where rut in (SELECT rut from int_permisos where Administrar_programacion=1)";
			$objplanilla->con->Consultar($sql_usu);
			$rsusu= while($rowusu=mysqli_fetch_array($rsusu)){	
			$destinatario=$rowusu['mail'];
			$cuerpo=$mensaje;
			$asunto="Notificacion";
			
			}
			enviamail($destinatario, $asunto, $cuerpo);*/
			echo '<script>window.location="../../crear_programacion.php";</script>'; 
			