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
       <?php include "./include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>

  <!-- Desde aqui -->
  
  <div class="content-wrapper"  style="background-color:#ECF0F5" >
<?php 
require_once './model/Oca.php';
?>
<br /><br /><br />
    <div class="col-sm-12 col-md-6 col-lg-3">
    <h3>
    Gestión de la Facturación CCU
    </h3>

        Seleccione Quincena: 
        <select class="form-control" id="quincena">
            <option value="1">Primera</option>
            <option value="2">Segunda</option>
        </select>
   
        Seleccione Mes: 
        <select id="mes" class="form-control">
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        </select>
        Seleccione Año:
        <select id="year" class="form-control">
	        <?php
	        echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
	        echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
	        ?>
        </select>
        
        <br />
        <button class="btn btn-primary" id='consultar' onclick="consultar();">Consultar</button>
        <button class="btn btn-warning" id='liquidar' onclick="liquidar();">Generar Liquidación</button>

</div>
<div class="clearfix"></div><br />

	<div class="col-sm-12 col-md-6 col-lg-4">
		<div id="mensajeria" class="panel panel-primary">
			<div class="panel-body">
				<div id="totalRegistros"></div>
				<div id="ceros"></div>
				<div id="duplicados"></div>
				<div id="monto"></div>
				<div id="polinomios"></div>
			</div>
		</div>
	</div>
	<br />
</div>
<!-- ./wrapper -->

<div class="control-sidebar-bg"></div>

<?php require('./include/modals.php');?>

<?php require('./include/footer.php');?>

