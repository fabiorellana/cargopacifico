 <?php require("../../funciones/funciones.php");
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
	  $rs=mysql_query($sql, $cnn);
	  while($row=mysql_fetch_array($rs)){
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