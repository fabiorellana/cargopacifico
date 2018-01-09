 <!-- Sweet alert --> 
       <link rel="stylesheet" href="../../dist/css/sweetalert2.min.css" />
       <!-- Sweet alert-->
       ...
<script src="../../dist/js/sweetalert2.min.js"></script>
<?php
error_reporting(0);
session_start();
session_destroy();

if(!($_SESSION["Rut"])or !($_SESSION["cc"])){
echo '<script>swal("Sesión no iniciada", "Estas fuera!", "warning")</script>';
	header("location:../../index.php");
}