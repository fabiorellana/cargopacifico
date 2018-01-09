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

<div class="container-fluid">
<table id="matriz" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
<thead>
<tr>
<th>Rut</th>
<th>Nombre</th>
<th>Cargo</th>
<th>celular</th>
<th>centro</th>
<th>ciudad</th>
<th>direcciom</th>
<th>empresa</th>
<th>estado</th>
<th></th>

</tr>
</thead>
</table>								<!-- ./wrapper -->
												
		</div>										
												
												
												
												
			

												
												
												
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


<!--modal de carga -->
														<div class="modal fade" id="modalmodifica" >
														<div class="modal-dialog">
														<div class="modal-content">
														
														<div class="modal-body">
														<div align="center">
														
														<input type="text" id="txtrutid" class="form-control hidden ">
														rut
															<input type="text" id="txtrut" class="form-control">
															txtnombre
															<input type="text" id="txtnombre" class="form-control">
															txtcargo
															<input type="text" id="txtcargo" class="form-control">
															txtcelular
															<input type="text" id="txtcelular" class="form-control">
															txtcentro
															<input type="text" id="txtcentro" class="form-control">
															txtciudad
															<input type="text" id="txtciudad" class="form-control">
															txtdireccion
															<input type="text" id="txtdireccion" class="form-control">
															txtempresa
															<input type="text" id="txtempresa" class="form-control">
															txtestado
															<input type="text" id="txtestado" class="form-control">
														</div>
														
														</div>
														<div> <button type="button" onclick="guardar();">guardar</button></div>
															
														</div>
														</div>
														</div>
														</div>

														<!--modal Matriz -->

  <!-- modal ingreso programacion-->
            
            
	


														
									
												
												</body>
												</html>
<script type="text/javascript">
$(document).ready(function(){

		
		traedatos();
		
		
		$("#guardadatos").click(function(){
		guardadatos()
		})

		
												
})



	function traedatos(){
    $.ajax(
        {
            url: 'controllers/modifica/modificaajax.php',
            method: 'POST',
            async: false,
            data: { 
              funcion : 'traedatos'
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
                        item.Rut,
                        item.Nombre,
                        item.Cargo_id,
                        item.Celular,
                        item.Centro_de_costo_id,
                        item.Ciudad,
                        item.Direccion,
                        item.Empresa_id,
                        item.Estado,
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
                  data: datos.Rut,
                },
               
                {
                  width: "25%",
                  data: datos.Nombre,
                },
                 {
                  width: "25%",
                  data: datos.Cargo_id,
                },
                 {
                  width: "25%",
                  data: datos.Celular,
                },
                 {
                  width: "25%",
                  data: datos.Centro_de_costo_id,
                },
                 {
                  width: "25%",
                  data: datos.Ciudad,
                },
                 {
                  width: "25%",
                  data: datos.Direccion,
                },
                 {
                  width: "25%",
                  data: datos.Empresa_id,
                },
                 {
                  width: "25%",
                  data: datos.Estado,
                },
                	{
								width: "20%",
								data: null,
								"render": function ( data, type, row ) {
								return '<div align="center"><button  class="btn btn-succes" onclick="modifica(\''+row[0]+'\',\''+row[1]+'\',\''+row[2]+'\',\''+row[3]+'\',\''+row[4]+'\',\''+row[5]+'\',\''+row[6]+'\',\''+row[7]+'\',\''+row[8]+'\',);">cambiar</button></div>';
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

				function modifica(rut, nombre, cargo, celular, centro, ciudad, direccion, empresa, estado){
				$("#modalmodifica").modal('show');
				$("#txtrutid").val(rut);
				$("#txtrut").val(rut);
				$("#txtnombre").val(nombre);
				$("#txtcargo").val(cargo);
				$("#txtcelular").val(celular);
				$("#txtcentro").val(centro);
				$("#txtciudad").val(ciudad);
				$("#txtdireccion").val(direccion);
				$("#txtempresa").val(empresa);
				$("#txtestado").val(estado);
			
				 $('#modalcargando').modal('');
				
		
				}

				function guardar(){
				var id =	$("#txtrutid").val();
				var rut =$("#txtrut").val();
				var nombre =$("#txtnombre").val();
				var cargo =$("#txtcargo").val();
				var cel=$("#txtcelular").val();
				var centro =$("#txtcentro").val();
				var ciudad = $("#txtciudad").val();
				var dir =$("#txtdireccion").val();
				var emp =$("#txtempresa").val();
				var estado = $("#txtestado").val();
					$.ajax(
				{
				url: 'controllers/modifica/modificaajax.php',
				method: 'POST',
				async: false,
				data: { 
				funcion : 'guardamodificacion',
				rut:rut,
				nombre:nombre,
				cargo:cargo,
				cel:cel,
				centro:centro,
				ciudad:ciudad,
				dir:dir,
				emp:emp,
				estado:estado,
				id:id
				},
				
				beforeSend: function () {
				$('#modalcargando').modal('show');
				},
					success: function (data) {
					swal('OK','','success');
					$("#modalmodifica").modal('hide');
					 $('#modalcargando').modal('hide');
					
					}

				})
				}

		






			
</script>