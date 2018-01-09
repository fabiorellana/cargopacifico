<?php 
//para la recarga de la pagina
$idget=$_GET['nombre'];

$idcarpeta= base64_decode($idget);
?>


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
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5" >
<?php
                    //subir archivo
                    if (isset($_POST['subir'])) {
						//comprueba si archivo es privado, solo para si mismo departamneto no puede ver
						if (isset($_POST['privado']) && $_POST['privado'] == '1'){
      echo $privado=1;
						}else{
      echo $privado=0;
}
                        $nombre = $_FILES['archivo']['name'];
                        $tipo = $_FILES['archivo']['type'];
                        $tamanio = $_FILES['archivo']['size'];
                        $ruta = $_FILES['archivo']['tmp_name'];
                        $destino = "archivos/" . $nombre;
                        if ($nombre != "") {
                            if (copy($ruta, $destino)) {
								$estado=1;//1 activo; 0 papelera
                                $descri= $_POST['descripcion'];
                                $permisos= $_POST['listpermisos'];
								$carpeta=$idcarpeta;//id carpeta null niguna
                                $fecha=date("y") . "/" . date("m") . "/" . date("d");
                                $sql = "INSERT INTO int_archivos VALUES('', '$nombre', '$idusr', '$id_dpto', '$fecha', '$descri', '$tamanio',  '$tipo', '$permisos', '$estado', '$carpeta', '$destino', '$privado' )";
                                $query=mysql_query($sql, $cnn);
                                if($query){
                                    echo "Se guardo correctamente";
                                }
                            } else {
                                echo "Error";
                            }
                        }
                    }
                    ?>
				<br><br><br>
				  <ol class="breadcrumb">
                  <li><a href="misarchivos.php" >Mis Archivos</a></li>
                  <li class="active"><?php echo $_SESSION["n_carpeta"];?></li>
                  </ol>
                
        	<div class="container" >
            
                  
                  
                    <table >
                  <tr>
                  <form method="post" action="" enctype="multipart/form-data" class="form-inline ">
                    <td> <input type="file" name="archivo" class="form-group btn "></td>
                    <td width="50%"><input type="submit" value="subir" name="subir" class="btn btn-primary btn-sm"></td>
                    <td><div class="btn-group">
  <button type="button" class="btn btn-sucess dropdown-toggle btn-sm"
          data-toggle="dropdown">
    Opciones de carpeta <span class="caret"></span>
  </button>
 
  <ul class="dropdown-menu" role="menu">
    <li><a type="button" data-toggle="modal" data-target="#permisos" class="mover"  id="target" ><i class="fa fa-share-alt" aria-hidden="true"></i>
&nbsp;Compartir</a></li>
    <li  class="divider"></li>
    <li><a type="button" data-toggle="modal" data-target="#eliminar_carpeta" class="mover"  id="target" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Eliminar Carpeta</a></li>
  
  </ul>
</div></td>
                    <td width="5%"></td>
               
                  </tr>
                      </form>
                </table>
			</div>
                  
                    
                    
                
              <div>  
            
             </div>
             
             <br>
             
       		
               
              
           <?php
		   
				
			
			  $sql = "select int_archivos.id, int_archivos.nombre as nombre_archivo, int_archivos.privado, int_archivos.fecha,  int_archivos.ruta from int_archivos where  rut_usr_up='$idusr' and int_archivos.carpeta_id='$idcarpeta' and int_archivos.estado=1";
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
            <div class="btn-group" style="margin-top:-15%; margin-left:-15%">
              
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
    
          
          
          <acronym title="<?php echo $datos['nombre_archivo']?>"><div align="center" style="font-size:14px;  color:#000;"><?php echo cutstring($datos['nombre_archivo'],23)?></div>
          
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
    <td width="20%"><acronym title="Descargar"> <a href="<?php echo $datos['ruta']?>"  target="_blank" ><i class="fa fa-download" aria-hidden="true"></i></acronym></a></td>
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

			
            
          


<?php require("include/modals.php");?>
          
        			


 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require("include/footer.php");?>



                
                
                
             







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