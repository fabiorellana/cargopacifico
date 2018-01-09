<?php require('include/valida.php');?>
<html>


       <?php require("include/header.php");
      
       ?><body class="hold-transition  sidebar-mini skin-blue" >
       <header class="main-header">
       <?php include_once "include/menu_arriba.php";?>
       </header>
       
       
       <aside class="main-sidebar">
       <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "include/menu.php";?> 
       </ul>
       </section>
       </aside>

       <body>
       
      
       <div class="content-wrapper"  style="background-color:#ECF0F5" id="asd" >
       
       <br class="hidden-xs" />
       <br class="hidden-xs" />
       <br />
       <ol class="breadcrumb"><li><a href="crear_programacion.php" >Crear Programación</a></li></ol>
       
       <div class="container" >


              <div class="col-lg-12">
              <div class="col-lg-4">
              <div class="info-box ">
              <span class="info-box-icon bg-red"><i class="fa fa-id-card" aria-hidden="true" style="position:absolute; margin-top:18px; margin-left:-25px"></i>
              </span>
              <div class="info-box-content">
              <span class="info-box-text" >Conductores Disponibles</span>
              <span class="info-box-number" id="cant_cond"></span>
              </div>
              </div>
              </div>

              <div class="col-lg-4" >
              <div class="info-box " data-toggle="modal" data-target="#ver_listado_trabajadores_disponible">
<span class="info-box-icon bg-red" id="cont_ayu"   ><i class="fa fa-users" aria-hidden="true" style="position:absolute; margin-top:18px; margin-left:-25px"></i> </span>
              <div class="info-box-content">
              <span class="info-box-text">Ayudantes Disponibles</span>
              <span class="info-box-number" id="ccc"  ></span>

                       
              </div>
              </div>
              </div>

              <div class="col-lg-4">
              <div class="info-box ">
              <span class="info-box-icon bg-red"><i class="fa fa-truck" aria-hidden="true" style="position:absolute; margin-top:18px; margin-left:-25px"></i>
              </span>
              <div class="info-box-content">
              <span class="info-box-text">Camiones Disponibles</span>
              <span class="info-box-number"></span>
              </div>
              </div>
              </div>           
              </div>   


<div class="col-lg-12 ">
                       

<div class="col-lg-6"  id="Btnhonorarios">
                        <span><button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#modalHonorarios"><i class="fa fa-external-link" aria-hidden="true"></i>
                        &nbsp;Crear honorarios
                        </button></span>
                         <span><button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#" id="btnActivaHonorarios"><i class="fa fa-external-link" aria-hidden="true"></i>
                        &nbsp;Programar honorarios
                        </button></span>
</div>
<div class="col-lg-6 pull-right">
<div align="right">
Ordenar por
<select name="" id="ordenar">
<option value="N_cargas">Cargas</option>
<option value="Planilla">N° planilla</option>
<option value="Corte_ccu">Corte</option>
<option value="N_cliente">Clientes</option>
<option value="cod_chofer">Pendientes</option>
</select>
</div>  
</div>   
</div>     
<div class="container" id="contenedor">


</div>
</div>
 </body>
            <!-- modal ingreso programacion-->
            
            <div class="modal fade" id="crear_programacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Crear programación</h4>
            </div>
            <div class="modal-body">
            <div id="result"></div>
            </div>
            <div class="modal-footer"></div>
            </div>
            </div>
            </div>
          
        <!-- modal lista ayudantes-->
              <div class="modal fade " id="ver_listado_trabajadores_disponible" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" >
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" align="center">Ayudantes Disponibles</h4>
              </div>
              <div class="modal-body">
              <div class="container-fluid"  >
               <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#modalFallas"><i class="fa fa-external-link" aria-hidden="true"></i>
&nbsp;Ver Fallas</i>
                        </button>
              <div class="table-responsive col-sm-12">    
              <table id="ayu_no" class=" table-condensed "   >
              <thead>
              <tr>  
              <th>Codigo</th>               
              <th>Nombre</th>
              <th>Falla</th>                 
              </tr>
              </thead>          
              </table>
           
              </div>      
              </div>
              <div id="funciona"></div>
              </div>
              <div class="modal-footer"> 
              <div align="center"><button data-dismiss="modal" class="btn btn-success "><i class="fa fa-floppy-o" aria-hidden="true"></i>
  &nbsp;Guardar</button></div>
             </div>
              </div>
              </div>
              </div>
              <!--fin modales-->
          

          <!-- modal fallas -->

                 <div class="modal fade" id="modalFallas" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Fallas del dia</h4>
            </div>
            <div class="modal-body" >
              <div class="table-responsive ">    
              <table id="fallasAyudantesTable" class="table compact table-striped" align="center">
              <thead>
              <tr>  
              <th>Rut</th>               
              <th>Nombre</th>
              <th>Presente</th>                
              </tr>
              </thead>          
              </table>
              </div>
            </div>
               <div class="modal-footer">
               <div align="center"><button data-dismiss="modal" class="btn btn-success "><i class="fa fa-floppy-o" aria-hidden="true"></i>
               &nbsp;Guardar</button></div>
               </div>
            </div>
            </div>
            </div>
          
          
            <div class="modal fade" id="cambio_programacion" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"> Solicitar cambios para planilla</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="controllers/programacion/envia_solicitud.php">
            <input type="text" id="id_planilla"  name="txt_idplanilla"value="" class="hidden" />
            Motivo
            <textarea name="txtreclamo"  class="form-control" placeholder="Motivo de cambio" required ></textarea>
            <br />
            <div align="center"><input name="btnenviarsolicitud" type="submit" value="Enviar Solicitud" class="btn btn-success" /></div>
            </form>
            
               
            </div>
            <div class="modal-footer"></div>
            </div>
            </div>
            </div>

