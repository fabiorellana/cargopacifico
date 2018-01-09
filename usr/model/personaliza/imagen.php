<?php

/**
*Mantenedor 
*/
//archivo de conexion
require("../../../dist/conexion.php");

class Imagen
{
		public $con;
	function __construct()
	{
$this->con = new Conexion;

	}
	
	function __destruct(){
	$this->con = null;
	}	
	
	
function upImagen($var){
	$_FILES["file"] = $var;
	if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imageUsr/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*1024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 10000 || $height > 10000)
    {
        echo "Error la anchura y la altura maxima permitida es 10000px";
    }
    else if($width < 60 || $height < 60)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {

        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
              
        
         $img="imageUsr/".$nombre;
        echo "<div align=''><br><img src='$img' width='10%' height='10%' class='img img-circle img-responsive'></div>";
        return $img;
    }
}
}

			

}