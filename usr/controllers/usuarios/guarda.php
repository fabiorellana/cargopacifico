<?php 
$nombre=$_POST['txt_nombre'];
$sql="insert into int_gerencia values('','$nombre')";
require("../../Controllers/usuarios/class.php");
$guarda=new Usuarios();
$guarda->insertar($sql);