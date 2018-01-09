<form method="post"></form>
<?php //centro de costo id
session_start();

$cc=$_SESSION["cc"];
require("../../funciones/funciones.php"); 
$cnn=Conectar();
$valor=$_POST['id_planilla'];
$sql="select * from ges_programacion where Planilla='$valor'";

$rs=mysql_query($sql, $cnn);
while($rows=mysql_fetch_array($rs)){
?>
<div style="background-color:#CEE3F6">
<div class="col-lg-12" align="center"> Numero de planilla: <br />

<input type="text" value="<?php echo $valor; ?>" name="txtnplanilla" />
</div>
<br />
<div class="col-lg-2 col-xs-6" align="center"> Corte CCU: <br /><?php echo $rows['Corte_ccu']; ?></div>
<div class="col-lg-3 col-xs-6" align="center"> Cajas preventa: <br /><?php echo $rows['Total_cajas_preventa']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> N° Cargas: <br /><?php echo $rows['N_cargas']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> N° Cliente: <br /><?php echo $rows['N_cliente']; ?></div>
<div class="col-lg-2 col-xs-4" align="center"> Fecha CCU <br /><?php echo $rows['Fecha_ccu']; ?></div>
<br />
<br />
<br />
<br />
</div>




<br />
Conductor
<?php
	  $sql_chofer="Select Conductor from ges_programacion where Planilla='$valor'";	  
	  $rs_sql_chofer=mysql_query($sql_chofer,$cnn);
	  while($row_chofer=mysql_fetch_array($rs_sql_chofer)){
	  $conductor=$row_chofer['Conductor'];
?>
      <input type="text" value="<?php echo $conductor?>" class="form-control" disabled="disabled" />
    
    <?php }?>
     

    
    
<div class="col-lg-12" align="center">
Ayudante Primero<select name="ayu1" id="ayu1" class="form-control" required="required">
            <option></option>

<?php $sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in ( select ges_trabajador_programado_diaria.trab_rut from ges_trabajador_programado_diaria where ges_trabajador_programado_diaria.fecha = '$fecha') and Cargo_id='7' and Centro_de_costo_id='$cc'";
	  $rs_sql_ayu1=mysql_query($sql_ayu1,$cnn);
	  while($row_ayu1=mysql_fetch_array($rs_sql_ayu1)){?>
      
    <option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo']." - ".$row_ayu1['Nombre']?></option>
    <?php }?>
    </select> 
    </div>
    
<div class="col-lg-12" align="center">
Ayudante segundo<select name="ayu2" id="ayu2" class="form-control" >
            <option></option>

      <?php $sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in ( select ges_trabajador_programado_diaria.trab_rut from ges_trabajador_programado_diaria where ges_trabajador_programado_diaria.fecha = '$fecha') and Cargo_id='7' and Centro_de_costo_id='$cc'";
	  $rs_sql_ayu1=mysql_query($sql_ayu1,$cnn);
	  while($row_ayu1=mysql_fetch_array($rs_sql_ayu1)){?>
      
    <option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo']." - ".$row_ayu1['Nombre']?></option>
    <?php }?>
    </select>
</div>


<div class="col-lg-12" align="center">
Ayudante tercero<select name="ayu3" id="ayu3" class="form-control" >
            <option></option>

      <?php $sql_ayu1="select ges_trabajadores.Rut, ges_trabajadores.codigo, ges_trabajadores.Nombre from ges_trabajadores where ges_trabajadores.Rut not in ( select ges_trabajador_programado_diaria.trab_rut from ges_trabajador_programado_diaria where ges_trabajador_programado_diaria.fecha = '$fecha') and Cargo_id='7' and Centro_de_costo_id='$cc'";
	  $rs_sql_ayu1=mysql_query($sql_ayu1,$cnn);
	  while($row_ayu1=mysql_fetch_array($rs_sql_ayu1)){?>
      
    <option value="<?php echo $row_ayu1['Rut']?>"><?php echo $row_ayu1['codigo']." - ".$row_ayu1['Nombre']?></option>
    <?php }}?>
    </select>
    </div>


  <div align="center" style="">

           <input type="submit" class="btn btn-success" value="Guardar" name="crear" />
    
        
		</div>




     





