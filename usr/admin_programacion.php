<?php require('include/valida.php');?>
												<!DOCTYPE html>
												<html>
												<?php require('include/header.php');
														
												?>
												<body class="hold-transition skin-blue sidebar-mini">

												<div class="">
												<header class="main-header">
												<?php include_once "include/menu_arriba.php";?>
												</header>
												<!-- Left side column. contains the logo and sidebar -->
												
												<aside class="main-sidebar" style="position: fixed;">
												<section class="sidebar">
												<ul class="sidebar-menu">       
												<?php include "include/menu.php";?> 
												</ul>
												</section>
												</aside>
												
												
												</div>
												
												
												
												<!-- Desde aqui -->
												
												<div class="content-wrapper"  style="background-color:#ECF0F5" >
												<br >
												<br>
												<br >
												<ol class="breadcrumb pull-right">
												<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
												<li class="active">Administrar programación <d id="centrotxt"></d></li>
												</ol>
	<div class="col-md-3">
	<div class="small-box bg-green">
            <div class="inner">
              <h3 id="cantfallasconductores"></h3>

              <p>Fallas de conductores Hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" onclick="tblFallaC();">Ver <i class="fa fa-arrow-circle-right"></i></a>
     </div>
</div>

<div class="col-md-3">
	<div class="small-box bg-green">
            <div class="inner">
              <h3 id="cantfallasayudantes"></h3>

              <p>Fallas ayudantes hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" onclick="tblFallaA();">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>

												<div class="container">
												<div class="form-group col-md-3">
												<div class="input-group   ">
												<div class="input-group-addon">
												<i class="fa fa-flag-checkered" aria-hidden="true"></i>
												</div>
												<select id="combocentro" class="form-control input-sm  chosen-select" >
												<option value="">Todos</option>
												
												</select>
												</div>
												<!-- /.input group -->
												</div>
												
												<div class="form-group col-md-3">
												<div class="input-group   ">
												<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control input-sm"  id="txtfecha" placeholder="Fecha">
												</div>
												
												</div>

																							
												</div>

	<div class="container col-md-12">
		<div class="box box-info">
					<div class="box-header with-border">
					<div class="col-md-3">
					<h3 class="box-title">Administrar Programación</h3>
					</div>
						
					
						
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-warning">Rechazos</button>
				<button type ="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				
				</div>
            </div>
            <!-- /.box-header -->
					<div class="box-body">
					<div class="table-responsive">
						<table class=" table-striped table-condensed table-hover table" id="tblprogramacion" style="width: 100%;">
							<thead>
							<tr>
							<th>Planilla</th>
							<th>Corte</th>
							<th>Conductor</th>
							<th>Cajas</th>
							<th>Vueltas</th>
							<th>Fecha</th>
							<th>Cliente</th>
							<th>Centro</th>
							<th>1° Ayudante</th>
							<th>2° Ayudante</th>
							<th>3° Ayudante</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							</tr>
							</thead>
						</table>
					</div>
					
					<!-- /.table-responsive -->
					</div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
          </div>
	</div>
												
											
												</div>
											
												<!-- ./wrapper -->
												
												
												
	<div class="modal fade " id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Editar Programación</h4>
	</div>
	<div class="modal-body">
	<div id="infoedita" class="well"></div>
	
	<input type="text" id="txtcentro" value="" placeholder="" class="hidden">
	<input type="text" id="txtplanilla" value="" class="form-control hidden">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10" id="cambiaconductor">
			Conductor
			<input type="text" id="Txtconductor" value="" placeholder="" class="form-control" disabled="">
			</div>
			<br>
			<div class="col-lg-2" id="btneditaconductor">
				<button class ="btn btn-xs btn-success" onclick="editaconductor()" ><i class="fa fa-pencil-square-o"></i>
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-10" id="cambia1">
				Ayudante 1
				<input type="text" id="ayu1programado" value="" placeholder="" class="form-control" disabled="">
			</div>
			<br>
			<div class="col-lg-2">
				<div id="vuelta1"><br><input type="text" id="txtVuelta1" value="" placeholder="" class="form-control" disabled=""></div>
				<div id="btnedita1"><button class ="btn btn-sm btn-primary" id="btnedita1" onclick="editarayudante1()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>		
			</div>
		</div>						

		<div class="row">
			<div class="col-lg-10" id="cambia2">
				Ayudante 2
				<input type="text" id="ayu2programado" value="" placeholder="" class="form-control" disabled="">
			</div>
			<div class="col-lg-2">
				<div class="vuelta2"><br><input type="text" id="txtVuelta2" value="" placeholder="" class="col-sm-1 form-control" disabled=""></div>
				<div id="btnedita2">&nbsp;<button class ="btn btn-sm btn-primary"  onclick="editarayudante2()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>		
			</div>							
		</div>

		<div class="row">
			<div class="col-lg-10" id="cambia3">
				Ayudante 3
				<input type="text" id="ayu3programado" value="" placeholder="" class="form-control" disabled="">
			</div>
			<div class="col-lg-2">
				<div class="vuelta3"><br><input type="text" id="txtVuelta3" value="" placeholder="" class="col-sm-1 form-control" disabled=""></div>
				<div id="btnedita3">&nbsp;<button class ="btn btn-sm btn-primary" onclick="editarayudante3()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>	
			</div>						
		</div>	
	</div>					
	
																
	<div class="modal-footer">
		
	</div>
	</div>
	</div>
	</div>
	</div>
	
	<!--Modal Fallas Ayudantes-->
	<div class="modal fade" id="modalfallasayudantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Fallas Ayudantes</h4>
	</div>
	<div class="modal-body">
		<table id="tblFallaA" class="table table-responsive table-condensed" style="width: 100%;">
			<thead>
				<tr>
					<th>#</th>
					<th>Rut</th>
					<th>Conductor</th>
					<th>Fecha</th>
					<th>Motivo</th>
				</tr>
			</thead>
		</table>	
	</div>
	<div class="modal-footer"></div>
	</div>
	</div>
	</div>
	
	<!--Modal Fallas Conductores-->
	<div class="modal fade" id="modalfallasconductores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Fallas Conductores</h4>
	</div>
	<div class="modal-body">
		<table id="tblFallaC" class="table table-responsive table-condensed " style="width: 100%;">
			<thead>
				<tr>
					<th>#</th>
					<th>Rut</th>
					<th>Conductor</th>
					<th>Fecha</th>
					<th>Motivo</th>
				</tr>
			</thead>
		</table>
	</div>
	</div>
	</div>
	</div>

		<!--modal de carga -->

