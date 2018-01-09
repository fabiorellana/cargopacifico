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

<button class="btn btn-primary btn-sm" onclick="cargamatriz()" style="position: absolute; margin-top: 0%; margin-left: 76%">Descargar matriz</button>

						<div class="container" >
						<div class="col-md-3 col-sm-6 col-xs-12" onclick="AyudantesDisponibles();" style="cursor: pointer;">
						<div class="info-box">
						<span class="info-box-icon bg-yellow" id="classcolor1"><i class="ion ion-ios-people-outline"></i></span>
						
						<div class="info-box-content">
						<span class="info-box-text">Ayudantes</span>
						<span class="info-box-number" id="lblayudantes"></span>
						</div>
						<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
						</div>
						

						<div class="col-md-3">
						<button type="" class="btn btn-primary btn-sm" disabled="" id="btn_honorarios" onclick="abremodalhonorarios();">Programar Honorarios</button>
						<br>
						<br>
						<button type="" onclick="creahonorarios()" class="btn btn-primary btn-sm">Crear honorarios</button>
						</div>

						</div>




<div class="container container-fluid">
<div id="contenedorprogramacion"></div>
<div class="alert alert-danger alert-dismissable " id="mensajedealerta1" hidden >
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Advertencia!</strong> No se ha terminado de cerrar la programacion. 
</div>
<div class="alert alert-danger alert-dismissable " id="mensajedealerta2" hidden >
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Advertencia!</strong> Debe importar el archivo de programacion a la Base de Datos. 
</div>
</div>
</div>
										<!-- ./wrapper -->
												
												
												
												
												
												
			

												
												
												
												<?php require('include/footer.php');?>
												
														
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


														<!--modal Matriz -->
<div class="modal fade" id="modalmatriz" >
<div class="modal-dialog modal-lg" >

<div class="modal-content">
<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Matriz Conductor- Corte</h4></div>
<div class="modal-body">
<div align="center">
<table id="matriz" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
<thead>
<tr>
<th>#</th>
<th>Corte</th>
<th>Patente</th>
<th>Conductor</th>

