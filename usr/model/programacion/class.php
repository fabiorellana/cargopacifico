<?php
	

session_start();
require("../../../dist/conexion.php");
/**
* 
*/

class Programacion 
{

	public $con;
	function __construct()
	{
		$this->con = new Conexion;
	}

	function __destruct(){

	$this->con = null;

	}
	
	
		public function cargamatriz(){
		$cc=$_SESSION['cc'];
		$sql="select prog_ccc.id, prog_ccc.corte, prog_ccc.patente, ges_trabajadores.Nombre, prog_ccc.centro from prog_ccc INNER join ges_trabajadores where centro='$cc' and ges_trabajadores.Rut=prog_ccc.id_conductor";
		return $this->json($sql);
		}

		public function creahonorarios($rut, $Hnombre, $Hfono, $Hdireccion){
			$fecha =date("y") . "-" . date("m") . "-" . date("d");
			$cc=$_SESSION['cc'];
			$sql="insert into prog_honorarios values('$rut','$Hnombre','$Hfono','$Hdireccion','$cc','$fecha')";
			echo $this->con->Consultar($sql);
		}
		
		public function tblayudantes(){
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$cc=$_SESSION['cc'];
		$sql="select Rut, Nombre from ges_trabajadores where (ges_trabajadores.Rut not in (SELECT distinct(ayu1) from prog_programacion where Fecha_ccu='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu2) from prog_programacion where Fecha_ccu='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu3) from prog_programacion where Fecha_ccu='$fecha') )and (Cargo_id=9 or Cargo_id=25) and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1' and ges_trabajadores.Rut not in(select Rut from prog_falla_ayudantes where Fecha='$fecha' and Motivo='Falla')";
	
				return $this->json($sql);
		}
		
		public function cuadrosplanilla(){
		//Consulta SQL
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$cc=$_SESSION['cc'];
		$sql = "SELECT
count(A.Planilla) as planillas,
A.Planilla,
A.Corte_ccu as corte,
A.Fecha_ccu,
B.Nombre as conductor,
C.Nombre as ayu1,
D.Nombre as ayu2,
E.Nombre as ayu3,
A.vuelta,
A.Total_cajas_preventa,
A.Estado
from prog_programacion A 
INNER JOIN ges_trabajadores B on A.Conductor=B.Rut 
LEFT JOIN ges_trabajadores C on A.ayu1=C.Rut
LEFT JOIN ges_trabajadores D on A.ayu2=D.Rut
LEFT JOIN ges_trabajadores E on A.ayu3=E.Rut

where A.cent_costo='$cc' and (A.Estado=0 or A.fecha_programado='$fecha') group BY A.Corte_ccu, A.vuelta order by A.Corte_ccu";

		return $this->json($sql);

		}

		public function cuadrosplanilla2($corte, $fecha, $vuelta){
		//Consulta SQL
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$fechaanterior =date("y") . "-" . date("m") . "-" . (date("d")-(1));
		$cc=$_SESSION['cc'];
		$sql = "SELECT
		A.Planilla,
		A.Corte_ccu as corte,
		A.Fecha_ccu,
		B.Nombre as conductor,
		C.Nombre as ayu1,
		D.Nombre as ayu2,
		E.Nombre as ayu3,
		A.vuelta,
		A.Total_cajas_preventa,
		A.Estado
		
		from prog_programacion A 
		left JOIN ges_trabajadores B on A.Conductor=B.Rut 
		LEFT JOIN ges_trabajadores C on A.ayu1=C.Rut
		LEFT JOIN ges_trabajadores D on A.ayu2=D.Rut
		LEFT JOIN ges_trabajadores E on A.ayu3=E.Rut
		
		where A.Corte_ccu='$corte'  and A.vuelta='$vuelta' and A.cent_costo='$cc'";
		
		return $this->json($sql);

		}
		
		function comboayudante(){
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$cc=$_SESSION["cc"];
		$sql="select Rut, Nombre from ges_trabajadores where (ges_trabajadores.Rut not in (SELECT distinct(ayu1) from prog_programacion where fecha_programado='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu2) from prog_programacion where fecha_programado='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu3) from prog_programacion where fecha_programado='$fecha') )and (Cargo_id=9 or Cargo_id=25) and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1' and ges_trabajadores.Rut not in(select Rut from prog_falla_ayudantes where Fecha='$fecha' and Motivo='Falla')";

		return $this->json($sql);
		}


			function comboayudantehonorarios(){
		$cc=$_SESSION["cc"];
		$sql="select Rut, Nombres from prog_honorarios where Centro='$cc'";
		return $this->json($sql);
		}


			public function cargaprogramados($planilla){
			$sql="SELECT A.Planilla as planilla_prog, A.Fecha_ccu as fecha_prog, A.Corte_ccu as corte_ccu_prog, A.N_cargas as ncargas_prog, A.vuelta as vuelta_prog, B.Nombre as Ayu1, C.Nombre as Ayu2, D.Nombre as Ayu3 FROM prog_programacion A LEFT JOIN ges_trabajadores B ON A.ayu1=B.Rut LEFT JOIN ges_trabajadores C ON A.ayu2=C.Rut LEFT JOIN ges_trabajadores D ON A.ayu3=D.Rut WHERE A.Planilla = '$planilla'";
		
			return $this->json($sql);
			
			}
		