<div class="modal fade" id="modalcargando">
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

		

												
												
												
												<?php require('include/footer.php');?>
												
												
												
<script>
$( document ).ready(function() {
	var aux = centros();

   tblprogramacion('', '', aux);
   cargaComboCentro(aux);
   $("#txtfecha").datepicker();
   $("#btnColapse").trigger("click");
   cantfallasconductores();
   cantfallasayudantes();
});

$("#combocentro").on("change", function(){
	var aux = centros();
	var centro=$("#combocentro").val();
	var fecha=$("#txtfecha").val();
	tblprogramacion(centro, fecha, aux)
});

$("#txtfecha").on("change", function(){
	var aux = centros();
	var centro=$("#combocentro").val();
	var fecha=$("#txtfecha").val();
	tblprogramacion(centro, fecha, aux)
});

function centros(){
    var auxiliar = "";
          $.ajax({
	          url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
	          method: 'POST',
	          async: false,
	          data: { 
	          funcion:"permisoscentros",  
	           },   
	          dataType: 'json',                      
	          beforeSend: function () {
	            $("body").css("cursor", "progress");
	          },
	          success: function (data) {
					$("body").css("cursor", "default");
	            	if(data[0].centro==1000){
	              		$("#centrotxt").text("Administrador");
	            	}else{
	              	$("#centrotxt").text(data[0].Descripcion +' '+ data[1].Descripcion);
	            	}
	               	///return data[0].centro;
	            	auxiliar = data;
	          }, 
	          error: function (jqXHR, textStatus, errorThrown ) {
	          	console.log("error4: "+errorcentros);
	          }
          });
	return auxiliar;
  }
