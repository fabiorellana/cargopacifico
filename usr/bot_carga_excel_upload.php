<?php 
require_once './model/Oca.php';
require_once './model/conexion.php';
	    $importados = extract($_POST);
	    $oca = new Oca();
	    $busca = 0;
	    if ($importados == 0){
	    	$quincena = 0;
	    	$mes = 0;
	    	$year = 0;
	    }else{
	    	$busca = $oca->buscarPeriodo($quincena, $mes, $year);
	    	if($busca > 0){
	    		echo "&bull;&nbsp;Periodo ingresado ya existe.";
	    		$action = "error";
	    	}
	    	if($_FILES['excel']['name'] == ""){
	    		echo "<br/>&bull;&nbsp;No se ha seleccionado archivo.";
	    		$action = "error";
	    	}
	    	if (isset($action)&&$action == "upload")
	    	{
	    		$archivo = $_FILES['excel']['name'];
	    		$tipo = $_FILES['excel']['type'];
	    		$destino = "carga_archivos/".time().".xlsx";
	    		if (copy($_FILES['excel']['tmp_name'],$destino))
	    		{
	    			echo "&bull;&nbsp;Archivo Cargado Con Exito";
	    		}
	    		else
	    		{
	    			echo "&bull;&nbsp;Error Al Cargar el Archivo";
	    		}
	    		////////////////////////////////////////////////////////
	    		if (file_exists ($destino))
	    		{
	    			require_once('lib/excel/PHPExcel.php');
	    			require_once('lib/excel/PHPExcel/Reader/Excel2007.php');
	    			$objReader = new PHPExcel_Reader_Excel2007();
	    			$objPHPExcel = $objReader->load($destino);
	    			$objFecha = new PHPExcel_Shared_Date();
	    			$objPHPExcel->setActiveSheetIndex(0);
	    			$errores = 0;
	    			$cuenta_hojas = $objPHPExcel->getSheetCount();
	    			if($cuenta_hojas>1){
	    				echo "<br/>&bull;&nbsp;Error: el archivo no debe contener más de una hoja excel.";
	    				$errores++;
	    			}
	    			$i=1;
	    			$oca->fac_quincena=$quincena;
	    			$oca->fac_mes=$mes;
	    			$oca->fac_ano=$year;
	    			$oca->fac_transportista=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	    			$oca->fac_oca=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	    			$oca->fac_guias=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	    			$oca->fac_origen=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	    			$oca->fac_destino=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	    			$oca->fac_tramo=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	    			$oca->fac_fecha_hora_orden=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
	    			$oca->fac_patente=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
	    			$oca->fac_rampla=$objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
	    			$oca->fac_bahias=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
	    			$oca->fac_precio_vc=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
	    			$oca->fac_valor_a_pagar=$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
	    			$oca->fac_fecha_hora_aprobacion=$objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
	    			$oca->fac_fecha_hora_recepcion=$objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
	    			$validaTitulos = $oca->validaTitulos();
	    			if($validaTitulos != "OK"){
	    				echo "<br/>&bull;&nbsp;Error: ".$validaTitulos;
	    				$errores++;
	    			}
	    			$i=2;
	    			$param=0;
	    			$contador=0;
	    			date_default_timezone_set('UTC');
	    			while($param==0 && $errores==0)
	    			{
	    				$oca->fac_quincena=$quincena;
	    				$oca->fac_mes=$mes;
	    				$oca->fac_ano=$year;
	    				$oca->fac_transportista=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	    				$oca->fac_oca=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	    				$oca->fac_guias=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	    				$oca->fac_origen=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	    				$oca->fac_destino=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	    				$oca->fac_tramo=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	    				$val = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(), $adjustToTimezone = TRUE));
	    				$oca->fac_fecha_hora_orden=$val;
	    				$patente = str_replace("-", "", trim($objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue()));
	    				$oca->fac_patente=strtoupper($patente);
	    				$rampla = str_replace("-", "", trim($objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue()));
	    				$oca->fac_rampla=strtoupper($rampla);
	    				$oca->fac_bahias=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
	    				$oca->fac_precio_vc=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
	    				$oca->fac_valor_a_pagar=$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
	    				$fac_fecha_hora_aprobacion = date('Y/m/d H:i:s',PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue()));
	    				$oca->fac_fecha_hora_aprobacion=$fac_fecha_hora_aprobacion;
	    				$fac_fecha_hora_recepcion= date('Y/m/d H:i:s',PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue()));
	    				$oca->fac_fecha_hora_recepcion=$fac_fecha_hora_recepcion;
	    				
	    				if($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()==NULL)
	    				{
	    					$param=1;
	    				}
	    				else{
	    					$oca->insertaOca();
	    				}
	    				
	    				$i++;
	    				$contador++;
	    			}
	    			$oca=null;
	    			if($contador>0){
	    				$totalIngresados=$contador-1;
	    				echo "<br/>&bull;&nbsp;Total elementos subidos: $totalIngresados ";
	    				unlink($destino);
	    			}
	    		}
	    		else
	    		{
	    			echo "<br/>&bull;&nbsp;Necesitas primero importar el archivo";
	    		}
	    	}
	    }
	?>