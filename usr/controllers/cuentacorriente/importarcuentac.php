<?php


$importados = extract($_POST);
if($importados==0)
{
	echo "No existen datos";
}else{

include '../../model/cuentacorriente/ccorriente.php';


$import =  new Corriente();


include("../../include/valida.php");
include("../../lib/excel/PHPExcel.php");
$archivo = $_FILES['excel']['tmp_name'];
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
//SELECCIONA HOJA EN EXEL
$sheet = $objPHPExcel->getSheet(6); 
$highestRow = $sheet->getHighestRow(); 

if(!$highestRow){
	echo "El archivo de excel no contiene informacion o bien esta no es accesible";
}
else{

	$highestColumn = $sheet->getHighestColumn();
	for ($row = 2; $row <= $highestRow; $row++){ 
	
	$planilla= $sheet->getCell("H".$row)->getValue();
	$Valores_a_Entregar= $sheet->getCell("I".$row)->getValue();
	$Valores_Entregados= $sheet->getCell("J".$row)->getValue();
	$Saldo_Credito= $sheet->getCell("K".$row)->getValue();
	$Saldo_Debito= $sheet->getCell("L".$row)->getValue();
	$Diferencias= $sheet->getCell("M".$row)->getValue();
	$Fecha_Planilla= $sheet->getCell("N".$row)->getValue();
	$planillaobs= $sheet->getCell("P".$row)->getValue();
	


	$cant = strlen($planillaobs);
	if($cant<8){$compara=$planillaobs;}else{$compara='';}
	$sql="insert into excelprueba values('$planilla','$Valores_a_Entregar','$Valores_Entregados','$Saldo_Credito','$Saldo_Debito','$Diferencias','$Fecha_Planilla','$compara','')";

if($planillaobs==''){
	 	
}else{
	$sql2="insert into excelprueba2 values('$planillaobs','$Saldo_Credito')";
	$import->importar($sql2);	
}



$import->importar($sql);

	}
	
}



}






?>
			
