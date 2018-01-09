<?php
/**
* 
*/

include ("../dist/conexion.php");


class incluye
{
	public $con;
	function __construct()
	{
		$this->con = new Conexion();
	}
	
	function __destruct()
	{
	$this->con = null;
	}
	
	function compruebaSession($idusr,$rut)
	{
		if(!isset($idusr) or !isset($rut) ){
		session_destroy();
											}

	}

	function infousr(){
	$idusr=	$_SESSION["idusr"];
  $sqlusr="SELECT ges_trabajadores.Nombre, personaliza.img_usr, ges_centro_de_costos.Descripcion as cc, int_cargo.Descripcion 
				from 
					ges_trabajadores LEFT JOIN int_cargo ON ges_trabajadores.Cargo_id=int_cargo.Id
				    LEFT join ges_centro_de_costos ON ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id
				    LEFT join personaliza ON ges_trabajadores.Rut=personaliza.Rut
				    WHERE ges_trabajadores.Rut='$idusr';";
  	$rs=$this->con->Consultar($sqlusr);

$rowusr=mysqli_fetch_array($rs);
if(!is_null($rowusr['img_usr'])){
		$imagen= $rowusr['img_usr'];	
	}
	else{
		$imagen = "./imageUsr/contacto.png";
	}

    ?>
					<!-- Informacion de usuario-->
					<!--para las propiedades de img usr y css colores modal html en footer -->
					<a href="#"  class="" data-toggle="modal" data-target="#Propiedades"><i class="fa fa-gears" > </i></a>
					<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo $imagen; ?>" class="user-image" alt="User Image" />
					<span class="hidden-xs"><?php  echo $rowusr['Nombre'];?></span>
					</a>
					<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
					
					<img src="<?php echo $imagen; ?>" class="user-image" alt="User Image" align="center" />
					<p>
					<?php echo $rowusr['Nombre']. "<br> <small> Cargo: ". $rowusr['Descripcion']. "</small>"?>
					
					
					</p>

					</li>
	<?php
	}
}