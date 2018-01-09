	<?php

	require("../../model/fallas/class.php");

	$a= new Centro;

	

	

	if(isset($_POST)){

	

	$funcion =  filter_input(INPUT_POST, "funcion");



	

	if($funcion=="cargafallas"){
$sql="select * from prog_falla";
echo $sql;
	echo $a->cargafallas($sql);

	}

}