function cantfallasconductores(){
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			funcion: 'cantfallasconductores'
		},
		beforeSend: function(){
			$("#cantfallasconductores").html("<img src='../images/ajax-loader.gif'></img>");	
		},
		success: function(data){
			$("#cantfallasconductores").html('');	
			if(data.length > 0){
				$.each(data, function(id, dato){
					$('#cantfallasconductores').html(dato.cantconductores);
				});
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			$('#modalcargando').modal('hide');
			console.log('error');							
		}
	});
	
}


function cantfallasayudantes(){
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			funcion: 'cantfallasayudantes'
		},
		beforeSend: function(){
			$("#cantfallasayudantes").html("<img src='../images/ajax-loader.gif'></img>");	
		},
		success: function(data){
			$("#cantfallasayudantes").html('');	
			if(data.length > 0){
				$.each(data, function(id, dato){
					$('#cantfallasayudantes').html(dato.cantayudantes);
				});
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			$('#modalcargando').modal('hide');
			console.log('error');							
		}
	});
	
}

function tblFallaA(){
    $.ajax({
            url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
            type: 'POST',
            async: false,
            data: { 
              funcion : 'tblFallaA'
              },
            dataType: 'json',
            beforeSend: function () {
            	$('#modalcargando').modal('show');
            },
            success: function (data) {
              $('#modalcargando').modal('hide');
              $('#modalfallasayudantes').modal('show');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.id_fallaayudante,
                        item.rut_fallaayudante,
                        item.nombre_fallaayudante,
                        item.fecha_fallaayudantes,
                        item.motivo_fallaayudante,
                        null
                               ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
              $('#tblFallaA').DataTable().destroy();
              var tabla = $('#tblFallaA').DataTable({ 
              	"searching": false,
                data: datos,
                		
                "columns":[
                {
                  width: "5%",
                  data: datos.id_fallaayudante,
                },
                {
                  "visible": false,
                  width: "25%",
                  data: datos.rut_fallaayudante,
                },
                {
                  width: "25%",
                  data: datos.nombre_fallaayudante,
                },
                {
                  width: "25%",
                  data: datos.fecha_fallaayudantes,
                },
                {
                  width: "25%",
                  data: datos.motivo_fallaayudante,
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
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      }
                  }
              });
              tabla.responsive.recalc().columns.adjust().draw();
              }
              else{
                $('#tblFallaA').DataTable().destroy();
                $('#tblFallaA').DataTable().clear();
                $('#tblFallaA').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalcargando').modal('hide');
                console.log('error');
               
            }
        });
	
}

function tblFallaC(){
    $.ajax({
            url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
            type: 'POST',
            async: false,
            data: { 
              funcion : 'tblFallaC'
              },
            dataType: 'json',
            beforeSend: function () {
            	$('#modalcargando').modal('show');
            },
            success: function (data) {
              $('#modalcargando').modal('hide');
              $('#modalfallasconductores').modal('show');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.id_fallaconductor,
                        item.rut_fallaconductor,
                        item.nombre_fallaconductor,
                        item.fecha_fallaconductor,
                        item.motivo_fallaconductor,
                        null
                               ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
              $('#tblFallaC').DataTable().destroy();
              var tabla = $('#tblFallaC').DataTable({ 
              	"searching": false,
                data: datos,
                		
                "columns":[
                {
                  width: "5%",
                  data: datos.id_fallaconductor,
                },
                {
                  "visible": false,
                  width: "25%",
                  data: datos.rut_fallaconductor,
                },
                {
                  width: "25%",
                  data: datos.nombre_fallaconductor,
                },
                {
                  width: "25%",
                  data: datos.fecha_fallaconductor,
                },
                {
                  width: "25%",
                  data: datos.motivo_fallaconductor,
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
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      }
                  }
              });
              tabla.responsive.recalc().columns.adjust().draw();
              }
              else{
                $('#tblFallaC').DataTable().destroy();
                $('#tblFallaC').DataTable().clear();
                $('#tblFallaC').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalcargando').modal('hide');
                console.log('error');
               
            }
        });
	
}

