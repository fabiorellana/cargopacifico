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



<div class="container container-fluid">



				<div class="col-md-3 col-sm-6 col-xs-12" >

				<div class="info-box" id="contflota">

				<span class="info-box-icon bg-yellow" id="cambiacolor1"><i class="fa fa-truck" aria-hidden="true"></i></span>

				

				<div class="info-box-content">

				<span class="info-box-text">Flota</span>

				<span class="info-box-number" id="lblcamiones"></span>

				</div>

				<!-- /.info-box-content -->

				</div>

				<!-- /.info-box -->

				</div>

				<div class="col-md-3 col-sm-6 col-xs-12" id="contconductores">

				<div class="info-box">

				<span class="info-box-icon bg-yellow" id="cambiacolor2"><i class="fa fa-users" aria-hidden="true"></i></span>

				

				<div class="info-box-content">

				<span class="info-box-text">Conductores</span>

				<span class="info-box-number" id="lblconductores"></span>

				</div>

				<!-- /.info-box-content -->

				</div>

				<!-- /.info-box -->

				</div>

		<div style=" margin-top: 5%; margin-right: 5%">
				<div class="col-md-2">
				<div class="btn btn-primary btn-sm" id="cargarprog" >Cargar Programación</div>
				
				</div>
				
				<div class="col-md-1">
				<div class="btn btn-primary btn-sm" id="editarMatriz" >Matriz</div>
				
				</div>
				
				<div class="col-md-1">
				<div class="btn btn-primary btn-sm" id="ingresoprogramacion">Registrar Programacion</div>
				
				</div>
		</div>
			



			







<h2 align="center">&nbsp;</h2>

<div class="well">

<table id="programacion" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">

<thead>

<tr>

<th>Planilla</th>

<th>Corte</th>

<th>Camión</th>

<th>N° Carga</th>

<th>Conductor</th>

<th>Fecha</th>

<th>Rut</th>

<th>Odometro</th>

<th>Fecha Ingreso Odometro</th>

<th>Editar<th>

</tr>

</thead>

</table>

</div>

<div align="center">
	<button type=""  class="btn-sm btn btn-primary" onclick="cerrarprogramacion();">Cerrar programación</button>
</div>
<br>
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Advertencia!</strong> Para ingresar falla a camión, es necesario primero realizar cambio de camión en la planilla de programación. 
</div>
<div class="alert alert-danger alert-dismissable " id="ayuda" hidden >
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>¡Advertencia!</strong> Para realizar cambios en la programación debe comunicarse con el encargado de programación para gestionar el cambio. 
</div>
</div>

</div>






								

<div id="modalflota" class="modal fade " role="dialog">

<div class="modal-dialog modal-lg">

<!-- Modal content-->

<div class="modal-content ">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title">Flota disponible</h4>

</div>

<div class="modal-body">

<div class="">

<table id="tblflota" class="table  table-responsive  table-condensed " style="width: 100%; ">

<thead>

<tr>

<th>patente</th>

<th>Estado<th>

</tr>

</thead>

</table> 	

</div>

</div>

<div class="modal-footer">

</div>

</div>

</div>

</div>												

		

<div id="modalconductores" class="modal fade " role="dialog">

<div class="modal-dialog modal-lg">

<!-- Modal content-->

<div class="modal-content">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title">Conductores disponibles<st id="txtplanilla"></st></h4>

</div>

<div class="modal-body">

<div class="">

<table id="tblconductores" class="table  table-responsive " style="width: 100%; ">

<thead>

<tr>

<th>Rut</th>

<th>Nombre</th>

<th>Estado<th>

</tr>

</thead>

</table> 	

</div>

</div>

<div class="modal-footer">

</div>

</div>

</div>

