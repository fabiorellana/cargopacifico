		<?php
		require("../../model/programacion/class.php");
		$rut=$_POST['id'];
		$fallaid=$_POST['idfalla'];
		$falla= new Programacion;
		$falla->guardaFalla($rut, $fallaid);

	
	
