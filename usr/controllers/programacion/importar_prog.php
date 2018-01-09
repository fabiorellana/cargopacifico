<?php
include("../../include/valida.php");
$cc=$_SESSION["cc"];
include("../../lib/excel/PHPExcel.php");
include("../../model/programacion/importar.php");;
$importar = new Importar;
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
$sql_insert="insert into ges_programacion values ('','$planilla','$carga[0]', '$conductor', '$total_cajas','$carga[1]','$n_clientes','$fecha','$cc', '','','', '0')";
$importar->con->Consultar($sql_insert);
//cuenta corriente
$sql_insert_cc="insert into cc_history values ('$planilla','$fecha','$cc','$carga[0]','$carga','$conductor','','','','','','','','','','','','','','')";
$importar->con->Consultar($sql_insert_cc);

$sql_insert_cc_valores="insert into cc_valores values('$planilla','','','','','')";
$importar->con->Consultar($sql_insert_cc_valores);
}
}

?>
			