</tr>
</thead>
</table>
</div>
</div>
</div>
</div>
</div>

				<!--modal ayudante -->
				<div class="modal fade" id="modalayudantes" >
				<div class="modal-dialog modal-lg" >
				
				<div class="modal-content">
				<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Ayudantes Disponibles</h4></div>
				<div class="modal-body">
				<table id="tblayudantes" class="table-striped table-condensed table-hover  tablesaw tablesaw-stack" style="width: 100%;">
				<thead>
				<tr>
				<th>Rut</th>
				<th>Nombre</th>
				<th></th>
				</tr>
				</thead>
				</table>
				</div>
				</div>
				</div>
				</div>


				
				<!-- fin modfal ayudante -->

  				<!-- modal ingreso programacion-->              		
				<div class="modal fade" id="modalcreaprogramacion" >
				<div class="modal-dialog modal-lg" >
				
				<div class="modal-content">
				<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Crear programación</h4><div id="contplanillas">Planilla:</div></div>
				<div class="modal-body">
				<div align="">
				<div style="background-color:#CEE3F6" id="valoresmodalprogramacion">
				
				</div>
				<input type="text" id="txtcorte" class="form-control hidden">
				<input type="text" id="txtfecha" class="form-control hidden">
				<input type="text" id="txtVuelta" class="form-control hidden">
				<div id="continfo">
					
				</div>
				
				<br>
				

				<div id="combos">
				<input type="text" id="txtplanilla" class="form-control hidden" >
				

								<div id="divcontenedorprog">
							
								
								</div>
				
				

				<div class="modal-footer"><button onclick="guardaprogramacion();" class="btn btn-primary" type="submit" id="btnguardar">Guardar</button></div>
				</div>

				<div id="programados">
				<input type="text" id="txtplanillaprogramados" class="form-control hidden" >
					<br>

					<div class="col-lg-10" id="cambia1">
					Ayudante 1
					<input type="text" id="ayu1programado" value="" placeholder="" class="form-control" disabled="">
					</div>
					<div class="col-lg-2" id="btnedita1">
					<br>
					<button class="btn btn-sm" onclick="editarayudante(1)" >Editar </button>
					</div>
									
					<div class="col-lg-10" id="cambia2">
					Ayudante 2
					<input type="text" id="ayu2programado" value="" placeholder="" class="form-control" disabled>
					</div>
					<div class="col-lg-2"  id="btnedita2">
					<br>
					<button class="btn btn-sm" onclick="editarayudante(2)" >Editar </button>
					</div>

					<div class="col-lg-10" id="cambia3">
					Ayudante 3
					<input type="text" id="ayu3programado" value="" placeholder="" class="form-control" disabled>
					</div>
					<div class="col-lg-2"  id="btnedita3">
					<br>
					<button class="btn btn-sm" onclick="editarayudante(3)">Editar </button>
					</div>
				
				
					<div class="modal-footer">
						
					</div>
				</div>

			
				</div>
				</div>
				</div>
				</div>
				</div>
			


								<!--modal honorarios -->
								<div class="modal fade" id="modalhonorarios" >
								<div class="modal-dialog " >
								
								<div class="modal-content">
								<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Programar honorarios</h4></div>
								<div class="modal-body">
								Pendientes <br>
								<select id="slcpendientes" class="form-control">
								<option value=""></option>}
								</select>
								<br>
								<div id="divdatosplanillahono">
								
								</div>
								<br>
								<div  id="contenedorprogramah">
								
								<div class="col-md-12">
								Ayudante 1
								<select id="slcH1" class="form-control">
								<option value=""></option>}
								</select>
								</div>
								<br>
								<div class="col-md-12">
								Ayudante 2
								<select id="slcH2" class="form-control">
								<option value=""></option>}
								</select>
								</div>
								<br>
								<div class="col-md-12">
								Ayudante 3
								<select id="slcH3" class="form-control">
								<option value=""></option>}
								</select>
								</div>
								<br>
								<br>
								<br>
								
								</div>
								
								</div>
								<div class="modal-footer">
								<div class="col-md-12">
								<button type="" class="btn btn-primary" onclick="guardaAyudantesH();">Guardar Ayudantes</button>

								</div>
								</div>
								</div>
								</div>
								</div>	


								<!--modal crear honorarios -->
				<div class="modal fade" id="modalcreahonorarios" >
				<div class="modal-dialog " >
				
				<div class="modal-content">
				<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Crear honorarios</h4></div>
				<div class="modal-body">
				

				<form class="form-horizontal container-fluid" role="form">
				<div class="form-group">
				<div class="col-lg-10 col-sm-10 col-xs-9">
				<label for="ejemplo_email_3" class="control-label">Rut</label>
				<input type="text" class="form-control" id="txtHrut" maxlength="8" 	placeholder="Rut">
				</div>
				<div class="col-lg-2 col-sm-2 col-xs-3">
				<label for="ejemplo_email_3" class="control-label">&nbsp;</label>
				<input type="text" class="form-control" id="txtHdv" maxlength="1"		placeholder="Dv">
				</div>
				</div>
				<div class="form-group">
				<div class="col-lg-12">
				<label for="ejemplo_password_3" class=" control-label">Nombre Completo</label>
				
				<input type="text" class="form-control" id="txtHnombre" 
				placeholder="Nombre completo">
				</div>
				</div>
				
				<div class="form-group">
				
				<div class="col-lg-4">
				<label for="ejemplo_password_3" class="control-label">Telefono</label>
				<input type="tel" class="form-control" id="txtHfono" 
				placeholder="Telefono">
				</div>
				
				<div class="col-lg-8">
				<label for="ejemplo_password_3" class="control-label">Dirección</label>
				
				<input type="text" class="form-control" id="txtHdireccion" 
				placeholder="Dirección">
				</div>
				</div>
				
				
				</form>


				</div>
				<div class="modal-footer">
					<button type="" class="btn btn-primary" onclick="guardahonorarios();">Crear</button>
				</div>
				<div class="container-fluid">
					<div class="alert alert-info">Recuerda Adjuntar la información Correspondiente para un nuevo honorario</div>
				</div>
				</div>
				</div>
				</div>						
									
												
												</body>
												</html>
<script type="text/javascript">





