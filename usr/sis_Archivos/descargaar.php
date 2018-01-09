<?php 
$idftp=$_GET['id'];



// ruta al archivo remoto
$remote_file = $idftp;
$local_file = "archivos_tmp/".$idftp;

// abrir un archivo para escribir
$handle = fopen($local_file, 'w');

// establecer una conexión básica
$conn_id = ftp_connect("172.16.1.198");

// iniciar sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, "claudio", "xxed");

// intenta descargar un $remote_file y guardarlo en $handle
if (ftp_fget($conn_id, $handle, $remote_file, FTP_ASCII, 0)) {
 echo "Se ha escrito satisfactoriamente sobre $local_file\n";
} else {
 echo "Ha habido un problema durante la descarga de $remote_file en $local_file\n";
}

// cerrar la conexión ftp y el gestor de archivo
ftp_close($conn_id);
fclose($handle);


    header("Content-Description: File Transfer"); 
    header("Content-Type: application/force-download"); 
    header("Content-Disposition: attachment; filename=$idftp");  
unlink($local_file);
?>


