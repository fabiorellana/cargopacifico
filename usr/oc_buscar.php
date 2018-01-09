<?php require ('include/valida.php');?><!DOCTYPE html>
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
       <?php include "./include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>
  <!-- Desde aqui -->
  
<div class="content-wrapper"  style="background-color:#ECF0F5" >
<br/><br/><br/>

        <div class="clearfix clear-columns">
            <h4>Listado de Ordenes Pendientes de Ingreso a Contabilidad</h4>
        </div>
        
        <table class="table table-striped table-condensed table-hover table-bordered display responsive nowrap" width="100%" cellspacing="0" id="tblOrdenes" > 
            <thead> 
                <tr> 
                    <th>Orden</th> 
                    <th>Fecha</th> 
                    <th>Proveedor</th> 
                    <th>Rut Proveedor</th>
                    <th>Monto Neto Factura</th>
                    <th>Acción</th>
                </tr>                 
            </thead>             
        </table>
        
        <div class="modal fade pg-show-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modalOrden" data-keyboard="true"> 
            <div class="modal-dialog modal-lg modal-sm"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Orden de Compra</h4> 
                    </div>                     
                    <div class="modal-body">
                        <div class="tab-content clearfix">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <span class="label label-info">Facturar a:</span>
                                <select class="chosen-select" id="cmbEmpresas">
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                            <span class="label label-info">Proveedor: </span><br>
                                    <select class="chosen-select" id="cmbProveedores"> 
                                    </select>
                            </div>
                                   <div class="col-sm-12 col-md-2 col-lg-2">
                                       <span class="label label-info">Cotizaciones</span>
                                       <select class="form-control" id="cotizaciones">
                                           <option value="1" selected="selected">1</option>
                                           <option value="3">3</option>
                                       </select>
                                   </div>
                                   <div class="col-sm-12 col-md-2 col-lg-2">
                                       <span class="label label-info">¿La Más Barata?</span>
                                       <select class="form-control" id="masbarata">
                                           <option value="1" selected="selected">SI</option>
                                           <option value="0">NO</option>
                                       </select>
                                   </div>
                                    <div class="col-sm-12 col-md-8 col-lg-8">
                                        <span class="label label-info">Comentario Cotización</span>
                                        <input type="text" id="txtComentario" class="form-control" placeholder="ej: LA MAS BARATA" />
                                    </div>

                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <span class="label label-info">Cond.de Pago</span>
                                        <select class="form-control"> 
                                            <option selected="selected">CHEQUE</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <span>&nbsp;</span>
                                        <div class="checkbox"> 
                                            <label class="control-label">
                                                <input type="checkbox" id="p0" value="">Día
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p30" value="">30
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p60" value="">60
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p90" value="">90
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p120" value="">120
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p150" value="">150
                                            </label>
                                            <label class="control-label">
                                                <input type="checkbox" id="p180" value="">180
                                            </label>
                                        </div>
                                    </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <span class="label label-info">Plan de Costeo/Cuenta: </span><br>
                                    <select class="form-control" id="planCuenta"> 
                                   </select>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <span class="label label-info">Entregar en: </span><br><input type="text" class="form-control" id="lugar" placeholder="Ingrese lugar de entrega">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <span class="label label-info">Familia/Producto</span>
                                <br>
                                <select class="form-control chosen-select" id="productoFamilia"> 
                                </select>
                            </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                <span class="label label-info">Centro de Costo</span>
                                <select class="form-control" id="centroCosto">
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <span class="label label-info">Cantidad</span>
                                <input type="text" id="cantidad" class="form-control numeric" />
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <span class="label label-info">Valor Unitario</span>
                                <input type="text" id="valorunitario" class="form-control numeric" />
                                </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-striped table-hover table-bordered table-condensed nowrap" id="tablaProductos" width="100%"> 
                                        <thead> 
                                            <tr> 
                                                <th>Familia</th> 
                                                <th>Producto</th> 
                                                <th>Centro</th> 
                                                <th>Cant.</th> 
                                                <th>Valor Unidad</th> 
                                                <th>Total</th> 
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        </tbody>
                                    </table>
                            </div>

                        </div>
                        <div class="modal-footer"> 
                        <h4>
                        <div class="col-sm-12 col-md-8 col-lg-8 label label-info" role="alert" id="mensaje">Agregue productos a la lista</div>
                        </h4>
                        <div class="col-sm-12 col-sm-4 col-sm-4">
                            <label class="text-left">Ingrese Nro.Factura:
                            <input type="text" class="form-control numeric" id="nroFactura" placeholder="ej: 12345" />
                            </label><br/>
                            <button type="button" class="btn btn-primary" id="btnGuardar"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

