<?php

function Conectar()
{
	if (!($cnn = mysqli_connect ("localhost", "cargopac_4dm1n", "m1ch1g4n", "cargopac_sistcp")))
	{
	 exit();
	}
	
return $cnn;
}