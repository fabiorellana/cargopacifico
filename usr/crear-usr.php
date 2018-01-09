<?php require ('include/valida.php');?>
<!DOCTYPE html>
       <html>
<?php require ('include/header.php');?>
<body class="hold-transition skin-blue sidebar-mini">
       <div class="">

       <header class="main-header">
<?php include_once "include/menu_arriba.php";?>
</header>


       <aside class="main-sidebar">
       <section class="sidebar">
       <ul class="sidebar-menu">
<?php include "include/menu.php";?></ul>
       </section>
       </aside>


       </div>



  <!-- pagina -->

 <div class="content-wrapper " >

 <br>
 <br class="hidden-xs">
 <br class="hidden-xs">





              <div class="container-fluid"  >
              <br>
              <div class="col-sm-offset-2 col-sm-8">
              <h3 class="text-center"> <small class="mensaje"></small></h3>
              </div>
              <div class="table-responsive col-sm-12">
              <table id="dt_user" class="table table-bordered table-hover table-condensed" width="100%"  style="background-color: white;">
              <thead>
              <tr>
              <th>Rut</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>Centro</th>
              <th></th>
              </tr>
              </thead>
              </table>
              </div>

              </div>


         <br>
  <div class="col-lg-2 col-xs-5"> <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#crea_usr_no" ><i class="fa fa-plus" aria-hidden="true" > &nbsp;Crear Usuarios no Trabajador</i></a> </div>
 </div>


             <!-- modal permisos-->
             <div class="modal fade" id="modalpermisos" >
             <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">Asignar permisos y sistemas</h4>
             </div>
             <div class="modal-body" >
             <input type="text" name="" id="txtrutt" value="" class="form-control " disabled="">
             <input type="text" name="" id="txtname" value="" class="form-control hidden" >
             
             Mail
             <input type="text" id="txtmail" value="" placeholder="Ejemplo@cargopacifico.cl" class="form-control">
             

<div class="col-lg-12"><br /><h3>Sistemas</h3></div>
<div class="col-lg-6">   <input type="checkbox" id="adminusr" value="1" />Administrar usuarios</div>
<div class="col-lg-6">   <input type="checkbox" id="progprog" value="1" />Programación Programador<br /></div>
<div class="col-lg-6">   <input type="checkbox" id="progdep" value="1" />Programación jefe deposito <br /></div>
<div class="col-lg-6">   <input type="checkbox" id="adminprog" value="1" />Administrar programación <br /></div>
<div class="col-lg-6">   <input type="checkbox" id="cc_usu"  value="1" />C. Corriente usuario <br /></div>
<div class="col-lg-6">   <input type="checkbox" id="cc_admin"  value="1" />C. Corriente Admin <br /></div>
<div class="col-lg-6">   <input type="checkbox" id="flota1"  value="1" />Flota estado<br /></div>
<div class="col-lg-6">   <input type="checkbox" id="flota2"  value="1" />Flota gestion<br /></div>
<div class="col-lg-6">   <input type="checkbox" id="botelleros"  value="1" />Botelleros <br /></div>
<br />
<br>

             </div>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
           <div class="modal-footer">
           <button type="button" class="btn btn-primary pull-left">Recuperar contraseña</button>
           <button type="button" class="btn btn-success" id="btncrearusuario">Crear</button>

           </div>
             </div>
             </div>
             </div>
             </div>
             <!-- fin modal permisos -->










            <!-- modal crear departamento o deposito -->

            <div class="modal fade" id="crear_dpto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="" align="center">Crear Departamento</h2>
            </div>
            <div class="modal-body"></div>
            </div>
            </div>
            </div>

            <!-- fin modal-->

                    <!--Modal crear gerencia -->
                    <div class="modal fade" id="crear_grncia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2  align="center">Crear Gerencia</h2>
                    </div>
                    <div class ="modal-body">
                    <form role="form" method="post" id="form_gerencia">
                    <div class="form-group col-lg-12">
                    <label class="control-label" for="exampleInputPassword1">Nombre</label>
                    <input class="form-control" i placeholder="" type="text" id="txt_nombre" required name="txtnombre">
                    <br />
                    <div align="center">
                    <input type="submit" class="btn btn-primary btn-lg" name="btn_crear_gerencia" value="Registrar">
                    </div>
                    </div>
                    <br />
                    </form>

