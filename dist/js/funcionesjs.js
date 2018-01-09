
function notificacion_arriba(){
$("#cantidad_noti").load("../usr/ajax/notificacion_numero.php");

}

function notificacion_panel(){
$("#noti_panel").load("../usr/ajax/notificacion_panel.php");

}



//variables a modal
$('#mover').on('show.bs.modal', function (event) {
 var button = $(event.relatedTarget); // Botón que activó el modal	
 var codigo = button.data('id');
 var consulta = codigo;       
 $("#txtIdMover").val(consulta);            
});
                

$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
  var codigo = button.data('id');
  var consulta = codigo;       
  $("#txtIdnombre").val(consulta);            
});
                

$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
  var codigo = button.data('id');
  var consulta = codigo;       
  $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){
			  });            
});
                


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


    

//muestra imagen de carga mientras sube archivo
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
