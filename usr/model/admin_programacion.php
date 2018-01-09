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
												<br >
												<br>
												<br >
												<ol class="breadcrumb pull-right">
												<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
												<li class="active">Administrar programación</li>
												</ol>

											<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="info-box">
											<span class="info-box-icon bg-yellow"><i class="fa fa-exclamation" aria-hidden="true"></i>
</span>
											
											<div class="info-box-content">
											<span class="info-box-text">Solicitudes de cambios</span>
											<span class="info-box-number">10</span>
											</div>
											<!-- /.info-box-content -->
											</div>
											<!-- /.info-box -->
											</div>

											<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="info-box">
											<span class="info-box-icon bg-yellow"><i class="fa fa-bell-o" aria-hidden="true"></i></span>
											
											<div class="info-box-content">
											<span class="info-box-text">Notificaciones</span>
											<span class="info-box-number">10</span>
											</div>
											<!-- /.info-box-content -->
											</div>
											<!-- /.info-box -->
											</div>

												<div class="" align="right">
												<div class="form-group  col-md-3 " >
												<div class="input-group   ">
												<div class="input-group-addon">
												<i class="fa fa-flag-checkered" aria-hidden="true"></i>
												</div>
												<select id="combocentro" class="form-control input-sm  " >
												<option value="">Todos</option>
												
												</select>
												</div>
												<!-- /.input group -->
												</div>
												
												<div class="form-group  col-md-3 " >
												<div class="input-group   ">
												<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control input-sm  "  id="txtfecha" placeholder="Fecha">
												</div>
												
												</div>

																							
												</div>

	<div class="container col-md-12">
		<div class="box box-info">
					<div class="box-header with-border">
					<div class="col-md-3">
					<h3 class="box-title">Programación</h3>
					</div>
						
					
						
				<div class   ="box-tools pull-right">
				<button type ="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				
				</div>
            </div>
            <!-- /.box-header -->
					<div class="box-body">
				
					<table class=" table-striped table-condensed table-hover table" id="tblprogramacion" style="width: 100%;">
					<thead>
					<tr>
					<th>Planilla</th>
					<th>Corte</th>
					<th>Conductor</th>
					<th>cajas</th>
					<th>Cargas</th>
					<th>Cliente</th>
					<th>centro</th>
					<th>Ayudante</th>
					<th>Ayudante</th>
					<th>Ayudante</th>
					<th></th>
					</tr>
					</thead>
					
					</table>
					
					<!-- /.table-responsive -->
					</div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
          </div>
	</div>

<div class="container-fluid">
	<div class="col-md-3 pull-left">
	<div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Fallas de conductores Hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>
<div class="col-md-3">
	<div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Fallas ayudantes hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" id="fallasayudantes">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>
<div class="col-md-3">
	<div class="small-box bg-green">
            <div class="inner">
              <h3>44</h3>

              <p>Historial de cambios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>
</div>
												
											
												</div>
											
												<!-- ./wrapper -->
												
												
												
														<div class="modal fade modal-primary" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title">Editar Programación</h4>
														</div>
														<div class="modal-body">
														<div id="modal_editar">	
														</div>													
														</div>
														<div class="modal-footer"></div>
														</div>
														</div>
														</div>

														<div class="modal fade" id="modalfallas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title">Fallas Ayudantes</h4>
														</div>
														<div class="modal-body">
														<div id="modal_editar">	
														</div>
														</div>
														<div class="modal-footer"></div>
														</div>
														</div>
														</div>
												
												
												
			

												
												
												
												<?php require('include/footer.php');?>
												
												
												
<script>
$( document ).ready(function() {
   tblprogramacion();
   cargaComboCentro();
   $( "#txtfecha" ).datepicker();
   $( "#txtfecha2" ).datepicker();
    $("#btnColapse").trigger("click");
});

$("#combocentro").on("change", function(){
	var fecha=$("#txtfecha").val();
	tblprogramacion(this.value, fecha)
})

$("#txtfecha").on("change", function(){
	var centro=$("#combocentro").val();
	tblprogramacion(centro ,this.value)
})

$("#fallasayudantes").on('click', function(event) {
event.preventDefault();
$("#modalfallas").modal();
});
		

function cargaComboCentro(){
  //Carga combo estado
  $.ajax({
			url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
			method: 'POST',
			async: false,
			data: {
			funcion : 'jsonComboCentro'
			},
			dataType: 'json',
			beforeSend: function(){
			},
			success: function (data) {
			if(data.length>0){
			$("#comboCentroF").html("");
			$.each(data, function(id, dato){
			$("#combocentro").append(
			'<option value="'+dato.id+'">'+dato.Descripcion+'</option>');
			});
			}
			},
			error: function (jqXHR, textStatus, errorThrown) {
			console.log('error:' + textStatus);
			}
			
			});
}//fin funciones carga combo centro de costos


function tblprogramacion(centro ,fecha){

								$.ajax(
								{
								url: 'controllers/gestion/Programacion/gesprogramacionajax.php',
								method: 'POST',
								async: false,
								data: { 
								funcion : 'tblprogramacion',
								centro:centro,
								fecha,fecha
								},
								dataType: 'json',
								beforeSend: function () {
								$('#modalcargando').modal('show');
								},
								success: function (data) {
								$('#modalcargando').modal('hide');
								if(data.length>0){
								var datos = [];
								$.each(data, function (i, item) {
								var obj = [
								item.Planilla,
								item.Corte_ccu,
								item.Conductor,
								item.Total_cajas_preventa,
								item.N_cargas,
								item.N_cliente,
								item.Descripcion,
								item.ayu1,
								item.ayu2,
								item.ayu3,
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
								data: datos.N_cargas,
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
								width: "5%",
								data: null,
								"render": function ( data, type, row ) {
								return '<div align="center"><button class="btn btn-primary btn-xs" onclick="abrircondatos(\''+row[0]+'\');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>';
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
								$('#tblprogramacion').DataTable().destroy();
								$('#tblprogramacion').DataTable().clear();
								$('#tblprogramacion').DataTable().draw();
								}							
								}, 
								error: function (jqXHR, textStatus, errorThrown) {
								$('#modalcargando').modal('hide');
								console.log('error');							
								}
								});							
								}												
												
						function abrircondatos(a){
							alert(a);
						}						
</script>
												
												</body>
												</html>