<?php require('include/valida.php');?>
<!DOCTYPE html>
<html>
<?php require("include/header.php");?>
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
  
  <div class="content-wrapper"  style="background-color:#ECF0F5" >
<br><br><br>
    <div class="col-sm-12 col-md-12 col-lg-12">
    <h3>
      Flota
    </h3>
</div>
<br />
<div class="col-lg-9 col-md-12 col-sm-12">
      <div class="panel panel-primary">
      <div class="panel-heading">Flota en Taller</div>
      <div class="panel-body">
          <table id="tblFlota" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
              <thead>
                <tr>
                <th>Patente</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>C.Costo</th>
                <th>Estado</th>
                <th><p class="text-center">Detalle</p></th>
                <th>Ficha</th>
                <th>Socio</th>
                <th>Plazo</th>
                </tr>
              </thead>
          </table>
        </div>
    </div>
</div>

</div>
<!-- ./wrapper -->
                

<div class="control-sidebar-bg"></div>
<?php require('./include/modals.php');?>
<?php require('./include/footer.php');?>


<div class="modal fade" id="modalCargando" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cargando...</h4>
            </div>
            <div class="modal-body text-center">
					<img src="../images/cargando.gif" border="0" />
            </div>
        </div>

    </div>
</div> 
<script>
  function cargaFlota(){
    $.ajax(
        {
            url: './controllers/flota/flo_ajax.php',
            method: 'POST',
            async: false,
            data: { 
              Accion : 'jsonListarFlotaTaller'
              },
            dataType: 'json',
            beforeSend: function () {
              $('#modalCargando').modal('show');
            },
            success: function (data) {
              $('#modalCargando').modal('hide');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.flo_patente,
                        item.flo_tipo,
                        item.flo_marca,
                        item.flo_modelo,
                        item.flo_ano,
                        item.flo_ccosto,
                        item.flo_estado,
                        item.flo_detalle,
                        null,
                        item.flo_socio,
                        item.Dias
                    ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
              $('#tblFlota').DataTable().destroy();
              var tabla = $('#tblFlota').DataTable({ 
                data: datos,
                "columns":[{
                  width: "10%",
                  data: datos.flo_patente,
                },
                {
                  width: "10%",
                  data: datos.flo_tipo,
                },
                {
                  width: "10%",
                  data: datos.flo_marca,
                },
                {
                  width: "10%",
                  data: datos.flo_modelo,
                },
                {
                  width: "5%",
                  data: datos.flo_ano,
                },
                {
                  width: "10%",
                  data: datos.flo_ccosto,
                },
                {
                  width: "5%",
                  data: datos.flo_estado,
                },
                {
                  data: datos.flo_detalle,
                },
                {
                  width: "10%",
                  data: null,
                  "render": function ( data, type, row ) {
                            return '<button class="btn btn-primary btn-xs" onclick="modalFicha(\''+row[0]+'\');">Ver</button>';
                        }
                },
                {
                  width: "0%",
                  data: datos.flo_socio,
                },
                {
                  width: "5%",
                  data: datos.Dias,
                  "render": function(data, type, row){
                    if(data>0){
                      return '<label class="label label-danger">'+data+' días.</label>';
                    }
                    if(data<0){
                      return '<label class="label label-success">'+ (0-data)+' días.</label>';
                    }
                    if(data==0){
                      return '<label class="label label-warning">'+data+' días.</label>';
                    }
                    if(data==null){
                      return '<label class="label label-info">Sin Información.</label>';
                    }
                  }
                }
                ],
                "columnDefs": [
                    {
                        "targets": [1],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [9],
                        "visible": false
                    },
                    {
                        "targets": [4],
                        "visible": false,
                        "searchable": false,
                    },
                    {
                        "targets": [5],
                        "visible": false,
                        "searchable":false
                    },
                    {
                        "targets": [6],
                        "visible": false,
                        "searchable":false
                    },
                    {
                      "orderData": [10],
                      "targets":[10],
                      "type": "string",
                      "searchable":false
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
              }
              else{
                $('#tblFlota').DataTable().destroy();
                $('#tblFlota').DataTable().clear();
                $('#tblFlota').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalCargando').modal('hide');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        });
//Fin ajax
  }
  function modalFicha(patente){
    // ajax para traer detalle de patente
    $.ajax(
        {
            url: './controllers/flota/flo_ajax.php',
            method: 'POST',
            async: false,
            data: { 
              Accion : 'jsonListarFlotaTrabajos',
              patente: patente
              },
            dataType: 'json',
            beforeSend: function () {
              $('#modalCargando').modal('show');
            },
            success: function (data) {
              $('#modalCargando').modal('hide');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.flo_fecha_ingreso,
                        item.flo_fecha_salida,
                        item.flo_detalle,
                    ];
                    datos.push(obj);
                });
              $('#tblDetalle').DataTable().destroy();
              var tabla2 = $('#tblDetalle').DataTable({ 
                data: datos,
                "columns":[{
                  width: "10%",
                  data: datos.flo_fecha_ingreso,
                },
                {
                  width: "10%",
                  data: datos.flo_fecha_salida,
                },
                {
                  width: "80%",
                  data: datos.flo_detalle,
                }],
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
                  },
              });
              }
              else{
                $('#tblDetalle').DataTable().destroy();
                $('#tblDetalle').DataTable().clear();
                $('#tblDetalle').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalCargando').modal('hide');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        });
    $.ajax(
        {
            url: './controllers/flota/flo_ajax.php',
            method: 'POST',
            async: false,
            data: { 
              Accion : 'jsonDetallePatente',
              patente: patente
              },
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    $("#patente").html(item.flo_patente);
                    $("#pallets").html(item.flo_pallets);
                    $("#tipo").html(item.flo_tipo);
                    $("#chasis").html(item.flo_chasis);
                    $("#motor").html(item.flo_motor);
                    $("#marca").html(item.flo_marca);
                    $("#modelo").html(item.flo_modelo);
                    $("#ano").html(item.flo_ano);
                    $("#ccosto").html(item.flo_ccosto);
                    $("#color").html(item.flo_color);
                    $("#carroceria").html(item.flo_carroceria);
                    $("#mantencion").html(item.flo_mantencion);
                    $("#odometro").html(item.flo_odometro);
                    
                });
            }
          }, 
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        });

    $("#modalFicha").modal('show');
  }
  $(document).ready(function() {
    cargaFlota();
  });

</script>
<div class="modal fade modal-primary" id="modalFicha" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ficha</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">

                          <div class="panel panel-default">
                          <div class="panel-body">
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Patente: </strong></div>
                            <div id="patente" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Pallets: </strong></div>
                            <div id="pallets" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Tipo: </strong></div>
                            <div id="tipo" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>N° Motor: </strong></div>
                            <div id="motor" class="col-lg-4 col-md-4 col-sm-4" ></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>N° Chasis: </strong></div>
                            <div id="chasis" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Marca: </strong></div>
                            <div id="marca" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Modelo: </strong></div>
                            <div id="modelo" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Año: </strong></div>
                            <div id="ano" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>C.Costo: </strong></div>
                            <div id="ccosto" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Color: </strong></div>
                            <div id="color" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Carrocería: </strong></div>
                            <div id="carroceria" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Mantención: </strong></div>
                            <div id="mantencion" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Odómetro: </strong></div>
                            <div id="odometro" class="col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"><strong>Ubicación: </strong></div>
                            <div id="lugar" class="col-lg-4 col-md-4 col-sm-4"></div>
                          </div>
                          </div>
                          <div class="panel panel-default">
                          <div class="panel-body">
                            <table id="tblDetalle" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
                              <thead>
                                <tr>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida Est.</th>
                                <th>Motivo</th>
                                </tr>
                              </thead>
                          </table>
                          </div>
                          </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>