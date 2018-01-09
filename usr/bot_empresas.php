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
       <?php include "./include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>



  <!-- Desde aqui -->||
  
  <div class="content-wrapper"  style="background-color:#ECF0F5" >
<br><br><br>
    <div class="col-sm-12 col-md-12 col-lg-12">
    <h3>
    Mantenedor de Empresas
    </h3>
</div>
<br />
<div class="col-lg-9 col-md-12 col-sm-12">
	<div class="col-lg-1 col-md-1 col-sm-1">Empresa:</div>
	<div class="col-lg-5 col-md-7 col-sm-11">
		<select class="form-control" id="cmbEmpresas">
		</select>
	</div>
	<div class="col-lg-2 col-md-6 col-sm-6"><button class="btn btn-primary" onclick="modalEditarEmpresa();">Modificar</button></div>
	<div class="col-lg-2 col-md-6 col-sm-6"><button class="btn btn-primary" onclick="agregarEmpresa();">Nueva Empresa</button></div>

	<div class="col-lg-12 col-md-12 col-sm-12"></div>
	<div class="clearfix"></div>
	<br />
	<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="panel panel-primary">
			<div class="panel-heading">Listado de Tractos</div>
			<div class="panel-body">
    			<table id="tablaTractos" class="table-striped table-condensed table-hover" style="width:100%">
			        <thead>
			        	<tr>
			        	<th>Patente</th>
			        	<th>-</th>
			        	</tr>
			        </thead>
			    </table>
  			</div>
		</div>
		<button class="btn btn-primary" onclick="agregarTracto();">Agregar Tracto</button>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">Listado de Ramplas Asociadas</div>
			<div class="panel-body">
    			<table id="tablaRamplas" class="table-striped table-condensed table-hover" style="width:100%">
			        <thead>
			        	<tr>
			        	<th>Patente</th>
			        	<th>Bahías</th>
			        	<th>-</th>
			        	</tr>
			        </thead>
			    </table>
  			</div>
		</div>
	<button class="btn btn-primary" onclick="agregarRampla();">Agregar Rampla</button>
	</div>
</div>

</div>
<!-- ./wrapper -->
                

<div class="control-sidebar-bg"></div>
<?php require('./include/modals.php');?>
<?php require('./include/footer.php');?>

<script>
$(document).ready(function() {
	llenarComboEmpresas();
	cargarGrillas();
	$("#cmbEmpresas").change(function(){
		cargarGrillas();
	});
		$("#buscador").keyup(function(e){
		var tipo =$('input:radio[name=radios]:checked').val();
		if(tipo == null){
		$("#buscador").prop('disabled', true);
								}
				 //imagen de carga					
		$('#contenedormodal').html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');

	  //valores de radio & txt
	
	  var busqueda = $("#buscador").val();
	  
	 var id_archivo = $("#txtpermisos").val();
	    $("#contenedormodal").load("ajaxpermisoarchivos.php", {buscar: busqueda, tipo:tipo, id:id_archivo }, function(){

			  });
		   });
		});	