</div>
<div class="clearfix"></div><br>

</div>
<!-- ./wrapper -->
                
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
<div class="control-sidebar-bg"></div>
<?php require('./include/modals.php');?>
<?php require('./include/footer.php');?>

<script>
function cargarOrdenes(){
        $.ajax(
            {
                url: './controllers/oc/oc_ajax.php',
                method: 'POST',
                async:false,
                data: { 
                    Accion : 'jsonListarOrdenesAutorizadas',
                    },
                dataType: 'json',
                beforeSend: function () {
                    $('#modalCargando').modal('show');
                },
                success: function (data) {
                    $('#modalCargando').modal('hide');
                    var datos = [];
                    $.each(data, function (i, item) {
                        var obj = [
                            item.OrCod,
                            item.OrFec,
                            item.ProvNom,
                            item.ProvRut,
                            item.Nombre,
                            item.OrAu,
                            item.OrNeto
                        ];
                        datos.push(obj);
                    });

                    $('#modalConsultar2').modal('show');
                    $('#tblOrdenes').DataTable().destroy();
                    $('#tblOrdenes').DataTable({
                        "autowidth": false,
                        data: datos,
                        "order": [[ 1, "desc" ]],
                        columnDefs: [
                            { width: 100, targets: 0 },
                            { width: 100, targets: 1 },
                            { width: 400, targets: 2 },
                            { width: 100, targets: 3 },
                            { width: 100, targets: 4 },
                            { width: 100, targets: 5 },
                        ],
                        fixedColumns: true,
                        columns:[
                        {
                            data: "0",
                            "render": function (data, type, row, meta) {
                                if(row[5] == 1){
                                    return data + "&nbsp;<span class='label label-success'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true' data-toggle='tooltip' data-placement='right' title='Autorizado'></span></span>";
                                }
                                else{
                                    return data + "&nbsp;<span class='label label-warning'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true' data-toggle='tooltip' data-placement='right' title='Requiere Autorización'></span></span>";
                                }
                            }
                            },
                        {data: "1",
                        "visible":true,
                        "render": function (data, type, full, meta) {
                            if(type == "display"){
                                var aux = data.split("-");
                                var month = aux[1];
                                var dia = aux[2].split(" ")[0];
                                var ano = aux[0];
                                return dia + "-" + (month.length > 1 ? month : "0" + month) + "-" + ano;
                            }
                            return data;
                            }
                        },
                        {data: "2"},
                        {data: "3",
                            className: "text-right",
                         "render": function(data, type, full, meta){
                            if(type == "display"){
                            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                            }return data;
                        }}
                        ,
                        {data: "6",
                        className: "text-right",
                         "render": function(data, type, full, meta){
                            if(type == "display"){
                            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                            }return data;
                        }
                    },
                        {data: "0",
                          "render": function(data, type, full, meta){
                            var botones = "";
                            botones = "<button class='btn btn-primary btn-xs' data-toggle='tooltip' data-placement='top' title='Ver Documento' onclick='abrirOc(" + data + ");'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>";
                            return botones;
                        }}
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
                                
                            },
                            dom: 'Bfrtip',
                            buttons: [
                                'excel'
                            ]

                    });
                }, error: function (error) {
                    console.log("Error:" + error);
                    $('#modalCargando').modal('hide');
                }
            });
}
function cargaEmpresas(){
    $.ajax({
        url: './controllers/oc/oc_ajax.php',
        method: 'POST',
        async:false,
        data: { 
            Accion : 'jsonListarEmpresas',
        },
        dataType: 'json',
        success: function (data) {
            var datos = [];
            $("#cmbEmpresas").html("");
            $.each(data, function (i, item) {
                var obj = [
                    item.EmpRut,
                    item.EmpDv,
                    item.EmpNom,
                    item.EmpGiro,
                    item.EmpI,
                    item.EmpDir,
                    item.ReGD,
                    item.ProviD,
                    item.ComuD
                ];
                $("#cmbEmpresas").append("<option value='" + item.EmpRut + "'>" + item.EmpRut + "-" + item.EmpDv + " - " + item.EmpNom + "</opetion>");
            });
        }, error: function (jqXHR, error, errorThrown) {
            console.log(jqXHR, error, errorThrown);
            swal("Error!", "Contacte al administrador", "error");
        }
    });
}
function cargaProveedores(){
    $.ajax({
        url: './controllers/oc/oc_ajax.php',
        method: 'POST',
        async:false,
        data: { 
            Accion : 'jsonListarProveedores',
        },
        dataType: 'json',
        success: function (data) {
            var datos = [];
            $("#cmbProveedores").html("");
            $.each(data, function (i, item) {
                var obj = [
                    item.ProvRut,
                    item.ProvDv,
                    item.ProvNom,
                    item.ProvGir,
                    item.ProvDir,
                    item.TipPCod,
                    item.Provtel,
                    item.Pregc,
                    item.Pprovic,
                    item.Pcomuc
                ];
                $("#cmbProveedores").append("<option value='" + item.ProvRut + "'>" + item.ProvRut + "-" + item.ProvDv + " - " + item.ProvNom + "</opetion>");
            });
                        
        }, error: function (jqXHR, error, errorThrown) {
            console.log(jqXHR, error, errorThrown);
            swal("Error!", "Contacte al administrador", "error");
        }
        });
}
function cargaPlanCuentas(){
    $.ajax({
        url: './controllers/oc/oc_ajax.php',
        method: 'POST',
        async:false,
        data: { 
            Accion : 'jsonListarPlanCosteo',
        },
        dataType: 'json',
        success: function (data) {
            var datos = [];
            $("#planCuenta").html("");
            $.each(data, function (i, item) {
                var obj = [
                    item.CuPlaC,
                    item.CuCod,
                    item.CuDes,
                    item.CuViO,
                    item.CuViF,
                    item.CuPlaD
                ];
                $("#planCuenta").append("<option value='" + item.CuPlaC + "|" + item.CuCod + "'>" + item.CuPlaD + " | " + item.CuDes + "</opetion>");
            });
        }, error: function (jqXHR, error, errorThrown) {
            console.log(jqXHR, error, errorThrown);
            swal("Error!", "Contacte al administrador", "error");
        }
    });
}
function cargaProductoFamilia(){
    $.ajax({
        url: './controllers/oc/oc_ajax.php',
        method: 'POST',
        async:false,
        data: { 
            Accion : 'jsonListarProductoFamilia',
        },
        dataType: 'json',
        success: function (data) {
            var datos = [];
            $("#productoFamilia").html("");
            $.each(data, function (i, item) {
                var obj = [
                    item.FamC,
                    item.PCodPro,
                    item.PDesPro,
                    item.FamD,
                    item.FamDC
                ];
                $("#productoFamilia").append("<option value='" + item.FamC + "|" + item.PCodPro + "'>" + item.FamD + " | " + item.PDesPro + "</opetion>");
            });
        }, error: function (jqXHR, error, errorThrown) {
            console.log(jqXHR, error, errorThrown);
            swal("Error!", "Contacte al administrador", "error");
        }
    });
}
function cargaCentros(){
    $.ajax({
        url: './controllers/oc/oc_ajax.php',
        method: 'POST',
        async:false,
        data: { 
            Accion : 'jsonListarCentros',
        },
        dataType: 'json',
        success: function (data) {
            var datos = [];
            $("#centroCosto").html("");
            $.each(data, function (i, item) {
                var obj = [
                    item.CenCod,
                    item.CenDes
                ];
                $("#centroCosto").append("<option value='" + item.CenCod +"'>" + item.CenDes + "</opetion>");
            });
        }, error: function (jqXHR, error, errorThrown) {
            console.log(jqXHR, error, errorThrown);
            swal("Error!", "Contacte al administrador", "error");
        }
    });
}
function abrirOc(orden){
    $("#nroFactura").val("");
    $("#btnGuardar").click(function(){
        ingresarFactura(orden);
    });
    tablaProductos = [];
    $.ajax({
    url: './controllers/oc/oc_ajax.php',
    method: 'POST',
    async:false,
    data: {
        Accion : 'traerOC',
        orden: orden
    },
    dataType: 'json',
    success: function (data) {
        if (data.mensaje == "OK") {
            //console.log(data.cabecera.OrAuN);
            $("#btnAgregarProducto").prop("disabled", true);
            $("#btnGuardar").prop("disabled", false);
            $("#cmbEmpresas").val(data.cabecera.EmpRut);
            $("#cmbEmpresas").prop("disabled", true);
            $("#cmbEmpresas").trigger("chosen:updated");
            $("#cmbProveedores").val(data.cabecera.ProvRut);
            $("#cmbProveedores").prop("disabled", true);
            $("#cmbProveedores").trigger("chosen:updated");
            $("#txtComentario").val(data.cabecera.OrCotD);
            $("#txtComentario").prop("disabled", true);
            $("#cotizaciones").val(data.cabecera.OrCot);
            $("#cotizaciones").prop("disabled", true);
            $("#masbarata").val(data.cabecera.OrCotE);
            $("#masbarata").prop("disabled", true);
            (data.cabecera.OrD==1)?$("#p0").prop('checked', true):$("#p0").prop('checked', false);
            (data.cabecera.OrD30==1)?$("#p30").prop('checked', true):$("#p30").prop('checked', false);
            (data.cabecera.OrD60==1)?$("#p60").prop('checked', true):$("#p60").prop('checked', false);
            (data.cabecera.OrD90==1)?$("#p90").prop('checked', true):$("#p90").prop('checked', false);
            (data.cabecera.OrD120==1)?$("#p120").prop('checked', true):$("#p120").prop('checked', false);
            (data.cabecera.OrD150==1)?$("#p150").prop('checked', true):$("#p150").prop('checked', false);
            (data.cabecera.OrD180==1)?$("#p180").prop('checked', true):$("#p180").prop('checked', false);
            $("#p0").prop("disabled", true);
            $("#p30").prop("disabled", true);
            $("#p60").prop("disabled", true);
            $("#p90").prop("disabled", true);
            $("#p120").prop("disabled", true);
            $("#p150").prop("disabled", true);
            $("#p180").prop("disabled", true);
            $("#planCuenta").val(data.cabecera.CuPlaC + "|" + data.cabecera.CuCod);
            $("#planCuenta").prop("disabled", true);
            $("#lugar").val(data.cabecera.OrEnt);
            $("#lugar").prop("disabled", true);
            $("#planCuenta").prop("disabled", true);
            $("#productoFamilia").prop("disabled", true);
            $("#productoFamilia").trigger("chosen:updated");
            $("#centroCosto").prop("disabled", true);
            $("#cantidad").prop("disabled", true);
            $("#valorunitario").prop("disabled", true);
            cargaTablaProductos(data.detalle);
        }
        else {
            
        }
    }, error: function (jqXHR, error, errorThrown) {
        console.log(jqXHR, error, errorThrown);
        swal("Error!", "Contacte al administrador", "error");
    }
    });
    $('#modalOrden').modal('show');
}

