
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

				

                
        	
                  
                    
                    
                
              <div>  
            
             </div>
             <br>
              <br>
             <h1 align="center">Papelera</h1>
            
             
       		
               
              
           <?php
		 $sql = "select int_archivos.id, int_archivos.ruta, int_archivos.nombre as nombre_archivo, ges_trabajadores.Nombre, int_dpto.dpto, int_archivos.fecha, int_archivos.descripcion from int_archivos INNER JOIN int_dpto 
			INNER JOIN ges_trabajadores where int_archivos.id_dpto=int_dpto.id and int_archivos.rut_usr_up=ges_trabajadores.Rut and rut_usr_up='$idusr' and int_archivos.estado=0";
		$rsdocumentos=mysql_query($sql, $cnn); 
			while($datos=mysql_fetch_array($rsdocumentos))
			{?>
            
            <div class="col-sm-6 col-lg-2 col-xs-6" id="archivo" data-id_archivo="<?php echo $datos['id']?>">
            <br>
               <br>
            <div class='panel panel-default'>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle btn-sm pull-right" data-toggle="dropdown">
              <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
 
            <ul class="dropdown-menu" role="menu">
            <li><a type="button" data-toggle="modal" data-target="#mover" class="mover"  id="target" data-id="<?php echo $datos['id']?>" >Restaurar</a></li>
          
            </ul>
            </div>
            <div align="right"></div>
            <acronym title="<?php echo $datos['nombre_archivo']?>"><div align="center" style="font-size:10px;"><?php echo cutstring($datos['nombre_archivo'],15)?></div>
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
          </div></acronym>
			<div class="panel-footer">
            <a href="archivos/<?php echo $datos['nombre_archivo']?>" ><i class="fa fa-download" aria-hidden="true"></i></a>
            <button><i class="fa fa-external-link" aria-hidden="true"></i></button>
            </div>
            
            </div>
            </div>
      <?php  } ?>

			
            
            


	  <!--modal Mover -->
			<div class="modal fade" id="mover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     		<div class="modal-dialog">
        	<div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">¿Restaurar Archivo?</h4>
          	</div>
          	<div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdMover" class="hidden" name="txtidmover" >
            
           
            <br />          
        <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancelar</a>
           <input type="submit" class="btn btn-success" value="Restaurar" name="mover">
        </div>
           </form>
           <?php 
		   if($_POST['mover']=="Restaurar"){
		   $idmover=$_POST['txtidmover'];
		   
		   $sqlmover="UPDATE `int_archivos` SET `estado` = 1 WHERE `int_archivos`.`id` = $idmover" ;
		   mysql_query($sqlmover, $cnn);
		   echo "<script>document.location ='papelera.php'</script>";
		   }
		   ?>
      
          </div>
          </div>
          </div>
          </div>
          

 		  

             
        			
</div>
</div>

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php require("include/footer.php"); ?>


                
                
                
                 <script>

$('#mover').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>



<script>

$('#eliminar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});
                
</script>    
</body>
</html>


































