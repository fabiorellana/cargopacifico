	<?php
	require("../../model/modifica/class.php");
	$a= new Centro;
	
	
	if(isset($_POST)){
	
	$funcion =  filter_input(INPUT_POST, "funcion");


if($funcion == 'traedatos'){

echo $a->traedatos();

}
if($funcion == 'guardamodificacion'){
$rut    = $_POST['rut'];
$nombre = $_POST['nombre'];
$cargo  = $_POST['cargo'];
$cel    = $_POST['cel'];
$centro = $_POST['centro'];
$ciudad = $_POST['ciudad'];
$dir    = $_POST['dir'];
$emp    = $_POST['emp'];
$estado = $_POST['estado'];
$id = $_POST['id'];

echo $a->guardamodificacion($rut, $nombre, $cargo, $cel, $centro, $ciudad, $dir, $emp, $estado, $id);

}

}