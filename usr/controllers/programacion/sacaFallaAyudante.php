<?php
require("../../model/programacion/MantenedorClass.php");
$sacar= new Mantenedor;
$tabla="ges_fallas";
$rut= $_POST['rut'];
$where="Rut = '".$rut."'";
$sacar->Eliminar($tabla,  $where);