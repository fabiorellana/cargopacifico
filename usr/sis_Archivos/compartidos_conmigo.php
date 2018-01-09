
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
  <br><br><br>
				  <ol class="breadcrumb">
                  <li><a href="Compartidos_conmigo.php" >Compartidos conmigo</a></li>
                  
                  </ol>

				

                
        	
                  
                    
                    
                
              
             
             <br>
             <div align="center" class="col-lg-12">
             <?php $sql_permisos="select * from int_permisos_archivos where rut_usuario  ='$idusr' or id_dpto=$id_dpto";
			 
			 $rspermisos=mysql_query($sql_permisos);
			 while($rowpermiso=mysql_fetch_array($rspermisos)){
				
				
			
				 $permiso_carpeta=$rowpermiso['id_carpeta'];
			
				 
			 
			 ?>
             
			 <?php $sqlvercarpeta="select int_carpeta.nombre as nombre_carpeta, ges_trabajadores.Nombre as nombre_usr, int_carpeta.id from init_carpeta INNER JOIN ges_trabajadores where int_carpeta.id=".$permiso_carpeta." and int_carpeta.rut_usr=ges_trabajadores.Rut";
			
			 
			
			 

				$rsvercarpeta=mysql_query($sqlvercarpeta, $cnn);
				while($rowvercarpeta=mysql_fetch_array($rsvercarpeta)){
				$id= base64_encode($rowvercarpeta['id']);
        echo $id;

				?>
				<?php echo "<acronym title='Compartida por: ".$rowvercarpeta['nombre_usr']."'><div class='col-sm-6 col-lg-2 col-xs-6 '><a href='carpetas_compartida.php?nombre=$id&name=".$rowvercarpeta['nombre_carpeta']."'><img src='../images/carpeta.png' width='60' height='auto' /><br>".$rowvercarpeta['nombre_carpeta']."</a></div></acronym>"; ?>
				
                <?php } } ?>
               
				 </div>
       		
                <?php $sql_permisos="select * from int_permisos_archivos where rut_usuario =$idusr or id_dpto=$id_dpto";
				
			 $rspermisos=mysql_query($sql_permisos);
			 while($rowpermiso=mysql_fetch_array($rspermisos)){
				
				 $permiso_archivo=$rowpermiso['id_archivo'];
			
				 	
				 
			 
			 ?>
              
           <?php
		  $sql = "select * from int_archivos where id=".$permiso_archivo." and privado=0 and estado=1";
		  
			 
		$rsdocumentos=mysql_query($sql, $cnn); 
			while($datos=mysql_fetch_array($rsdocumentos))
			{?>
            
            <div class="col-sm-6 col-lg-2 col-xs-6" id="archivo" data-id_archivo="<?php $id_archivos= $datos['id']; echo  $idarchivos?>">
            <br>
               <br>
                  <?php //ver si el archivo es compartido 
			$sqlcompartido="select count(id_archivo) as id,  ges_trabajadores.Nombre, ges_trabajadores.Cargo FROM int_permisos_archivos 
			INNER JOIN int_archivos INNER JOIN ges_trabajadores WHERE id_archivo=".$datos['id']."
			 and int_permisos_archivos.id_archivo=int_archivos.id and ges_trabajadores.Rut=int_archivos.id_usr_up";
		
			 
			
			
			
		$rscom=mysql_query($sqlcompartido, $cnn);
			while($rowcom=mysql_fetch_array($rscom)){
				$compartido=$rowcom['id'];
				$nombreupload=$rowcom['Nombre'];
				$cargoupload=$rowcom['Cargo'];
			if($compartido!=0){
				
				$ponershare=true;
				}else{$ponershare=false;}
				}
			?>
            <div class='panel panel-default'  data-id=<?php echo $datos['id']?> id="sidebar">
            <div class="panel-heading" style="height:3%">
            <div class="btn-group" style="margin-top:-11; margin-left:-15%">
              
              
            </div>
            
            
            <acronym title="Archivo privado, solo tu puedes ver este archivo"> 
          <div align="right" style="margin-top:-15%">
          <?php if ($datos['privado']==1){echo "<i class='fa fa-lock' aria-hidden='true'></i>";}?>
		  </div>
          </acronym>
          </div>
            
       <div class="panel-body" data-toggle="modal" data-target="#propiedades"   id="target" data-id="<?php echo $datos['id']?>" >
       
          
          
          <acronym title="<?php echo $datos['nombre']?>"><div align="center" style="font-size:14px; color:#000;"><?php echo cutstring($datos['nombre'],23)?></div>
          
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
    <td width="20%"><a href="<?php echo $datos['ruta']?>" > <acronym title="Descargar"><i class="fa fa-download" aria-hidden="true"></i></acronym></a></td>
    <td width="20%"><acronym title="Proximamente"><i class="fa fa-external-link" aria-hidden="true"></i></acronym></td>
    <td width="20%">  
            <acronym title="<?php echo "Archivo Compartido"  ?>">
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
      <?php  } }?>

			</div>
            
            


	 
          
  




 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<?php require("include/modals.php");?>
<?php require("include/footer.php");?>



                
                
                
            
</body>
</html>

       
            
           

            
            


