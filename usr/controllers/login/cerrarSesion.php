		<!-- Sweet alert --> 
		<link rel="stylesheet" href="../../../dist/css/sweetalert2.min.css" />
		<!-- Sweet alert-->
		...
		<script src="../../../dist/js/sweetalert2.min.js"></script>
		<?php
		
		error_reporting(0);
		session_start();
		
	
session_destroy();
header("location:../../../index.php");
