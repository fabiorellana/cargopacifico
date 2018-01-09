<?php 
//para la recarga de la pagina
$idget=$_GET['nombre'];

$idcarpeta= base64_decode($idget);
?>



<?php 
session_start();
include "../funciones/conexion.php";
$cnn=Conectar();
error_reporting(0);
$idusr=$_SESSION["idusr"];
$_SESSION["n_carpeta"]=$_GET['name'];
$id_dpto=$_SESSION["dpto"];
if(!$idusr){session_destroy(); header("location:../");}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intranet TCP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
<div class="navbar-fixed-top">
   <header class="main-header">
  <?php include_once "menu_arriba.php";?>
</header>
  
   <!-- Menu lateral -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
          <ul class="sidebar-menu">
        
       <?php  include_once("menu.php"); ?> 
        </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
</div>
</div>


  <!-- pagina -->
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5" >

				<br><br><br>
				  <ol class="breadcrumb">
                  <li><a href="compartidos_conmigo.php" >Compartidos conmigo</a></li>
                  <li class="active"><?php echo $_SESSION["n_carpeta"];?></li>
                  </ol>
                
        
                  
                    
                    
                
              <div>  
            
             
             <br>
             
       		
               
              
           <?php
		 $sql = "select int_archivos.id, int_archivos.nombre as nombre_archivo, ges_trabajadores.Nombre, int_dpto.dpto, int_archivos.fecha, int_archivos.descripcion, int_archivos.ruta from int_archivos INNER JOIN int_dpto 
			INNER JOIN ges_trabajadores where int_archivos.id_dpto=int_dpto.id and int_archivos.rut_usr_up=ges_trabajadores.Rut  and int_archivos.carpeta_id='$idcarpeta' and int_archivos.estado=1";
      echo $sql;
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
            <div class='panel panel-default'>
            <div class="panel-heading" style="height:3%">
            
            
            
            <acronym title="Archivo privado, solo tu puedes ver este archivo"> 
          <div align="right" style="margin-top:-15%">
          <?php if ($datos['privado']==1){echo "<i class='fa fa-lock' aria-hidden='true'></i>";}?>
		  </div>
          </acronym>
          </div>
            
       <div class="panel-body">
       
          
          
          <acronym title="<?php echo $datos['nombre_archivo']?>"><div align="center" style="font-size:11px;"><?php echo cutstring($datos['nombre_archivo'],23)?></div>
          <div class="panel-body" align="center">
          
          <?php $ext=$datos['tipo'];
		  $varext=extension($ext);


		  ?>
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
          </div>
          </acronym>
		
       </div> 
        	
            <div class="panel-footer">
          
            <div class="col-lg-4" style="margin-top:-8%;">
            <a href="<?php echo $datos['ruta']?>" ><i class="fa fa-download" aria-hidden="true"></i></a>
          	</div>
            <div class="col-lg-4" style="margin-top:-8%;">
     		<i class="fa fa-external-link" aria-hidden="true"></i>
         	</div>
            <acronym title="El archivo es compartido">
            <div align="right" style="margin-top:-8%" class="col-lg-4"> <?php if ($ponershare==true){echo "<i class='fa fa-share-alt' aria-hidden='true'></i>
";}?></div>
            </acronym>
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
            <h4 class="modal-title">Seleccionar carpeta</h4>
          	</div>
          	<div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdMover" class="hidden" name="txtidmover" >
            
            <select name="select_carpeta" class="form-control">
           	<option value="0">Principal</option>	  

            <?php $sql_carperta="select id, nombre from int_carpeta where id_usr=$idusr";
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
		   
		   $sqlmover="UPDATE `int_archivos` SET `carpeta_id` = '$id_carpeta' WHERE `int_archivos`.`id` = $idmover" ;
		   mysql_query($sqlmover, $cnn);
		echo "<script>document.location ='carpeta.php?nombre=".$idget."'</script>";
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
		
		$renombre="UPDATE `int_archivos` SET `nombre` = '$nuevonombre' WHERE `int_archivos`.`id` = $idarchivo";
		mysql_query($renombre, $cnn);
		echo "<script>document.location ='carpeta.php?nombre=".$idget."'</script>";

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
          <form method="post">
          <input type="text" id="txtIdeliminar" name="txtIdeliminar" class="hidden">
        <div align="center">  
        <input type="submit" value="Si" class="btn btn-danger btn-lg"  name="eliminar"/>
          <button class="btn btn-success btn-lg"  data-dismiss="modal">Cancelar</button>
          </div>
          
		  </form>
          <?php if($_POST['eliminar']=="Si"){
			 
			$ideliminar=$_POST['txtIdeliminar'];
			$sqleliminar="UPDATE `int_archivos` SET `estado` = '0' WHERE `int_archivos`.`id` = $ideliminar";
			echo $sqleliminar;
			mysql_query($sqleliminar, $cnn);
		echo "<script>document.location ='carpeta.php?nombre=".$idget."'</script>";

			  
			  }?>
          </div>
          </div>
          </div>
          </div>

          <!--modal permisos -->
            <div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Compartir Carpeta</h4>
            </div>
            <div class="modal-body">
            <form method="post">
                <table>
        <td width="50%">
       
        <input type="radio" id="radios" name="radios" value="dpto">
         <label>Compartir con Departamento </label>
         &nbsp;&nbsp;
        </td>
        <td width="50%">
        
		<input type="radio" id="radios" name="radios" value="usr" required>
        <label>Compartir con Usuario </label>
		</td>
        </table>
        <input type="text" name="buscador" id="buscador" placeholder="Usuario o departamento" class="form-control" >
        <br>
        
    
        
        <br>
            <div id="contenedormodal"></div>
          
        
            <a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Guardar" name="crear">
		
		
		
           </form>
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