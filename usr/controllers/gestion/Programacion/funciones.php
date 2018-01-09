	<?php
	include("../conexion.php");	
	
	
	
	
	function carga_update_programacion($id){
	
	$sql="SELECT * FROM `ges_solicita_cambio` where planilla='$id' AND estado=1";
	//muestra informacion de planilla
	$rs=mysqli_query($sql, $cnn);
	while ($row=mysqli_fetch_array($rs)) {
	echo "<strong>El usuario </strong> ".$row['usuario']."<br><strong>Solicita el cambio: </strong> ". $row['mensaje']. "<br><strong>planilla N° </strong> ".  $row['planilla']; $planilllas=$row['planilla'];
	}
	
	echo "<br>";
	$sql_prog="select ges_programacion.Conductor, ges_trabajadores.Nombre from ges_programacion inner join  ges_program_ayu_y_cond inner join ges_trabajadores where  ges_programacion.Planilla='$id' and ges_program_ayu_y_cond.planilla='$id' and ges_program_ayu_y_cond.ayu=ges_trabajadores.Rut";
	
	$rs_prog=mysqli_query($sql_prog, $cnn);
	$i=1;
	while ($row_prog=mysqli_fetch_array($rs_prog)) {
	$conductor= "Conductor : ". $row_prog['Conductor']."<br>";
	echo "Ayudante ".$i++. ":  ". $row_prog['Nombre']."<br>";
	
	}
	echo $conductor;
	echo "<br>";
	echo "<form method='POST' Action='carga_datos/adminprogramacion/editar_programacion.php'>";
	echo $id;
	
	echo '<input type="hidden" name="planilla" value='.$id.'> ';
	echo "Conductor";
	select_conductor();
	echo "<br>";
	echo "Ayudante 1";
	//text box ayudantes
	$id_ay=1;
	select_ayudantes($id_ay);
	echo "<br>";
	echo "Ayudante 2";
	$id_ay=2;
	select_ayudantes($id_ay);
	echo "<br>";
	echo "Ayudante 3";
	$id_ay=3;
	select_ayudantes($id_ay);
	echo '<input type="submit" value="enviar" name="enviar">';
	echo "</form>";
	}
	
	function pendientes(){
	$cnn=Conectar();
	$sql="select id as cant from ges_solicita_cambio where estado='1'";
	
	$rs=mysqli_query($cnn, $sql);
	$cantidad=mysqli_num_rows($rs);
	echo $cantidad;
	
	}

	function solicitudes(){

					$cnn=Conectar();
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
					
					<?php $sql="select ges_trabajadores.Nombre, ges_solicita_cambio.id, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado from ges_solicita_cambio INNER JOIN ges_trabajadores where ges_trabajadores.Rut=ges_solicita_cambio.usuario and ges_solicita_cambio.estado=1";
					$rs=mysqli_query( $cnn,$sql);
					while($row=mysqli_fetch_array($rs)){
					?><tr data-toggle="modal" data-target="#modificar" data-id="<?php echo $row['planilla']?>" >
					<td><?php echo  $row['id']?></td>
					<td><?php echo  $row['Nombre']?></td>
					<td><?php echo  $row['Nombre']?></td>
					<td><?php echo  $row['planilla']?></td>
					<td><?php echo  $row['mensaje']?></td>
					<td><?php $estado=$row['estado']; if($estado==1){echo '<span class="label label-warning">Pendiente</span>';}else{echo '<span class="label label-success">Realizado</span>';}?></td>
					
					
					</tr>
					<?php }?>
					</tbody>
<?php
	}















?>	
	
	
	
	
	