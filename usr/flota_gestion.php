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
      Administración de Flota
    </h3>
</div>
<br />
<div class="col-lg-9 col-md-12 col-sm-12">
      <div class="panel panel-primary">
      <div class="panel-heading">Flota Completa</div>
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
              Accion : 'jsonListarFlota'
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
                    },
                    {
                        "targets": [6],
                        "visible": true,
                        "searchable": true
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
  function cargaTablaModal(patente){
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
  }
  function modalFicha(patente){
    // ajax para traer detalle de patente
    cargaTablaModal(patente);

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
                    $("#lugar").html(item.flo_lugar);
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
    $("#fdesde").val("");
    $("#fhasta").val("");
    $("#IngresaMotivo").val("");
    $("#LugarFisico").val("");
    $("#fdesde").prop( "disabled", true );
    $("#fhasta").prop( "disabled", true );
    $("#IngresaMotivo").prop( "disabled", true );
    $("#LugarFisico").prop("disabled", true);
    $("#agregaEstado").val("OPERATIVO");

    $("#modalFicha").modal('show');
  }
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
         dateFormat: 'dd/mm/yy',
         firstDay: 1,
         isRTL: false,
         showMonthAfterYear: false,
         yearSuffix: ''
         };
 $.datepicker.setDefaults($.datepicker.regional['es']);
    function validaFecha(fecha){
        var fec = fecha.split("-");
        var err_fecha = 0;
        if (fec.length == 3) {
            var dia = fec[2];
            if (dia < 1 || dia > 31) {
                err_fecha = 1;
            }
            var mes = fec[1];
            if (mes < 1 || mes > 12) {
                err_fecha = 2;
            }
            var anio = fec[0];
            if (anio.length != 4 || (!/^([0-9])*$/.test(anio))) {
                err_fecha = 3;
            }
        }
        if (fec.length != 3 || err_fecha != 0) {
            return false;
        }
        else {
            return true;
        }
    }
  $(document).ready(function() {
    cargaFlota();
    $("#fdesde").val("");
    $("#fhasta").val("");
    $("#IngresaMotivo").val("");
    $("#LugarFisico").val("");
    $("#fdesde").prop( "disabled", true );
    $("#fhasta").prop( "disabled", true );
    $("#IngresaMotivo").prop( "disabled", true );
    $("#LugarFisico").prop("disabled", true);

    $("#fdesde").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#fhasta").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#btnGuardar").click(function(){
      //validar la información ingresada
      var errores = 0;
      var f1 = $("#fdesde").val();
      var f2 = $("#fhasta").val();
      var motivo = $("#IngresaMotivo").val();
      var estado = $("#agregaEstado").val();
      var lugar = $("#LugarFisico").val();
      var patente = $("#patente").html();
      if(estado=="TALLER"){
        if(f1.length == 0 && errores == 0){
        swal("Error", "Debe especificar fecha de ingreso.", "error");
        errores++;
      }
      if(f2.length == 0 && errores == 0){
        swal("Error", "Debe especificar fecha estimada de salida.", "error");
        errores++;
      }
      if(motivo.length == 0 && errores == 0){
        swal("Error", "Debe especificar motivo de ingreso a taller.", "error");
        errores++;
      }
      if(!validaFecha(f1) && errores == 0){
        swal("Error", "Fecha de ingreso no válida.", "error");
        errores++;
      }
      if(!validaFecha(f2) && errores == 0){
        swal("Error", "Fecha estimada de salida no válida.", "error");
        errores++;
      }
      if(lugar.length == 0 && errores == 0){
        swal("Error", "Debe especificar la ubicación del taller.", "error");
        errores++;
      }
      if(errores == 0){
        //procedimiento para guardar los datos
        // ajax insertaEstado($patente, $condicion, $f1, $f2, $detalle)
        swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function (){
          $.ajax(
            {
                url: './controllers/flota/flo_ajax.php',
                method: 'POST',
                async: false,
                data: { 
                  Accion : 'insertaEstado',
                  patente: patente,
                  condicion: estado,
                  f1: f1,
                  f2: f2,
                  detalle: motivo,
                  lugar: lugar
                  },
                dataType: 'json',
                beforeSend: function () {
                },
                success: function (data) {
                  if(data.mensaje == "OK"){
                    cargaFlota();
                    swal("Guardado", "Se ha guardado correctamente", "success");
                  }else{
                    swal("Error", "Ha ocurrido un error al intentar guardar, contacte al departamento de informática", "error");
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

        });
      }
      }
      else{
        //guardar los datos de camión Operativo
        swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function (){
          $.ajax(
            {
                url: './controllers/flota/flo_ajax.php',
                method: 'POST',
                async: false,
                data: { 
                  Accion : 'insertaEstado',
                  patente: patente,
                  condicion: estado,
                  f1: '',
                  f2: '',
                  detalle: ''
                  },
                dataType: 'json',
                beforeSend: function () {
                },
                success: function (data) {
                  if(data.mensaje == "OK"){
                    cargaFlota();
                    swal("Guardado", "Se ha guardado correctamente", "success");
                  }else{
                    swal("Error", "Ha ocurrido un error al intentar guardar, contacte al departamento de informática", "error");
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
        });
        
      }
      
      

    });


    $("#agregaEstado").change(function() {
          if($("#agregaEstado").val()=="TALLER"){
            $("#fdesde").prop( "disabled", false );
            $("#fhasta").prop( "disabled", false );
            $("#IngresaMotivo").prop( "disabled", false );
            $("#LugarFisico").prop("disabled", false);
          }
          else{
            $("#fdesde").prop( "disabled", true );
            $("#fhasta").prop( "disabled", true );
            $("#IngresaMotivo").prop( "disabled", true );
            $("#LugarFisico").prop("disabled", true);
          }
        });
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
                            <div class="col-lg-3 col-md-3 col-sm-3"><strong>Agregar Estado: </strong></div>
                             <div class="col-lg-3 col-md-3 col-sm-3"> 
                              <select id="agregaEstado" class="form-control input-sm">
                                <option value="OPERATIVO">OPERATIVO</option>
                                <option value="TALLER">TALLER</option>
                              </select>
                            </div>
                            <div class="clearfix"></div>
                              <div class="col-sm-2 col-md-2 col-lg-2">F.Entrada:</div>
                              <div class="col-sm-4 col-md-4 col-lg-4"><input type="text" maxlength="10" class="form-control input-sm" id="fdesde" /></div>
                              <div class="col-sm-2 col-md-2 col-lg-2">F.Est.Salida:</div>
                              <div class="col-sm-4 col-md-4 col-lg-4"><input type="text" maxlength="10" class="form-control input-sm" id="fhasta" /></div>

                              <div class="col-sm-2 col-md-2 col-lg-2">Motivo:</div>
                              <div class="col-sm-10 col-md-10 col-lg-10"><input type="text" maxlength="1000" class="form-control input-sm text-uppercase" id="IngresaMotivo" /></div>
                              <div class="col-sm-2 col-md-2 col-lg-2">Ubicación:</div>
                              <div class="col-sm-10 col-md-10 col-lg-10"><input type="text" maxlength="150" class="form-control input-sm text-uppercase" id="LugarFisico" /></div>
                              <div class="col-sm-12 col-md-12 col-lg-12 text-right"><button id="btnGuardar" class="btn btn-primary btn-xs">Guardar</button></div>
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