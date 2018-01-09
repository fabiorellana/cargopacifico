<?php
require("../../model/programacion/class.php");

$order=$_POST['ordenar'];
$conductor=new Programacion;
$conductor->cargaProgramacion($order);