
<!DOCTYPE html>
<html>
<?php require('include/header.php');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="">

   <header class="main-header">
  <?php include_once "include/menu_arriba.php";?>
   </header>

  
  <aside class="main-sidebar">
    <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>



  <!-- pagina -->
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5"  >
  <br class="hidden-xs"><br class="hidden-xs"><br>
				  <ol class="breadcrumb" id="cargando">
                  <li><a href="misarchivos.php" >Mis Archivos</a></li>
                  
                  </ol>
<?php
                    //subir archivo
						//comprueba si archivo es privado, solo para si mismo departamneto no puede ver
						if (isset($_POST['privado']) && $_POST['privado'] == '1'){
      $privado=1;
						}else{
      $privado=0;
}
                        $nombre = $_FILES['archivo']['name'];
                        $tipo = $_FILES['archivo']['type'];
                        $tamanio = $_FILES['archivo']['size'];
                        $ruta = $_FILES['archivo']['tmp_name'];
						if($tamanio>=200000000){echo "<script>alert('Archivo excede el limite de 25 mb');</script>";}else{

                        $destino = "archivos/" . $nombre;
                        $sqlmismo_archivo="select count(id) as cantidad, tamanio, ruta from int_archivos where ruta='$destino' and estado=1 and rut_usr_up=$idusr";						$rsarchivos_duplicado=mysql_query($sqlmismo_archivo, $cnn);
                        while($row_duplicado=mysql_fetch_array($rsarchivos_duplicado)){

                          $archivo_duplicado= $row_duplicado['cantidad'];
                          $tamanoarchivo_duplicado= $row_duplicado['tamanio'];
						  $ruta_archivo=$row_duplicado['ruta'];
                        
                        
                        
		if($archivo_duplicado >= 1 && $tamanoarchivo_duplicado=$tamanio){ ?> 
		<div class="col-lg-4" style="position:fixed; margin-top:28%; margin-left:49%; z-index:2">
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		El archivo que intentas subir ya existe ¿Deseas actualizarlo?.&nbsp; <br>
		<br>
		<form method="post">
   		<input type="text" value="<?php echo $ruta_archivo?>" name="nombre_ruta" class="hidden">
		<input type="submit" value="Si" name="sep" class="btn btn-warning">
		<button  class="btn btn-danger"  data-dismiss="alert">No</button>
		</form>
		</div>
		</div> 


<?php	}else{

                        if ($nombre != "") {
                            if (copy($ruta, $destino)) {
								$estado=1;//1 activo; 0 papelera
                                $descri= $_POST['descripcion'];
                                $permisos= $_POST['listpermisos'];
								$carpeta=NULL;//id carpeta null niguna
                                $fecha=date("y") . "/" . date("m") . "/" . date("d");
                                $sql = "INSERT INTO int_archivos VALUES('', '$nombre', '$idusr', '$id_dpto', '$fecha', '$descri', '$tamanio',  '$tipo', '$permisos', '$estado', '$carpeta', '$destino', '$privado' )";
								
                                $query=mysql_query($sql, $cnn)or die(mysql_error());
                                if($query){
                                    echo '<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Exito!</strong> Upload de archivo correcto.
</div>';
                                }
                            } else {
                                echo "<br><br><br>Error". $tamanio;
                            }
                        }
						
                        }
					
					}
					}
					
                    ?>
                    
                    
				
<style>
 @media screen and (max-width: 414px) {
	  .lol{
		
		  margin-top:-5%;
		 }
	  }
 @media screen and (max-width: 375px) {
	  .lol{
		
		  margin-top:-5%;
		 }
		 
		  .lal{
		
		
		  margin-left:-110%;
		 }
	  }

</style>
                
        	<div class="lol" >
                  
                    
                  <form method="post" action="" enctype="multipart/form-data" class="form-inline ">
                    <div class="col-lg-6 "> <input type="file" name="archivo" class="form-group btn "> <button type="submit" value="subir" name="subir" class="btn btn-primary btn-sm" id="subir_archivo"><i class="fa fa-upload" aria-hidden="true"></i>
