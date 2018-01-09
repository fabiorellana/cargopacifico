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
<?php 
require_once './Clases/Oca.php';
?>
<br><br><br>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <h3>
    Gestión de la Facturación CCU
    </h3>

        Seleccione Quincena: 
        <select class="form-control" id="quincena">
            <option value="1">Primera</option>
            <option value="2">Segunda</option>
        </select>
   
        Seleccione Mes: 
        <select id="mes" class="form-control">
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
        <select id="year" class="form-control">
	        <?php
	        echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
	        echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
	        ?>
        </select>
        
        <br>
        <button class="btn btn-primary" id='consultar' onclick="consultar();">Consultar</button>

</div>
<div class="clearfix"></div><br>
	<div class="col-sm-12 col-md-6 col-lg-4">
	<div id="mensajeria" class="panel panel-primary">
	<div class="panel-body">
	<div id="totalRegistros"></div>
	<div id="ceros"></div>
	<div id="duplicados"></div>
	<div id="monto"></div>
	</div>
	</div>
	</div>
</div>
<!-- ./wrapper -->
                


 

  

  <div class="control-sidebar-bg"></div>

<?php require('./include/modals.php');?>

<?php require('./include/footer.php');?>


<script>
function consultar(){
	// Indicar cuantos registros hay para la quincena indicada
	// Indicar cuantos duplicados hay en la quincena indicada
	// Indicar Monto Total a Facturar
	$("#mensajeria").show();
	var quincena = $("#quincena").val();
	var mes = $("#mes").val();
	var ano = $("#year").val();
	//Inicio ajax
    $.ajax(
        {
            url: './ajax/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonPeriodo',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                $("#totalRegistros").html("Cantidad de registros ingresados: <b>" + data + "</b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax
	//Inicio ajax
    $.ajax(
        {
            url: './ajax/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonMonto',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                $("#monto").html("Monto a facturar: <b>$ " + data + ".- </b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax
	//Inicio ajax
    $.ajax(
        {
            url: './ajax/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonCeros',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                $("#ceros").html("Cantidad de Tramos en cero: <b>" + data + "</b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax

//Inicio ajax
    $.ajax(
        {
            url: './ajax/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonDuplicadas',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
            	var count = Object.keys(data).length; // cuenta el contenido del json
                $("#duplicados").html("Cantidad de Ordenes duplicadas: <b>" + count + "</b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax
}
$(document).ready(function() {
	$("#mensajeria").hide();
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