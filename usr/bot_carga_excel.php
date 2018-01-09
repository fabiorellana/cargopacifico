<!DOCTYPE html>
<html>
<?php require("include/header.php");?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="">

   <header class="main-header">
  <?php include_once "include/menu_arriba.php";?>
   </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
    <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "./include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>



  <!-- Desde aqui -->
  
  <div class="content-wrapper"  style="background-color:#ECF0F5" >

<br><br><br>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <h3>
    Carga de archivos de Facturación CCU-Interplantas
    </h3>
    <a href="./archivos/_formato_fact_interplanta.xlsx">Descargar Formato Excel</a><br><br>
    <form name="importa" id="importa" method="post" enctype="multipart/form-data" >
        Seleccione Quincena: <select class="form-control" name="quincena">
            <option value="1">Primera</option>
            <option value="2">Segunda</option>
        </select>
   
        Seleccione Mes: 
        <select name="mes" class="form-control">
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        </select>
        Seleccione Año:
        <select name="year" class="form-control">
	        <?php
	        echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
	        echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
	        ?>
        </select>
        
        <br>
        Seleccione archivo Excel:
        <input class="btn btn-default" type="file" name="excel" /><br/><br/>
        <input class="btn btn-primary" type='submit' name='enviar' value="Importar" />
        <input type="hidden" value="upload" name="action" />
    </form>
</div>
<div class="clearfix"></div><br>
<div class="col-sm-12 col-md-6 col-lg-4">
<div id="mensajeria" class="panel panel-primary">
  <div class="panel-body" id="mensaje">
	
	</div>
	</div>
	</div>
</div>
<!-- ./wrapper -->
                
<div class="modal fade" id="modalCargando" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cargando...</h4>
            </div>
            <div class="modal-body text-center">
					<img src="../images/cargando.gif" border="0" />
            </div>
        </div>

    </div>
</div>
<div class="control-sidebar-bg"></div>
<?php require('./include/modals.php');?>
<?php require('./include/footer.php');?>

<script>
$(document).ready(function() {
	$("#mensajeria").hide();
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
    $(function(){
        $("#importa").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("importa"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "bot_carga_excel_upload.php",
                async:false,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false,
	     beforeSend: function () {
            	$('#modalCargando').modal('show');
            	$("#mensajeria").hide();
            },
            success: function (data) {
            	$('#modalCargando').modal('hide');
            	$("#mensajeria").show();
            },
            error: function (error) {
				console.log("Error:" + error);
				$('#modalCargando').modal('hide');
				$("#mensajeria").show();
            }
            })
                .done(function(res){
                    $("#mensaje").html(res);
                });
        });
    });

</script>
                
<script>
$('#mover').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>
<script>

$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdnombre").val(consulta);            
});
                
</script>

<!-- propiedades-->
<script>
$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	    $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){

			  });            
});
                
</script>
<!-- fin-->
<script>

$('#eliminar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});

$('#permisos').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});


    $('#sidebar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 alert (codigo)
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});

 </script> 

<script>
	$(document).ready(function(){
		
		$("#btnguardar").hide();
	
})</script>

<script>
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
</script>
   
</body>
</html>