<!-- programar honorarios -->
            <div class="modal fade" id="modalHonorarios" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Ingreso de datos honorarios</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="controllers/programacion/creaHonorarios.php">
            <div class="form-group">
           <div class="col-lg-6">Rut<input type="text" name="txtRut" class="form-control"></div>
           <div class="col-lg-2">Dv<input type="text" name="txtdv" class="form-control"></div>

           <div class="col-lg-8">Nombre completo<input type="text" name="TxtNombres" class="form-control"></div>
           <div class="col-lg-4">Telefono<input type="text" name="txttelefonos" class="form-control"></div>
           <div class="col-lg-7">Dirección<input type="text" name="txtdireccion" class="form-control"></div>
           <div class="col-lg-5">Centro<div id="centroCostolist"></div><br></div>
           
            <div align="center">
            <br>
            <div class="col-lg-12">
            <input name="btnenviarsolicitud" type="submit" value="Crear" class="btn btn-success" />
            </div>
            </div>
            </div>
            </form>
            
               
            </div>
            <div class="modal-footer"></div>
            </div>
            </div>
            </div>
          






<?php require("include/footer.php");?>
</div>
</body>




<script>
          
          $( document ).ready(function() {
          //esconde menu lateral
          $("#btnColapse").trigger("click");
          //cambia color ayudantes
          setInterval("cambia_color_ayudantes()",100);
          //carga listado de trabajadores disponibles
         
          //cantidad de ayudantes
          $("#ccc").load("controllers/programacion/ayudantes_disponibles.php");
          
          //cantidad de conductores
          $("#cant_cond").load("controllers/programacion/conductores_disponibles.php");
          
          cargaPlanillas();
         $("#centroCostolist").load("controllers/programacion/ListboxCentros.php");
          
          
          });


                          $("#btnActivaHonorarios").on("click", function(){
                           swal({
                          title: "¿Programar honorarios?",
                          text: "Iniciar programación de honorarios?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Si, Activar",
                          closeOnConfirm: false
                          }).then(function(){

                           $("#ocultar").hide();
                          })
                          })          


                            function cargaPlanillas(){
                            //carga  planillas sin filtro
                            var parametros = {"c" : "" };                                                        
                            $.ajax({
                            type: "POST",
                            url: "controllers/programacion/cargar_planilla.php",
                            data: parametros, 
                            beforeSend: function(){
                            //imagen de carga
                            $("#contenedor").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                            },
                            error: function(){
                            alert("error petición ajax");
                            },
                            success: function(data){                                                    
                            $("#contenedor").empty();
                            $('#contenedor div').slideDown(1000);  
                            $("#contenedor").append(data);
                                                    
                            }
                            });
                            }
                            

          //cambia color div cantidad
          function cambia_color_ayudantes(){
          var cantidad_ayu = $("#ccc").text();
          if (cantidad_ayu <1){
          $("#cont_ayu").addClass("info-box-icon bg-green");
          $("#Btnhonorarios").show();
          }else{
          $("#cont_ayu").addClass("info-box-icon bg-red");
          $("#Btnhonorarios").hide();
          }
          }


  //filtra planillas
  $("#ordenar").change(function(){
  var ordenar=  $('select[id=ordenar]').val();
  var parametros = { "ordenar" : ordenar };
  $.ajax({
  type: "POST",
  url: "controllers/programacion/cargar_planilla.php",
  data: parametros, 
  beforeSend: function(){
  //imagen de carga
  $("#contenedor").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
  },
  error: function(){
  alert("error petición ajax");
  },
  success: function(data){                                                    
  $("#contenedor").empty();
  $("#contenedor").append(data);
  }
  });  
  });


                        $('#crear_programacion').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget); // Botón que activó el modal	
                        var codigo = button.data('id');
                        var consulta = codigo;       
                        var parametros = {
                        "id_planilla" : consulta,
                        };
                        $.ajax({
                        data:  parametros,
                        url:   'controllers/programacion/planilla_modal.php',
                        type:  'post',
                        beforeSend: function () {
                        $("#result").html("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                        $("#result").html(response);
                        }
                        });
                        });    


                       
                       $('#cambio_programacion').on('show.bs.modal', function (event) {
                       // Botón que activó el modal 
                       var button = $(event.relatedTarget);
                       var codigo = button.data('id');
                       $("#id_planilla").val(codigo);
                       });      
                       
                       
                         $('#ver_listado_trabajadores_disponible').on('show.bs.modal', function (event) {
                         $("#ayu_no").DataTable().destroy();
                         listar();          
                         });
                         
                                  //al cerrar modal recarga pagina
                                  $('#ver_listado_trabajadores_disponible').on('hidden.bs.modal', function (event) {
                                  //cantidad de ayudantes
                                  $("#ccc").load("controllers/programacion/ayudantes_disponibles.php");
                                  cargaPlanillas();
                                  });
                                  
                       //recarga modal aYUDANTES Disponibles
                       $("#recargarAyudantes").on("click",function(){
                       listarfallas();
                       })

                            function listar(){
                            var table = $("#ayu_no").DataTable({
                            "pageLength": 3,
                            language: {
                            processing:     "Cargando",
                            search:         "Buscar",
                            lengthMenu:    "Mostrando _MENU_ filas",
                            info:           " _END_ de _TOTAL_ ",
                            infoEmpty:      "No existen registros",
                            paginate: {
                            first:      "Primero",
                            previous:   "Anterior",
                            next:       "Siguiente",
                            last:       "Ultimo"
                            },
                            },
                            "ajax":{
                            "method":"POST",
                            "url":"controllers/programacion/listado_ayudantes.php"
                            },
                            "columns":[
                            {"data":"codigo_ayu"},
                            {"data":"Nombre"},
                            {"defaultContent":"<form method='POST' action='carga_datos/programacion/fallas.php' ><select name='selectFalla' id='selectFalla' class='form-control xs'><option value='0'>Presente</option><option value='1'>Falla</option><option value='2'>Permiso</option><option value='3'>Licencia</option></select></form>"}
                            ]
                            })
                            
                            ObteneridFalla("#ayu_no tbody", table);
                         
                            }
                          function  ObteneridFalla(tbody, table){
                          
                          $(tbody).on("change", "#selectFalla", function(){
                          
                          var data = table.row( $(this).parents("tr")).data();
                          //mensaje de confirmacion
                          swal({
                          title: '¿ingresar falla?',
                          text: ""+data.Nombre+"",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          cancelButtonText:"No",
                          confirmButtonText: 'Si'
                          }).then(function () {
                          var falla= $("#selectFalla").val();
                          $.post( "controllers/programacion/guarda_falla.php", {id:data.Rut, idfalla:falla } );
                          });
                          })
                          }









                                      //cuando se abre modalfallas carga json 
                                      $('#modalFallas').on('show.bs.modal', function (event) {
                                      listarfallas();
                                      })
                                      //lista ayudantes fallas
                                      var listarfallas = function(){
                                      var table = $("#fallasAyudantesTable").DataTable({
                                      "pageLength": 3,
                                      language: {
                                      processing:     "Cargando",
                                      search:         "Buscar",
                                      lengthMenu:    "Mostrando _MENU_ filas",
                                      info:           " _END_ de _TOTAL_ ",
                                      infoEmpty:      "No existen registros",
                                      paginate: {
                                      first:      "Primero",
                                      previous:   "Anterior",
                                      next:       "Siguiente",
                                      last:       "Ultimo"
                                      },
                                      },
                                      "ajax":{
                                      "method":"POST",
                                      "url":"controllers/programacion/listaFallaAyudante.php"
                                      },
                                      
                                      "columns":[
                                      {"data":"Rut"},
                                      {"data":"Nombre"},            
                                      {"defaultContent":"<button id='btnPresente' class='btn btn-success btn-xs'><i class='fa fa-fire' aria-hidden='true'></i>&nbsp;Presente</button>"}
                                      ]
                                      
                                      })
                                      //nombre de la tabla
                                      ObtenerDataEditar("#fallasAyudantesTable tbody", table);
                                      }
                                      
                                      var ObtenerDataEditar = function (tbody, table){
                                      //nombre del boton y evento
                                      $(tbody).on("click", "#btnPresente", function(){
                                      var data = table.row( $(this).parents("tr")).data();
                                      //mensaje de confirmacion
                                      swal({
                                      title: '¿Trabajador Presente?',
                                      text: ""+data.Nombre+"",
                                      type: 'question',
                                      showCancelButton: true,
                                      confirmButtonColor: '#097107',
                                      cancelButtonColor: '#d33',
                                      cancelButtonText:"No",
                                      confirmButtonText: 'Si'
                                      }).then(function () {
                                      $.post("controllers/programacion/sacafallaAyudante.php", {rut:data.Rut});
                                      $("#fallasAyudantesTable").DataTable().remove();
                                      $("#fallasAyudantesTable").DataTable().clear();
                                      $("#fallasAyudantesTable").DataTable().draw();
                                      $("#modalFallas").modal('hide');
                                      });
                                      
                                      })
                                      }
                   
                   </script>        

 
</html>