<script>
function mesPalabra(mes){
	var pal = "";
	switch (mes) {
    case "1":
        pal = "Enero";
        break;
    case "2":
    	pal = "Febrero";
        break;
    case "3":
    	pal = "Marzo";
        break;
    case "4":
    	pal = "Abril";
        break;
    case "5":
    	pal = "Mayo";
        break;
    case "6":
    	pal = "Junio";
        break;
    case "7":
    	pal = "Julio";
        break;
    case "8":
    	pal = "Agosto";
        break;
    case "9":
    	pal = "Septiembre";
        break;
    case "10":
    	pal = "Octubre";
        break;
    case "11":
    	pal = "Noviembre";
        break;
    case "12":
    	pal = "Diciembre";
        
	}
	return pal;
}
function guardarPolinomio(){
    if(validarPolinomio()){
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
            var quincena = $("#quincena").val();
            var mes = $("#mes").val();
            var ano = $("#year").val();
            var zona = $("#cmbZona").val();
            // procedimiento de guardado
            var fecha1 = $("#fecha1").val();
            var fec = fecha1.split("/");
            fecha1 = fec[2] + "/" + fec[1] + "/" + fec[0];
            var dolar1 = $("#dolar1").val();
            var uf1 = $("#uf1").val();
            var petroleo1 = $("#petroleo1").val();
            var icmo1 = $("#icmo1").val();
            var fecha2 = $("#fecha2").val();
            fec = fecha2.split("/");
            fecha2 = fec[2] + "/" + fec[1] + "/" + fec[0];
            var dolar2 = $("#dolar2").val();
            var uf2 = $("#uf2").val();
            var petroleo2 = $("#petroleo2").val();
            var icmo2 = $("#icmo2").val();
            var var_dolar = $("#var_dolar").val();
            var var_uf = $("#var_uf").val();
            var var_petroleo = $("#var_petroleo").val();
            var var_icmo = $("#var_icmo").val();
            var pol_dolar = $("#pol_dolar").val();
            var pol_uf = $("#pol_uf").val();
            var pol_petroleo = $("#pol_petroleo").val();
            var pol_icmo = $("#pol_icmo").val();
            var ajuste_ccu = $("#ajuste_ccu").val();
            var ajuste_calculado = $("#ajuste_calculado").val();
            //Inicio ajax
            $.ajax(
                {
                    url: './controllers/botelleros/bot_ajax.php',
                    method: 'POST',
                    data: { 
                        Accion : 'jsonGuardarPolinomio',
                        quincena : quincena,
                        mes : mes,
                        ano : ano,
                        zona: zona,
                        fecha1: fecha1,
                        dolar1: dolar1,
                        uf1: uf1,
                        petroleo1: petroleo1,
                        icmo1: icmo1,
                        fecha2: fecha2,
                        dolar2: dolar2,
                        uf2: uf2,
                        petroleo2: petroleo2,
                        icmo2: icmo2,
                        var_dolar: var_dolar,
                        var_uf: var_uf,
                        var_petroleo: var_petroleo,
                        var_icmo: var_icmo,
                        pol_dolar: pol_dolar,
                        pol_uf: pol_uf,
                        pol_petroleo: pol_petroleo,
                        pol_icmo: pol_icmo,
                        ajuste_ccu: ajuste_ccu,
                        ajuste_calculado: ajuste_calculado
                        },
                    dataType: 'json',
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                        
                    }, 
                    error: function (error) {
                        console.log("Error:" + error);
                    }
                });
            //Fin ajax
          swal(
            'Guardado!',
            'Los datos fueron guardados',
            'success'
          );
          $('#modalPolinomio').modal('hide');
        });
    }
}
function verPolinomio(){
	var quincena = $("#quincena").val();
	var mes = $("#mes").val();
	var ano = $("#year").val();
	var zona= $("#cmbZona").val();
	var tituloPolinomio = "Polinomio - ";
	if (quincena==1){
		tituloPolinomio = tituloPolinomio + "Primera Quincena, ";
	}
	else{
		tituloPolinomio = tituloPolinomio + "Segunda Quincena, ";
	}
	var pal = mesPalabra(mes);
	tituloPolinomio = tituloPolinomio + "Mes de " + pal;
	tituloPolinomio = tituloPolinomio + " " + ano;

	$("#tituloPolinomio").html(tituloPolinomio);
	ajaxPolinomio(quincena, mes, ano, zona);
	//$('#modalPolinomio').modal('show');
}
function ajaxPolinomio(quincena, mes, ano, zona){
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonBuscaPolinomio',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano,
		    	zona: zona
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
                        item.pol_fecha1,
                        item.pol_dolar1,
                        item.pol_uf1,
                        item.pol_petroleo1,
                        item.pol_icmo1,
                        item.pol_fecha2,
                        item.pol_dolar2,
                        item.pol_uf2,
                        item.pol_petroleo2,
                        item.pol_icmo2,
                        item.pol_var_dolar,
                        item.pol_var_uf,
                        item.pol_var_petroleo,
                        item.pol_var_icmo,
                        item.pol_pol_dolar,
                        item.pol_pol_uf,
                        item.pol_pol_petroleo,
                        item.pol_pol_icmo,
                        item.pol_pol_ajuste_ccu,
                        item.pol_ajuste_calculado,
                        item.pol_zona
                    ];
                    datos.push(obj);
                });
                if((datos.length)>0){
                	$('#modalPolinomio').modal('show');
                	llenaPolinomio(datos);
                }
                else{
                	$('#modalPolinomio').modal('show');
                	swal("Advertencia", "No hay Polinomio asociado!", "warning")
                    limpiarPolinomios();
                }

            }, error: function (error) {
				console.log("Error:" + error);
				$('#modalCargando').modal('hide');
            }
        });
//Fin ajax
}
function ajaxPolinomio2(quincena, mes, ano){
	var zona = "SIN ZONA";
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonBuscaPolinomio',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano,
		    	zona: zona
		    	},
            dataType: 'json',
            beforeSend: function () {
            	$("#polinomios").html("<img src='../images/puntos.gif' border=0 />");
            },
            success: function (data) {
            	var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.pol_fecha1,
                        item.pol_dolar1,
                        item.pol_uf1,
                        item.pol_petroleo1,
                        item.pol_icmo1,
                        item.pol_fecha2,
                        item.pol_dolar2,
                        item.pol_uf2,
                        item.pol_petroleo2,
                        item.pol_icmo2,
                        item.pol_var_dolar,
                        item.pol_var_uf,
                        item.pol_var_petroleo,
                        item.pol_var_icmo,
                        item.pol_pol_dolar,
                        item.pol_pol_uf,
                        item.pol_pol_petroleo,
                        item.pol_pol_icmo,
                        item.pol_pol_ajuste_ccu,
                        item.pol_ajuste_calculado,
                        item.pol_zona
                    ];
                    datos.push(obj);
                });
                $("#polinomios").html("Polinomios asociados al periodo: <b>" + datos.length + "</b>");
                $("#polinomios").append("&nbsp;<button class='btn btn-primary btn-xs' onclick='verPolinomio()'>Ver</button>");
                if((datos.length)==0){
                	swal("Advertencia", "No hay Polinomio asociado!", "warning")
                }

            }, error: function( jqXHR, textStatus, errorThrown ) {
                console.log(errorThrown);
            }
        });
