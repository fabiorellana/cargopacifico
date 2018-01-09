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
				   <?php
		 $sql = "select int_archivos.id, int_archivos.nombre as nombre_archivo, ges_trabajadores.Nombre, int_dpto.dpto, int_archivos.fecha, int_archivos.descripcion, int_archivos.ruta from int_archivos INNER JOIN int_dpto 
			INNER JOIN ges_trabajadores where int_archivos.id_dpto=int_dpto.id and int_archivos.rut_usr_up=ges_trabajadores.Rut and  int_archivos.carpeta_id='$idcarpeta' and int_archivos.estado=1";
			echo $sql;
		$rsdocumentos=mysql_query($sql, $cnn); 
			while($datos=mysql_fetch_array($rsdocumentos))
			{?>
            
            <div class="col-sm-6 col-lg-2 col-xs-6" id="archivo" data-id_archivo="<?php $id_archivos= $datos['id']; echo  $idarchivos?>">
            <br>
               <br>
                  <?php //ver si el archivo es compartido 
			$sqlcompartido="select count(id_archivo) as id FROM permisos_archivos WHERE id_archivo=".$datos['id']."";
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
			</div>
            
            


	  <!--modal Mover -->
			<div class="modal fade" id="mover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     		<div class="modal-dialog">
        	<div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Seleccionar carpeta</h4>
          	</div>
          	<div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdMover" class="hidden" name="txtidmover" >
            
            <select name="select_carpeta" class="form-control">
           	<option value="0">Principal</option>	  

            <?php $sql_carperta="select id, nombre from carpeta where id_usr=$idusr";
				 $rs_carpeta= mysql_query($sql_carperta, $cnn);
				  while($row_carpeta=mysql_fetch_array($rs_carpeta)){
					 ?> 
                    
			<option value="<?php echo $row_carpeta['id'] ?>" placeholder="Nombre de la carpeta" required><?php echo $row_carpeta['nombre']?></option>
			<?php } ?> 
            </select>
            <br />          
        <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancelar</a>
           <input type="submit" class="btn btn-success" value="Mover" name="mover">
        </div>
           </form>
           <?php 
		   if($_POST['mover']=="Mover"){
		   $idmover=$_POST['txtidmover'];
		   $id_carpeta=$_POST['select_carpeta'];
		   
		   $sqlmover="UPDATE `tcp_archivos` SET `carpeta_id` = '$id_carpeta' WHERE `tcp_archivos`.`id` = $idmover" ;
		   mysql_query($sqlmover, $cnn);
		   echo "<script>document.location ='misarchivos.php'</script>";
		   }
		   ?>
      
          </div>
          </div>
          </div>
          </div>
          
  <!--modal Renombrar -->
            <div class="modal fade" id="CambiarNombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Renombrar</h4>
            </div>
            <div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdnombre" name="txtIdnombre" class="hidden">
            <input type="text" placeholder="Nombre" class="form-control" name="txtnombrecarpeta" maxlength="30" required>
            <br />
            <br />
            <br />
          
        
            <a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Guardar" name="crear">
		<?php 
		if($_POST['crear']=="Guardar"){
		
		$nuevonombre=$_POST['txtnombrecarpeta'];
		$idarchivo=$_POST['txtIdnombre'];
		
		$renombre="UPDATE `tcp_archivos` SET `nombre` = '$nuevonombre' WHERE `tcp_archivos`.`id` = $idarchivo";
		mysql_query($renombre, $cnn);
		echo "<script>document.location ='misarchivos.php'</script>";

		}
		
		?>
           </form>
          </div>
          </div>
          </div>
 		  </div>
 
 <!--modal eliminar -->
 		  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">¿Eliminar?</h4>
          </div>
          <div class="modal-body">
          <div class="alert alert-warning">
  			<p>Los archivos eliminados permaneceran durante 24 Hrs. en la papelera, <br> Pasado este tiempo seran eliminados definitivamente del servidor</p>
		  </div>
          <form method="post">
          <input type="text" id="txtIdeliminar" name="txtIdeliminar" class="hidden">
        <div align="center">  
        <input type="submit" value="Si" class="btn btn-danger btn-lg"  name="eliminar"/>
          <button class="btn btn-success btn-lg"  data-dismiss="modal">Cancelar</button>
          </div>
          
		  </form>
          <?php if($_POST['eliminar']=="Si"){
			 
			$ideliminar=$_POST['txtIdeliminar'];
			$sqleliminar="UPDATE `tcp_archivos` SET `estado` = '0' WHERE `tcp_archivos`.`id` = $ideliminar";
			echo $sqleliminar;
			mysql_query($sqleliminar, $cnn);
			echo "<script>document.location ='misarchivos.php'</script>";

			  
			  }?>
          </div>
          </div>
          </div>
          </div>
          
          
          <!-- Modal propiedades-->
          <div class="modal fade lg" id="propiedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" align="center">Propiedades del archivo</h4>
          </div>
          <div class="modal-body" id="contenedorpropiedades">
          
          <form method="post">
          <input type="text" id="txtpropiedades" name="txtpropiedades" class="">
        
          
		  </form>
        
          </div>
          </div>
          </div>
          </div>
          
          

              <!-- modal crear carpeta -->
        			<div class="modal fade" id="crear_carpeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             		<div class="modal-dialog">
                	<div class="modal-content">
                  	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Crear carpeta</h4>
                 	</div>
                 	<div class="modal-body">
                      <form method="post">
                   <input type="text" placeholder="Nombre de la carpeta" class="form-control" name="txtnombrecarpeta" maxlength="30" required>
                  
                     <br>
                   </p>
<a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Crear carpeta" name="crear">

                       </form>
            <?php if($_POST['crear']=="Crear carpeta"){
				
				$permisos_compartir=$_POST['RadioGroup1'];
								$nom=$_POST['txtnombrecarpeta'];

				
				if($permisos_compartir==1){
					
					$sqlcarpeta="insert into carpeta values('', '$nom','$idusr','0')";
					}
					else{
						$sqlcarpeta="insert into carpeta values('', '$nom','$idusr','0')";
								   echo "<script>document.location ='misarchivos.php'</script>";

						
						}

				
				
				mysql_query($sqlcarpeta, $cnn);				
				
				
				} ?>
                
                </div>
                </div>
             	</div>
         		</div>
                
                <!-- modal permisos -->
                <div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Compartir</h4>
            </div>
            <div class="modal-body">
            <form method="post">
                <table>
        <td width="50%">
       
        <input type="radio" id="radios" name="radios" value="dpto">
                  <input type="text" id="txtpermisos" name="txtpermisos" class="hidden">

         Compartir con Departamento
         &nbsp;&nbsp;
        </td>
        <td width="50%">
        
		<input type="radio" id="radios" name="radios" value="usr" required>
        Compartir con Usuario
		</td>
        </table>
        <input type="text" name="buscador" id="buscador" placeholder="Usuario o departamento" class="form-control" >
        <br>
        <br>
            <div id="contenedormodal"></div>
          
        
            <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
           <input type="submit" class="btn btn-success" value="Guardar" name="crear">
		
		
		
           </form>
          </div>
          </div>
          </div>
 		  </div>
</div>
</div>

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" id="divpropiedades">
                     <input type="text" id="txtpropiedades" name="txtpermisos" class="">

    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<script src="Funciones/notificaciones.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>


<script>
$(document).ready(function() {
	
		setInterval("notificacion_arriba()", 1000);
		setInterval("notificacion_panel()", 1000);
		

				
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
	    $("#contenedormodal").load("ajaxpermisoarchivos.php", {buscar: busqueda, tipo:tipo, id:id_archivo }, function(){

			  });
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

$("txt").on("click",function() {
	
	
	var tst= $("#txt").val();            

alert("hola"); 
alert(tst);        
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


<!-- propiedades-->
<script>
$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	    $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){

			  });            
});
                
</script>
<!-- fin-->
<script>

$('#eliminar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});

$('#permisos').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});


    $('#sidebar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 alert (codigo)
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});



</script> 

<script>
	$(document).ready(function(){
		
		$("#btnguardar").hide();
$( "#txt" ).click(function() {
	alert("hola");
$("#btnguardar").show();

});

	
})</script>

<script>
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
</script>
   
</body>
</html>