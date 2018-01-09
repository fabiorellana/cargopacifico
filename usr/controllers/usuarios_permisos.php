
<?php
session_start();

error_reporting(0);

include "../../funciones/funciones.php";
$cnn=Conectar();
//recupera ajax

$busq=$_POST['c'];




	
//busca con nombre
$sql="SELECT ges_trabajadores.Rut, ges_trabajadores.codigo_ayu, ges_trabajadores.codigo_cond, ges_trabajadores.Nombre, ges_trabajadores.Estado, int_cargo.Descripcion as cargo, ges_empresa.Nombre as empresa, ges_centro_de_costos.Descripcion as centro from ges_trabajadores INNER JOIN int_cargo INNER JOIN ges_empresa INNER JOIN ges_centro_de_costos where ges_trabajadores.Cargo_id=int_cargo.Id and ges_trabajadores.Estado=1 and ges_trabajadores.Empresa_id=ges_empresa.Id and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id and ((ges_trabajadores.Nombre like '%$busq%' )or (ges_centro_de_costos.Descripcion  like '%$busq%')or(int_cargo.Descripcion like '%$busq%') or (ges_trabajadores.Rut like '%$busq%')) limit 10 ";










$rs=mysql_query($sql,$cnn);
$cantidad_registros=mysql_num_rows($rs);
?>
<br />
<br />

<?php echo "Cantidad de trabajadores: ". $cantidad_registros;?>
<div class="table  table-responsive">
		<table class="table table-bordered table-hover" align='center' border="0">
				<tr >
				<td class="success"> <b> Rut </b> </td>
				<td class="success"> <b> Codigo</b> </td>
                <td class="success"> <b> Nombre</b> </td>
				<td class="success"> <b> Cargo</b> </td>
				<td class="success"> <b> Empresa </b> </td>
                <td class="success"> <b> Centro </b> </td>
            
                <td class="success" align="center"> <b> Permisos</b></td>
                
			
				</tr>
	<?php			
while($row=mysql_fetch_array($rs)){
	?>
	
 				<tr>
				<td><?php echo $row['Rut'] ; ?></td>
                <td><?php echo $row['codigo'] ; ?></td>
			    <td><?php echo $row['Nombre'];?></td>
                <td><?php echo $row['cargo'];?></td>
                <?php $estado=$row['Estado'];?>
                <td> <acronym title="<?php echo $row['empresa']; ?>"> <?php echo cutString($row['empresa'], 20); ?></acronym></td>
                <td> <?php echo $row['centro'];?></td>

<?php //muestra si tiene asigando intranet
 $sql_existe="select count(rut) as cant from int_lgn where rut='".$row['Rut']."'";

	  $rs_existe=mysql_query($sql_existe, $cnn);
	  while($row_existe=mysql_fetch_array($rs_existe)){
		  $existes=$row_existe['cant'];
		   }

?>

                <td align="center"> <button type="button" class="btn <?php if($existes==0){echo "btn-info"; }else{echo "btn-success";}?> btn-xs" data-toggle="modal" data-target="#sistemas_permiso"   id="target" data-id="<?php echo $row['Rut']?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
				
                </tr>
				 <?php	}?>
			
  			

</table>
</div>

 
  
  
  <div class="modal fade"  id="sistemas_permiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">  
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  <h4 class="modal-title">Permisos sistemas</h4>
  <div class="modal-body" id="modal_per">
 
  </div>   
  </div>
  </div>
  </div>
  </div>
    
    <script>



$('#sistemas_permiso').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');    
           var parametros = {
                "c" : codigo                
        };                                                        
              $.ajax({
                    type: "POST",
                    url: "ajax/modal_permisos.php",
                    data: parametros, 
                    beforeSend: function(){
                          //imagen de carga
                          $("#modal_per").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#modal_per").empty();
                          $("#modal_per").append(data);
                                                             
                    }
              });



        
  });
       
</script>