function cargaComboCentro(centrousr){
  //Carga combo estado
  if(centrousr.length>1){

      if(centrousr.length>0){
        $.each(centrousr, function(id, dato){
          $("#combocentro").append(
          '<option value="'+dato.centro+'">'+dato.Descripcion+'</option>');
        });
      }
  }else{

  $.ajax({
    url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
    method: 'POST',
    async: false,
    data: {
      funcion: 'jsonComboCentro',
      centrousr:centrousr
    },
    dataType: 'json',
    beforeSend: function(){
    $("body").css("cursor", "progress");
    
    },
    success: function (data) {
    $("body").css("cursor", "default");
      if(data.length>0){
        $.each(data, function(id, dato){
          $("#combocentro").append(
          '<option value="'+dato.id+'">'+dato.Descripcion+'</option>');
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('error1:' + textStatus);
    }

  });
  $(".chosen-select").chosen();
}
}//fin funciones carga combo centro de costos


function tblprogramacion(centro, fecha, centrousr){
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			funcion: 'tblprogramacion',
			centro: centro,
			fecha: fecha,
			centrousr: centrousr
		},
		beforeSend: function(){
			$("body").css("cursor", "progress");
		},
		success: function(data){
			$("body").css("cursor", "default");
			if(data.length > 0){
				var datos = [];
				$.each(data, function (i, item) {
					var obj = [
					item.Planilla,
					item.Corte_ccu,
					item.Conductor,
					item.Total_cajas_preventa,
					item.vuelta_pg,
					item.fecha_prog,
					item.N_cliente,
					item.Descripcion,
					item.ayu1,
					item.ayu2,
					item.ayu3,
					item.cent_costo,
					item.rutchofer,
					null
				];
				// jsonListaDuplicados
				datos.push(obj);
			});
			$('#tblprogramacion').DataTable().destroy();
			var tabla = $('#tblprogramacion').DataTable({
				"searching": false,
				data: datos,
				"columns":[
				{
					width: "5%",
					data: datos.Planilla,
				},	
				{
					width: "2%",
					data: datos.Corte_ccu,
				},	
				{
					width: "20%",
					data: datos.Conductor,
				},	
				{
					width: "2%",
					data: datos.Total_cajas_preventa,
				},	
				{
					width: "2%",
					data: datos.vuelta_pg,
				},
				{
					width: "2%",
					data: datos.fecha_prog,
				},		
				{
					width: "2%",
					data: datos.N_cliente,
				},	
				{
					width: "5%",
					data: datos.Descripcion,
				},	
				{
					width: "10%",
					data: datos.ayu1,
				},	
				{
					width: "10%",
					data: datos.ayu1,
				},
				{
					width: "10%",
					data: datos.ayu3,
				},	
				{
					visible: false,
					data: datos.cent_costo,
				},	
				{
					visible: false,
					data: datos.rutchofer,
				},
				{					
					width: "5%",
					data: null,
					"render": function ( data, type, row ){
					return '<div align="center"><button class="btn btn-primary btn-xs" onclick="abrircondatos(\''+row[0]+'\',\''+row[1]+'\',\''+row[11]+'\',\''+row[2]+'\',\''+row[3]+'\',\''+row[4]+'\',\''+row[5]+'\',\''+row[7]+'\',\''+row[8]+'\',\''+row[9]+'\',\''+row[10]+'\',\''+row[12]+'\');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>';
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

			}else{
				$('#tblprogramacion').DataTable().destroy();
				$('#tblprogramacion').DataTable().clear();
				$('#tblprogramacion').DataTable().draw();
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
      	console.log('error1:' + errorThrown);
    	}
	});
	
}//fin funcion tblprogramacion


//Funciones que llaman al presionar el boton para cambiar los ayudantes
function editarayudante1(){
	var txtcentro = $("#txtcentro").val();

	$("#cambia1").html('Ayudante 1 <select id="slcupdate1"  class="form-control chosen-select"></select>');
	$("#vuelta1").html('<input type="text" id="txtVuelta1" value="" placeholder="" class="col-sm-1 form-control">');
	$("#btnedita1").html('<button class="btn btn-sm btn-success" onclick="btnguardaupdate1()"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>');
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'comboayudante',
			centro:txtcentro
		},
		dataType: 'json', 
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			if(data.length>0){
				$("#slcupdate1").html('<option value="">Seleccione o busque un ayudante</option>');
				$.each(data, function(id, dato){
					$("#slcupdate1").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
				});
			}
			$(".chosen-select").chosen();
		},
		error: function (jqXHR, textStatus, errorThrown) {
      		console.log('error:' + textStatus);
    	}
	});

}

function editarayudante2(){
	var txtcentro = $("#txtcentro").val();
	$("#cambia2").html('Ayudante 2 <select id="slcupdate2"  class="form-control chosen-select"></select>');
	$("#vuelta2").html('<input type="text" id="txtVuelta2" value="" placeholder="" class="col-sm-1 form-control">');
	$("#btnedita2").html('<br><button class="btn btn-sm btn-success" onclick="btnguardaupdate2()"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>');
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'comboayudante',
			centro:txtcentro
		},
		dataType: 'json', 
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			if(data.length>0){
				$("#slcupdate2").html('<option value="">Seleccione o busque un ayudante</option>');
				$.each(data, function(id, dato){
					$("#slcupdate2").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
				});
			}
			$(".chosen-select").chosen();
		},
		error: function (jqXHR, textStatus, errorThrown) {
      		console.log('error:' + textStatus);
    	}
	});

}