//Fin ajax
}
function calcularAjuste(){
    var dolar1 = $("#dolar1").val();
    var uf1 = $("#uf1").val();
    var petroleo1 = $("#petroleo1").val();
    var icmo1 = $("#icmo1").val();
    var dolar2 = $("#dolar2").val();
    var uf2 = $("#uf2").val();
    var petroleo2 = $("#petroleo2").val();
    var icmo2 = $("#icmo2").val();
    var var_dolar = $("#var_dolar").val();
    var var_uf = $("#var_uf").val();
    var var_petroleo = $("#var_petroleo").val();
    var var_icmo = $("#var_icmo").val();
    var pol_dolar = $("#pol_dolar").val();
    var pol_uf = $("#pol_uf").val();
    var pol_petroleo = $("#pol_petroleo").val();
    var pol_icmo = $("#pol_icmo").val();
    var ajuste_ccu = $("#ajuste_ccu").val();

    var calculo = 0;
    calculo = Math.round(var_dolar * pol_dolar)/100;
    calculo += Math.round(var_uf * pol_uf)/100;
    calculo += Math.round(var_petroleo * pol_petroleo)/100;
    calculo += Math.round(var_icmo * pol_icmo)/100;
    $("#ajuste_calculado").val(calculo);
}
function limpiarPolinomios(){
    $("#fecha1").val("");
    $("#dolar1").val("");
    $("#uf1").val("");
    $("#petroleo1").val("");
    $("#icmo1").val("");
    $("#fecha2").val("");
    $("#dolar2").val("");
    $("#uf2").val("");
    $("#petroleo2").val("");
    $("#icmo2").val("");
    $("#var_dolar").val("");
    $("#var_uf").val("");
    $("#var_petroleo").val("");
    $("#var_icmo").val("");
    $("#pol_dolar").val("");
    $("#pol_uf").val("");
    $("#pol_petroleo").val("");
    $("#pol_icmo").val("");
    $("#ajuste_ccu").val("");
    $("#ajuste_calculado").val("");
}
function validaFecha(fecha){
    var fec = fecha.split("/");
    var err_fecha = 0;
    if (fec.length == 3) {
        var dia = fec[0];
        if (dia < 1 || dia > 31) {
            err_fecha = 1;
        }
        var mes = fec[1];
        if (mes < 1 || mes > 12) {
            err_fecha = 2;
        }
        var anio = fec[2];
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
function validarPolinomio(){
    var fecha1 = $("#fecha1").val();
    var dolar1 = $("#dolar1").val();
    var uf1 = $("#uf1").val();
    var petroleo1 = $("#petroleo1").val();
    var icmo1 = $("#icmo1").val();
    var fecha2 = $("#fecha2").val();
    var dolar2 = $("#dolar2").val();
    var uf2 = $("#uf2").val();
    var petroleo2 = $("#petroleo2").val();
    var icmo2 = $("#icmo2").val();
    var var_dolar = $("#var_dolar").val();
    var var_uf = $("#var_uf").val();
    var var_petroleo = $("#var_petroleo").val();
    var var_icmo = $("#var_icmo").val();
    var pol_dolar = $("#pol_dolar").val();
    var pol_uf = $("#pol_uf").val();
    var pol_petroleo = $("#pol_petroleo").val();
    var pol_icmo = $("#pol_icmo").val();
    var ajuste_ccu = $("#ajuste_ccu").val();
    var ajuste_calculado = $("#ajuste_calculado").val();
    // proceder con la validación
    if (!validaFecha(fecha1)){
        swal("Error", "La fecha no es válida.", "error");
        $("#fecha1").focus();
        return false;
    }
    if (!validaFecha(fecha2)){
        swal("Error", "La fecha no es válida.", "error");
        $("#fecha2").focus();
        return false;
    }
    if( (dolar1.length==0) || (uf1.length==0) || (petroleo1.length==0) || (icmo1.length==0) || (dolar2.length==0) || (uf2.length==0) || 
        (petroleo2.length==0) || (icmo2.length==0) || (var_dolar.length==0) || (var_uf.length==0) || (var_petroleo.length==0) || (var_icmo.length==0) || 
        (pol_dolar.length==0) || (pol_uf.length==0) || (pol_petroleo.length==0) || (pol_icmo.length==0) || (ajuste_ccu.length==0) || (ajuste_calculado.length==0))
    {
        swal("Error", "Debe ingresar todos los valores.", "error");
        return false;
    }
    if( isNaN(dolar1) || isNaN(uf1) || isNaN(petroleo1) || isNaN(icmo1) || isNaN(dolar2) || isNaN(uf2) || 
        isNaN(petroleo2) || isNaN(icmo2) || isNaN(var_dolar) || isNaN(var_uf) || isNaN(var_petroleo) || isNaN(var_icmo) || 
        isNaN(pol_dolar) || isNaN(pol_uf) || isNaN(pol_petroleo) || isNaN(pol_icmo) || isNaN(ajuste_ccu) || isNaN(ajuste_calculado))
    {
        swal("Error", "Revise que todos los valores ingresados sea numéricos.", "error");
        return false;
    }
    return true;
}
function isNumberKey(evt){
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode != 45 &&charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
function llenaPolinomio(datos){
    var f1 = datos[0][0].split("-");
    var f2 = datos[0][5].split("-");
	$("#fecha1").val(f1[2] + "/" + f1[1] + "/" + f1[0]);
	$("#dolar1").val(datos[0][1]);
	$("#uf1").val(datos[0][2]);
	$("#petroleo1").val(datos[0][3]);
	$("#icmo1").val(datos[0][4]);
	$("#fecha2").val(f2[2] + "/" + f2[1] + "/" + f2[0]);
	$("#dolar2").val(datos[0][6]);
	$("#uf2").val(datos[0][7]);
	$("#petroleo2").val(datos[0][8]);
	$("#icmo2").val(datos[0][9]);
	$("#var_dolar").val(datos[0][10]);
	$("#var_uf").val(datos[0][11]);
	$("#var_petroleo").val(datos[0][12]);
	$("#var_icmo").val(datos[0][13]);
	$("#pol_dolar").val(datos[0][14]);
	$("#pol_uf").val(datos[0][15]);
	$("#pol_petroleo").val(datos[0][16]);
	$("#pol_icmo").val(datos[0][17]);
	$("#ajuste_ccu").val(datos[0][18]);
	$("#ajuste_calculado").val(datos[0][19]);
	//$("#").val(datos[0].pol_zona);
}
function ocaCambiarEstado2(oca, estado){
    var quincena = $("#quincena").val();
    var mes = $("#mes").val();
    var ano = $("#year").val();
    //Inicio ajax
                    $.ajax(
                        {
                            url: './controllers/botelleros/bot_ajax.php',
                            method: 'POST',
                            async: false,
                            data: { 
                                Accion : 'jsonautorizarOcaCero',
                                oca: oca,
                                quincena: quincena,
                                mes: mes,
                                ano: ano,
                                estado: estado
                                },
                            dataType: 'json',
                            beforeSend: function () {
                               
                            },
                            success: function (data) {
                                /*
                                var x = JSON.parse(data);
                                if(x.mensaje == "OK"){
                                    swal(
                                    'Modificado!',
                                    'Los datos fueron guardados',
                                    'success'
                                  );    
                                }
                                else{
                                    
                                    console.log(x.mensaje);
                                    swal("Error", "Ha ocurrido un error al intentar grabar", "error");
                                }
                                verCeros2();
                                */
                            }, 
                            error: function (error) {
                                console.log("Error:" + error);
                            }
                        });
                    //Fin ajax
}
function ocaCambiarEstado(oca, estado){
    var quincena = $("#quincena").val();
    var mes = $("#mes").val();
    var ano = $("#year").val();
    swal({
          title: '¿Está seguro?',
          text: "Desea cambiar la autorización del tramo en cero",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:"No",
          confirmButtonText: 'Si'
        }).then(function () {

            //Inicio ajax
                    $.ajax(
                        {
                            url: './controllers/botelleros/bot_ajax.php',
                            method: 'POST',
                            async: false,
                            data: { 
                                Accion : 'jsonautorizarOcaCero',
                                oca: oca,
                                quincena: quincena,
                                mes: mes,
                                ano: ano,
                                estado: estado
                                },
                            dataType: 'json',
                            beforeSend: function () {
                               
                            },
                            success: function (data) {
                                var x = JSON.parse(data);
                                if(x.mensaje == "OK"){
                                    swal(
                                    'Modificado!',
                                    'Los datos fueron guardados',
                                    'success'
                                  );    
                                }
                                else{
                                    
                                    console.log(x.mensaje);
                                    swal("Error", "Ha ocurrido un error al intentar grabar", "error");
                                }
                                verCeros2();
                            }, 
                            error: function (error) {
                                console.log("Error:" + error);
                            }
                        });
                    //Fin ajax
        });
}
function actualizaTablaCeros(datos){
    $('#tablaCeros').DataTable().destroy();
                $('#tablaCeros').DataTable({
                    "autowidth": false,
                    data: datos,
                    "columns":[{
                        data: datos.fac_oca,
                    },
                    {
                        data: datos.fac_origen,
                    },
                    {
                        data: datos.fac_destino,
                    },
                    {
                        data: datos.fac_fecha_hora_orden,
                    },
                    {
                        data: datos.fac_patente,
                    },
                    {
                        data: datos.fac_rampla,
                    },
                    {
                        data: datos.fac_estado,
                        "render": function ( data1, type, row ) {
                            if(data1 == null ){
                                var radios = `
                                <div data-toggle="buttons">
                                  <label class="btn btn-default btn-circle btn-xs" data-toggle="tooltip" data-placement="top" title="Autorizar" onclick="ocaCambiarEstado2('`+row[0]+`', 1);"> <input type="radio" name="q1" value="0"><i class="glyphicon glyphicon-ok"></i></label>
                                  <label class="btn btn-default btn-circle btn-xs"  data-toggle="tooltip" data-placement="top" title="A Cobro" onclick="ocaCambiarEstado2('`+row[0]+`', 2);"> <input type="radio" name="q1" value="1"><i class="glyphicon glyphicon-usd"></i></label>
                                  <label class="btn btn-default btn-circle btn-xs active"  data-toggle="tooltip" data-placement="top" title="Quitar Autorización" onclick="ocaCambiarEstado2('`+row[0]+`', 0);"> <input type="radio" name="q1" value="2"><i class="glyphicon glyphicon-remove" chacked></i></label>
                                </div>
                                `;
                                return radios;
                            }else{
                                if(data1 == "AUTORIZADO"){
                                    var radios = `
                                    <div data-toggle="buttons">
                                      <label class="btn btn-default btn-circle btn-xs active" data-toggle="tooltip" data-placement="top" title="Autorizar" onclick="ocaCambiarEstado2('`+row[0]+`', 1);"> <input type="radio" name="q1" value="0"><i class="glyphicon glyphicon-ok" chacked></i></label>
                                      <label class="btn btn-default btn-circle btn-xs" data-toggle="tooltip" data-placement="top" title="A Cobro" onclick="ocaCambiarEstado2('`+row[0]+`', 2);"> <input type="radio" name="q1" value="1"><i class="glyphicon glyphicon-usd"></i></label>
                                      <label class="btn btn-default btn-circle btn-xs"   data-toggle="tooltip" data-placement="top" title="Quitar Autorización" onclick="ocaCambiarEstado2('`+row[0]+`', 0);"> <input type="radio" name="q1" value="2"><i class="glyphicon glyphicon-remove"></i></label>
                                    </div>
                                    `;
                                return radios;
                                }
                                if(data1 == "A COBRO"){
                                    var radios = `
                                    <div data-toggle="buttons">
                                      <label class="btn btn-default btn-circle btn-xs" data-toggle="tooltip" data-placement="top" title="Autorizar" onclick="ocaCambiarEstado2('`+row[0]+`', 1);"> <input type="radio" name="q1" value="0"><i class="glyphicon glyphicon-ok"></i></label>
                                      <label class="btn btn-default btn-circle btn-xs active" data-toggle="tooltip" data-placement="top" title="A Cobro" onclick="ocaCambiarEstado2('`+row[0]+`', 2);"> <input type="radio" name="q1" value="1"><i class="glyphicon glyphicon-usd" chacked></i></label>
                                      <label class="btn btn-default btn-circle btn-xs "   data-toggle="tooltip" data-placement="top" title="Quitar Autorización" onclick="ocaCambiarEstado2('`+row[0]+`', 0);"> <input type="radio" name="q1" value="2"><i class="glyphicon glyphicon-remove"></i></label>
                                    </div>
                                    `;
                                return radios;
                                }
                            }
                                    
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
                        dom: 'Bfrtip',
                        buttons: [
                            'excel'
                        ]

                });
}
function verCeros2(){
    var quincena = $("#quincena").val();
    var mes = $("#mes").val();
    var ano = $("#year").val();
    //Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            data: { 
                Accion : 'jsonlistarCeros',
                quincena : quincena,
                mes : mes,
                ano : ano
                },
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                var datos = [];
                $.each(data, function (i, item) {
                    var obj = [
                        item.fac_oca,
                        item.fac_origen,
                        item.fac_destino,
                        item.fac_fecha_hora_orden,
                        item.fac_patente,
                        item.fac_rampla,
                        item.fac_estado
                    ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
                actualizaTablaCeros(datos);
            }, error: function (error) {
                console.log("Error:" + error);
            }
        });
//Fin ajax
}
function verCeros(){
	var quincena = $("#quincena").val();
	var mes = $("#mes").val();
	var ano = $("#year").val();
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            data: {	
			    Accion : 'jsonlistarCeros',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
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
                        item.fac_oca,
                        item.fac_origen,
                        item.fac_destino,
                        item.fac_fecha_hora_orden,
                        item.fac_patente,
                        item.fac_rampla,
                        item.fac_estado
                    ];
                    // jsonListaDuplicados
                    datos.push(obj);
                });
                $('#modalConsultar1').modal('show');
            	actualizaTablaCeros(datos);
            }, error: function (error) {
				console.log("Error:" + error);
				$('#modalCargando').modal('hide');
            }
        });
//Fin ajax
}
function verDuplicados(){
		var quincena = $("#quincena").val();
		var mes = $("#mes").val();
		var ano = $("#year").val();
		//Inicio ajax
	    $.ajax(
	        {
	            url: './controllers/botelleros/bot_ajax.php',
	            method: 'POST',
	            data: {	
				    Accion : 'jsonlistarDuplicados',
			    	quincena : quincena,
			    	mes : mes,
			    	ano : ano
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
		                    item.fac_quincena,
		                    item.fac_mes,
		                    item.fac_ano,
	                        item.fac_oca,
	                        item.fac_origen,
	                        item.fac_destino,
	                        item.fac_fecha_hora_orden,
	                        item.fac_patente,
	                        item.fac_rampla
	                    ];
	                    datos.push(obj);
	                });
	                $('#modalConsultar2').modal('show');
	            	$('#tablaDuplicados').DataTable().destroy();
	            	$('#tablaDuplicados').DataTable({
	            		"autowidth": false,
	            		data: datos,
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
	//Fin ajax
}
function consultar(){
	$("#mensajeria").show();
	var quincena = $("#quincena").val();
	var mes = $("#mes").val();
	var ano = $("#year").val();
	ajaxPolinomio2(quincena, mes, ano);
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async:false,
            data: {	
			    Accion : 'jsonPeriodo',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            	$("#totalRegistros").html("<img src='../images/puntos.gif' border=0 />");
            },
            success: function (data) {
                $("#totalRegistros").html("Cantidad de registros ingresados: <b>" + data + "</b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
    //Fin ajax
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async:false,
            data: {	
			    Accion : 'jsonMonto',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            	$("#monto").html("<img src='../images/puntos.gif' border=0 />");
            },
            success: function (data) {
                $("#monto").html("Monto a facturar: <b>$ " + data + ".- </b>");
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
    //Fin ajax
	//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async:false,
            data: {	
			    Accion : 'jsonCeros',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            	$("#ceros").html("<img src='../images/puntos.gif' border=0 />");
            },
            success: function (data) {
            	$("#ceros").html("Cantidad de Tramos en cero: <b>" + data + "</b>");
                if(data!=0){
                	$("#ceros").append("&nbsp;<button class='btn btn-primary btn-xs' onclick='verCeros()'>Ver</button>");
                	
                }
                
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax
//Inicio ajax
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async:false,
            data: {	
			    Accion : 'jsonDuplicadas',
		    	quincena : quincena,
		    	mes : mes,
		    	ano : ano
		    	},
            dataType: 'json',
            beforeSend: function () {
            	$("#duplicados").html("<img src='../images/puntos.gif' border=0>");
            },
            success: function (data) {
            	var count = Object.keys(data).length; // cuenta el contenido del json
                $("#duplicados").html("Cantidad de Ordenes duplicadas: <b>" + count + "</b>");
                if(data!=0){
                	$("#duplicados").append("&nbsp;<button class='btn btn-primary btn-xs' onclick='verDuplicados()'>Ver</button>");
                }
            }, error: function (error) {
				console.log("Error:" + error);
            }
        });
//Fin ajax
}
function liquidar(){
    // REALIZAR VALIDACION DE TRAMOS EN 0 SIN REVISAR
    var quincena = $("#quincena").val();
    var mes = $("#mes").val();
    var ano = $("#year").val();
    $.ajax(
        {
            url: './controllers/botelleros/bot_ajax.php',
            method: 'POST',
            async:false,
            data: { 
                Accion : 'jsonbuscarCerosSinRevisar',
                quincena : quincena,
                mes : mes,
                ano : ano
                },
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                if(data!=0){
                    swal(
                        'Error!',
                        'Aún hay tramos en cero sin definir acción',
                        'error'
                      );
                }
                
            }, error: function (error) {
                console.log("Error:" + error);
            }
        });
    }

$(document).ready(function() {
	$("#mensajeria").hide();
    $("#cmbZona").change(function(){
        var quincena = $("#quincena").val();
        var mes = $("#mes").val();
        var ano = $("#year").val();
        var zona = $("#cmbZona").val();
        ajaxPolinomio(quincena, mes, ano, zona);
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

</script>
<script>

$('#mover').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>

<script>




$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdnombre").val(consulta);            
});
                
</script>


<!-- propiedades-->
<script>
$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	    $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){

			  });            
});
                
</script>
<!-- fin-->
<script>

$('#eliminar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});

$('#permisos').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});


    $('#sidebar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // Botón que activó el modal	
	 var codigo = button.data('id');
	 alert (codigo)
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});

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