</div>												



												

												

												

			



												

												

												

	<?php require('include/footer.php');?>



	<!-- modal observacion flota -->

	<div class="modal fade" id="modalobsflota">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Observacion Flota</h4>
				</div>							
				<div class="modal-body">
					Ingrese observación
					<textarea id="txtobsflota" class="form-control"></textarea>
					<br>
					Enviar a
					<input type="text" id="txtMail" value="" placeholder="Ejemplo@cargopacifico.cl" class="form-control">
					<br>
				</div>
				<div class="modal-footer">
					<div align="center">
						<button id="btnenviaobsflota" class="btn btn-primary">Enviar</button>
					</div>
				</div>							
			</div>
		</div>
	</div>



												

														

		<!--modal importar-->

		<div class="modal fade" id="modalimportar">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Importar Excel Programación <br> para Centro: <?php echo $ccosto;?></h4>
					</div>														
				<div class="modal-body">
					<div align="center">
					<div class="container-fluid">
						<div class="row">
							<form method="post" enctype="multipart/form-data" class="formulario">
	  							<div class="col-lg-6"> 
	  								<input id="archivo"  name="archivo" type="file"  />
	  							</div>
	  							<div class="col-lg-1"></div>
	  							<div class="col-lg-6">
	  								<input type="button" id="btnimportar" value="Importar" class="btn btn-success">
	  							</div>
  							</form>
						</div>
					</div>
					</div>
				</div>
				<div class="modal-footer">
				<div id="respuesta" align="center"></div>
				</div>									

				</div>
			</div>
		</div>



	<!--modal de carga -->

														<div class="modal fade" id="modalupload" >

														<div class="modal-dialog">

														<div class="modal-content">

														

														<div class="modal-body">

														<div align="center">
															<h4>Subiendo el archivo de programacion, por favor espere...</h4>
															<img src="../images/cargando.gif" align="center">

														</div>

														

														</div>

														

														</div>

														</div>

														</div>



														<!--modal Matriz -->





															<!-- Modal programacion -->

<div id="modaleditarprogramacion" class="modal fade modal-primary" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar  planilla <st id="txtplanilla"></st></h4>

      </div>

      <div class="modal-body">

      <input type="text" id="txtcorte"  placeholder="" class="hidden">

        <p>Flota Disponible</p>



			<select id="selectpatente" class="form-control">

			<option value=""></option>

			option

			</select>

        <p>Conductor</p>

				<select id="selectConductor"  class="form-control" >

				<option value=""></option>

				option

				</select>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" onclick="guardadatos()" ><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Guardar</button>

      </div>

    </div>



  </div>

</div>





<!-- modal matriz -->

<div class="modal fade" id="modalmatriz" >

<div class="modal-dialog modal-lg" >



<div class="modal-content">

<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Editar vinculo Corte - Conductor - Camion</h4></div>

<div class="modal-body">

<div align="center">

<table id="matriz" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">

<thead>

<tr>

<th>#</th>

<th>Corte</th>

<th>Patente</th>

<th>Conductor</th>

<th><th>

</tr>

</thead>

</table>

</div>

</div>

</div>

</div>

</div>



<!-- editar matriz -->

<div class="modal fade modal-primary" id="modaleditarcorte" >

<div class="modal-dialog" >

<div class="modal-content">

<div class="modal-header"> <h4 class="modal-title" id="myModalLabel">Editar Corte <b id="corteid"></b> </h4></div>

<div class="modal-body">

<div >

corte

<input type="text" id="txtCorte" value="" placeholder=""  class="form-control" disabled="" >

<br>

Patente

<select id="txtpatente" class="form-control">

	<option value=""></option>

	option

</select>

<br>

conductor

<select id="txtconductor" class="form-control">

	<option value=""></option>

	option

</select></div>

</div>

<div class="modal-footer">

	<div class="btn btn-primary " id="guardadatos">

		<i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Guardar

	</div>

</div>

</div>

</div>

