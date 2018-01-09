	<?php

	require("../../model/centro/class.php");

	$a= new Centro;

	

	

	if(isset($_POST)){

	

	$funcion =  filter_input(INPUT_POST, "funcion");



	

	if($funcion=="combopatente"){

	echo $a->combopatente();

	}



    if($funcion=="comboconductor"){

	echo $a->comboconductores();

	}

	

	if($funcion=="cargaprogramacion"){

	$json= $a->cargaprogramacion();

	echo $json;

	}







		if($funcion=="editarMatriz"){

		$corte=$_POST['corte'];

		$patente=$_POST['patente'];

		$conductor=$_POST['conductor'];

		$a->editarMatriz($corte, $patente, $conductor);

		}

		



	if($funcion=="cargamatriz"){

	$json= $a->cargamatriz();

	echo $json;

	}

	if($funcion=="cerrarprogramacion"){
	echo $a->cerrarprogramacion();
	}

	

	

	if($funcion=="guardamodificaciones"){
	$patente=$_POST['patente'];
	$planilla=$_POST['planilla'];
	$conductor=$_POST['conductor'];
	$corte=$_POST['corte'];
	echo $a->guardaupdate($patente, $planilla , $conductor, $corte);
	}

	

	if($funcion=="guardaodometro"){
	$patente=$_POST['patenteodometro'];
	$kms=$_POST['kms'];
	$planillaodo=$_POST['planillaodo'];
	$fecha = date('y-m-d');
	echo $a->guardaodometro($patente, $kms , $fecha, $planillaodo);
	}


	if($funcion=="cuentaodometrosingresados"){
	echo $a->cuentaodometrosingresados(
		);
	}
	



	if($funcion=="validaodometro"){

	$patente=$_POST['patenteodometro'];

	echo $a->validaodometro($patente);

	}



	if($funcion=="cambiaestadocamion"){



	$patente = $_POST['patente'];

	$obs = $_POST['obs'];

	$mail = $_POST['mail'];

    $estado = $_POST['estado'];

	 $a->cambiaestadocamion($patente, $mail, $estado, $obs);


	}



	if($funcion=="conductorfalla"){

	$rut = $_POST['rut'];

	$estado = $_POST['estado'];

	$fecha = date('y-m-d');

	$a->conductorfalla($rut, $estado, $fecha);

	}



		if($funcion=="eliminafallaconductor"){

		$rut = $_POST['rut'];

		$a->eliminafallaconductor($rut);

		}







	if($funcion=="lblcamiones"){

	echo $a->lblcamiones();

	}



	if($funcion=="lblconductores"){

	echo $a->lblconductores();

	}



	if($funcion=="cargaflota"){

   	echo  $a->cargaflota();

	}



	if($funcion=="cargaconductores"){

   	echo  $a->cargaconductores();

	}

	if($funcion == "regprogramacion"){
		$planilla 	= $_POST['planilla'];
		$corte 	  	= $_POST['corte'];
		$rutcond 	= $_POST['rutcond'];
		$eccu 	= $_POST['eccu'];
		$ccu 	= $_POST['ccu'];
		$vspt 	= $_POST['vspt'];
		$cpch 	= $_POST['cpch'];
		$cccu 	= $_POST['cccu'];
		$total_cajas 	= $_POST['total_cajas'];
		$cliente 	= $_POST['cliente'];
		$carga=1;

		echo $a->regprogramacion($planilla, $corte, $rutcond, $total_cajas, $carga, $cliente);
	}

	if($funcion == "selcorte")
	{
		echo $a->selcorte();
	}




	

	if($funcion == "cargarut")
	{
		$cortef = $_POST['cortef'];
		echo $a->cargarut($cortef);
	}

	if($funcion=="importar"){

	

	$cc=$_SESSION["cc"];

	include("../../lib/excel/PHPExcel.php");

	include("../../model/programacion/importar.php");

	$archivotmp = $_FILES['archivo']['tmp_name'];

	$archivo = $archivotmp;

	$inputFileType = PHPExcel_IOFactory::identify($archivo);

	$objReader = PHPExcel_IOFactory::createReader($inputFileType);

	$objPHPExcel = $objReader->load($archivo);

	//SELECCIONA HOJA EN EXEL

	$sheet = $objPHPExcel->getSheet(0); 

	$highestRow = $sheet->getHighestRow(); 

	if(!$highestRow)//si tiene 0 filas

	die("El archivo de excel no contiene informacion o bien esta no es accesible");

	$highestColumn = $sheet->getHighestColumn();

	for ($row = 4; $row <= $highestRow; $row++){ 

	$planilla= $sheet->getCell("B".$row)->getValue();

	if(is_null($planilla) || $planilla==0){}else{

	$camion = $sheet->getCell("A".$row)->getValue();

	$carga=explode("-", $camion);	

	$conductor= $sheet->getCell("C".$row)->getValue();

	$n_clientes= $sheet->getCell("E".$row)->getValue();

	$total_cajas= $sheet->getCell("K".$row)->getValue();	

	$fecha =date("y") . "-" . date("m") . "-" . date("d");

	

	

	$sql_insert="insert into prog_programacion values ('','$planilla','$carga[0]', '$conductor', '$total_cajas','$carga[1]','$n_clientes','$fecha','$cc', '','','', '0')";

	$a->import($sql_insert);

	//cuenta corriente

	$sql_insert_cc="insert into cc_history values ('$planilla','$fecha','$cc','$carga[0]','$carga','$conductor','','','','','','','','','','','','','','')";

	$a->import($sql_insert_cc);

	$sql_insert_cc_valores="insert into cc_valores values('$planilla','','','','','')";

	$a->import($sql_insert_cc_valores);

	}

	}

	

	

	}







	

	

	

	}