&nbsp;Subir</button></div>
                                      
                 
<div class="col-lg-4"><a class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target="#crear_carpeta" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear carpeta</a> </div>
                  
                      </form>
					  <?php if(isset($_POST['sep'])){
	$tura=$_POST['nombre_ruta'];
	$sql_eliminar_duplicado="delete from int_archivos where ruta='$tura' and rut_usr_up='$idusr'";
	mysql_query($sql_eliminar_duplicado, $cnn);
	echo $sql_elimiar_duplicado;
	unlink($tura);
					
						  

                       
                        if (copy($ruta, $destino)) {
						$estado=1;//1 activo; 0 papelera
                        $descri= $_POST['descripcion'];
                        $permisos= $_POST['listpermisos'];
						$carpeta=NULL;//id carpeta null niguna
                        $fecha=date("y") . "/" . date("m") . "/" . date("d");
                        $sql = "INSERT INTO int_archivos VALUES('', '$nombre', '$idusr', '$id_dpto', '$fecha', '$descri', '$tamanio',  '$tipo', '$permisos', '$estado', '$carpeta', '$destino', '$privado' )";
						echo $sql;
                                $query=mysql_query($sql, $cnn);
                                if($query){
                                    echo '<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Exito!</strong> Upload de archivo correcto.
</div>';
                                }
                            } else {
                                echo "Error". $tamanio;
                            }
                        }
						
                        
						  
						  
	 ?>
                
			</div>
                  
                    
                    
                
              
             
         
             <div align="center" class="col-lg-12">
                 <br>
             <br>
			 <?php $sqlvercarpeta="select * from int_carpeta where rut_usr='".$idusr."'";
			 
				$rsvercarpeta=mysql_query($sqlvercarpeta, $cnn);
				while($rowvercarpeta=mysql_fetch_array($rsvercarpeta)){
				$id= base64_encode($rowvercarpeta['id']);

				?>
				<?php echo "<div class='col-sm-6 col-lg-2 col-xs-6 '><a href='carpeta.php?nombre=$id&name=".$rowvercarpeta['nombre']."' style=color:#000''><img src='../images/carpeta.png' width='60' height='60' /><br>".$rowvercarpeta['nombre']."</a></div>"; ?>
				
                <?php }  ?>
               
				 </div>
       		
               
              
           <?php
		  $sql = "select int_archivos.id, int_archivos.nombre as nombre_archivo, int_archivos.privado, int_archivos.fecha,  int_archivos.ruta from int_archivos where  rut_usr_up='$idusr' and int_archivos.carpeta_id=0 and int_archivos.estado=1";
		$rsdocumentos=mysql_query($sql, $cnn); 
			while($datos=mysql_fetch_array($rsdocumentos))
			{?>
            
            <div class="col-sm-6 col-lg-2 col-xs-6" id="archivo" data-id_archivo="<?php $id_archivos= $datos['id']; echo  $idarchivos?>">
            <br>
               <br>
                  <?php //ver si el archivo es compartido 
			$sqlcompartido="select count(id_archivo) as id FROM int_permisos_archivos WHERE id_archivo=".$datos['id']."";
		$rscom=mysql_query($sqlcompartido, $cnn);
			while($rowcom=mysql_fetch_array($rscom)){
				$compartido=$rowcom['id'];
			if($compartido!=0){
				
				$ponershare=true;
				}else{$ponershare=false;}
				}
			?>
            <div class='panel panel-default'  data-id=<?php echo $datos['id']?>>
            <div class="panel-heading" style="height:3%">
            <div class="btn-group" style="margin-top:-12%; margin-left:-15%">
              
              <i  aria-hidden="true" class="fa fa-bars dropdown-toggle btn-sm pull-right" data-toggle="dropdown"></i>
              
 
            <ul class="dropdown-menu" role="menu">
            <li><a type="button" data-toggle="modal" data-target="#mover" class="mover"  id="target" data-id="<?php echo $datos['id']?>" >Mover a carpeta</a></li>
            <li><a type="button" data-toggle="modal" data-target="#CambiarNombre"   id="target" data-id="<?php echo $datos['id']?>" >Renombrar</a></li>
            <li><a type="button" data-toggle="modal" data-target="#permisos" class="mover"  id="target" data-id="<?php echo $datos['id']?>">Compartir</a></li>
            
            <li class="divider"></li>
            <li><a type="button" data-toggle="modal" data-target="#eliminar"   id="target" data-id="<?php echo $datos['id']?>" >Eliminar</a></li>
            </ul>
            </div>
            
            
            <acronym title="Archivo privado, solo tu puedes ver este archivo"> 
          <div align="right" style="margin-top:-15%">
          <?php if ($datos['privado']==1){echo "<i class='fa fa-lock' aria-hidden='true'></i>";}?>
		  </div>
          </acronym>
          </div>
            
       <div class="panel-body"  data-toggle="modal" data-target="#propiedades"   id="target" data-id="<?php echo $datos['id']?>" >
    
          
          
          <acronym title="<?php echo $datos['nombre_archivo']?>"><div align="center"  style="font-size:14px;  color:#000;"><?php echo cutstring($datos['nombre_archivo'],23)?></div>
          
          <div class="panel-body" align="center">
          
         
          <?php //tipo de archivo para imagenes
		   $tipoimg = explode(".", $datos['ruta']);   ?>
          
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
          <?php }?>
          
          
          </div>
          </acronym>
		
       </div> 
        	 <style>
       abbr, acronym {

cursor: help;
}
       </style>
            <div class="panel-footer">
          	<div class="row">
  <table width="112%" border="0">
  <tr>
  <td width="20%"></td>
    <td width="20%"><a href="<?php echo $datos['ruta']?>"  target="_blank" > <acronym title="Descargar"><i class="fa fa-download" aria-hidden="true"></i></acronym></a></td>
    <td width="20%"><acronym title="Proximamente"><i class="fa fa-external-link" aria-hidden="true"></i></acronym></td>
    <td width="20%">  
            <acronym title="<?php echo "Compartido por: " .$nombreupload. "-" .$cargoupload; ?>">
             <?php if ($ponershare==true){?>
             <i style="color:#CCC814;" class='fa fa-share-alt' aria-hidden='true'></i></acronym>
            <?php } ?>
    </td>
  <td width="20%"></td>
  </tr>
  </table>

            
            
         
          	</div>
  
         	</div>
            
            </div>
            </div>
      <?php  } ?>

			</div>
            
            
<?php require('include/modals.php');?>



 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" id="divpropiedades">
                     <input type="text" id="txtpropiedades" name="txtpermisos" class="">

    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<?php require('include/footer.php');?>

  
</body>

<script>
$(document).ready(function() {
	
		

				
				$("#buscador").keyup(function(e){
				var tipo =$('input:radio[name=radios]:checked').val();
				if(tipo == null){
				$("#buscador").prop('disabled', true);
								}
				 //imagen de carga					
		$('#contenedormodal').html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');

	  //valores de radio & txt
	
	  var busqueda = $("#buscador").val();
	  
	 var id_archivo = $("#txtpermisos").val();
	    $("#contenedormodal").load("ajax/ajaxpermisoarchivos.php", {buscar: busqueda, tipo:tipo, id:id_archivo }, function(){

			  });
		   });
		});	
							 
</script>
</html>