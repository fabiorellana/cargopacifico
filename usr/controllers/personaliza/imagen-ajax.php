<?php
include("../../include/valida.php");
require("../../model/personaliza/imagen.php");
$img = new Imagen;
$rut= $_SESSION["Rut"];
$var= $_FILES["file"];
$imagen= $img ->upImagen($var);
$img ->con->Consultar("update  personaliza set img_usr='$imagen' where Rut='$rut')");

sleep(1);
