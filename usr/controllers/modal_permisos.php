<?php
require("../../../funciones/funciones.php");
error_reporting(0);
$cnn=Conectar();
$valor=$_POST['c'];
?>


<?php
 $sql_existe="select count(rut) as cant from int_lgn where rut='$valor'";
 $rs_existe=mysql_query($sql_existe, $cnn);
 while($row_existe=mysql_fetch_array($rs_existe)){
 $existes=$row_existe['cant'];
  }

if($existes!=1){
?>

<form method="post" action="ajax/guarda_lgn.php">
<input type="text" value="<?php echo $valor?>" name="txtrut" id="txtrut" class="hidden" />
<?php $sql_pp="select count(rut) as id, mail from int_lgn  where rut='$valor'";

$rs_sql_pp=mysql_query($sql_pp,$cnn);
while($row_pp=mysql_fetch_array($rs_sql_pp)){
$existe=$row_pp['id'];
$mails=$row_pp['mail'];
}

?>
          
          
<div class="col-lg-12">E-mail<input type="email" name="txtmail" placeholder="Ejemplo@cargopacifico.cl" required class="form-control"   value="<?php echo $mails?>" /><br /> </div>
<div class="col-lg-6">Asignar Departamento<select name="select_dpto" id="select_dpto" class="form-control input-sm" required="required">
            <option></option>

<?php $sql_tipo_dpto="select * from int_dpto";
$rs_tipo_dpto=mysql_query($sql_tipo_dpto,$cnn);
while($row_tipo_dpto=mysql_fetch_array($rs_tipo_dpto)){?>   
<option value="<?php echo $row_tipo_dpto['id']?>"><?php echo $row_tipo_dpto['dpto']?></option>
<?php }?>
</select>
</div>
<div class="col-lg-6"> Asignar a gerencia<select name="select_gerencia" id="select_gerencia" class="form-control input-sm" required="required" >
            <option></option>

      <?php $sql_tipo_gerencia="select * from int_gerencia";
	  $rs_tipo_gerencia=mysql_query($sql_tipo_gerencia,$cnn);
	  while($row_tipo_gerencia=mysql_fetch_array($rs_tipo_gerencia)){?>
      
    <option value="<?php echo $row_gerencia['id']?>"><?php echo $row_tipo_gerencia['nombre']?></option>
    <?php }?>
    </select><br /></div>

<div class="col-lg-12"><b>Permisos Archivos Intranet</b></div>

<div class="col-lg-4"><input type="checkbox" name="ckadminusr" value="1" />  Administrar usuarios</div>
<div class="col-lg-4"> <input type="checkbox" name="cktodo" value="1" />Ver todos archivos</div>
<div class="col-lg-4"> <input type="checkbox" name="ckgerencia" value="1" /> Solo de la gerencia </div>
<div class="col-lg-4"> <input type="checkbox" name="cknoticias" value="1" />Noticias</div>
<div class="col-lg-12"><br /><b>Sistemas</b></div>
<div class="col-lg-4">   <input type="checkbox" name="ckff" value="1" />fondo fijo</div>
<div class="col-lg-4">   <input type="checkbox" name="ckprogramacion" value="1" />Programación <br /></div>
<div class="col-lg-4">   <input type="checkbox" name="ckgestion_trabajadores" value="1" />Gestion trabajadores <br /></div>
<div class="col-lg-4">   <input type="checkbox" name="ckgestion_prog" value="1" />Administrar programación <br /></div>
<div class="col-lg-4">   <input type="checkbox" name="cc_usu" id="cc_usu" value="1" />C. Corriente usuario <br /></div>
<div class="col-lg-4">   <input type="checkbox" name="cc_admin" id="cc_admin" value="1" />C. Corriente Admin <br /></div>
<br />


<br />
<div class="col-lg-12" id="select_centro">
<br />
<div class="alert alert-info">Al seleccionar cuenta corriente se da la opción de asignar mas de un centro a un usuario, es decir el Usuario puede ver el centro al que pertenece ademas de los centros que se seleccionen mas abajo</div>
<br />
<b>Centros Cuenta corriente</b>
<br />
<select name="listcentro1">
<option value=''> </option>
<?php $sqlcc="select * from ges_centro_de_costos";
$rscc=mysql_query($sqlcc,$cnn);
while($rowcc=mysql_fetch_array($rscc)){
	echo '<option value='.$rowcc['id'].'>'.$rowcc['Descripcion'].'</option>';
	
	}

?>

</select>

<select name="listcentro2">
<option value=''> </option>
<?php $sqlcc="select * from ges_centro_de_costos";
$rscc=mysql_query($sqlcc,$cnn);
while($rowcc=mysql_fetch_array($rscc)){
	echo '<option value='.$rowcc['id'].'>'.$rowcc['Descripcion'].'</option>';
	
	}

?>
</select>

<select name="listcentro3">
<option value=''> </option>
<?php $sqlcc="select * from ges_centro_de_costos";
$rscc=mysql_query($sqlcc,$cnn);
while($rowcc=mysql_fetch_array($rscc)){
	echo '<option value='.$rowcc['id'].'>'.$rowcc['Descripcion'].'</option>';
	
	}

?>
</select>
</div>
<div class="col-lg-12" align="center"><br />
<input type="submit" name="Btn_permisos" value="Crear" class="btn btn-success" align="middle" />
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

</form>
<?php }else{?>
<form method="post">
<div class="col-lg-12">Modificar correo </div>
<div class="col-lg-12"><input type="email" placeholder="ejemplo@cargopacifico.cl"  name="correo" class="form-control"/><br /></div>

<div class="col-lg-12"><strong>Modificar Permisos</strong></div>

<div class="col-lg-4"><input type="checkbox" name="ckadminusr" value="1" />  Administrar usuarios</div>
<div class="col-lg-4"> <input type="checkbox" name="cktodo" value="1" />Ver todos archivos</div>
<div class="col-lg-4"> <input type="checkbox" name="ckgerencia" value="1" /> Solo de la gerencia </div>
<div class="col-lg-4"> <input type="checkbox" name="cknoticias" value="1" />Noticias</div>
<div class="col-lg-12"><br /><b>Sistemas</b></div>
<div class="col-lg-4">   <input type="checkbox" name="ckff" value="1" />fondo fijo</div>
<div class="col-lg-4">   <input type="checkbox" name="ckprogramacion" value="1" />Programación <br /></div>
<div class="col-lg-4">   <input type="checkbox" name="ckgestion_trabajadores" value="1" />Gestion trabajadores <br /></div>



<div class="col-lg-12" align="center"><br /><input type="submit" name="btn_act" value="Modificar" class="btn btn-success" align="middle" /></div>




</form>
<?php }?>

<script>
//estado de select centros
$(document).ready(function() {
	  $('#select_centro').hide(1000);
	$("#cc_usu").click(function() {  
        if($("#cc_usu").is(':checked')) {  
            $('#select_centro').show(1000);  
        } else{
			 $('#select_centro').hide(1000);}
    });  
	
		
});  

</script>