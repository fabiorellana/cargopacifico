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
  
  <h2 align="center">Importar Excel Programación <br> para Centro: <?php echo $ccosto;?></h2>
  <br>
  <form method="post"  enctype="multipart/form-data" id="formulario">
  <div class="col-lg-12" align="center"> 
  <input id="archivo"  name="archivo" type="file"  />
  <br>  
  <input type="button" value="Importar" name="btnsi" class="btn btn-success">
  <br>
  </div>
  <div id="respuesta" align="center"></div>
  </form>
  </div>
  


<!-- ./wrapper -->

<?php require('include/footer.php');?>

<!-- propiedades-->


   
</body>
</html>
<script>
                    $(function(){
                    $("input[name='btnsi']").on("click", function(){
                    var formData = new FormData($("#formulario")[0]);
                    var ruta = "controllers/centro/importar_prog.php";
                    $.ajax({
                    url: ruta,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                    $("#respuesta").html('<div align=""><img src="../images/ajax-loader.gif"/></div>');
                    },
                    success: function(datos){
                    swal("Importación de diaria", "Exitosa!", "success")
                    $("#respuesta").html('');
                    },
                    always : function(){
                      swal("Importación de diaria", "Exitosa!", "success")
                    }
                    });
                    });
                    });

</script>