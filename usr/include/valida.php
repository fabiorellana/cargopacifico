<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['Rut']) || !isset($_SESSION['cc']))
{
        session_destroy();
        session_start();
        $_SESSION['referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        header ("Location: ../");

}
?>
