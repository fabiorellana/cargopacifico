<?php require('include/valida.php');?>
<?php require("include/header.php"); ?>

<?php 

$id=$_POST['id'];
$sql="select int_archivos.nombre, ges_trabajadores.Nombre, int_archivos.id, int_archivos.fecha, int_archivos.descripcion, int_archivos.tamanio, int_archivos.ruta from int_archivos INNER JOIN ges_trabajadores where ges_trabajadores.Rut=int_archivos.rut_usr_up and int_archivos.id=$id";

$rs=mysql_query($sql, $cnn);
while($row=mysql_fetch_array($rs)){
?>

<div align="center"><?php //tipo de archivo para imagenes
		   $tipoimg = explode(".", $row['ruta']);   ?>
          
          <?php if($tipoimg[1]=="exe"){?>
        <img src="../images/extension/exe.png" width="70" height="auto" />
          <?php }?>
            <?php if($tipoimg[1]=="docx" || $tipoimg[1] == "doc"){?>
        <img src="../images/extension/doc.png" width="70" height="auto" />
          <?php }?>
          <?php if($tipoimg[1]=="xls" || $tipoimg[1] == "xlsx"){?>
        <img src="../images/extension/xls.png" width="70" height="auto" />
          <?php }?>
          <?php if($tipoimg[1]=="pdf"){?>
        <img src="../images/extension/pdf.png" width="70" height="auto" />
          <?php }?>
            <?php if($tipoimg[1]!="pdf" && $tipoimg[1] != "docx" && $tipoimg[1] != "doc" &&  $tipoimg[1] != "xls" &&  $tipoimg[1] != "xlsx" &&  $tipoimg[1] != "exe"){?>
        <img src="../images/extension/file.png" width="70" height="auto" />
          <?php }?><br><?php echo $row['nombre']?><br><acronym title="<?php echo ($row['tamanio']*0.001). "&nbsp; KB";?>"><?php  $kb=$row['tamanio'];  $redondead0=round($kb*0.001); echo $redondead0?>KB.</acronym></div>
<br>
<div align="center" >
<div class="col-lg-6">Fecha creación<br><?php echo $row['fecha']?></div>

<div class="col-lg-6">Creado por<br><?php echo $row['Nombre']?>
          </div>

</div>
<br>
<br>
<div class="col-lg-12"><br><form method="post" action="aaa.php" >
<input type="text" name="id" value="<?php  $ids=$row['id']; echo $ids; ?>" class="hidden">
<textarea rows="3" style="width:100%"  placeholder="Descripción del archivo"  id="txt" name="txt" ><?php echo $row['descripcion'];?></textarea>
<br>
<br>
<br>
<button name="actualizar" value="actualizar" id="btnguardar" class="pull-right btn btn-success">Guardar</button>
</form>

</div>
<div>Compartido con: <br><?php $sqlcompartido="SELECT ges.trabajadores.Nombre from ges.trabajadores INNER JOIN int_permisos_archivos 
where int_permisos_archivos.rut_usuario=ges_trabajadores.rut and int_permisos_archivos.id_archivo='$ids'";

$rscompar=mysql_query($sqlcompartido, $cnn);
while($rowcompar=mysql_fetch_array($rscompar)){
	
	echo $rowcompar['Nombre']."<br>"; 
	}

?></div>
<br>
<br>
<br>








<?php }?>