$(document).ready(function(){

	$("#programados").hide();
	$("#btnColapse").trigger("click");
	creacuadrosplanilla();
	lblayudantes();		
	//activa btn honorarios
	setInterval("activa_btn_honorarios()", 1000);					
});


function creahonorarios(){
	$("#modalcreahonorarios").modal('show');
}

function guardaAyudantesH(){
	var slcH1 = $("#slcH1").val();
	var slcH2 = $("#slcH2").val();
	var slcH3 = $("#slcH3").val();
}

function guardahonorarios(){
	var Hrut       = $("#txtHrut").val();
	var Hdv        = $("#txtHdv").val();
	var Hnombre    = $("#txtHnombre").val();
	var Hfono      = $("#txtHfono").val();
	var Hdireccion = $("#txtHdireccion").val();

	$.ajax({
url: 'controllers/programacion/programacion.php',
method: 'POST',
async: false,
data: { 
funcion : 'creahonorarios',
Hrut:Hrut,
Hdv:Hdv,
Hnombre:Hnombre,
Hfono:Hfono,
Hdireccion:Hdireccion
},
beforeSend: function () {
$('#modalcargando').modal('show');
}, 
success: function (data) {
$('#modalcargando').modal('hide');
$("#txtHrut").val('');
$("#txtHdv").val('');
$("#txtHnombre").val('');
$("#txtHfono").val('');
$("#txtHdireccion").val('');
swal('Honorario Creado','','success');
}
})
}


function abremodalhonorarios(){
	$("#contenedorprogramah").hide();
$("#modalhonorarios").modal('show');
$.ajax({
url: 'controllers/programacion/programacion.php',
method: 'POST',
async: false,
data: { 
funcion : 'carganoprogramadas',
},
dataType: 'json', 
beforeSend: function () {
$('#modalcargando').modal('show');
}, 
success: function (data) {
$('#modalcargando').modal('hide');
if(data.length>0){
$("#slcpendientes").html('<option value=""></option>');
$.each(data, function(id, dato){
$("#slcpendientes").append('<option value="'+dato.vuelta+'*'+dato.Corte_ccu+'*'+dato.Conductor+'">'+dato.Corte_ccu+' Vuelta '+dato.vuelta+'   Conductor '+dato.Nombre+'</option>');
});
}
}
})
}


$("#slcpendientes").on('change', function(){


	var aux = this.value;
	$.ajax({
url: 'controllers/programacion/programacion.php',
method: 'POST',
async: false,
data: { 
funcion : 'carganoprogramadas2',
aux:aux
},
dataType: 'json', 
beforeSend: function () {
$('#modalcargando').modal('show');
}, 
success: function (data) {
$('#modalcargando').modal('hide');
if(data.length>0){
$("#contenedorprogramah").show();
$.each(data, function (i, dato) {
$("#divdatosplanillahono").html('Planilla: '+dato.Planilla+'<br>'+'Fecha: '+dato.Fecha_ccu+'<br>'+'Cajas: '+dato.Total_cajas_preventa);
});



						$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'comboayudantehonorarios',
						},
						dataType: 'json', 
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						if(data.length>0){
						$("#slcH1").html('<option value=""></option>');
						$("#slcH2").html('<option value=""></option>');
						$("#slcH3").html('<option value=""></option>');
						$.each(data, function(id, dato){
						$("#slcH1").append('<option value="'+dato.Rut+'">'+dato.Nombres+'</option>');
						$("#slcH2").append('<option value="'+dato.Rut+'">'+dato.Nombres+'</option>');
						$("#slcH3").append('<option value="'+dato.Rut+'">'+dato.Nombres+'</option>');
						});
						//cuando se  abre la ventana modal se ejecuta cargaprogramados(), consulta si es que hay datos para planilla programada yt muestra correspondiente
						}
						
						}
						});






}

}
})
})



