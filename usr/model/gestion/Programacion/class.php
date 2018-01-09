<?php
session_start();

require("../../../../dist/conexion.php");
class Ges_prog
{
	
	private $con;
	function __construct()
	{
	$this->con = new Conexion;
	}
	function __destruct(){
	$this->con = null;
	}

	private function json($sql){
		try{
			$ej = $this->con->Consultar($sql);
			$rowcount=mysqli_num_rows($ej);
			$retorno = array();
			if($rowcount>0){
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

	public function tblprogramacion($centro, $fecha, $centrousr){
		foreach ($centrousr as $valor)
   		{
   		$centrousr = $valor['centro'];
		if($centro==''){
			$where="";
		}else{
			$where="and A.cent_costo='$centro'";
			}
		if($fecha==''){
			$wherefec="";
		}else{
			$wherefec="and A.Fecha_ccu='$fecha'";
		}
		//$centrousr == 1000 administrador
		if($centrousr==1000){
			$sql="SELECT A.Planilla, A.Corte_ccu, B.Nombre as Conductor, A.Conductor as rutchofer, A.cent_costo, A.Fecha_ccu as fecha_prog, A.Total_cajas_preventa, A.vuelta as vuelta_pg, A.N_cliente, C.Descripcion, Z.Nombre as ayu1, Y.Nombre as ayu2, X.Nombre as ayu3 FROM prog_programacion A inner join ges_trabajadores B on A.Conductor=B.Rut INNER join ges_centro_de_costos C on A.cent_costo=C.id left JOIN ges_trabajadores Z on Z.Rut=ayu1 left JOIN ges_trabajadores Y on Y.Rut=ayu2 left JOIN ges_trabajadores X on X.Rut=ayu3 WHERE  A.cerrada=0 $where $wherefec";
		}else{
			$sql="SELECT A.Planilla, A.Corte_ccu, B.Nombre as Conductor, A.Conductor as rutchofer, A.cent_costo, A.Fecha_ccu as fecha_prog, A.Total_cajas_preventa, A.vuelta as vuelta_pg, A.N_cliente, C.Descripcion, Z.Nombre as ayu1, Y.Nombre as ayu2, X.Nombre as ayu3 FROM prog_programacion A inner join ges_trabajadores B on A.Conductor=B.Rut INNER join ges_centro_de_costos C on A.cent_costo=C.id left JOIN ges_trabajadores Z on Z.Rut=ayu1 left JOIN ges_trabajadores Y on Y.Rut=ayu2 left JOIN ges_trabajadores X on X.Rut=ayu3 WHERE  A.cerrada=0 $where $wherefec";
		}
		
		
		return $this->json($sql);
		return json_encode(array('mensaje' => 'OK'));
	}

	}//fin function tblprogramacion

	public function comboCentro($centrousr){
		foreach ($centrousr as $valor){
			$centrousr = $valor['centro'];
			if($centrousr==1000){
				$sql = "select id, Descripcion from ges_centro_de_costos where id not in(5,7,6,8,9,10,11,15)";
			}else{
				$sql = "select id, Descripcion from ges_centro_de_costos where id='$centrousr'";
			}
			return $this->json($sql);
		}
	}

	public function cargaprogramados($planilla){
	$sql="select B.Nombre as Ayu1, C.Nombre as Ayu2, D.Nombre as Ayu3 FROM prog_programacion X left join ges_trabajadores B on X.ayu1=B.Rut, prog_programacion Y left join ges_trabajadores C on Y.ayu2=C.Rut, prog_programacion Z left join ges_trabajadores D on Z.ayu3=D.Rut where X.Planilla='$planilla' and Y.Planilla='$planilla' and Z.Planilla='$planilla'";
	return $this->json($sql);
	}
	
	public function pendientes(){
		$sql="select id as cant from ges_solicita_cambio where estado='1'";
		$rs=$this->con->Consultar($sql);
		$cantidad=mysqli_num_rows($rs);
		echo $cantidad;
	}

	public function cargadatosmodaleditar($planilla){
		$sql = "select A.Planilla, A.Corte_ccu, B.Nombre Conductor, A.Conductor as rutconductor, A.Total_cajas_preventa, A.N_cargas, A.N_cliente, C.Descripcion, Z.Nombre as ayu1, Y.Nombre as ayu2, X.Nombre as ayu3 from prog_programacion A inner join ges_trabajadores B on A.Conductor=B.Rut INNER join ges_centro_de_costos C on A.cent_costo=C.id left JOIN ges_trabajadores Z on Z.Rut=ayu1 left JOIN ges_trabajadores Y on Z.Rut=ayu2 left JOIN ges_trabajadores X on Z.Rut=ayu3 where  A.cerrada=0 and Planilla='$planilla'";
		return $this->json($sql);
	}

	public function comboconductores($centro){
		$cc=$_SESSION['cc'];
		$sql="select Rut, Nombre from ges_trabajadores where  Cargo_id='7' and Centro_de_costo_id='$centro' ";
		echo $this->json($sql);

	}

	public	function comboayudante($centro){
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$cc=$_SESSION["cc"];
		$sql="select Rut, Nombre from ges_trabajadores where  (Cargo_id=9 or Cargo_id=25) and ges_trabajadores.Centro_de_costo_id='$centro' and ges_trabajadores.Estado='1'";
		return $this->json($sql);
	}

	public function modificarAyudante1($rut1, $planilla1, $vuelta1){
		$sql = "UPDATE prog_programacion SET ayu1 = '$rut1', vuelta = '$vuelta1' WHERE Planilla = '$planilla1'";
		return $this->json($sql);
	}

	public function modificarAyudante2($rut2, $planilla2, $vuelta2){
		$sql = "UPDATE prog_programacion SET ayu2 = '$rut2', vuelta = '$vuelta2' WHERE Planilla = '$planilla2'";
		return $this->json($sql);
	}

	public function modificarAyudante3($rut3, $planilla3, $vuelta3){
		$sql = "UPDATE prog_programacion SET ayu3 = '$rut3', vuelta = '$vuelta3' WHERE Planilla = '$planilla3'";
		return $this->json($sql);
	}

	public function permisoscentros(){
		$rut=$_SESSION["Rut"];
		$sql="SELECT A.centro, B.Descripcion from cc_permisos_centros A left JOIN ges_centro_de_costos B on A.centro=B.id where Rut='$rut'";
		
		return $this->json($sql);
	}

	public function solicitudes(){			
			?>
			<thead>
						<tr>
						<th>#</th>
						<th>Usuario que solícita</th>
						<th>Centro</th>
						<th>Planilla</th>
						<th>Mensaje</th>
						<th>Estado</th>
						</tr>
						</thead>
						<tbody>
						
						<?php $sql="select ges_trabajadores.Nombre, ges_solicita_cambio.id, ges_centro_de_costos.Descripcion, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado from ges_solicita_cambio INNER JOIN ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut=ges_solicita_cambio.usuario and ges_solicita_cambio.estado=1 and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id
	";
						echo $sql;
						$rs=$this->con->Consultar($sql);
						while($row=mysqli_fetch_array($rs)){
						?><tr data-toggle="modal" data-target="#modificar" data-id="<?php echo $row['planilla']?>" >
						<td><?php echo  $row['id']?></td>
						<td><?php echo  $row['Nombre']?></td>
						<td><?php echo  $row['Descripcion']?></td>
						<td><?php echo  $row['planilla']?></td>
						<td><?php echo  $row['mensaje']?></td>
						<td><?php $estado=$row['estado']; if($estado==1){echo '<span class="label label-warning">Pendiente</span>';}else{echo '<span class="label label-success">Realizado</span>';}?></td>
						
						
						</tr>
						<?php }?>
						</tbody>
	<?php
		}


		public function solicitudestodo(){
					
					?>
					<thead>
					<tr>
					<th>#</th>
					<th>Usuario que solícita</th>
					<th>Centro</th>
					<th>Planilla</th>
					<th>Mensaje</th>
					<th>Estado</th>
					</tr>
					</thead>
					<tbody>
					
					<?php $sql="select ges_trabajadores.Nombre, ges_solicita_cambio.id, ges_centro_de_costos.Descripcion, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado from ges_solicita_cambio INNER JOIN ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut=ges_solicita_cambio.usuario and ges_solicita_cambio.estado=0 and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id";
					echo $sql;
					$rs=$this->con->Consultar($sql);
					while($row=mysqli_fetch_array($rs)){
					?><tr data-toggle="modal" data-target="#modificar" data-id="<?php echo $row['planilla']?>" >
					<td><?php echo  $row['id']?></td>
					<td><?php echo  $row['Nombre']?></td>
					<td><?php echo  $row['Descripcion']?></td>
					<td><?php echo  $row['planilla']?></td>
					<td><?php echo  $row['mensaje']?></td>
					<td><?php $estado=$row['estado']; if($estado==1){echo '<span class="label label-warning">Pendiente</span>';}else{echo '<span class="label label-success">Realizado</span>';}?></td>
					
					
					</tr>
					<?php }?>
					</tbody>
<?php
	}

			
			public function select_ayudantes($id_ay,$cc){
	
			
			echo '<select name="ayu'.$id_ay.'" id="ayu" class="form-control" >';
			echo '<option value="">  </option>';
			$sql_ayu1="select ges_trabajadores.Rut, ges_centro_de_costos.Descripcion, ges_trabajadores.codigo_ayu, ges_trabajadores.Nombre from ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_centro_de_costos.id=ges_trabajadores.Centro_de_costo_id";
			$rs_sql_ayu1=$this->con->Consultar($sql_ayu1);
			while($row_ayu1=mysqli_fetch_array($rs_sql_ayu1)){
			echo "<option value=".$row_ayu1['Rut'] .">".$row_ayu1['Descripcion']." -- ".  $row_ayu1['codigo_ayu']." - ".$row_ayu1['Nombre']."</option>";
			}	
			echo " </select> ";
	
			}


			public function select_conductor($cc){
			
			echo '<select name="selectConductor" class="form-control" >';
			echo '<option value="">  </option>';
			$sql_conductor="select ges_trabajadores.Rut, ges_centro_de_costos.Descripcion, ges_trabajadores.codigo_cond, ges_trabajadores.Nombre from ges_trabajadores inner join ges_centro_de_costos where  ges_trabajadores.Cargo_id='8' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_centro_de_costos.id=ges_trabajadores.Centro_de_costo_id";
		
			$rs_cond=$this->con->Consultar($sql_conductor);
			while($row_cond=mysqli_fetch_array($rs_cond)){
			echo "<option value=".$row_cond['Rut'] .">".$row_cond['Descripcion']." -- ".  $row_cond['codigo_cond']." - ".$row_cond['Nombre']."</option>";
			}	
			echo " </select> ";
			
			}

		public function carga_update_programacion($id){
		
			$sql="SELECT ges_solicita_cambio.id, ges_solicita_cambio.usuario, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado, ges_trabajadores.Nombre, ges_trabajadores.Centro_de_costo_id FROM `ges_solicita_cambio` INNER JOIN ges_trabajadores where planilla='$id' AND ges_solicita_cambio.estado=1 and ges_trabajadores.Rut=ges_solicita_cambio.usuario";

			//muestra informacion de planilla
			$rs=$this->con->Consultar($sql);
			while ($row=mysqli_fetch_array($rs)) {
			//para mostrar solo los de un determinado centro
				$centro=$row['Centro_de_costo_id'];
			echo "<strong>El usuario </strong> ".$row['usuario']." - ".$row['Nombre']." 
			<br><strong>Solicita el cambio: </strong> ". $row['mensaje']. "<br><strong>planilla N° </strong> ".  $row['planilla']; $planilllas=$row['planilla'];
			}
			echo "<br>";
			$sql_prog="select ges_programacion.Conductor, ges_trabajadores.Nombre from ges_programacion inner join  ges_program_ayu_y_cond inner join ges_trabajadores where  ges_programacion.Planilla='$id' and ges_program_ayu_y_cond.planilla='$id' and ges_program_ayu_y_cond.ayu=ges_trabajadores.Rut";
			
			$rs_prog=$this->con->Consultar($sql_prog);
			$i=1;
			while ($row_prog=mysqli_fetch_array($rs_prog)) {
			$conductor= "Conductor : ". $row_prog['Conductor']."<br>";
			echo "Ayudante ".$i++. ":  ". $row_prog['Nombre']."<br>";
			
			}
			echo $conductor;
			echo "<br>";
			echo "<form method='POST' Action='controllers/gestion/Programacion/guardaCambios.php'>";
			echo '<input type="hidden" name="planilla" value='.$id.'> ';
			echo "Conductor";
			$this->select_conductor($centro);
			echo "<br>";
			echo "Ayudante 1";
			//text box ayudantes
			$id_ay=1;
			$this->select_ayudantes($id_ay,$centro);
			echo "<br>";
			echo "Ayudante 2";
			$id_ay=2;
			$this->select_ayudantes($id_ay,$centro);
			echo "<br>";
			echo "Ayudante 3";
			$id_ay=3;
			$this->select_ayudantes($id_ay,$centro);
			echo '<div align="center"><br><input type="submit" value="Guardar" name="enviar" class="btn btn-warning"></div>';
			echo "</form>";
		}

		public function modificarConductor($rutchofer, $planillachofer){
			$sql = "UPDATE prog_programacion SET Conductor = '$rutchofer' WHERE Planilla = '$planillachofer'";
			return $this->json($sql);
		}

		public function cantfallasconductores(){
			$sql = "SELECT count(Rut) as cantconductores FROM prog_falla_conductores";
			return $this->json($sql);
			
		}

		public function cantfallasayudantes(){
			$sql = "SELECT count(Rut) as cantayudantes FROM prog_falla_ayudantes";
			return $this->json($sql);
		}

		public function tblFallaA(){
			$fecha =date("y") . "-" . date("m") . "-" . date("d");
			$sql = "SELECT A.id as id_fallaayudante, A.Rut as rut_fallaayudante, B.Nombre as nombre_fallaayudante, A.Fecha as fecha_fallaayudantes, A.Motivo as motivo_fallaayudante FROM prog_falla_ayudantes A INNER JOIN ges_trabajadores B ON A.Rut = B.Rut";
			return $this->json($sql);
		}

		public function tblFallaC(){
			$fecha =date("y") . "-" . date("m") . "-" . date("d");
			$sql = "SELECT A.id as id_fallaconductor, A.Rut as rut_fallaconductor, B.Nombre as nombre_fallaconductor, A.Fecha as fecha_fallaconductor, A.Motivo as motivo_fallaconductor FROM prog_falla_conductores A INNER JOIN ges_trabajadores B ON A.Rut = B.Rut";
			return $this->json($sql);
		}

}