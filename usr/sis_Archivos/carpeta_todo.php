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
                  <li><a href="misarchivos.php" >Compartidos conmigo</a></li>
                  <li class="active"><?php echo $_SESSION["n_carpeta"];?></li>
                  </ol>
                
        
                  
                    
                    
                
              <div>  
            
             
             <br>
             
       		
               
              
           <?php
		 $sql = "select int_archivos.id, int_archivos.ruta, int_archivos.nombre as nombre_archivo, ges_trabajadores.Nombre, int_dpto.dpto, int_archivos.fecha, int_archivos.descripcion from int_archivos INNER JOIN int_dpto 
			INNER JOIN ges_trabajadores where int_archivos.id_dpto=int_dpto.id and int_archivos.rut_usr_up=ges_trabajadores.Rut  and int_archivos.carpeta_id='$idcarpeta' and int_archivos.estado=1";
			echo $sql;
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
            <li><a type="button" data-toggle="modal" data-target="#mover" class="mover"  id="target" data-id="<?php echo $datos['id']?>" >Mover a carpeta</a></li>
            <li><a type="button" data-toggle="modal" data-target="#CambiarNombre"   id="target" data-id="<?php echo $datos['id']?>" >Renombrar</a></li>
            
            
            <li class="divider"></li>
            <li><a type="button" data-toggle="modal" data-target="#eliminar"   id="target" data-id="<?php echo $datos['id']?>" >Eliminar</a></li>
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
            <a href="archivos/<?php echo $datos['ruta']?>" ><i class="fa fa-download" aria-hidden="true"></i></a>
            <button><i class="fa fa-external-link" aria-hidden="true"></i></button>
            </div>
            
            </div>
            </div>
      <?php  } ?>

			
            
            



 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include("include/footer.php");?>

<script>
$(document).ready(function() {
				
	$(document).ready(function(){
					 $("#buscador").keyup(function(e){
			var tipo =$('input:radio[name=radios]:checked').val();
			if(tipo == null){           $("#buscador").prop('disabled', true);
}

						 //imagen de carga					
		$('#contenedormodal').html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');

	  //valores de radio & txt
	
	  var busqueda = $("#buscador").val();
	  
	  
	    $("#contenedormodal").load("ajaxpermiso.php", {buscar: busqueda, tipo:tipo, carpeta:<?php echo $idcarpeta?>}, function(){

      });
   });
});


				
$("#capa").load('mis_archivos.php');

				
				
				$("#ver").hide();
				
				//link mis archivos
				$("#misarchivos").click(function(event) {
					$("#capa").load('mis_archivos.php');
				});
				
				//link compartidos conmigo
					$("#compartidos_conmigo").click(function(event) {
					$("#capa").load('compartidos_conmigo.php');
				});
				
				//link archivos dpto
					$("#archivos_dpto").click(function(event) {
					$("#capa").load('archivos_dpto.php');
				});
				
					//link papelera
					$("#papelera").click(function(event) {
					$("#capa").load('papelera.php');
				});
				
	});
				</script>
                
                
                
                 <script>

$('#mover').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>

<script>

$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdnombre").val(consulta);            
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