<div class="table-responsive col-sm-12">
                    <table id="dt_gerencia" class="table table-bordered table-hover" width="100%"  style="background-color: white">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    </tr>
                    </thead>
                    </table>
                    </div>
                    </div>
                    <div class="modal-footer"></div>
                    </div>
                    </div>
                    </div>
                    <!-- fin modal -->


    <!--modal de carga -->
                            <div class="modal fade" id="modalcargando" >
                            <div class="modal-dialog">
                            <div class="modal-content">
                            
                            <div class="modal-body">
                            <div align="center">
                              <img src="../images/cargando.gif" align="center">
                            </div>
                            
                            </div>
                            
                            </div>
                            </div>
                            </div>


                 <!-- Crear usuario no trabajador-->
                 <div class="modal fade" id="crea_usr_no" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                 <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h2  align="center">Crear Usuario no trabajador</h2>
                 </div>
                 <div class="modal-body">
                 <form role="form" method="post">
                 <div class="form-group col-lg-12">

                 <div class="col-lg-12">
                 <label class="control-label" for="exampleInputPassword1">Nombre Completo</label>
                 <input class="form-control" i placeholder="" type="text" id="txtnombre" required name="txtnombre">
                 </div>

                 <div class="col-lg-10">
                 <label class="control-label" for="exampleInputPassword1">Rut</label>
                 <input class="form-control" i placeholder="" type="text" id="txtRut" required name="txtRut">
                 </div>
                   <div class="col-lg-2">
                 <label class="control-label" for="exampleInputPassword1">dv</label>
                 <input class="form-control" i placeholder="" type="text" id="txtdv" required name="txtdv">
                 </div>

                 <div class="col-lg-12">
                 <label class="control-label" for="exampleInputPassword1">Correo</label>
                 <input class="form-control" i placeholder="" type="mail" id="txtcorreo" required name="txtMail">
                 </div>
                <div class="col-lg-12">
                <br>
                Sistemas
                <br>
                    <input type="checkbox" name="vehicle" value="1" id="chkInterplanta"> Interplanta<br>

                </div>
                 <div align="center" class="col-lg-12">
                 <br>
                 <div id="responseguarda"> </div>
                 <div  class="btn btn-primary " name="btnCreausrno" id="btnCreausrno" >Crear
                </div>

                 </div>
                 </div>
                 <br />
                 </form>

                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 </div>
                 <div class="modal-footer"></div>
                 </div>
                 </div>
                 </div>

<script >


</script>

  </body>



<?php require ("include/footer.php");?>


                      <script>
            $(document).ready(function() {
           
            datatableusuarios();
            verificarRut();
      $("#btnColapse").trigger("click");

            });







                                
                 
        function datatableusuarios(){
                   //carga datatable
              $.ajax({
              url: 'controllers/usuarios/usuariosajax.php',
              method: 'POST',
              async: false,
              data: { 
              funcion : 'tblusuarios'
              },
              dataType: 'json',
              beforeSend: function () {
              
              },
              success: function (data) {
              
              if(data.length>0){
              var datos = [];
              $.each(data, function (i, item) {
              var obj = [
              item.Rut,
              item.Nombre,
              item.cargo,
              item.centro,
              null
              ];
              // jsonListaDuplicados
              datos.push(obj);
              });
              $('#dt_user').DataTable().destroy();
              var tabla = $('#dt_user').DataTable({ 
              data: datos,
              "columns":[
              {
              width: "20%",
              data: datos.Rut,
              },
              {
              width: "20%",
              data: datos.Nombre,
              },
              {
              width: "20%",
              data: datos.cargo,
              },
              {
              width: "20%",
              data: datos.centro,
              },
            
              {
              width: "20%",
              data: null,
              //crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
              "render": function ( data, type, row ) {
              return '<div align="center"><button class="btn btn-primary btn-xs" onclick="Crearusuario(\''+row[0]+'\', \''+row[1]+'\');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>';
              }
              }
              
              ],
              "language":{
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
              },
              "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
              }
              });
              tabla.responsive.recalc().columns.adjust().draw();
              }
              else{
              $('#dt_user').DataTable().destroy();
              $('#dt_user').DataTable().clear();
              $('#dt_user').DataTable().draw();
              }
              }, 
              error: function (jqXHR, textStatus, errorThrown) {
              $('#modalcargando').modal('hide');
              console.log('error');
              }
              });
                }


    function Crearusuario(rut, nombre){
     $("#txtrutt").val(rut);
     $("#txtname").val(nombre);

      $.ajax(
      {
      url: 'controllers/usuarios/usuariosajax.php',
      method: 'POST',
      async: true,
      type: 'json',
      data: {
      funcion:"consultapermisos",
      rut:rut
      },
      beforeSend: function () {
      $("#modalcargando").modal("show");
      },
        success: function (data) {
        $("#modalcargando").modal("hide");
        var aux = JSON.parse(data);
        
        $('#adminusr').prop('checked', false);
        $('#progprog').prop('checked', false);
        $('#progdep').prop('checked', false);
        $('#adminprog').prop('checked', false);
        $('#cc_usu').prop('checked', false);
        $('#cc_admin').prop('checked', false);
        $('#flota1').prop('checked', false);
        $('#flota2').prop('checked', false);
        $('#botelleros').prop('checked', false);
        if(aux.length>0){
        $.each(aux, function(id, dato){
       $("#txtmail").val(dato.mail);
          if(dato.Administrar_usuarios==1){
            $('#adminusr').prop('checked', true);
          } 

           if(dato.Programacion_programador==1){
            $('#progprog').prop('checked', true);
          } 

          if(dato.programacion_deposito==1){
            $('#progdep').prop('checked', true);
          }

           if(dato.Administrar_programacion==1){
            $('#adminprog').prop('checked', true);
          } 

           if(dato.cc_usu==1){
            $('#cc_usu').prop('checked', true);
          }

              if(dato.cc_admin==1){
            $('#cc_admin').prop('checked', true);
          }

               if(dato.flota_1==1){
            $('#flota1').prop('checked', true);
          } 

          if(dato.flota_2==1){
            $('#flota2').prop('checked', true);
          }

           if(dato.botelleros==1){
            $('#botelleros').prop('checked', true);
          }


        });
          }
      },
      error: function (jqXHR, textStatus, errorThrown ) {
      swal("Error", "", "error");
      
      }
      });

      $("#modalpermisos").modal("show");
   
    }

