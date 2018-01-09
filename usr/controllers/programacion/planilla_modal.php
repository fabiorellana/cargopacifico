<?php
session_start();
$cc=$_SESSION["cc"];
require("../../model/programacion/class.php");
$objplanilla= new Programacion;
$valor=$_POST['id_planilla'];
$sql="select * from ges_programacion where Planilla='$valor'";
$rs=$objplanilla->con->Consultar($sql);
while($rows=mysqli_fetch_array($rs)){
?>

<div style="background-color:#CEE3F6" id="ocultar">
<div class="col-lg-12" align="center">  
</div>
<div class="col-lg-12 col-xs-12" align="center"> Numero de planilla: <br /><?php echo $rows['Planilla']; ?></div>
<div class="col-lg-2 col-xs-6" align="center"> Corte CCU: <br /><?php echo $rows['Corte_ccu']; ?></div>
<div class="col-lg-3 col-xs-6" align="center"> Cajas preventa: <br /><?php echo $rows['Total_cajas_preventa']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> N° Cargas: <br /><?php echo $rows['N_cargas']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> N° Cliente: <br /><?php echo $rows['N_cliente']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> Fecha CCU <br /><?php echo $rows['Fecha_ccu']; ?></div>
<br />
<br />
<br />
<br />
<br />
<br />

 <?php }?>
 </div>
<form method="post" action="controllers/programacion/guarda_programacion.php" >
<input type="text" value="<?php echo $valor; ?>" name="txtnplanilla" class="hidden" />
<br />
		<div class="col-lg-12" align="center">
		conductor 
		<?php
		$sql_chofer="Select Conductor from ges_programacion where Planilla='$valor'";	  
		$rs_sql_chofer=$objplanilla->con->Consultar($sql_chofer);
		while($row_chofer=mysqli_fetch_array($rs_sql_chofer)){
		$conductor=$row_chofer['Conductor'];
		?>
		<input type="text" value="<?php echo $conductor?>" class="form-control" disabled="disabled" />
		<?php }?>
		
		</div>  

      
					<div class="col-lg-12" align="center">
					
					<?php $sql_pp="select count(ges_program_ayu_y_cond.id) as id from ges_program_ayu_y_cond  where Planilla='$valor'";
					$rs_sql_pp=$objplanilla->con->Consultar($sql_pp);
					
					while($row_pp=mysqli_fetch_array($rs_sql_pp)){
					$existe=$row_pp['id'];
					}
					//comprueba que no existan ayudantes para una planilla
					//si existe muestra nombres y boton bloqueados
					if($existe==0){?>
					
					Ayudante Primero<select name="ayu1" id="ayu1" class="form-control" required="required">
					<option></option>
					<?php 
					$fecha =date("y") . "-" . date("m") . "-" . date("d");
					$sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo_ayu, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc'";
					$rs_sql_ayu1=$objplanilla->con->Consultar($sql_ayu1);
					while($row_ayu1=mysqli_fetch_array($rs_sql_ayu1)){?>
					
					<option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo_ayu']." - ".$row_ayu1['Nombre']?></option>
					<?php }?>
					</select> 
					</div>

    
			<div class="col-lg-12" align="center">
			Ayudante segundo<select name="ayu2" id="ayu2" class="form-control" >
			<option></option>
			<?php $sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo_ayu, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc'";
			$rs_sql_ayu1=$objplanilla->con->Consultar($sql_ayu1);
			while($row_ayu1=mysqli_fetch_array($rs_sql_ayu1)){?>
			<option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo_ayu']." - ".$row_ayu1['Nombre']?></option>
			<?php }?>
			</select>
			</div>
			<div class="col-lg-12" align="center">
			Ayudante tercero<select name="ayu3" id="ayu3" class="form-control" >
			<option></option>
			<?php $sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo_ayu, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc'";
			$rs_sql_ayu1=$objplanilla->con->Consultar($sql_ayu1);
			while($row_ayu1=mysqli_fetch_array($rs_sql_ayu1)){?>
			<option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo_ayu']." - ".$row_ayu1['Nombre']?></option>
			<?php }?>     </select>
			<br />
			</div>  


			<div class="col-lg-12" align="center">
			
			<?php }else{?>
			<?php
			$sql_txt1="Select ges_trabajadores.Nombre from ges_programacion inner join ges_trabajadores where ges_programacion.ayu1=ges_trabajadores.Rut and Planilla='$valor'";	  
			$rs_txt1=$objplanilla->con->Consultar($sql_txt1);
			while($row_txt1=mysqli_fetch_array($rs_txt1)){
			$ayu1=$row_txt1['Nombre'];
			?>
			<br /><input type="text" value="<?php echo $ayu1?>" class="form-control" disabled="disabled" />
			<?php }?>
			
			<?php
			$sql_txt2="Select ges_trabajadores.Nombre from ges_programacion inner join ges_trabajadores where ges_programacion.ayu2=ges_trabajadores.Rut and Planilla='$valor'";	
			$rs_txt2=$objplanilla->con->Consultar($sql_txt2);
			while($row_txt2=mysqli_fetch_array($rs_txt2)){
			$ayu2=$row_txt2['Nombre'];
			?>
			<br /><input type="text" value="<?php echo $ayu2?>" class="form-control" disabled="disabled" />
			<?php }?>
			
			<?php
			$sql_txt3="Select ges_trabajadores.Nombre from ges_programacion inner join ges_trabajadores where ges_programacion.ayu3=ges_trabajadores.Rut and Planilla='$valor'";	  
			$rs_txt3=$objplanilla->con->Consultar($sql_txt3);
			while($row_txt3=mysqli_fetch_array($rs_txt3)){
			$ayu3=$row_txt3['Nombre'];
			?>
			<br /><input type="text" value="<?php echo $ayu3?>" class="form-control" disabled="disabled" />
			<?php }?>
			
			
			
			<?php }?>
			<br />
			</div>
      
 
   <div align="center">
   <br />
   <input name="btn_guardar" type="submit" value="Crear" class="btn btn-success"  <?php if($existe!=0){echo "disabled";} ?> />
	</div>


</form>
<?php if($existe!=0){?>  <div align="center">  <button name="btn_guardar" type="submit" class="btn btn-warning"  data-toggle="modal" data-target="#cambio_programacion" data-id=<?php echo $valor?>><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
&nbsp;Solicitar cambio </button> </div><?php  }?>
	