function activa_btn_honorarios(){
	var contador =$("#lblayudantes").text();
	if(contador == 0){
			$("#btn_honorarios").removeAttr("disabled");
	}
}








	
		function AyudantesDisponibles(){
			$.ajax(
        {
            url: 'controllers/programacion/programacion.php',
            method: 'POST',
            async: false,
            data: { 
              funcion : 'tblayudantes'
              },
            dataType: 'json',
            beforeSend: function () {
            	$('#modalcargando').modal('show');

            },
            success: function (data) {
			  $("#modalayudantes").modal("show");
              $('#modalcargando').modal('hide');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.Rut,
                        item.Nombre,
                        null
                               ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
              $('#tblayudantes').DataTable().destroy();
              var tabla = $('#tblayudantes').DataTable({ 
              	responsive: true,
						dom: 'Bfrtip',
                      buttons: [
                          'excel'
                      ],

                data: datos,
                		
                "columns":[
                {
                  width: "5%",
                  data: datos.Rut,
                },
                {
                  width: "25%",
                  data: datos.Nombre,
                },
              	{
        			width: "20%",
     				data: null,
					"render": function ( data, type, row ) {
					return '<div align="center"><select id="selectestadoflota" class="form-control" onchange="cambiastadotrabajador(\''+row[0]+'\',this.value);"><option values="Disponible">Disponible</option>	<option values="Falla">Falla</option><option values="Permiso">Permiso</option></select></div>';
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
                $('#tblayudantes').DataTable().destroy();
                $('#tblayudantes').DataTable().clear();
                $('#tblayudantes').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalcargando').modal('hide');
                console.log('error');
               
            }

        });

		}
	

		


function cambiastadotrabajador(rut, estado){
		$.ajax(
		{
		url: 'controllers/programacion/programacion.php',
		method: 'POST',
		async: false,
		data: { 
		funcion : 'cambiastadotrabajador',
		rut:rut,
		estado:estado
		
		},
		beforeSend: function () {
		$('#modalcargando').modal('show');
		
		},
		success: function (data) {
		$('#modalcargando').modal('hide');
		swal('Estado del ayudante',''+estado+'','success');
		lblayudantes();

		}
		})

}
            



	function cargamatriz(){
    $.ajax(
        {
            url: 'controllers/programacion/programacion.php',
            method: 'POST',
            async: false,
            data: { 
              funcion : 'cargamatriz'
              },
            dataType: 'json',
            beforeSend: function () {
            	$('#modalcargando').modal('show');
            },
            success: function (data) {
              $('#modalcargando').modal('hide');
              $('#modalmatriz').modal('show');
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.id,
                        item.corte,
                        item.patente,
                        item.Nombre,
                        
                        null
                               ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
              $('#matriz').DataTable().destroy();
              var tabla = $('#matriz').DataTable({ 
						dom: 'Bfrtip',
                      buttons: [
                          'excel'
                      ],

                data: datos,
                		
                "columns":[
                {
                  width: "5%",
                  data: datos.id,
                },
                {
                  width: "25%",
                  data: datos.corte,
                },
                {
                  width: "25%",
                  data: datos.patente,
                },
                {
                  width: "25%",
                  data: datos.Nombre,
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
                $('#matriz').DataTable().destroy();
                $('#matriz').DataTable().clear();
                $('#matriz').DataTable().draw();
              }
              
            }, 
            error: function (jqXHR, textStatus, errorThrown) {
              $('#modalcargando').modal('hide');
                console.log('error');
               
            }
        });

}
		


	function creacuadrosplanilla(){
		$.ajax({
			url: 'controllers/programacion/programacion.php',
			method: 'POST',
			async: false,
			data: { 
			funcion : 'cuadrosplanilla'
			},
			dataType: 'json',
			beforeSend: function () {
				$("body").css("cursor", "progress");
				$("#contenedorprogramacion").html('');
			},
			success: function (data) {
				$("#contenedorprogramacion").html('<br><h1 align="center">Nada por aqui</h1>');
				$("body").css("cursor", "default");
					$.each(data, function(data,dato){
						if(dato.Estado==0){
							var estado ="<i style='color:red; font-size:30px'>✖</i>";

						}else{
							var estado ="<i style='color:green; font-size:30px'>✓</i>";
						}
						//Sentencia if para la fila cerrada
						if(dato.cerrada == 0){
							$("#mensajedealerta1").show();
						}else{
							var aux = dato.conductor;
						var conductor =	aux.split(' ');
						var nombre = conductor[2];
						if(nombre.length > 7){
						var nombrecorto =	nombre.split('');
						nombre = nombrecorto[0]+'.';
						}
						var App = conductor[0];
						var conductors= nombre +' '+ App;

							$("#contenedorprogramacion").append('<div class="col-lg-2 col-sm-6 col-xs-6" ><br><div align="center" class="panel panel-success" onclick="funcionModalAbrir( \''+dato.corte+'\', \''+dato.Fecha_ccu+'\', \''+dato.vuelta+'\', \''+dato.Estado+'\' );" style="cursor:pointer;"> '+conductors+'<br>		Vuelta: '+dato.vuelta+'<br> 	<div align="center" id="imagenestado">'+estado+'</div> 	Pl. '+dato.planillas+'	<br> Corte: '+dato.corte+'<br> '+dato.Fecha_ccu+'		</div>		</div>');
	
						}//Fin if cerrada
							
					});
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('#modalcargando').modal('hide');
                console.log('error');
			}

			});

	}	






function funcionModalAbrir(corte, fecha, vuelta, estado){

	  $("#txtcorte").val(corte);
		$("#txtfecha").val(fecha);
		$("#txtVuelta").val(vuelta);

$("#modalcreaprogramacion").modal("show");
		$("#btnguardar").show();
		if(estado==0){
					$.ajax({
					url: 'controllers/programacion/programacion.php',
					method: 'POST',
					dataType: 'json',
					async: false,
					data: {
					funcion: 'cuadrosplanilla2',
					corte: corte,
					fecha: fecha,
					vuelta:vuelta
					},
					beforeSend: function () {
					$("body").css("cursor", "progress");
					$('#contplanillas').html('Planillas');
					$('#continfo').html('');
					restablecevacio();
					},
					success: function (data) {
					$('body').css('cursor', 'default');
					$.each(data, function(id, dato){
					$('#contplanillas').append('&nbsp;'+dato.Planilla+'.');
					$('#continfo').html('Corte: '+dato.corte+ '<br> Cajas Preventa: '+dato.Total_cajas_preventa+'<br> Conductor: '+dato.conductor+ '<br> Fecha: '+dato.Fecha_ccu);
					$("#divcontenedorprog").html('<div class="col-md-12">	<div class="col-md-9">Ayudante 1<select id="slcayudante1"  class="form-control chosen-select" required=""><option value=""></option>	</select>	</div><div class="col-md-3"><br></div></div>	<div class="col-md-12"><div class="col-md-9">Ayudante 2<select id="slcayudante2"  class="form-control chosen-select" required=""><option value=""></option></select></div><div class="col-md-3"><br></div></div><div class="col-md-12"><div class="col-md-9">Ayudante 3<select id="slcayudante3"  class="form-control chosen-select" required=""><option value=""></option></select></div><div class="col-md-3"><br></div></div>');

					});
					
					},
					error: function(jqXHR, textStatus, errorThrown){
					$("body").css("cursor", "default");
					console.log('error: '+jqXHR);
					}
					});

		comboayudante();
	}else{

		$("#btnguardar").hide();
				$("#divcontenedorprog").html('');
						$.ajax({
					url: 'controllers/programacion/programacion.php',
					method: 'POST',
					dataType: 'json',
					async: false,
					data: {
					funcion: 'cuadrosplanilla2',
					corte: corte,
					fecha: fecha,
					vuelta:vuelta
					},
					beforeSend: function () {
					$("body").css("cursor", "progress");
					$('#contplanillas').html('Planillas');
					$('#continfo').html('');

					},
					success: function (data) {
					$("body").css("cursor", "default");
					$.each(data, function(id, dato){
						$('#contplanillas').append('&nbsp;'+dato.Planilla+'.');
					$('#continfo').html('Corte: '+dato.corte+ '<br> Cajas Preventa: '+dato.Total_cajas_preventa+'<br> Conductor: '+dato.conductor+ '<br> Fecha: '+dato.Fecha_ccu);

					$("#divcontenedorprog").html('<div class="col-md-12" id="divayu1"><div class="col-md-9">Ayudante 1<input type="text" id="ayu1" value="" placeholder="" class="form-control" disabled></div><div class="col-md-3"><br><button onclick="editaayu1();" class="btn btn-info">Editar</button></div><br></div>  <div class="col-md-12" id="divayu2"><div class="col-md-9">Ayudante 2<input type="text" id="ayu2" value="" placeholder="" class="form-control" disabled></div><div class="col-md-3"><br><button onclick="editaayu2();" class="btn btn-info">Editar</button></div><br></div>  <div class="col-md-12" id="divayu3"><div class="col-md-9">Ayudante 3<input type="text" id="ayu3" value="" placeholder="" class="form-control" disabled></div><div class="col-md-3"><br><button onclick="editaayu3();" class="btn btn-info">Editar</button></div></div> ');

					$("#ayu1").val(dato.ayu1);
					$("#ayu2").val(dato.ayu2);
					$("#ayu3").val(dato.ayu3);
					});
					
					},
					error: function(jqXHR, textStatus, errorThrown){
					$("body").css("cursor", "default");
					console.log('error: '+jqXHR);
					}
					});
						cargaprogramados(dato.Planilla);
	}


		}

function editaayu1(){
		swal({
  title: '¿Editar Ayudante?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#FACC2E',
  confirmButtonText: 'Si',
  cancelButtonText: 'Cancelar'

}).then(function () {
 $("#divayu1").html('<div class="col-md-9">Ayudante 1<select id="slcayudante1" class="form-control chosen-select"></select></div><div class="col-md-3"><br><button onclick="guardaeditaayu1();" class="btn btn-success">Guardar</button></div>');
  comboayudante1();
})
	
}
function editaayu2(){
				swal({
  title: '¿Editar Ayudante?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#FACC2E',
  confirmButtonText: 'Si',
  cancelButtonText: 'Cancelar'
}).then(function () {
 $("#divayu2").html('<div class="col-md-9">Ayudante 2<select id="slcayudante2" class="form-control chosen-select"></select></div><div class="col-md-3"><br><button onclick="guardaeditaayu2();" class="btn btn-success">Guardar</button></div>');
  comboayudante2();
})
}

function editaayu3(){
			swal({
  title: '¿Editar Ayudante?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#FACC2E',
  confirmButtonText: 'Si',
  cancelButtonText: 'Cancelar'

}).then(function () {
  $("#divayu3").html('<div class="col-md-9">Ayudante 3<select id="slcayudante3" class="form-control chosen-select"></select></div><div class="col-md-3"><br><button onclick="guardaeditaayu3();" class="btn btn-success">Guardar</button></div>');
  comboayudante3();
})
}


function guardaeditaayu1(){
			var slcayu1 = $("#slcayudante1").val();
			var corte = $("#txtcorte").val();
			var fecha = $("#txtfecha").val();
			var vuelta = $("#txtVuelta").val();

			$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'guardaeditaayu1',
						slcayu1:slcayu1,
						corte:corte,
						fecha:fecha,
						vuelta:vuelta
						},
						
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						swal('Ayudante','Actualizado!','success');
						}
					});

}


function restablecevacio(){

			$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'restablecevacio'
						},
						
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						swal('Registros a 0',';)!','success');
						}
					});

}