function ingresarFactura(orden){
    var nroFactura = $("#nroFactura").val();
    var errores = 0;
    if(nroFactura.length==0){
        swal("Error", "Debe ingresar un número de Factura.", "error");
        errores++;
    }
    if(isNaN(nroFactura) && errores == 0){
        swal("Error", "Debe ingresar un número de Factura válido.", "error");
        errores++;   
    }
    if(errores == 0){
            swal({
                  title: "¿Está seguro que desea guardar el número de factura en la orden?",
                  text: "La Orden de Compra se dará por cerrada.",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText:"No",
                  confirmButtonText: 'Si'
                }).then(function (){
                  $.ajax(
                    {
                        url: './controllers/oc/oc_ajax.php',
                        method: 'POST',
                        async: false,
                        data: { 
                          Accion : 'ingresarFacturaOC',
                          nroFactura: nroFactura,
                          orden: orden
                          },
                        dataType: 'json',
                        beforeSend: function () {
                        },
                        success: function (data) {
                          if(data.mensaje == "OK"){
                            swal("Guardado", "Se ha guardado correctamente", "success");
                            $('#modalOrden').modal('hide');
                            cargarOrdenes();
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


function cargaTablaProductos(datos){
    //fam:fam, prod:prod, cent:cent, cant:cant, valor:valor, neto:cant*valor
    var tot = 0;
    for(i=0;i<datos.length;i++){
        tot= (1*tot+ 1*datos[i].neto);
    }
    $('#tablaProductos').DataTable().destroy();
    $('#tablaProductos').DataTable({
        "width": "100%",
        data: datos,
        columns:[
        {   data: "famD"      },
        {   data: "prodD",  },
        {   data: "centD"    },
        {   data: "cant",
        className: "text-right",
                         "render": function(data, type, full, meta){
                            if(type == "display"){
                            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        }return data;
                         }    },
        {   data: "valor",
        className: "text-right",
                         "render": function(data, type, full, meta){
                            if(type == "display"){
                            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        }return data;
                         }    },
        {   data: "neto",className: "text-right",
                         "render": function(data, type, full, meta){
                            if(type == "display"){
                            return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        }return data;
                         }    
        },

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
                
            },

    });
        $("#mensaje").html("Neto: $" + moneda(tot) + ".-</br> IVA: $" + moneda(Math.round(tot*0.19)) + ".-</br>Total: $" + moneda(Math.round(tot*1.19)) + ".-</br>");
        if(tot <= 200000){
            $("#mensaje").removeClass("label-warning");
            $("#mensaje").removeClass("label-danger");
            $("#mensaje").removeClass("label-info");
            $("#mensaje").addClass("label-success");
            $("#mensaje").addClass("text-right");
            $("#mensaje").append(" (no requiere de autorización).");
            solicitarAutorizacion = 0;
        }
        if(tot >200000 && tot <=600000){
            $("#mensaje").removeClass("label-success");
            $("#mensaje").removeClass("label-info");
            $("#mensaje").removeClass("label-danger");
            $("#mensaje").addClass("label-warning");
            $("#mensaje").addClass("text-right");
            $("#mensaje").append(" (requiere autorización de sub gerencia).");
            solicitarAutorizacion = 1;
        }
        if(tot > 600000){
            $("#mensaje").removeClass("label-warning");
            $("#mensaje").removeClass("label-info");
            $("#mensaje").removeClass("label-success");
            $("#mensaje").addClass("label-danger");
            $("#mensaje").addClass("text-right");
            $("#mensaje").append(" (requiere autorización de gerencia).");
            solicitarAutorizacion = 2;
        }

}

var tot=0;
var tablaProductos = [];
var solicitarAutorizacion = 0;
$(document).ready(function() {
    cargarOrdenes();
    cargaEmpresas();
    cargaProveedores();
    cargaPlanCuentas();
    cargaProductoFamilia();
    cargaCentros();
    $(".chosen-select").chosen({width:"100%"});
		});

</script>
                
<script>
$('#mover').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>
<script>

$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdnombre").val(consulta);            
});
                
</script>

<!-- propiedades-->
<script>
$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	    $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){

			  });            
});
                
</script>
<!-- fin-->
<script>

$('#eliminar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});

$('#permisos').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});


    $('#sidebar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 alert (codigo)
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});

 </script> 

<script>
	$(document).ready(function(){
		
		$("#btnguardar").hide();
	
})</script>

<script>
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
</script>
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
</body>
</html>