function editarayudante3(){
	var txtcentro = $("#txtcentro").val();
	$("#cambia3").html('Ayudante 3 <select id="slcupdate3"  class="form-control chosen-select"></select>');
	$("#vuelta3").html('<input type="text" id="txtVuelta3" value="" placeholder="" class="col-sm-1 form-control">');
	$("#btnedita3").html('<br><button class="btn btn-sm btn-success" onclick="btnguardaupdate3()"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>');
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'comboayudante',
			centro:txtcentro
		},
		dataType: 'json', 
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			if(data.length>0){
				$("#slcupdate3").html('<option value="">Seleccione o busque un ayudante</option>');
				$.each(data, function(id, dato){
					$("#slcupdate3").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
				});
			}
			$(".chosen-select").chosen();
		},
		error: function (jqXHR, textStatus, errorThrown) {
      		console.log('error:' + textStatus);
    	}
	});

}


function btnguardaupdate1(){
	var rut = $("#slcupdate1").val();
	var planilla = $("#txtplanilla").val();
	var vuelta1 = $("#txtVuelta1").val();

	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'updateayudante1',
			rut1:rut,
			pla1:planilla,
			vuelta1: vuelta1
		},
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function () {
			$('#modalcargando').modal('hide');
			swal('Ayudante actualizado','','success');
			tblprogramacion('', '', aux);
			$("#btnedita1").html('<br><button class="btn btn-sm" onclick="editarayudante1()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>');
		}
	});
}


function btnguardaupdate2(){
	var rut = $("#slcupdate2").val();
	var planilla = $("#txtplanilla").val();
	var vuelta2 = $("#txtVuelta2").val();

	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'updateayudante2',
			rut2:rut,
			pla2:planilla,
			vuelta2: vuelta2
		},
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			swal('Ayudante actualizado','','success');
			tblprogramacion('', '', aux);
			$("#btnedita2").html('<br><button class="btn btn-sm" onclick="editarayudante2()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>');
		}
	});
}

function btnguardaupdate3(){
	var rut = $("#slcupdate3").val();
	var planilla = $("#txtplanilla").val();
	var vuelta3 = $("#txtVuelta3").val();

	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'updateayudante3',
			rut3:rut,
			pla3:planilla,
			vuelta3: vuelta3
		},
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			swal('Ayudante actualizado','','success');
			tblprogramacion('', '', aux);
			$("#btnedita3").html('<br><button class="btn btn-sm" onclick="editarayudante3()" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>');
		}
	});
}

