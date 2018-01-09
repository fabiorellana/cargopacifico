
<?php
session_start();
error_reporting(0);
require("../../funciones/funciones.php");
$busq=$_POST['c'];
carga_trabajadores($busq);




	
?>

 
  <div class="modal fade"  id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">  
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  <h4 class="modal-title">Editar</h4>
  <div class="modal-body">
  <p id="tabla"></p>
  </div>   
  </div>
  </div>
  </div>
    
    <script>

$('#dataUpdate').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) // Botón que activó el modal
	
	 var codigo = button.data('id')	 

	
	 var consulta = codigo;
	 
	  $.ajax({
                    type: "POST",
                    url: "ajax/modal_editar_trabajadores.php",
                    data: "b="+consulta,
                    beforeSend: function(){
                          //imagen de carga
						
                          $("#tabla").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){
						                                                     
                          $("#tabla").empty();
                          $("#tabla").append(data);
						                                                               
                    }
              });
              
});
       
</script>