</script> 

<script>
	$(document).ready(function(){
        $( "#fecha1" ).datepicker();
        $( "#fecha2" ).datepicker();		  
});
</script>

<script>
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
</script>

<div class="modal fade modal-primary" id="modalConsultar1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:850px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tramos en Cero</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table id="tablaCeros" class="table-striped table-condensed table-hover" style="width:100%">
                            <thead>
                            	<tr>
                            	<th>OCA</th>
                            	<th>Origen</th>
                            	<th>Destino</th>
                            	<th>Fecha_Hora_Orden</th>
                            	<th>Patente</th>
                            	<th>Rampla</th>
                                <th>Autorizar</th>
                            	</tr>
                            </thead>
                            </table>
                        </div>

                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
        </div>

    </div>
</div>

<div class="modal fade modal-primary" id="modalConsultar2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ordenes de Carga Duplicadas</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table id="tablaDuplicados" class="table-striped table-condensed table-hover" style="width:100%">
                            <thead>
                            	<tr>
                            	<th>Q.</th>
                            	<th>Mes</th>
                            	<th>Año</th>
                            	<th>OCA</th>
                            	<th>Origen</th>
                            	<th>Destino</th>
                            	<th>Fecha_Hora_Orden</th>
                            	<th>Patente</th>
                            	<th>Rampla</th>
                            	</tr>
                            </thead>
                            </table>
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