function editaconductor(){
	var txtcentro = $("#txtcentro").val();
	$("#cambiaconductor").html('Conductor <select id="slcconductor"  class="form-control chosen-select"></select>');
	$("#btneditaconductor").html('<button class="btn btn-sm btn-success" onclick="conductorupdate()">Guardar</button>');
	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: { 
			funcion : 'comboconductor',
			centro:txtcentro
		},
		dataType: 'json', 
		beforeSend: function () {
			$('#modalcargando').modal('show');
		}, 
		success: function (data) {
			$('#modalcargando').modal('hide');
			if(data.length>0){
				$("#slcconductor").html('<option value=""></option>');
				$.each(data, function(id, dato){
				$("#slcconductor").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
				});
			}
			$(".chosen-select").chosen();
		}
	});
}

function conductorupdate(){
	var rut_chofer = $("#slcconductor").val();
	var plani 	   = $("#txtplanilla").val();

	$.ajax({
		url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
		method: 'POST',
		async: false,
		data: {
			funcion: 'updateconductor',
			rutch: rut_chofer,
			plan: plani
		},
		dataType: 'json',
		beforeSend: function(){
			$("#modalcargando").modal('show');
		},
		success: function(data){
			$('#modalcargando').modal('hide');
			swal('Conductor actualizado','','success');
			tblprogramacion('', '', aux);
			$("#btneditaconductor").html('<br><button class="btn btn-sm" onclick="editarconductor()" ><i class="fa fa-pencil-square-o"></i> </button>');

		},
		error: function (jqXHR, textStatus, errorThrown) {
      		console.log('error:' + textStatus);
    	}
	});
	
}								

function abrircondatos(Planilla, corte,  rut,  conductor, cajas, cargas, clientes, ayu1, ayu2, ayu3, centro, vuelta_pg){
	$("#modificar").modal("show");
	$("#infoedita").html('<div class="col-lg-3 col-xs-6" align="center">Planilla: <br>'+Planilla+'</div><div class="col-lg-2 col-xs-6" align="center"> Corte: <br>'+corte+'</div><div class="col-lg-3 col-xs-6" align="center"> Cajas preventa: <br>'+cajas+'</div><div class="col-lg-2 col-xs-4" align="center">Carga: <br>'+cargas+'</div><div class="col-lg-2 col-xs-4" align="center">Cliente: <br>'+clientes+'</div><br><br>');
	$("#cambiaconductor").html('Conductor <input type="text" id="conductor" value="" placeholder="" class="form-control" disabled="">');
	$("#cambia1").html('Ayudante 1<input type="text" id="ayu1programado" value="" placeholder="" class="form-control" disabled="">');
	$("#cambia2").html('Ayudante 2<input type="text" id="ayu2programado" value="" placeholder="" class="form-control" disabled="">');
	$("#cambia3").html('Ayudante 3<input type="text" id="ayu3programado" value="" placeholder="" class="form-control" disabled="">');
	$("#vuelta1").html('<input type="text" id="txtVuelta1" value="" placeholder="" class="col-sm-1 form-control" disabled="">');
	$("#vuelta2").html('<input type="text" id="txtVuelta2" value="" placeholder="" class="col-sm-1 form-control" disabled="">');
	$("#vuelta3").html('<input type="text" id="txtVuelta3" value="" placeholder="" class="col-sm-1 form-control" disabled="">');
	$("#txtplanilla").html('<input type="text" id="txtplanilla" value="" class="form-control hidden">');
	$("#conductor").val(conductor);
	$("#ayu1programado").val(ayu1);
	$("#ayu2programado").val(ayu2);
	$("#ayu3programado").val(ayu3);
	$("#txtVuelta1").val(vuelta_pg);
	$("#txtVuelta2").val(vuelta_pg);
	$("#txtVuelta3").val(vuelta_pg);
	$("#txtcentro").val(centro);
	$("#txtplanilla").val(Planilla);
}
						
																	
							
							
</script>								
												</body>
												</html>