		public function guardaprogramacion($ayu1, $ayu2, $ayu3, $corte, $fecha, $vuelta){
						$fecha =date("y") . "-" . date("m") . "-" . date("d");
			 $sql="UPDATE `prog_programacion` SET `ayu1` = '$ayu1', `ayu2` = '$ayu2', `ayu3` = '$ayu3', Estado='1', fecha_programado='$fecha' WHERE  vuelta='$vuelta' and Corte_ccu='$corte' and Estado=0";
			 
		$this->con->Consultar($sql);
		}
				
				public function cambiastadotrabajador($rut, $estado){
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$sql="insert into prog_falla_ayudantes values('','$rut', '$fecha', '$estado')";
				$this->con->Consultar($sql);
				}


				public function restablecevacio(){
				//coloca planilla o vuelta como no programada 0 x 1
				$update="UPDATE `prog_programacion` SET `Estado` = '0', `fecha_programado` = '0000000' where  ayu1='' and ayu2 ='' and ayu3='' ";
				$this->con->Consultar($update);
				}

				
				public function guardaeditaayu1($slcayu1, $corte, $fecha, $vuelta){
				$sql="UPDATE `prog_programacion` SET `ayu1` = '$slcayu1' WHERE Corte_ccu='$corte' and Fecha_ccu='$fecha' and vuelta = '$vuelta' ";
				$this->con->Consultar($sql);
				}


				public function guardaeditaayu2($slcayu2, $corte, $fecha, $vuelta){
				
				$sql="UPDATE `prog_programacion` SET `ayu2` = '$slcayu2' WHERE Corte_ccu='$corte' and Fecha_ccu='$fecha' and vuelta = '$vuelta' ";
				$this->con->Consultar($sql);
				}


				public function guardaeditaayu3($slcayu3, $corte, $fecha, $vuelta){
				
				$sql="UPDATE `prog_programacion` SET `ayu3` = '$slcayu3' WHERE Corte_ccu='$corte' and Fecha_ccu='$fecha' and vuelta = '$vuelta' ";
				$this->con->Consultar($sql);
				}
				
				
				public function lblayudantes(){
				$cc=$_SESSION['cc'];
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$sql="select count(Rut) as cant from ges_trabajadores where (ges_trabajadores.Rut not in (SELECT distinct(ayu1) from prog_programacion where fecha_programado='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu2) from prog_programacion where fecha_programado='$fecha') and ges_trabajadores.Rut not in (SELECT distinct(ayu3) from prog_programacion where fecha_programado='$fecha') )and (Cargo_id=9 or Cargo_id=25) and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1' and ges_trabajadores.Rut not in(select Rut from prog_falla_ayudantes where Fecha='$fecha' and Motivo='Falla')";
				
				return $this->json($sql);
				}
				
				
				public function updateayudante($rut, $id, $planilla){
				
				$update="UPDATE `prog_programacion` SET `ayu$id` = '$rut' WHERE `prog_programacion`.`Planilla` = '$planilla'; ";
				$this->con->Consultar($update);
				}

				public function carganoprogramadas(){
					$cc=$_SESSION['cc'];
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$fechaanterior =date("y") . "-" . date("m") . "-" . (date("d")-(1));
				$fechaAanterior =date("y") . "-" . date("m") . "-" . (date("d")-(2));
				$sql="SELECT A.Corte_ccu, A.vuelta, A.Conductor, B.Nombre FROM prog_programacion A left join ges_trabajadores B on B.Rut=A.Conductor where A.Estado=0 and (A.Fecha_ccu='$fecha' or A.Fecha_ccu='$fechaanterior' or A.Fecha_ccu='$fechaAanterior') and A.cent_costo='$cc'";
				return $this->json($sql);
				}



				public function carganoprogramadas2($vuelta, $corte, $conductor){
					$cc=$_SESSION['cc'];
			$sql = "SELECT
		A.Planilla,
		A.Corte_ccu as corte,
		A.Fecha_ccu,
		B.Nombre as conductor,
		C.Nombre as ayu1,
		D.Nombre as ayu2,
		E.Nombre as ayu3,
		A.vuelta,
		A.Total_cajas_preventa,
		A.Estado
		
		from prog_programacion A 
		left JOIN ges_trabajadores B on A.Conductor=B.Rut 
		LEFT JOIN ges_trabajadores C on A.ayu1=C.Rut
		LEFT JOIN ges_trabajadores D on A.ayu2=D.Rut
		LEFT JOIN ges_trabajadores E on A.ayu3=E.Rut
		
		where A.Corte_ccu='$corte'  and A.vuelta='$vuelta' and A.cent_costo='$cc'";

		return $this->json($sql);
				}

				

			private function json($sql){
				try{
					$ej = $this->con->Consultar($sql);
					$rowcount=mysqli_num_rows($ej);
					$retorno = array();
					if ($rowcount>0){
						while ($r = mysqli_fetch_assoc($ej)){
							array_push($retorno, $r);
						}
						return json_encode($retorno);
					}else{
						return json_encode(array());
					}
				}catch (Exception $e){
					echo "Error".$e->getMessage();
				}
			}






}