<div class="modal fade modal-primary" id="modalPolinomio" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="tituloPolinomio" class="modal-title">Polinomio</h4>
            </div>
            <div class="modal-body">
            <div class="panel panel-body">
					<div class="col-lg-12 col-sm-12">
						<div class="col-lg-1">Zona:</div>
						<div class="col-lg-11">
							<select id="cmbZona" class="form-control form-control-sm">
                                <option value="SUR">SUR</option>
							    <option value="NORTE">NORTE</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12">
						<div class="col-lg-4 col-sm-4">Fecha</div>
						<div class="col-lg-2 col-sm-2">Dólar</div>
						<div class="col-lg-2 col-sm-2">UF</div>
						<div class="col-lg-2 col-sm-2">Petróleo</div>
						<div class="col-lg-2 col-sm-2">ICMO</div>
					</div>
					<div class="col-lg-12 col-sm-12">
						<div class="col-lg-4 col-sm-4"><input id="fecha1" type="date" class="form-control input-sm" placeholder="00/00/0000" maxlength="10" /></div>
						<div class="col-lg-2 col-sm-2"><input id="dolar1" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="dolar 1" maxlength="6" /></div>
						<div class="col-lg-2 col-sm-2"><input id="uf1" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="UF 1" maxlength="8" /></div>
						<div class="col-lg-2 col-sm-2"><input id="petroleo1" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="petroleo 1" maxlength="6" /></div>
						<div class="col-lg-2 col-sm-2"><input id="icmo1" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="ICMO 1" maxlength="6" /></div>
					</div>
					<div class="col-lg-12 col-sm-12">
						<div class="col-lg-4 col-sm-4"><input id="fecha2" type="date" class="form-control input-sm" placeholder="00/00/0000" maxlength="10" /></div>
						<div class="col-lg-2 col-sm-2"><input id="dolar2" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="dolar 2" maxlength="6" /></div>
						<div class="col-lg-2 col-sm-2"><input id="uf2" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="UF 2" maxlength="8" /></div>
						<div class="col-lg-2 col-sm-2"><input id="petroleo2" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="petroleo 2" maxlength="6" /></div>
						<div class="col-lg-2 col-sm-2"><input id="icmo2" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="ICMO 2" maxlength="6" /></div>
					</div>
					<div class="col-lg-12 col-sm-12">
						<div class="col-lg-4 col-sm-4">Variación</div>
						<div class="col-lg-2 col-sm-2"><input id="var_dolar" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="variacion dolar" maxlength="5" /></div>
						<div class="col-lg-2 col-sm-2"><input id="var_uf" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="variacion uf" maxlength="5" /></div>
						<div class="col-lg-2 col-sm-2"><input id="var_petroleo" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="variacion petroleo" maxlength="5" /></div>
						<div class="col-lg-2 col-sm-2"><input id="var_icmo" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="variacion ICMO" maxlength="5" /></div>
					</div>
					<div class="col-lg-12 col-sm-12">POLINOMIO CARGO</div>
						<div class="col-lg-3 col-sm-3">Dólar</div>
						<div class="col-lg-3 col-sm-3">UF</div>
						<div class="col-lg-3 col-sm-3">Petróleo</div>
						<div class="col-lg-3 col-sm-3">ICMO</div>
						
						<div class="col-lg-3 col-sm-3"><input id="pol_dolar" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="% dolar" maxlength="2" /></div>
						<div class="col-lg-3 col-sm-3"><input id="pol_uf" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="% UF" maxlength="2" /></div>
						<div class="col-lg-3 col-sm-3"><input id="pol_petroleo" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="% petroleo" maxlength="2" /></div>
						<div class="col-lg-3 col-sm-3"><input id="pol_icmo" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="% ICMO" maxlength="2" /></div>
					<div class="col-lg-12 col-sm-12 text-center">AJUSTE CARGO INDICADO CCU</div>
                    <div class="col-lg-5 col-sm-5"></div>
					<div class="col-lg-2 col-sm-2 text-center"><input id="ajuste_ccu" onkeypress="return isNumberKey(event)" type="text" class="form-control input-sm" placeholder="% ajuste CCU" maxlength="4" /></div>
                    <div class="col-lg-5 col-sm-5"></div>
					<div class="col-lg-12 col-sm-12 text-center">AJUSTE CALCULADO</div>
                    <div class="col-lg-5 col-sm-5"></div>
					<div class="col-lg-2 col-sm-2 text-center input-group">
                        <input id="ajuste_calculado" type="text" class="form-control input-sm" disabled="disabled" placeholder="% ajuste Calculado" maxlength="4" />
                        <span class="input-group-btn"><button class="btn btn-primary btn-sm" onclick="calcularAjuste();"><i class="fa fa-cog"></i></button></span>
                    </div>
                    <div class="col-lg-5 col-sm-5"></div>
            <div class="col-lg-12 col-sm-12">
            	<button id="btnGuardarPolinomio" class="btn btn-primary" onclick="guardarPolinomio()">Guardar</button>

			</div>
            </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>