            
             <div class="modal fade " id="Propiedades" tabindex="-5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Propiedades</h4>
              </div>

              <div class="container user-menu">
				<form method="post" id="formulario" enctype="multipart/form-data">
				Subir imagen: <input type="file" name="file">
				</form>
				<div id="respuesta"></div>
				
			  </div>

              <div class="modal-footer"></div>
              </div>
              </div>
              </div>
		

<script src="../dist/js/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="../dist/js/chosen.jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$(".numeric").keypress(function(evt){
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode != 45 &&charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
   }
   return true;
});
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../dist/js/bootstrap.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dist/js/jquery.knob.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../dist/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../dist/js/jquery.slimscroll.min.js"></script>

<!-- validador de rut -->
<script src="../dist/js/jquery.rut.chileno.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<!-- Sweet alert-->
<script src="../dist/js/sweetalert2.min.js"></script>



<script src="../dist/js/funcionesjs.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



                         <!-- Modal -->
                            <div id="modalcambiapass" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cambiar Contraseña</h4>
                            </div>
                            <div class="modal-body" >
                            <div class="">
                            <form class="form-horizontal" role="form">

                            <div class="form-group col-lg-11">
                            <label for="ejemplo_email_3" class="control-label" >Contraseña actual</label>
                            <br>
                            <input type="password" class="form-control" id="passactual" placeholder="Contraseña actual" onkeyup="verificapass()">
                            </div>
                            <br>
                            <br>
                            <div class="col-lg-1" id="verifica">
                              
                            </div>

                           <div class="form-group col-lg-12">
                            <label for="ejemplo_email_3" class="control-label">Nueva Contraseña </label>
                            <br>
                            <input type="password" class="form-control" id="pass1"  placeholder="Contraseña" disabled="">
                            La contraseña debe tener minimo 8 digitos
                            </div>

                           <div class="form-group col-lg-11">
                            <label for="ejemplo_email_3" class="control-label">Confirmar Contraseña </label>
                            <br>
                            <input type="password" class="form-control" id="pass2" disabled=""     placeholder="Contraseña" onkeyup="verifica();">
                            </div>
                            <br>
                            <br>
                              <div class="col-lg-1" id="verifica2">
                              
                            </div>
                            <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            
                            </div>
                            </div>
                            </form>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button  class="btn btn-primary"  id="btncambiapass" disabled="" onclick="cambiapass()">Guardar</button>
                            </div>
                            </div>
                            </div>
                            </div>


<script>


$(document).ready(function() {
		//setInterval("notificacion_arriba()", 5000);
		//setInterval("notificacion_panel()", 5000);
       $('.input_rut').rut();//
});
function moneda(num){
  return num.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
}
$("#cambiapass").click(function(){
$("#modalcambiapass").modal("show");
})

function verificapass(){
var pass=$("#passactual").val();

                $.ajax({
                url: 'controllers/usuarios/usuariosajax.php',
                type: "POST",
                data: {password:pass,
                funcion:'verificapass'},
                dataType: 'json',
                beforeSend: function () {
                $("#respuesta").html('<div align=""><img src="../images/ajax-loader.gif"/></div>');
                },
                success: function(datos)
                {
              if(datos==1)
                {
                $("#verifica").html('<div style="color=green">✔</div>');
                $( "#pass1" ).prop( "disabled", false );
                $( "#pass2" ).prop( "disabled", false );
                  }
                else
                {
                  $("#verifica").html('<div>X</div>');
                  $( "#pass1" ).prop( "disabled", true );
                  $( "#pass2" ).prop( "disabled", true );
                }

                }
                });
}

function verifica(){
var pas1=$("#pass1").val();
var pas2=$("#pass2").val();
if (pas1==pas2 && pas1.length>=8){
 $("#verifica2").html('<br class="hidden-xs"><br class="hidden-xs"><div style="color=green">✔</div>');
 $( "#btncambiapass" ).prop( "disabled", false );
}else{$("#verifica2").html('<br class="hidden-xs"><br class="hidden-xs"><div style="color=green">X</div>');  $( "#btncambiapass" ).prop( "disabled", true );}
}

function cambiapass(){
 var pas1=$("#pass1").val();
             
                      $.ajax({

                    url: 'controllers/usuarios/usuariosajax.php',

                      method: 'POST',

                      async: false,

                      data: { 

                      funcion : 'updatepass',

                      pas1:pas1,

                      },

                      beforeSend: function () {

                      },

                      success: function (data) {

                      swal('Contraseña Cambiada exitosamente','Se envio su nueva contraseña a su correo @cargopacifico.cl','success');
                      $("#pass1").val('');
                      $("#pass2").val('');
                      $("#passactual").val('');
                                  }

                      })

}






     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "controllers/personaliza/imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
				processData: false,
				beforeSend: function () {
				$("#respuesta").html('<div align=""><img src="../images/ajax-loader.gif"/></div>');
				},
				success: function(datos)
				{
					 swal({
            title: '¿Usar imagen como avatar?',
            text: "",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            animation: true,
            allowOutsideClick: false
            }).then(function () {
            $('#respuesta').fadeIn(1000).html(datos);
            });
					
                    
                }
            });
        });
     });




     //traduccion datapicker
     $.datepicker.regional['es'] = {
         closeText: 'Cerrar',
         prevText: '< Ant',
         nextText: 'Sig >',
         currentText: 'Hoy',
         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
         weekHeader: 'Sm',
         dateFormat: 'yy/mm/dd',
         firstDay: 1,
         isRTL: false,
         showMonthAfterYear: false,
         yearSuffix: ''
         };
$.datepicker.setDefaults($.datepicker.regional['es']);

    </script>