function guardaeditaayu2(){
			var slcayu2 = $("#slcayudante2").val();
			var corte = $("#txtcorte").val();
			var fecha = $("#txtfecha").val();
			var vuelta = $("#txtVuelta").val();

			$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'guardaeditaayu2',
						slcayu2:slcayu2,
						corte:corte,
						fecha:fecha,
						vuelta:vuelta
						},
						
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						swal('Ayudante','Actualizado!','success');
						}
					});

}


function guardaeditaayu3(){
			var slcayu3 = $("#slcayudante3").val();
			var corte = $("#txtcorte").val();
			var fecha = $("#txtfecha").val();
			var vuelta = $("#txtVuelta").val();

			$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'guardaeditaayu3',
						slcayu3:slcayu3,
						corte:corte,
						fecha:fecha,
						vuelta:vuelta
						},
						
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						swal('Ayudante','Actualizado!','success');
						}
					});

}





	function comboayudante1(){
						$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'comboayudante',
						},
						dataType: 'json', 
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						if(data.length>0){
						$("#slcayudante1").html('<option value=""></option>');
						
						$.each(data, function(id, dato){
						$("#slcayudante1").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						
						});
						//cuando se  abre la ventana modal se ejecuta cargaprogramados(), consulta si es que hay datos para planilla programada yt muestra correspondiente
						}
						
						}
						});
						}//fin function comboayudante	

	function comboayudante2(){
						$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'comboayudante',
						},
						dataType: 'json', 
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						if(data.length>0){
						$("#slcayudante2").html('<option value=""></option>');
						
						$.each(data, function(id, dato){
						$("#slcayudante2").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						
						});
						//cuando se  abre la ventana modal se ejecuta cargaprogramados(), consulta si es que hay datos para planilla programada yt muestra correspondiente
						}
						
						}
						});
						}//fin function comboayudante	



	function comboayudante3(){
						$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'comboayudante',
						},
						dataType: 'json', 
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						if(data.length>0){
						$("#slcayudante3").html('<option value=""></option>');
						
						$.each(data, function(id, dato){
						$("#slcayudante3").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						
						});
						//cuando se  abre la ventana modal se ejecuta cargaprogramados(), consulta si es que hay datos para planilla programada yt muestra correspondiente
						}
						
						}
						});
						}//fin function comboayudante													








						function comboayudante(){
						$.ajax({
						url: 'controllers/programacion/programacion.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'comboayudante',
						},
						dataType: 'json', 
						beforeSend: function () {
						$("body").css("cursor", "progress");
						}, 
						success: function (data) {
						$("body").css("cursor", "default");
						if(data.length>0){
						$("#slcayudante1").html('<option value=""></option>');
						$("#slcayudante2").html('<option value=""></option>');
						$("#slcayudante3").html('<option value=""></option>');
						$.each(data, function(id, dato){
						$("#slcayudante1").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						$("#slcayudante2").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						$("#slcayudante3").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
						});
						//cuando se  abre la ventana modal se ejecuta cargaprogramados(), consulta si es que hay datos para planilla programada yt muestra correspondiente
						}
						
						}
						});
						}//fin function comboayudante






		function guardaprogramacion(){

		var ayu1 =$("#slcayudante1").val();
		var ayu2 =$("#slcayudante2").val();
		var ayu3 =$("#slcayudante3").val();

			var corte = $("#txtcorte").val();
			var fecha = $("#txtfecha").val();
			var vuelta = $("#txtVuelta").val();


		var planilla =$("#txtplanilla").val();
		if(ayu1 == ayu2 ){
			swal('Error', 'No se puede seleccionar mas de una vez al mismo ayudante', 'error');
			$("#slcayudante1").val('');
			$("#slcayudante2").val('');
			$("#slcayudante3").val('');	
		}else {

	
			$.ajax(
			{
				url: 'controllers/programacion/programacion.php',
				method: 'POST',
				async: false,
				data: { 
				funcion : 'guardaprogramacion',
				ayu1:ayu1,
				ayu2:ayu2,
				ayu3:ayu3,
				corte:corte,
				fecha:fecha,
				vuelta:vuelta

				},
				beforeSend: function () {
				},
				success: function (data) {
						creacuadrosplanilla();
						lblayudantes();		
						$("#modalcreaprogramacion").modal('hide');
				$('#modalcargando').modal('hide');
				swal('Programacion guardada!','','success');
				$("#modalcreaprogramacion").modal("hide");
		        $("#slcayudante1").val(ayu1);
				$("#slcayudante2").val(ayu2);
				$("#slcayudante3").val(ayu3);	
				
				$("#txtcorte").val('');
				$("#txtfecha").val('');
				$("#txtVuelta").val('');
				}
			});
		}
}

			
						function lblayudantes(){

$.ajax({

url: 'controllers/programacion/programacion.php',

method: 'POST',

async: false,

data: { 

funcion : 'lblayudantes',

},

dataType: 'json',

beforeSend: function () {

$("#lblcamiones").html("<img src='../images/ajax-loader.gif'></img>");	

},

success: function (data) {

$('#lblcamiones').html('');

if(data.length>0){

$.each(data, function(id, dato){

$('#lblayudantes').html(dato.cant);

});

}

}

})

}

			
</script>