<?php
require("../../model/programacion/class.php");
$a= new Programacion;


if(isset($_POST)){
$funcion =  filter_input(INPUT_POST, "funcion");



if($funcion=="cargamatriz"){
$json= $a->cargamatriz();
echo $json;
}


if($funcion=="tblayudantes"){
$json= $a->tblayudantes();
echo $json;
}

if($funcion=="creahonorarios"){

	$Hrut       =$_POST['Hrut'];
	$Hdv        =$_POST['Hdv'];
	$rut=$Hrut.'-'.$Hdv;
	$Hnombre    =$_POST['Hnombre'];
	$Hfono      =$_POST['Hfono'];
	$Hdireccion =$_POST['Hdireccion'];

echo $a->creahonorarios($rut, $Hnombre, $Hfono, $Hdireccion);

}


if($funcion=="cambiastadotrabajador"){
	$rut=$_POST['rut'];
	$estado=$_POST['estado'];
$a->cambiastadotrabajador($rut, $estado);

}


if($funcion=="cargaprogramados"){
	$planilla=$_POST['planilla_prog'];
	echo $a->cargaprogramados($planilla);

}



if($funcion=="updateayudante1"){
	$rut=$_POST['rut'];
	$planilla=$_POST['pla'];
	echo $a->updateayudante($rut, 1, $planilla);
}

if($funcion=="updateayudante2"){
	$rut=$_POST['rut'];
	$planilla=$_POST['pla'];
	echo $a->updateayudante($rut, 2, $planilla);
}

if($funcion=="updateayudante3"){
$rut=$_POST['rut'];
	$planilla=$_POST['pla'];
	echo $a->updateayudante($rut, 3, $planilla);
}



if($funcion=="cuadrosplanilla"){
echo $a->cuadrosplanilla();
}

if($funcion=="cuadrosplanilla2"){
	$corte = $_POST['corte'];
	$fecha = $_POST['fecha'];
	$vuelta = $_POST['vuelta'];
echo $a->cuadrosplanilla2($corte, $fecha, $vuelta);
}

if($funcion=="comboayudante"){
echo $a->comboayudante();
}

if($funcion=="guardaprogramacion"){
	$ayu1=$_POST['ayu1'];
	$ayu2=$_POST['ayu2'];
	$ayu3=$_POST['ayu3'];
	$corte=$_POST['corte'];
	$fecha=$_POST['fecha'];
	$vuelta=$_POST['vuelta'];

echo $a->guardaprogramacion($ayu1, $ayu2, $ayu3, $corte, $fecha, $vuelta);
}

if($funcion=="lblayudantes"){

echo $a->lblayudantes();
}


if($funcion=="guardaeditaayu1"){

$slcayu1 =	$_POST['slcayu1'];
$corte   =	$_POST['corte'];
$fecha   =	$_POST['fecha'];
$vuelta  =	$_POST['vuelta'];

echo $a->guardaeditaayu1($slcayu1, $corte, $fecha, $vuelta);
}

if($funcion=="restablecevacio"){
echo $a->restablecevacio();
}




if($funcion=="guardaeditaayu2"){

$slcayu2 =	$_POST['slcayu2'];
$corte   =	$_POST['corte'];
$fecha   =	$_POST['fecha'];
$vuelta  =	$_POST['vuelta'];

echo $a->guardaeditaayu2($slcayu2, $corte, $fecha, $vuelta);
}

if($funcion=="guardaeditaayu3"){

$slcayu3 =	$_POST['slcayu3'];
$corte   =	$_POST['corte'];
$fecha   =	$_POST['fecha'];
$vuelta  =	$_POST['vuelta'];

echo $a->guardaeditaayu3($slcayu3, $corte, $fecha, $vuelta);
}

if($funcion=="carganoprogramadas"){
echo $a->carganoprogramadas();
}


if($funcion=="carganoprogramadas2"){
	$aux=$_POST['aux'];
$variables=explode("*", $aux);

$vuelta = $variables[0];
$corte =  $variables[1];
$conductor = $variables[2];
 echo $a->carganoprogramadas2($vuelta, $corte, $conductor);
}


if($funcion=="comboayudantehonorarios"){
echo $a->comboayudantehonorarios();
}


}