$("#btncrearusuario").on("click", function(){

    if( $('#adminusr').prop('checked') ) {
    var adminusr   =$("#adminusr").val();
    }
    if( $('#progprog').prop('checked') ) {
    var progprog   =$("#progprog").val();
    }
    if( $('#progdep').prop('checked') ) {
    var progdep    =$("#progdep").val();
    }
    if( $('#adminprog').prop('checked') ) {
    var adminprog  =$("#adminprog").val();
    }
    if( $('#cc_usu').prop('checked') ) {
    var cc_usu     =$('#cc_usu').val();
    }
    if( $('#cc_admin').prop('checked') ) {
    var cc_admin   =$('#cc_admin').val();
    }
    if( $('#flota1').prop('checked') ) {
    var flota      =$('#flota1').val();
    }
     if( $('#flota2').prop('checked') ) {
    var flota2      =$('#flota2').val();
    }
    if( $('#botelleros').prop('checked') ) {
    var botelleros =$('#botelleros').val();
    }

 var rut =$('#txtrutt').val();
  var mail =$('#txtmail').val();
var usrnombre=$("#txtname").val();

$.ajax(
{
url: 'controllers/usuarios/usuariosajax.php',
method: 'POST',
async: true,
data: {
funcion:"crearusuarios",
adminusr:adminusr,
usrnombre:usrnombre,
progprog:progprog,
progdep:progdep,
adminprog:adminprog,
cc_usu:cc_usu,
cc_admin:cc_admin,
flota:flota,
flota2:flota2,
botelleros:botelleros,
rut:rut,
mail:mail
},
beforeSend: function () {
$("#modalcargando").modal("show");
},
success: function (data) {
  $("#modalcargando").modal("hide");
swal("Usuario creado!", "", "success");


},
error: function (jqXHR, textStatus, errorThrown ) {
swal("Error", "", "error");
console.log(textStatus)
}
});

})


function verificarRut(){
$("#nombre").focus(function(evento){
var rut = $("#rut").val();
var validador = $("#dv").val();
evento.preventDefault();
$('#destinorut').html('<div><img src="../images/ajax-loader.gif"/></div>');
$("#destinorut").load("../funciones/verificarrut.php", {Rut: rut, Verf: validador}, function(){ })
});
}


$("#btnCreausrno").click(function(){
      
     var nombre = $("#txtnombre").val();
     var rut = $("#txtRut").val();
     var dv = $("#txtdv").val();
     var correo =  $("#txtcorreo").val();
     var rut_completo= rut + "-" +  dv;
     
     $.ajax(
     {
     url: 'controllers/usuarios/usuariosajax.php',
     method: 'POST',
     async: true,
     data: {
     funcion:"crearsocio",
     nombre:nombre,
     correo:correo,
     rut_completo:rut_completo
     },
     beforeSend: function () {
     $("#modalcargando").modal("show");
     },
     success: function (data) {
     $("#modalcargando").modal("hide");
     swal("Socio creado!", "", "success");
     
     
     },
     error: function (jqXHR, textStatus, errorThrown ) {
     swal("Error", "", "error");
     console.log(textStatus)
     }
     });
})



  
  </script>

</html>