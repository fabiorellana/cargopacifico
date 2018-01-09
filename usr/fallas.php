<?php require('include/valida.php');?>
<!DOCTYPE html>
<html>
<?php require('include/header.php');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="">

   <header class="main-header">
  <?php include_once "include/menu_arriba.php";?>
   </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
    <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>



  <!-- Desde aqui -->
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5" >
  
  
  </div>
<!-- ./wrapper -->
                


 

  

  <div class="control-sidebar-bg"></div>

<?php require('include/modals.php');?>

<?php require('include/footer.php');?>


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