<?php 
include ("../../../dist/conexion.php");

class Login 
{
	public $con;
	function __construct()
	{
$this->con = new Conexion();

	}
	
	function __destruct(){
	$this->con = null;
	}	

			
			function login($usr,$pass){
			//sentencias sql
			$sqlusr="select count(rut) as usr, rut as id from int_lgn where rut='$usr'";
			$rs=$this->con->Consultar($sqlusr);
			if(!$rs){echo '<div class="alert alert-danger alert-sm">Error de usuario o Contrasena</div>'; echo $rs;}
			while($row=mysqli_fetch_array($rs)){
			//cuenta cantidad de rut
			    $usrbd=$row['usr'];
			    $idusr=$row['id'];              
			 }
			if(!($usrbd)||!($idusr)){
    			echo '<div class="alert alert-danger alert-sm">Error de usuario o Contrasena</div>';
    			session_destroy();
			}else{
			$sqlpass="select conpss as pass from int_lgn where rut='$idusr'";
			$rspass=$this->con->Consultar($sqlpass);
			while($rowpass=mysqli_fetch_array($rspass)){
			$passbd=$rowpass['pass'];
			}
			if (password_verify($pass, $passbd)) {		
			//id usr en var de sesion
			$_SESSION["idusr"] = $idusr;
			echo '<div class="alert alert-success alert-sm">Redirigiendo...</div>';
			$query="select * from ges_trabajadores where Rut ='$idusr'";
			
			$rs=$this->con->Consultar($query);
			
			while($row=mysqli_fetch_array($rs)){
			
			$_SESSION["Nombre"] = $row['Nombre'];
			$_SESSION["Rut"] = $row['Rut'];
			$_SESSION["Cargo"] = $row['Cargo_id'];
			$_SESSION["cc"]=$row['Centro_de_costo_id'];
								}
			
					$true=true;			
				return $true;			
			}else {
			echo '<div class="alert alert-danger alert-sm">Error de usuario o Contraseña</div>';
			session_destroy();
			}       
			}
			}

	

}