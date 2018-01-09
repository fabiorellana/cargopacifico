<!DOCTYPE HTML>
<html>
 <head>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script>
     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
				processData: false,
				beforeSend: function () {
				$("#respuesta").html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');
				},
				success: function(datos)
				{
					$('#respuesta').fadeIn(1000).html(datos);
                    
                }
            });
        });
     });
    </script>
 </head>
 <body>
 <form method="post" id="formulario" enctype="multipart/form-data">
    Subir imagen: <input type="file" name="file">
 </form>
  <div id="respuesta"></div>
 </body>
</html>