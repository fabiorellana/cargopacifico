<?php 
//para la recarga de la pagina
$idget=$_GET['nombre'];

$idcarpeta= base64_decode($idget);
$_SESSION["n_carpeta"]=$_GET['name'];

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

				<br><br><br>
				  <ol class="breadcrumb">
                  <li><a href="misarchivos.php" >ver todo</a></li>
                  <li class="active"><?php echo $_SESSION["n_carpeta"];?></li>
                  </ol>
                
        	
                  
                    
                    
                
              <div>  
            
             </div>
             
             <br>
             
       		
               
              
           <?php
		   
		$sql = "select int_archivos.id, int_archivos.nombre as nombre_archivo, int_archivos.privado, int_archivos.fecha,  int_archivos.ruta from int_archivos where int_archivos.carpeta_id='$idcarpeta' and int_archivos.estado=1";
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

			
            
    
<?php require("modals.php");?>
 

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
</html>