</div>

		

		<!-- odometro -->

		

		

		<!-- Modal -->

		<div  class="modal fade modal-warning" role="dialog" id="modalodometromodalodometro">

		<div class="modal-dialog  modal-warning">

		

		<!-- Modal content-->

		<div class="modal-content">

		<div class="modal-header">

		<button type="button" class="close" data-dismiss="modal">&times;</button>

		<h4 class="modal-title">Ingresar Odometro</h4>

		</div>

		<div class="modal-body">

		<div class="">

		<div class="">

		patente

		<input type="text" id="txtpodometro" value="" placeholder=""  class="form-control" disabled="" >

		<br>

		</div>

		<div class="">

		Km

		<input type="text" id="txtkm" value="" placeholder=""  class="form-control"  onkeyup="puntitos(this)" onchange="puntitos(this)">

		<br>

		<br>

		</div>

		

		</div>

		</div>

		<div class="modal-footer" align="center">

		<button type="button" class="btn btn-primary" id="btnguardaodometro" ><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Guardar</button>

		

		</div>

		</div>

		

		</div>



		</div>


		<!--Modal ingreso de programacion manualmente-->
		<div class="modal fade" id="modalprogramacionmanual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog " role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">Registrar Programación manual</h4>
      				</div>
										<div class="modal-body">
										<div class="container-fluid">

										<div class="row">
										<div class="col-lg-4 col-xs-4">
										Planilla
										<input type="number" class="form-control" id="txtPlanillaProg">
										</div>
										<div class="col-lg-4 col-xs-4">
										Corte
										<select id="selCorte" class="form-control">
										</select>
										</div>
										<div class="col-lg-4 col-xs-4">
										Clientes
										<input type="number" class="form-control" id="txtProgncliente">
										</div>
										</div>
										<br>
										
										<div class="row">
										
											<div class="col-lg-6 col-xs-6">
										ECCU
										<input type="number" class="form-control" id="txtECCU">
										</div>
										<div class="col-lg-6 col-xs-6">
										CCU
										<input type="number" class="form-control" id="txtCCU">
										</div>
										</div>
										<br>
										
										<div class="row">

										<div  id="cargarutprogramador">
										<input type="number" class="form-control hidden" id="txtRut">
										</div>
										
										<div class="col-lg-6 col-xs-6">
										VSPT
										<input type="number" class="form-control" id="txtVSPT">
										</div>
										
										<div class="col-lg-6 col-xs-6">
										CPCH
										<input type="number" class="form-control" id="txtCPCH">
										</div>

										</div>
										
										
										
										
										
										
										
									
												<br>							
										<div class="row">
										<div class="col-lg-6 col-xs-6">
										CCCU
										<input type="number" class="form-control" id="txtCCCU">
										</div>
										
										
										
										<div class="col-lg-5 col-xs-5" id="totalcajas">
										Total cajas
										<input type="number" class="form-control" id="txtTotalProg" disabled="">
										</div>

										<div>
										<br>
											<button type="" class="btn btn-xs btn-info" id="reload"><i class="fa fa-refresh" aria-hidden="true"></i></button>
										</div>
									</div>
									
										</div>
										</div>


										<div class="modal-footer">
										<button type="button" class="btn btn-primary" id="btnguardarprog" onclick="regprogramacion()">Guardar</button>
										</div>
    			</div>
  			</div>
		</div> <!--/.div ingreso de programacion manualmente-->



														

									

												

	</body>

	</html>

						

			





<script type="text/javascript">

$(document).ready(function(){

	/*   var class_color=$("#lblconductores")text();
	if(class_color==0){$("#cambiacolor1").removeClass('bg-yellow').addClass('bg-green')}

	var class_color2=$("#lblcamiones")text();
	if(class_colo2r==0){$("#cambiacolor2").removeClass('bg-yellow').addClass('bg-green')}	

	*/

	$("#btnColapse").trigger("click");
	lblcamion();

	lblconductores();

	$("#editarMatriz").click(function(){

		cargamatriz();

	$("#modalmatriz").modal("show");

	})



	$("#cargarprog").click(function(){
		$("#modalimportar").modal("show");
		importarprogramacion();
	});

	cargaprogramacion();


	$("#ingresoprogramacion").click(function(){
		$("#modalprogramacionmanual").modal('show');
		selcorte();
	});

	$("#selCorte").on("change", function(){
		var cortef = $("#selCorte").val();
		cargarut(cortef);
	});
});


function selcorte(){
					$.ajax({
					url: 'controllers/centro/centroajax.php',
					type: 'POST',
					dataType: 'json',
					async: false,
					data: {
					funcion: 'selcorte'
					},
					beforeSend: function(){
					},
					success: function(data){
					if(data.length > 0){
					$("#selCorte").html('<option value="">Seleccione un corte</option>');
					$.each(data, function(id, dato){
					$("#selCorte").append('<option value="'+dato.corte_ccc+'">'+dato.corte_ccc+'</option>');
					});
					}
					},
					error: function (jqXHR, textStatus, errorThrown) {
					console.log('error: '+textStatus);
					}
					});
	
}