function agregarEmpresa(){
	$("#nombreEmpresa").val("");
	$("#modalAgregarEmpresa").modal('show');
}
function editarEmpresa(){
	if($("#nombreEmpresaEdit").val().trim().length == 0){
		swal("Advertencia", "Debe ingresar un nombre de empresa", "warning")
	}
	else{
		swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
            var nombreEmpresaEdit = $("#nombreEmpresaEdit").val().trim();
            var emp_id = $("#cmbEmpresas").val();
            //Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async:false,
                    data: { 
                        Accion : 'jsonEditarEmpresa',
                        nombreEmpresaEdit : nombreEmpresaEdit,
                        emp_id : emp_id
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	if(data.mensaje == "OK"){
                    		swal(
				            'Modificado!',
				            'Los datos fueron guardados',
				            'success'
				          );	
                    	}
                    	else{
                    		swal("Error", "Ya existe una empresa con ese nombre", "error");
                    	}
                        
                    }, 
                    error: function( jqXHR, textStatus, errorThrown ) {
		                console.log(errorThrown);
		            }
                });
            //Fin ajax
          
          $('#modalEditarEmpresa').modal('hide');
          //Actualizar el ComboBox
          llenarComboEmpresas();
        });
	}
}
function modalEditarEmpresa(){
	$("#nombreEmpresaEdit").val($("#cmbEmpresas option:selected").text());
	$('#modalEditarEmpresa').modal('show');
}
function guardarEmpresa(){
	if($("#nombreEmpresa").val().trim().length == 0){
		swal("Advertencia", "Debe ingresar un nombre de empresa", "warning")
	}
	else{
		swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
            var nombreEmpresa = $("#nombreEmpresa").val().trim();
            //Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async:false,
                    data: { 
                        Accion : 'jsonGuardarEmpresa',
                        nombreEmpresa : nombreEmpresa
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	if(data.mensaje == "OK"){
                    		swal(
				            'Guardado!',
				            'Los datos fueron guardados',
				            'success'
				          );	
                    	}
                    	else{
                    		swal("Error", "Ya existe una empresa con ese nombre", "error");
                    	}
                        
                    }, 
                    error: function( jqXHR, textStatus, errorThrown ) {
		                console.log(errorThrown);
		            }
                });
            //Fin ajax
          
          $('#modalAgregarEmpresa').modal('hide');
          //Actualizar el ComboBox
          llenarComboEmpresas();
        });
	}
}
function agregarTracto(){
	$('#modalCrearTracto').modal('show');
	$("#patenteTracto").val("");
}
function agregarRampla(){
	$('#modalCrearRampla').modal('show');
	$("#patenteRampla").val("");
	$("#bahiasRampla").val("");
}
function guardarTracto(){
	if($("#patenteTracto").val().trim().length != 6){
		swal("Advertencia", "Debe ingresar una patente válida", "warning")
	}
	else{
		swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
            var patenteTracto = $("#patenteTracto").val().trim();
            var emp_id = $("#cmbEmpresas").val();
            //Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async:false,
                    data: { 
                        Accion : 'jsonGuardarTracto',
                        patenteTracto : patenteTracto,
                        emp_id : emp_id
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	if(data.mensaje == "OK"){
                    		swal(
				            'Guardado!',
				            'Los datos fueron guardados',
				            'success'
				          );	
                    	}
                    	else{
                    		swal("Error", "Ha ocurrido un error, favor contactese con el departamento de informática.", "error");
                    	}
                        
                    }, 
                    error: function( jqXHR, textStatus, errorThrown ) {
		                console.log(errorThrown);
		            }
                });
            //Fin ajax
          
          $('#modalCrearTracto').modal('hide');
          cargarGrillas();
        });
	}
}
function guardarRampla(){
	if($("#patenteRampla").val().trim().length != 6){
		swal("Advertencia", "Debe ingresar una patente válida", "warning")
	}
	else{
		swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
            var patenteRampla = $("#patenteRampla").val().trim();
            var bahiasRampla = $("#bahiasRampla").val().trim();
            var emp_id = $("#cmbEmpresas").val();
            //Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async:false,
                    data: { 
                        Accion : 'jsonGuardarRampla',
                        patenteRampla : patenteRampla,
                        bahiasRampla: bahiasRampla,
                        emp_id : emp_id
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	if(data.mensaje == "OK"){
                    		swal(
				            'Guardado!',
				            'Los datos fueron guardados',
				            'success'
				          );	
                    	}
                    	else{
                    		swal("Error", "Ha ocurrido un error, favor contactese con el departamento de informática.", "error");
                    	}
                        
                    }, 
                    error: function( jqXHR, textStatus, errorThrown ) {
		                console.log(errorThrown);
		            }
                });
            //Fin ajax
          
          $('#modalCrearRampla').modal('hide');
          cargarGrillas();
        });
	}
}
function llenarComboEmpresasEditTracto(){
	$("#cmbEmpresasEditTracto").empty();
	//Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async: false,
                    data: { 
                        Accion : 'jsonEmpresas'
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	//console.log(data[0].emp_nombre);
                        $.each(data, function(index, value){
							$("#cmbEmpresasEditTracto").append('<option value="'+value.emp_id+'">'+value.emp_nombre+'</option>');
					    });
                    }, 
                    error: function (error) {
                        console.log("Error:" + error);
                    }
                });
            //Fin ajax
}
function llenarComboEmpresasEditRampla(){
	$("#cmbEmpresasEditRampla").empty();
	//Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async: false,
                    data: { 
                        Accion : 'jsonEmpresas'
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	//console.log(data[0].emp_nombre);
                        $.each(data, function(index, value){
							$("#cmbEmpresasEditRampla").append('<option value="'+value.emp_id+'">'+value.emp_nombre+'</option>');
					    });
                    }, 
                    error: function (error) {
                        console.log("Error:" + error);
                    }
                });
            //Fin ajax
}
function modalEditarTracto(id_emp, patente){
	llenarComboEmpresasEditTracto();
	$("#patenteTractoEdit").val(patente);
	$('#modalEditarTracto').modal('show');
	$("#cmbEmpresasEditTracto").val(id_emp);
}
function modalEditarRampla(id_emp, patente, bahias){
	llenarComboEmpresasEditRampla();
	$("#patenteRamplaEdit").val(patente);
	$("#bahiasRamplaEdit").val(bahias);
	$('#modalEditarRampla').modal('show');
	$("#cmbEmpresasEditRampla").val(id_emp);
}
function editarTracto(){
	swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
			var patenteTracto = $("#patenteTractoEdit").val();
			var emp_id = $("#cmbEmpresasEditTracto").val();
			//Inicio ajax
		            $.ajax(
		                {
		                    url: './Controllers/botelleros/bot_ajax.php',
		                    method: 'POST',
		                    async: false,
		                    data: { 
		                        Accion : 'jsonEditarTracto',
		                        patenteTracto: patenteTracto,
		                        emp_id: emp_id
		                        },
		                    dataType: 'json',
		                    beforeSend: function () {
		                       
		                    },
		                    success: function (data) {
								if(data.mensaje == "OK"){
		                    		swal(
						            'Modificado!',
						            'Los datos fueron guardados',
						            'success'
						          );	
		                    	}
		                    	else{
		                    		swal("Error", "Ya existe una empresa con ese nombre", "error");
		                    	}
		                        $('#modalEditarTracto').modal('hide');
		                        cargarGrillas();
		                    }, 
		                    error: function (error) {
		                        console.log("Error:" + error);
		                    }
		                });
		            //Fin ajax
        });
}
function editarRampla(){
	swal({
          title: '¿Está seguro?',
          text: "Los datos ingresados serán guardados.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {
			var patenteRampla = $("#patenteRamplaEdit").val();
			var bahiasRampla = $("#bahiasRamplaEdit").val();
			var emp_id = $("#cmbEmpresasEditRampla").val();
			//Inicio ajax
		            $.ajax(
		                {
		                    url: './Controllers/botelleros/bot_ajax.php',
		                    method: 'POST',
		                    async: false,
		                    data: { 
		                        Accion : 'jsonEditarRampla',
		                        patenteRampla: patenteRampla,
		                        bahiasRampla: bahiasRampla,
		                        emp_id: emp_id
		                        },
		                    dataType: 'json',
		                    beforeSend: function () {
		                       
		                    },
		                    success: function (data) {
								if(data.mensaje == "OK"){
		                    		swal(
						            'Modificado!',
						            'Los datos fueron guardados',
						            'success'
						          );	
		                    	}
		                    	else{
		                    		swal("Error", "Ya existe una empresa con ese nombre", "error");
		                    	}
		                        $('#modalEditarRampla').modal('hide');
		                        cargarGrillas();
		                    }, 
		                    error: function (error) {
		                        console.log("Error:" + error);
		                    }
		                });
		            //Fin ajax
        });
}
function llenarComboEmpresas(){
	$("#cmbEmpresas").empty();
	//Inicio ajax
            $.ajax(
                {
                    url: './Controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    async:false,
                    data: { 
                        Accion : 'jsonEmpresas'
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                    	//console.log(data[0].emp_nombre);
                        $.each(data, function(index, value){
							$("#cmbEmpresas").append('<option value="'+value.emp_id+'">'+value.emp_nombre+'</option>');
					    });
                    }, 
                    error: function (error) {
                        console.log("Error:" + error);
                    }
                });
            //Fin ajax
}
function cargarGrillas(){
	var emp_id = $("#cmbEmpresas").val();
	//Inicio ajax
    $.ajax(
        {
            url: './Controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async: false,
            data: {	
			    Accion : 'jsonlistarTractos',
			    emp_id : emp_id
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
            	$('#modalCargando').modal('hide');
            	if(data.length>0){
            		var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.tra_patente,
                        item.tra_id_empresa,
                    ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
            	$('#tablaTractos').DataTable().destroy();
            	$('#tablaTractos').DataTable({ 
            		"autowidth": false,
            		data: datos,
            		"columns":[{
            			data: datos.tra_patente,
            		},
					{
            			data: datos.tra_id_empresa ,
            			"render": function ( data, type, row ) {
				                    return '<button class="btn btn-primary btn-xs" onclick="modalEditarTracto('+data.trim()+',\''+row[0]+'\');">Editar</button>';
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
            			},
            	});
            	}
            	else{
            		$('#tablaTractos').DataTable().destroy();
            		$('#tablaTractos').DataTable().clear();
            		$('#tablaTractos').DataTable().draw();
            	}
            	
            }, error: function (error) {
            }
        });
//Fin ajax
	$.ajax(
        {
            url: './Controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async: false,
            data: {	
			    Accion : 'jsonlistarRamplas',
			    emp_id : emp_id
		    	},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
            	$('#modalCargando').modal('hide');
            	if(data.length>0){
            		var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.ram_patente,
                        item.ram_bahias,
                        item.ram_id_empresa,
                    ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
            	$('#tablaRamplas').DataTable().destroy();
            	$('#tablaRamplas').DataTable({ 
            		"autowidth": false,
            		data: datos,
            		"columns":[{
            			data: datos.ram_patente,
            		},
            		{
            			data: datos.ram_bahias,
            		},
					{
            			data: datos.ram_id_empresa ,
            			"render": function ( data, type, row ) {
				                    return '<button class="btn btn-primary btn-xs" onclick="modalEditarRampla('+data.trim()+',\''+row[0]+'\', \''+row[1]+'\');">Editar</button>';
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
            			},
            	});
            	}
            	else{
            		$('#tablaRamplas').DataTable().destroy();
            		$('#tablaRamplas').DataTable().clear();
            		$('#tablaRamplas').DataTable().draw();
            	}
            	
            }, error: function (error) {
            }
        });
//Fin ajax
}
</script>
<div class="modal fade modal-primary" id="modalAgregarEmpresa" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Nueva Empresa</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Ingrese Nombre: 
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            	<input type="text" maxlength="200" id="nombreEmpresa" class="form-control" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="guardarEmpresa()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-primary" id="modalEditarEmpresa" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar Empresa</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Nombre: 
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            	<input type="text" maxlength="200" id="nombreEmpresaEdit" class="form-control" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="editarEmpresa()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalCrearTracto" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Tracto</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Patente: 
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            	<input type="text" maxlength="6" id="patenteTracto" class="form-control" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="guardarTracto()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalEditarTracto" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Tracto</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Patente: 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            	<input type="text" maxlength="6" id="patenteTractoEdit" class="form-control" disabled="disabled" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	<select class="form-control" id="cmbEmpresasEditTracto"></select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="editarTracto()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-primary" id="modalCrearRampla" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear Rampla</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Patente: 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            	<input type="text" maxlength="6" id="patenteRampla" class="form-control" />
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Bahías: 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            	<input type="text" maxlength="6" id="bahiasRampla" class="form-control" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="guardarRampla()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalEditarRampla" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Rampla</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Patente: 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            	<input type="text" maxlength="6" id="patenteRamplaEdit" class="form-control" disabled="disabled" />
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                            	Bahías: 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            	<input type="text" maxlength="2" id="bahiasRamplaEdit" class="form-control" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<select class="form-control" id="cmbEmpresasEditRampla"></select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            	<button class="btn btn-primary" onclick="editarRampla()">Guardar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

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