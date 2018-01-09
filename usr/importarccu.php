<?php require('include/valida.php');?>
<!DOCTYPE html>
<html>
<?php
require('include/header.php');
?>
       <body class="hold-transition skin-blue sidebar-mini">
       <div class="">
       
       <header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
  
  <div class="content-wrapper "  style="background-color:#ECF0F5" >
  <br><br><br>
  
  <h2 align="center">Importar Excel Saldo cuenta corriente</h2>
  <br>
  <form method="post"  enctype="multipart/form-data" id="importa" name="importa">
  <div class="col-lg-12" align="center"> 
  <input class="btn btn-default" type="file" name="excel" /><br/><br/>
  <br>  
  <input class="btn btn-primary" type='submit' name='enviar' id='enviar' value="Importar" />  <br>
  <br><br>
  </div>
  <div id="respuesta" align="center" ></div>
  </form>
  <button type="button" onclick="compara();">Compara</button>
  </div>
  

     


<!-- ./wrapper -->

<?php require('include/footer.php');?>

<!-- propiedades-->


   
</body>
</html>
<script>
                   
              
             


                        $(function(){
                        $("#importa").on("submit", function(e){
                        e.preventDefault();
                        var formData = new FormData(document.getElementById("importa"));
                        formData.append("dato", "valor");
                        $.ajax({
                        url: "controllers/cuentacorriente/importarcuentac.php",
                        async:true,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend:function() {
                         $("#respuesta").html('<div align=""><img src="../images/ajax-loader.gif"/></div>');
                         $('#enviar').attr("disabled", true);
          
                                 },
                        success: function(data) {
                          $("#respuesta").html('');
                          console.log(data);
                          $('#enviar').attr("disabled", false);

                        },
                        error: function (error) {
                        console.log("error")
                        }
                        })
                        
                        });
                        });


                                 
                                 function compara(){

                                $.ajax({
                                // la URL para la petición
                                url : 'controllers/cuentacorriente/ctocorriente_ajax.php',
                                data : { Accion:'compara'},
                                type : 'post',
                                success : function(aaa) {
                                    console.log(aaa);
                                },
                                error : function(xhr, status) {
                                swal('Disculpe, existió un problema', 'warning');
                                },
                                
                                // código a ejecutar sin importar si la petición falló o no
                                complete : function(xhr, status) {
                                alert('Petición realizada');
                                }
                                });
                                 }

   

</script>