function cargarut(cortef){
	$.ajax({
		url: 'controllers/centro/centroajax.php',
		type: 'POST',
		dataType: 'json',
		data: {
			funcion: 'cargarut',
			cortef: cortef
		},
		beforeSend: function(){
		},
		success: function(data){
			$("#cargarutprogramador").html('');
			$.each(data, function(id, dato){
				$("#cargarutprogramador").html('<input type="text" class="form-control hidden" id="txtRut" value="'+dato.rut_ccc+'">');
			});
		},
		error: function (jqXHR, textStatus, errorThrown) {
            console.log('error: '+textStatus);
        }
	});
	
}


	$("#reload").on('click',function(){
	
		var eccu     = $("#txtECCU").val();
		var ccu      = $("#txtCCU").val();
		var vspt     = $("#txtVSPT").val();
		var cpch     = $("#txtCPCH").val();
		var cccu     = $("#txtCCCU").val();
		total_cajas = parseInt(eccu) + parseInt(ccu) + parseInt(vspt) + parseInt(cpch) + parseInt(cccu);
		$("#txtTotalProg").val(total_cajas);
	})


	

function regprogramacion(){

	var planilla = $("#txtPlanillaProg").val();
	var corte    = $("#selCorte").val();
	var rutcond  = $("#txtRut").val();
	var eccu     = $("#txtECCU").val();
	var ccu      = $("#txtCCU").val();
	var vspt     = $("#txtVSPT").val();
	var cpch     = $("#txtCPCH").val();
	var cccu     = $("#txtCCCU").val();
	var cliente  = $("#txtProgncliente").val();
	var total_cajas = 0;
	 total_cajas  = parseInt(eccu) + parseInt(ccu) + parseInt(vspt) + parseInt(cpch) + parseInt(cccu);

	if (total_cajas=='' || planilla==''){
swal('Faltan datos','','warning')
	}else{

	$.ajax({
		url: 'controllers/centro/centroajax.php',
		type: 'POST',
		async: false,
		data: {
			funcion: 'regprogramacion',
			planilla: planilla,
			corte: corte,
			rutcond: rutcond,
			eccu:eccu,
			ccu:ccu,
			vspt:vspt,
			cpch:cpch,
			cccu:cccu,
			total_cajas: total_cajas,
			cliente:cliente
		},
		beforeSend: function(){
			$("body").css("cursor", "default");
		},
		success: function(data){
			$("body").css("cursor", "progress");
			swal("Programación creada", '', 'success');
			cargaprogramacion();
			lblcamion();
			lblconductores();
		},
		error: function (jqXHR, textStatus, errorThrown ) {
          console.log("Error : "+errorThrown);
        }
	});
	
	}
}

