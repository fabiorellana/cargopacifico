
<!DOCTYPE html>
<html>
<?php require('include/header.php')?>

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


  <!-- pagina -->
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5" id="contenedor" >
  <br><br><br>
			
                    
         <div class="row">
          <div class="col-md-offset-3 col-md-6"> 
         <h3 align="center"> Editar Usuario </h3>
          <form role="form"> 
          <div class="form-group"> 
          <div class="input-group">
           <input type="text" class="form-control" placeholder="Buscar por Usuario o departamento" id="busquedausr"> 
           <span class="input-group-btn">
            <a class="btn btn-success" type="submit">Buscar</a> 
           
            </span>
           
             </div>
             </div>
            </form>
           </div>
          </div>
          <div id="destino"></div>
         
            
            

      
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


<?php require('include/footer.php');?>


<script>
$(document).ready(function() {
	
	
	  var parametros = {
                "c" : ""                
        };                                                        
              $.ajax({
                    type: "POST",
                    url: "todosusr.php",
                    data: parametros, 
                    beforeSend: function(){
                          //imagen de carga
                          $("#destino").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#destino").empty();
                          $("#destino").append(data);
                                                             
                    }
              });
	
		//setInterval("notificacion_arriba()", 1000);
		//setInterval("notificacion_panel()", 1000);
		
				
					
						        
        var consultaclub;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busquedausr").focus();
                                                                           
        //comprobamos si se pulsa una tecla
        $("#busquedausr").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busquedausr").val();
			                       
              //hace la búsqueda
            var parametros = {
                "c" : consulta                
        };                                                        
              $.ajax({
                    type: "POST",
                    url: "todosusr.php",
                    data: parametros, 
                    beforeSend: function(){
                          //imagen de carga
                          $("#destino").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#destino").empty();
                          $("#destino").append(data);
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});

</script>
    
</body>
</html>