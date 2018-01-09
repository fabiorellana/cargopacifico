	<?php 
	
	session_start();
	require("../../model/programacion/class.php");
	$guaraProg= new Programacion;
	
	$cc=$_SESSION["cc"];
	$n_planilla=$_POST['txtnplanilla'];
	$ayu1=$_POST['ayu1'];
	$ayu2=$_POST['ayu2'];
	$ayu3=$_POST['ayu3'];
	$id_usr=$_SESSION["idusr"];
	
		
		$guaraProg->guarda_ayudantes($n_planilla, $ayu1, $ayu2, $ayu3);
		$descripcion="Planilla guardada para planilla numero $n_planilla ayudante 1 ".$ayu1.", Ayudante 2".$ayu2.", ayudante 3 ".$ayu3."";
		$guaraProg->guarda_log($id_usr, $cc, $descripcion);

	$guaraProg->guardaProgramacion($n_planilla, $ayu1,  '1' );
	$guaraProg->guardaProgramacion($n_planilla, $ayu2,  '2' );
	$guaraProg->guardaProgramacion($n_planilla, $ayu3,  '3' );
	

	for($i=0;$i>=3;$i++){echo $i;}

	
	

	header("location:../../crear_programacion.php");
	
	?>