function importarprogramacion()
{
	$("#btnimportar").on("click", function(){
    	var formData = new FormData($(".formulario")[0]);
    	var ruta = "controllers/centro/importar_prog.php";
	    $.ajax({
	        url: ruta,
	        type: "POST",
	        data: formData,
	        cache:false,
	        contentType: false,
	        processData: false,
	        beforeSend: function () {
	        	$("#modalupload").modal('show');
	        },
	        success: function(datos){
	        	swal("Importación de diaria", "Exitosa!", "success")
	        	$("#modalupload").modal('hide');
	        	cargaprogramacion();
	        	lblcamion();			
	        	lblconductores();
	        }
	    });
 	});
}


												



	
function cerrarprogramacion(){
	$.ajax({
url: 'controllers/centro/centroajax.php',
method: 'POST',
async: false,
dataType: 'json',
data: { 
funcion : 'cuentaodometrosingresados'
},
beforeSend: function () {
},
success: function (data) {
$.each(data, function(id, dato){

if(dato.total==0 && dato.odometro==0){swal('No existe programación para el dia','Primero carga una Programación','warning')}else{
if(dato.total>dato.odometro){

swal({
  title: 'Faltan odometros por ingresar',
  text: '¿Cerrar  programación?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, cerrar Programación'
}).then(function () {
 
 swal({
  title: 'Si cierras la programacion con odometros faltantes',
  text: "no podras ingresar la programación del dia siguiente",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, estoy seguro'
}).then(function () {
	$.ajax(
	{
	url: 'controllers/centro/centroajax.php',
	method: 'POST',
	async: false,
	data: { 
	funcion : 'cerrarprogramacion',
	},
	beforeSend: function () {
		$("body").css("cursor", "progress");
	},
	success: function (data) {
	swal('Programación cerrada','','success');
	$("body").css("cursor", "default");	
	cargaprogramacion();						
	}
	})
})
 
})
}else{

 swal({
  title: 'Si cierras la programacion no podras volver a hacer cambios',
  text: "¿Estas seguro?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
}).then(function () {
	$.ajax(
	{
	url: 'controllers/centro/centroajax.php',
	method: 'POST',
	async: false,
	data: { 
	funcion : 'cerrarprogramacion',
	},
	beforeSend: function () {
		$("body").css("cursor", "progress");
	},
	success: function (data) {
	$("body").css("cursor", "default");
	swal('Programación cerrada','','success');	
	$("#ayuda").show();	
	cargaprogramacion();							
	}
	})
})


}
}
});
}//fin success
});	//fin ajax
								
	
}





	function cargaprogramacion(){
    $.ajax({
        url: 'controllers/centro/centroajax.php',
        method: 'POST',
        async: false,
        data: { 
           funcion : 'cargaprogramacion'

        },
        dataType: 'json',
        beforeSend: function () {
           $("body").css("cursor", "progress");
        },
        success: function (data) {
			var i = 0;
             $("body").css("cursor", "default");
              if(data.length>0){
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [

                        item.Planilla,

                        item.Corte_ccu,

                        item.patente,

                        item.N_cargas,

                        item.Conductor,

                        item.Fecha_ccu,

                        item.Rut,

                        item.km,

                        item.fecha,

                        null

                        ];

                    // jsonListaDuplicados

                    datos.push(obj);

                });

              $('#programacion').DataTable().destroy();

              var tabla = $('#programacion').DataTable({ 

                data: datos,
    

                "columns":[

                {

                  width: "10%",

                  data: datos.Planilla,

                },

                {

                  width: "10%",

                  data: datos.Corte_ccu,

                },

                 {

                  width: "10%",

                  data: datos.patente,

                },

                  {

                  width: "10%",

                  data: datos.N_cargas,

                },

                {

                  width: "20%",

                  data: datos.Conductor,

                },

                {

                  width: "10%",

                  data: datos.Fecha_ccu,

                },

                {
                  "visible": false,

                  width: "30%",

                  data: datos.Rut,

                },

              

                {

                  width: "10%",

                  data: datos.km,
									
				  "render": function ( data, type, row ) {
					var f = new Date();
					var fecha = (f.getFullYear() +"-"+ ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2));
					console.log(fecha);
					if(row[8]==fecha){
						return '<div align="center"><button class="btn btn-success btn-xs" ><i class="fa fa-clock-o" aria-hidden="true"></i></button></div>';
					}else{
						return '<div align="center"><button class="btn btn-warning btn-xs" onclick="ingresaodometro(\''+row[2]+'\');"><i class="fa fa-clock-o" aria-hidden="true"></i></button></div>';
					}		
									
					}//Fin render

                },
                  {
                  width: "10%",

                  data: datos.fecha,

                },

				{

				width: "20%",

				data: null,

				"render": function ( data, type, row ) {

				return '<div align="center"><button class="btn btn-primary btn-xs" onclick="modalFicha(\''+row[0]+'\',\''+row[1]+'\',\''+row[2]+'\',\''+row[6]+'\');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>';

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

              //tabla.responsive.recalc().columns.adjust().draw();

              }else{

                $('#programacion').DataTable().destroy();

                $('#programacion').DataTable().clear();

                $('#programacion').DataTable().draw();

              }

              

            }, 

            error: function (jqXHR, textStatus, errorThrown) {

              $('#modalcargando').modal('hide');

                console.log('error');

               

            }

        });



}



function ingresaodometro(patente){
$("#txtpodometro").val('');
$("#txtkm").val('');
$("#txtpodometro").val(patente);
$("#modalodometromodalodometro").modal("show");
}



	$("#btnguardaodometro").click(function(){
	var patenteodometro=$("#txtpodometro").val();
	var kms =$("#txtkm").val();


	//valida odometro
	var maxKm;
	$.ajax({
	url: 'controllers/centro/centroajax.php',
	method: 'POST',
	async: false,
	data: { 
	funcion : 'validaodometro',
	patenteodometro:patenteodometro
	},
	beforeSend: function () {

	},
	success: function (data) {
	var planillaodo = $("#txtplanillaodo").val();
	console.log(maxKm)
	maxKm=data.substring(1);
	if (kms<maxKm){
		swal('Error','el odometro no puede ser menor  a '+maxKm+' Km', 'error');
	}else if(kms==maxKm){
	swal({
	title: '¿Guardar?',
	text: 'El odometro ingresado es igual  a '+maxKm+' Km',
	type: 'question',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Si, Guardar'
	}).then(function () {
	$.ajax({
	url: 'controllers/centro/centroajax.php',
	method: 'POST',
	async: false,
	data: { 
	funcion : 'guardaodometro',
	patenteodometro:patenteodometro,
	kms:kms,
	planillaodo:planillaodo
	},
	beforeSend: function () {
	},
	success: function (data) {
	cargaprogramacion();
	swal('Odometro ingresado','Correctamente!', 'success');
	$("#modalodometromodalodometro").modal("hide");
	
	}
	})	
		})
	}else{
			//guarda odometro
	$.ajax({
	url: 'controllers/centro/centroajax.php',
	method: 'POST',
	async: false,
	data: { 
	funcion : 'guardaodometro',
	patenteodometro:patenteodometro,
	kms:kms,
	planillaodo:planillaodo
	},
	beforeSend: function () {
	},
	success: function () {
	cargaprogramacion();
	swal('Odometro ingresado','Correctamente!', 'success');
	$("#modalodometromodalodometro").modal("hide");
	$("#txtkm").val('');
	$("#txtpodometro").val('');

	}

	})	



	}

	

	}

	})	



	})

							function modalFicha(planilla, corte, patente, conductor){

							$("#txtplanilla").text(planilla);

							$("#txtcorte").val(corte);

							$("#modaleditarprogramacion").modal("show");

							$.ajax({

							url: 'controllers/centro/centroajax.php',

							method: 'POST',

							async: true,

							data: { 

							funcion : 'combopatente',

							},

							dataType: 'json',

							beforeSend: function () {
								$("#modalcargando").modal('show');

							},

							success: function (data) {
								$("#modalcargando").modal('hide');
							

							if(data.length>0){

							$("#selectpatente").html("");

							$.each(data, function(id, dato){

							$("#selectpatente").append('<option value="'+dato.flo_patente+'">'+dato.flo_patente+'</option>');

							});

							}

							$("#selectpatente").val(patente);

							}

							

							})



							$.ajax({

							url: 'controllers/centro/centroajax.php',

							method: 'POST',

							async: true,

							data: { 

							funcion : 'comboconductor',

							},

							dataType: 'json',

							beforeSend: function () {
							
							$("#modalcargando").modal('show');
							},

							success: function (data) {
 							$("#modalcargando").modal('hide');
							if(data.length>0){

							console.log(data);

							$("#selectConductor").html("");

							$.each(data, function(id, dato){

							$("#selectConductor").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');

							});

							}

							$("#selectConductor").val(conductor);

							}

							

							})

							

							}







				function guardadatos(){

						var patente = $("#selectpatente").val();
						var conductor = $("#selectConductor").val();
						var planilla = $("#txtplanilla").text();
						var corte = $("#txtcorte").val();					
						$.ajax({
						url: 'controllers/centro/centroajax.php',
						method: 'POST',
						async: false,
						data: { 
						funcion : 'guardamodificaciones',
						planilla:planilla,
						patente:patente,
						corte:corte,
						conductor:conductor
						},	
						beforeSend: function () {
						$('#modalcargando').modal('show');
						},
						success: function () {
						swal('Registros Actualizados','¡Exitosamente!','success');
                        $("#modaleditarcorte").modal('hide');
                        cargaprogramacion();
						$("#modaleditarprogramacion").modal("hide");

						}

								})

										}

			









	function cargamatriz(){

$.ajax({

url: 'controllers/centro/centroajax.php',

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

item.Rut,

null

];

// jsonListaDuplicados

datos.push(obj);

});

$('#matriz').DataTable().destroy();

var tabla = $('#matriz').DataTable({ 

data: datos,

"columns":[

{

width: "5%",

data: datos.id,

},

{

width: "20%",

data: datos.corte,

},

{

width: "10%",

data: datos.patente,

},

{

width: "30%",

data: datos.Nombre,

},

{

"visible": false,

width: "30%",

data: datos.Rut,

},

{

width: "20%",

data: null,

"render": function ( data, type, row ) {

return '<div align="center"><button class="btn btn-primary btn-xs" onclick="modaldatos(\''+row[0]+'\',\''+row[1]+'\',\''+row[2]+'\',\''+row[4]+'\');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>';

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



					function modaldatos(id, corte, patente, conductor)

					{

					$("#txtCorte").val(corte);

					$("#corteid").text(corte);

					$("#modaleditarcorte").modal('show');

					$.ajax({

					url: 'controllers/centro/centroajax.php',

					method: 'POST',

					async: false,

					data: { 

					funcion : 'combopatente',

					},

					dataType: 'json',

					beforeSend: function () {

					$('#modalcargando').modal('show');

					},

					success: function (data) {
$('#modalcargando').modal('hide');

					$("#txtpatente").html("");	

					if(data.length>0){

					$.each(data, function(id, dato){

					$("#txtpatente").append('<option value="'+dato.flo_patente+'">'+dato.flo_patente+'</option>');

					});

					}

					}

					})



						$("#txtpatente").val(patente);

					$.ajax({

					url: 'controllers/centro/centroajax.php',

					method: 'POST',

					async: false,

					data: { 

					funcion : 'comboconductor',

					},

					dataType: 'json',

					beforeSend: function () {

					$('#modalcargando').modal('show');

					},

					success: function (data) {

					$('#modalcargando').modal('hide');

					$("#txtconductor").html("");	

					if(data.length>0){

					$.each(data, function(id, dato){

					$("#txtconductor").append('<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');

					});

					}

					}

					})

					$("#txtconductor").val(conductor);

        				}



						function guardadatoscorte(){

						var patente = $("#txtpatente").val();

						var conductor = $("#txtconductor").val();

						var corte = $("#txtCorte").val();

						$.ajax(

						{

						url: 'controllers/centro/centroajax.php',

						method: 'POST',

						async: false,

						data: { 

						funcion : 'editarMatriz',

						corte:corte,

						patente:patente,

						conductor:conductor

						},

						beforeSend: function () {


						},

						success: function () {
						$('#modalcargando').modal('hide');

						swal('Registros Actualizados','¡Exitosamente!','success');

						$("#modaleditarcorte").modal('hide');

						$("#txtpatente").val('');

						$("#txtconductor").val('');

						$("#txtCorte").val('');

						cargamatriz();

						}

						})

						}



						$("#guardadatos").click(function(){

							guardadatoscorte();

						})





						function lblcamion(){

$.ajax({

url: 'controllers/centro/centroajax.php',

method: 'POST',

async: false,

data: { 

funcion : 'lblcamiones',

},

dataType: 'json',

beforeSend: function () {

$("#lblcamiones").html("<img src='../images/ajax-loader.gif'></img>");	

},

success: function (data) {

$('#lblcamiones').html('');

if(data.length>0){

$.each(data, function(id, dato){

$('#lblcamiones').html(dato.cant);

});

}

}

})

}





function lblconductores(){

$.ajax({

url: 'controllers/centro/centroajax.php',

method: 'POST',

async: false,

data: { 

funcion : 'lblconductores',

},

dataType: 'json',

beforeSend: function () {

$("#lblconductores").text("<img src='../images/ajax-loader.gif'></img>");	

},

success: function (data) {

$('#lblconductores').html('');

if(data.length>0){

$.each(data, function(id, dato){

$('#lblconductores').html(dato.cant);

});

}

}

})

}



$("#contflota").click(function(){
$("#modalflota").modal("show");
cargaflota();
})







$("#contconductores").click(function(){

$("#modalconductores").modal("show");

cargaconductores();

})	





								function cargaflota(){

								$.ajax(

								{

								url: 'controllers/centro/centroajax.php',

								method: 'POST',

								async: false,

								data: { 

								funcion : 'cargaflota'

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

								item.flo_patente,

								null,

								null

								];

								// jsonListaDuplicados

								datos.push(obj);

								});

								$('#tblflota').DataTable().destroy();

								var tabla = $('#tblflota').DataTable({ 

								data: datos,

								"columns":[

								{

								width: "10%",

								data: datos.flo_patente,

								},

								

								{

								width: "20%",

								data: null,

								"render": function ( data, type, row ) {

								return '<div align="center"><select id="selectestadoflota" class="form-control form-sm" onchange="cambiaestadocamion(\''+row[0]+'\',this.value);"><option values="DISPONIBLE">DISPONIBLE</option>	<option values="TALLER">TALLER</option></select></div>';

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

								$('#tblflota').DataTable().destroy();

								$('#tblflota').DataTable().clear();

								$('#tblflota').DataTable().draw();

								}

								

								}, 

								error: function (jqXHR, textStatus, errorThrown) {

								$('#modalcargando').modal('hide');

								console.log('error');

								

								}

								});

								

								}



	function cambiaestadocamion(patente, estado){
		if(estado ==='TALLER'){
			$('#modalobsflota').modal('show');

			$("#btnenviaobsflota").click(function(){
				var obs = $("#txtobsflota").val();
				var mail = $("#txtMail").val();

				$.ajax({
					url: 'controllers/centro/centroajax.php',
					method: 'POST',
					async: false,
					data: { 
						funcion : 'cambiaestadocamion',
						patente:patente,
						obs:obs,
						mail:mail,
						estado:estado
					},
					beforeSend: function () {
						$('#modalcargando').modal('show');
					},
					success: function (data) {
						$('#modalcargando').modal('hide');
						swal('Estado de camion actualizado a ',''+estado+'','success');
						$('#modalobsflota').modal('hide');
						$("#txtobsflota").val('');
						$("#txtMail").val('');					
					}

				})

			})				
		}else{
			$.ajax({
				url: 'controllers/centro/centroajax.php',
				method: 'POST',
				async: false,
				data: { 
				funcion : 'cambiaestadocamion',
				patente:patente,
				estado:estado
				},
				beforeSend: function () {
				},
				success: function (data) {
				swal('Estado de camion actualizado a ','Disponible','success');
				}
			});

		}

	}







function cargaconductores(){

								$.ajax(

								{

								url: 'controllers/centro/centroajax.php',

								method: 'POST',

								async: false,

								data: { 

								funcion : 'cargaconductores'

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

								item.Rut,

								item.Nombre,

								null

								];

								// jsonListaDuplicados

								datos.push(obj);

								});

								$('#tblconductores').DataTable().destroy();

								var tabla = $('#tblconductores').DataTable({ 

								data: datos,

								"columns":[

								{

								width: "10%",

								data: datos.Rut,

								},

								{

								width: "10%",

								data: datos.Nombre,

								},

								

								{

								width: "20%",

								data: null,

								"render": function ( data, type, row ) {

								return '<div align="center"><select id="selectestadoconductores" class="form-control" onchange="cambiaestadoconductor(\''+row[0]+'\',this.value);"><option values="DISPONIBLE">DISPONIBLE</option>	<option values="FALLA">FALLA</option><option values="PERMISO">PERMISO</option></select></div>';

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

								$('#tblconductores').DataTable().destroy();

								$('#tblconductores').DataTable().clear();

								$('#tblconductores').DataTable().draw();

								}

								

								}, 

								error: function (jqXHR, textStatus, errorThrown) {

								$('#modalcargando').modal('hide');

								console.log('error');

								

								}

								});

								

								}

								



								function cambiaestadoconductor(rut, estado){



									if(estado ==='Presente'){



										

											$.ajax({

											url: 'controllers/centro/centroajax.php',

											method: 'POST',

											async: false,

											data: { 

											funcion : 'eliminafallaconductor',

											rut:rut,

											},

											beforeSend: function () {

											},

											success: function (data) {

											swal('Conductor',''+estado+'','success');

																	}

											})

											

										

									}else{



									$.ajax({

									url: 'controllers/centro/centroajax.php',

									method: 'POST',

									async: false,

									data: { 

									funcion : 'conductorfalla',

									rut:rut,

									estado:estado

									},

									beforeSend: function () {

									},

									success: function (data) {

									swal('falla ingresada a trabajador',''+estado+'','success');



									}

									})

								}

								}

</script>