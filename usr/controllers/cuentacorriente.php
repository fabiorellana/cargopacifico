<?php require('include/valida.php');?>
       <!DOCTYPE html>
       <html>
       <?php require('include/header.php');?>
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
              
              <div class="content-wrapper ">
              <br class="hidden-xs">
              <br class="hidden-xs">
              <br class="hidden-xs">

          
              <ol class="breadcrumb">
              <li class="active">Cuenta Corriente: "Centro"</li>
              </ol>
             

              <div class="container">
               <div class="col-lg-1 col-xs-6">Año<input type="text" placeholder="Año" name="txtAno" id="txtAno" class="form-control input-sm" maxlength="4"></div>
              <div class="col-lg-2 col-xs-4">  Mes
              <select id="comboMes" class="form-control" >
              <option value="01">Enero</option>
              <option value="02">Febrero</option>
              <option value="03">Marzo</option>
              <option value="04">Abril</option>
              <option value="05">Mayo</option>
              <option value="06">Junio</option>
              <option value="07">Julio</option>
              <option value="08">Agosto</option>
              <option value="09">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
              </select>
              </div>
             
              
              <div class="col-lg-2 col-xs-6 ">Centro <select id="comboCentroF" class="form-control"></select>  </div>
              
              <div class="col-lg-3 col-xs-6">Planilla<input type="text" placeholder="N° Planilla" id="txtPlanillaF" class="input-sm form-control" maxlength="8"></div>
              
              <div class="col-lg-1 col-xs-6">&nbsp;<br><button type="submit" id="btnFiltrar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
              Buscar</button></div>
              
              </div>

            <br>
            <div class="well well-lg" style="margin-left: 3%; margin-right: 3%;">
            <table width="100%" id="tblFiltrarB" class="table table-condensed table-striped table-primary">
              <thead>
                <tr>
                  <th>Planilla</th>
                  <th>Trabajador</th>
                  <th>Total ingresos cajas</th>
                  <th>Total ingresos</th>
                  <th>Diferencias</th>
                </tr>
              </thead>
            </table>
            </div>

             <div id="footer">
             <div class="col-lg-6">
             <div class ="panel panel-primary" >
             <div class=" panel-heading"></div>
             <div id="contenedortablasumafiltro">
              <table id="tblSuma" width="100%">
               <tbody>
                  <tr>
                   <td>Año:</td>
                   <td>Mes:</td>
                   <td>Retiros:</td>
                  </tr>

                  <tr>
                   <td>Centro:</td>
                   <td>Trabajador:</td>
                   <td>Cobros:</td>
                  </tr>

                  <tr>
                    <td>Planilla:</td>
                    <td>Total ingreso a caja:</td>
                    <td>Diferencias:</td>
                  </tr>
               </tbody>
             </table>
             </div>
             </div>
             </div>
             
             <div class="col-lg-5"></div>
             <div class="col-lg-1 pull-right"  >
             <button class="btn btn-primary btn-lg BtnFlotante" data-toggle="modal" data-target="#modalvalores" ><i class="fa fa-plus" aria-hidden="true"></i></button>    
             </div>
             </div>

              <style>
              #footer {
              margin-top: 25%;
              
               }
              @media screen and (max-width: 480px) {
              #footer {
              margin-top: 65%;
              display:scroll;
              position:fixed;
              }
              }
              .BtnFlotante {
              display:scroll;
              position:fixed;
              bottom:3%;
              right:2%;
                        }
              @media screen and (max-width: 480px) {
              .BtnFlotante {
              bottom:5%;
              display:scroll;
              position:fixed;
              }
              }              
              </style>
              
           
              
              </div>


                 <?php require('include/footer.php');?>
              </body>







                <!-- valores modal -->
                <div class="modal fade" id="modalvalores" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                <b>Ingreso de valores para planilla</b>
                </div>
                <div class="modal-body" >
                <form class="form-inline" role="form">
                <div class="form-group">
                <input type="number" class="form-control" id="txtPlanilla"  placeholder="Numero de planilla" required="">
                </div>
                <div  class="btn btn-primary" id="btnBuscarPlanilla">Buscar</div>&nbsp;<a id="activaTxt">New</a>
                </form>
                <br>
                <div class="well well-lg" id="contenedordatos">
                <table width="100%" border="0">
                <tr>
                <td>Planilla N°:</td>
                <td>Fecha:</td>
                </tr>
                <tr>
                <td>Conductor:</td>
                <td>Centro:</td>
             
                </table>
                </div>
                <div class="col-lg-12">
                <div class="well well-lg" id="contenedorTxtValores">
                
                <form class="form-inline" role="form">
                <div class="form-group">
                
                <div class="col-lg-6 col-xs-12">
                Valor Planilla
                <input type="text" name="TxtValPlanilla" id="TxtValPlanilla" class="form-control">
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Efectivo
                <input type="number" name="txtEfectivo" id="txtEfectivo" class="form-control" required="" />
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Cheque
                <input type="number" name="txtCheque" id="txtCheque" class="form-control" required=""/>
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Promae
                <input type="number" name="txtPromae" id="txtPromae" class="form-control" required=""/>
                </div>
                
                
                <div class="col-lg-6 col-xs-12">
                Flete porteo
                <input type="number" name="txtflete" id="txtflete" class="form-control" required=""/>
                </div>

                <!--Inputs para rescatar los montos de cada ingreso-->
                <input type="text" id="txtGasto" class="form-control hidden">
                <input type="text" id="txtChequeP" class="form-control hidden">
                <input type="text" id="txtChequeC" class="form-control hidden">
                <input type="text" id="txtAbono" class="form-control hidden">
                <input type="text" id="txtRetiro" class="form-control hidden">
                
                </div>
                </form>
                </div>
                </div>

                <div align="center">
                <div class="col-lg-12">
                
                <div class="col-lg-4 col-xs-6 ">
                <a id="btningresarGasto"  class="btn btn-primary btn-sm " >
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                &nbsp;Gastos</a>
                </div>
                <div class="col-lg-4 col-xs-6"><a class="btn btn-primary btn-sm" id="btningresarchequespendientes" ><i class="fa fa-list-alt" aria-hidden="true"></i>
                &nbsp;Cheques P</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnChConta" >
                <i class="fa fa-address-card" aria-hidden="true"></i>
                &nbsp;Cheques C</a>
                </div>
                <br>
                
                <br>
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnAbono" >
                <i class="fa fa-address-card" aria-hidden="true"></i>
                &nbsp; Abono</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnRetiro" >
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                &nbsp;Retiro</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm" id="btnCobro" >
                <i class="fa fa-money" aria-hidden="true"></i>
                &nbsp;Cobros</a>
                </div>
                <br>
                <br>
                <br>
                </div>

                <div class="modal-footer"><div align="center"><button type="submit" class="btn btn-danger" id="btnGuardar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
&nbsp;Guardar</button></div></div>
                </div>
                </div>
                </div>
                </div>


               <!--ingreso de gastos -->
               <div class="modal fade" id="modalgastos" tabindex="-1"  >
               <div class="modal-dialog" >
               <div class="modal-content" >
               <div class="modal-header">
               <button type="button" class="close"  id="closeGastos">×</button>
               <h4 class="modal-title">Ingresar Gastos</h4>
               </div>
               <div class="modal-body" >
               <form method="post" action="">
               <input type="text" name="planilla" id="txtPlanillaGastos" placeholder="" class="form-control hidden" />
               <div class="col-lg-6"> Item
               <select id="txtItemGastos" class="form-control"></select>
               </div>
               
               <div class="col-lg-6">
               Monto
               <input type="number" name="txtMonto" placeholder="" id="TxtMonto" class="form-control" required/>
               </div>

               <div class="col-lg-12">
               Observación
               <textarea  name="txtObservacion" id="TxtObs"  class="form-control" required></textarea> 
               </div>
               <br>
               <br>
               </form>
               </div>
               <br>
               <div class="modal-footer" >
               <div align="center" class="col-lg-12"><br>
               <input type="button" value="Guardar" name="btnguardaGastos"   class="btn btn-primary" id="BtnguardaGastos"  />
               <br>
               </div>
               <div>&nbsp;</div>
                <table id="tblGastos" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
                  <thead>
                    <tr>
                    <th>#</th>
                      <th>Planilla</th>
                      <th>Item</th>
                      <th>Monto</th>
                      <th>Observacion</th>
                      <th>Eliminar</th>
                    </tr>
                </thead>
              </table>
               </div>
               </div>
               </div>
               </div>    
               <!--Fin ingreso de gastos-->

             
                     <!--ingreso de cheques pendientes -->
                  <div class="modal fade" id="ingresarchequespendientes" tabindex="-1"  >
                  <div class="modal-dialog" >
                  <div class="modal-content modal-lg">
                  <div class="modal-header">
                  <button type="button" class="close"  id="closechp">×</button>
                  <h4 class="modal-title">Ingresar cheques Pendientes</h4>
                  </div>
                  <div class="modal-body">
                  <form method="post">
                  <input type="text" name="planilla" id="txtplanillachp" placeholder="" class="form-control hidden" />
                  <br>                   
                   <div class="col-lg-6">
                   N° de cheque 
                   <input type="number"  id="txtnCheque" placeholder="" class="form-control" required  />
                   </div>
                   <div class ="col-lg-6">
                   Banco
                  	<select id="combobanco" class="form-control"></select>
                   </div>
                   <div class="col-lg-6"> 
                   Cliente
                   <select id="combocliente" class="form-control"></select>
                   </div>
                   <div class="col-lg-6"> 
                   Concepto
                   <select id="comboconcepto" class="form-control"></select>
                   </div>
                   <div class="col-lg-6"> 
                   Estado
                   <select name="estado" id="estado" class="form-control" required>
                   <option value=""></option>
                   </select>
                   </div>
                   <div class="col-lg-6"> 
                   Fecha de reposición
                   <input type="date" name="fechaRepo" id="fechaRepo" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-8"> 
                   Observación
                   <input type="text" name="txtobs" id="txtobs" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-4"> 
                   Monto
                   <input type="text" name="monto" id="monto" placeholder="" class="form-control  " required/>
                   <br>
                   </div>
                   <div align="center"><div  class="btn btn-primary" id="btnGuardaChP" /><i class="fa fa-floppy-o" aria-hidden="true"></i>
                   &nbsp;Guardar</div></div>
                   
                   </div>
                   <div class="modal-footer"> </div>
                   <div>&nbsp;</div>
                   <div class="table-responsive">
		                <table id="tblChequeP" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
		                  <thead>
		                    <tr>
		                     <th>#</th>
                      		<th>Planilla</th>
		                      <th>Cheque</th>
		                      <th>Banco</th>
		                      <th>Cliente</th>
		                      <th>Concepto</th>
		                      <th>Monto</th>
		                      <th>Estado</th>
		                      <th>Fecha</th>
		                      <th>Observacion</th>
		                      <th>Eliminar</th>
		                    </tr>
		                </thead>
              			</table>
              			</div>
                   </form>
                   </div>
                   </div>
                   </div>
                   </div> 
                   <!--Fin ingreso de cheques pendientes-->

                   <!--Ingreso de cheques contables-->
                     <div class="modal fade" id="ModalChConta" >
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header">
                     <button type="button" class="close" id ="closeContable" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Ingresar cheques Contabilidad</h4>
                     </div>
                     <div class="modal-body">
                     <form method="post">
                     <input type="text" name="Planillachc" id="Planillachc" placeholder="" class="form-control hidden" />
                      <div class="col-lg-6">
                     N° de cheque
                     <input type="number" name="nCheque" id="nCheque" placeholder="" class="form-control" required />
                     </div>
                     <div class="col-lg-6">
                     Banco
                     <select id="combobancoc" class="form-control"></select>
                     </div>
                     <div class="col-lg-6">
                     Cliente
                     <select id="comboclientec" class="form-control"></select>
                     </div>
                     <div class="col-lg-6">
                     Estado
                     <select name="estado" id = "estadochc" class="form-control" required>
                     <option value=""></option>
                     </select>
                     </div>
                     <div class="col-lg-6">
                     Fecha de reposición
                     <input type="date" name="fechaRepo" id="fechaRepochc" placeholder="" class="form-control" required/>
                     </div>
                     <div class="col-lg-6">
                     Observación
                     <textarea  name="txtobs" id="txtobschc" placeholder="" class="form-control  " required ></textarea>
                     </div>
                     <div class="col-lg-12">
                     Monto
                     <input type="number" name="monto" id="txtmontochc" placeholder="" class="form-control  " required/>
                     <br>
                     </div>
                    <div align="center"><br><input type="button" name="btn" class="btn btn-primary"  value="Guardar" id="btnGuardaChConta" /></div>
                     </form>
                    </div>
                     <div class="modal-footer">
                     </div>
                      <div class="table-responsive">
		                <table id="tblChequeC" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
		                  <thead>
		                    <tr>
		                     <th>Planilla</th>
		                      <th>Cheque</th>
		                      <th>Banco</th>
		                      <th>Cliente</th>
		                      <th>Monto</th>
		                      <th>Fecha</th>
		                      <th>Observacion</th>
		                      <th>Estado</th>
		                      <th>Eliminar</th>
		                    </tr>
		                </thead>
              			</table>
              			</div>
                     </div>
                     </div>
                     </div>
                     <!--Fin ingreso de cheques contables-->

                  <!--ingreso abono -->
                  <div class="modal fade" id="ingresar_abono" >
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" id="closeAbono" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Ingresar Abono</h4>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="">
                  <input type="text" name="planilla" id="planillaAbono" placeholder="" class="form-control hidden" />
                  <br>
                  <div class="col-lg-6">
                  N° Factura
                  <input type="number" name="nFactura" id="nFacturaAbono" placeholder="" class="form-control" required />
                  </div>
                  <div class="col-lg-6">
                  Concepto
                  <select id="comboabono" class="form-control"></select>
                  </div>

                  <div class="col-lg-6">
                  Autorizado
                  <select id="comboautorizar" class="form-control"></select>
                  </div>

                  <div class="col-lg-6">
                  Monto
                  <input type="text" name="montoAbono" id="montoAbono" placeholder="" class="form-control" required="" />
                  </div>

                  <div class="col-lg-12">
                    Observaciones
                    <textarea name="txtObservacionesAbono" id="txtObservacionesAbono" placeholder="" class="form-control  " required ></textarea>
                    <br>
                  </div>
                  <div align="center"><input type="button" value="Guardar" name="btnGuardarAbono" class="btn btn-success" id="btnGuardarAbono" /></div>

                  </form>
                  </div>
                   <div class="modal-footer">
                  </div>
                  <div class="table-responsive">
		            	<table id="tblAbono" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
		                  <thead>
		                    <tr>
		                      <th>Planilla</th>
		                      <th>N° Factura</th>
		                      <th>Tipo</th>
		                      <th>Monto</th>
		                      <th>Autorizado por</th>
		                      <th>Observacion</th>
		                      <th>Eliminar</th>
		                    </tr>
		                </thead>
              			</table>
              			</div>
                  </div>
                  </div>
                  </div>
                  <!--Fin modal ventana abono-->

                  <!-- Modal retiro -->
                  <!--ingreso retiro -->
                  <div class="modal fade modal-primary" id="modal_retiro" >
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" id="closeRetiro" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Retiro</h4>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="">
                  <input type="text" name="planilla" id="planillaRetiro" placeholder="" class="form-control hidden" />
                  <br>
                  Monto
                  <input type="number" name="monto" id="montoRetiro" placeholder="" class="form-control  " required="" />
                  <br>
                  Motivo
                  <textarea name="txtMotivo" id="txtMotivoRetiro" placeholder="" class="form-control" required ></textarea>
                  <br>
                  Retirado Por:
                  <select id="comboretiro" class="form-control"></select>
                  <br>
                  <div align="center"><input type="button" value="Guardar" name="btn" class="btn btn-success" id="btnGuardarRetiro" /></div>
                  </form>
                  </div>
                  <div class="modal-footer"></div>
                    <div class="table-responsive">
		                <table id="tblRetiro" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
		                  <thead>
		                    <tr>
		                      <th>Planilla</th>
		                      <th>Motivo</th>
		                      <th>Monto</th>
		                      <th>Retirado por..</th>
		                      <th>Eliminar</th>
		                    </tr>
		                </thead>
              			</table>
              			</div>
                  </div>
                  </div>
                  </div>
                  <!--Fin modal ventana retiro-->

                  <!--Modal cargando-->
                  <div class="modal fade" id="modalCargando" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cargando...</h4>
                            </div>
                            <div class="modal-body text-center">
                          <img src="../images/ajax-loader.gif" border="0" />
                            </div>
                        </div>

                    </div>
                  </div> <!--Fin modal cargando-->


</html>


<script>
 $(document).ready(function() {
 $("#btnColapse").trigger("click");
 cargaComboCentro();

 //Filtrar datos
$("#btnFiltrar").click(function(){
  buscarFiltro1();
  buscarFiltro2();
});

});    


//busca Planilla
$("#btnBuscarPlanilla").click(function() {
BuscaPlanilla();
Buscaplan();
});
                                                  
 //guarda valores modal ingreso de valores planilla                                                          
$("#btnGuardar").on("click", function(){
guarda();
});

 //Guarda valores modal ingreso de gastos                                                        
$("#BtnguardaGastos").on("click", function(){
guardaGastos();
});

 //Guarda valores modal de cheques pendientes                                                       
$("#btnGuardaChP").on("click", function(){
GuardaChP();
});
 //Guarda valores modal de cheques contables                                                        
$("#btnGuardaChConta").on("click", function(){
GuardaChConta();
//jjjjjjjjjj
});

//Guarda valores modal de abono
$("#btnGuardarAbono").on("click", function(){
GuardarAbono();
});

//Guarda valores modal de retiro
$("#btnGuardarRetiro").on("click", function(){
GuardarRetiro();
});

//open modales


    //modal gastos
   	$("#btningresarGasto").on("click", function(){
   		var id = $("#txtPlanilla").val();
   		//carga numero de planilla en txt oculto
   		$("#txtPlanillaGastos").val(id);
   		//comprueba que exista N planilla
	  	if(!id)
	  	{
	  		swal({
	  		title: 'Debes seleccionar una planilla',
	  		text: "",
	  		type: 'warning',
	  		showCancelButton: false,
	  		confirmButtonColor: '#3085d6',
	  		confirmButtonText: 'Aceptar',
	  		animation: true,
	  		allowOutsideClick: false
	  		}).then(function () {
	  		$("#modalgastos").modal('hide');
	  		});
	  	}
	  	//carga combo item
	    $.ajax({
	    	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
	    	method: 'POST',
	    	async: false,
	    	data: { 
	    	Accion : 'comboitemgasto',
	    	},
	    	dataType: 'json',
	    	beforeSend: function () {
	    	},
	    	success: function(data){
	    		if(data.length>0){
	    			$("#txtItemGastos").html("");
	    			$.each(data, function(id, dato){
	    			$("#txtItemGastos").append('<option value="'+dato.id+'">'+dato.descripcion+'</option>');
	    			});
	    		}
	    	}
	    });
	    //carga datatable
	    datatablegastos();
	    //muestra modal gastos
	    $("#modalgastos").modal('show');         
   	})

    function datatablegastos(){
        //carga datatable
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: { 
        		Accion : 'tblgasto'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function(data){
        		if(data.length>0){
        			var datos = [];
        			$.each(data, function (i, item) {
        				var obj = [
        				item.id,
        				item.Planilla,
        				item.descripcion,
        				item.Monto,
        				item.Observacion,
        				null
        				];
        				// jsonListaDuplicados
        				datos.push(obj);
        			});
		        	$('#tblGastos').DataTable().destroy();
		        	var tabla = $('#tblGastos').DataTable({
		        	data: datos,
		        	"columns":[
		        	{
		        	width: "2%",
		        	data: datos.id,
		        	},
		        	{
		        	width: "20%",
		        	data: datos.Planilla,
		        	},
		        	{
		        	width: "10%",
		        	data: datos.descripcion,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.Monto,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.Observacion,
		        	},
		        	{
		        	width: "20%",
		        	data: null,
		        	//crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
		        	"render": function ( data, type, row ) {
		        	return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminagasto(\''+row[0]+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
        			$('#tblGastos').DataTable().destroy();
        			$('#tblGastos').DataTable().clear();
        			$('#tblGastos').DataTable().draw();
        		}
        	}, 
        	error: function (jqXHR, textStatus, errorThrown) {
        		$('#modalCargando').modal('hide');
        		console.log('error');
        	}
        });
    }

    //elimina registros de gastos
    function eliminagasto(id){
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'eliminagasto',
    			id:id
    		},
    		beforeSend: function () {
    		},
    		success: function (data) {
    			swal('Registro eliminado','','success');
    			//recarga datatable despues de borrar
    			datatablegastos();
    		}
    	}); 
    }

    //Funcion para generar el ingreso de los gastos en la base de datos
    function guardaGastos(){
    	var idplanillagastos    =  $("#txtPlanillaGastos").val();
    	var montogastos         =  $("#TxtMonto").val();
    	var obsgastos           =  $("#TxtObs").val();
    	var descripciongastos   =  $("#txtItemGastos").val();
    
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'jsonGuardarGastos',
    		
    		//Rescatando los valores de cada input de la ventana modal gastos
    		idplanillagastos: idplanillagastos,
    		montogastos: montogastos,
    		obsgastos: obsgastos,
    		descripciongastos: descripciongastos
    		},
    		beforeSend: function (){
    		},
    		success: function (data) {
    			swal('Registros Actualizados','¡Exitosamente!','success');
    			//recarga datatable despues de guardar
    			datatablegastos();
    			//$("#modalgastos").modal('hide');
    			$("#txtPlanillaGastos").val('');
    			$("#txtItemGastos").val('');
    			$("#TxtMonto").val('');
    			$("#TxtObs").val('');
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
    			console.log('error:');
    		}
    	});//Fin funcion guardar Gastos
	}
     //fin modal gastos 

    //Modal cheques pendientes
    $("#btningresarchequespendientes").on("click", function(){
        var id = $("#txtPlanilla").val();
        //carga numero de planilla en txt oculto
        $("#txtplanillachp").val(id);
        //comprueba que exista N planilla
        if(!id)
        {
	        swal({
	        title: 'Debes seleccionar una planilla',
	        text: "",
	        type: 'warning',
	        showCancelButton: false,
	        confirmButtonColor: '#3085d6',
	        confirmButtonText: 'Aceptar',
	        animation: true,
	        allowOutsideClick: false
	        }).then(function () {
	        $("#ingresarchequespendientes").modal('hide');
	        });
        }
        //carga combo banco
        $.ajax({
	        url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
	        method: 'POST',
	        async: false,
	        data: { 
	        Accion : 'jsonComboBanco'
	        },
	        dataType: 'json',
	        beforeSend: function () {
	        },
	        success: function (data) {
	        	if(data.length>0){
	        		$("#combobanco").html("");
	        		$.each(data, function(id, dato){
	        		$("#combobanco").append('<option value="'+dato.id+'">'+dato.nombre+'</option>');
	        		});
	        	}
	       }
        
        });

        //Carga combo cliente
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: {
        		Accion : 'jsonComboCliente'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function (data) {
	        	if(data.length>0){
	        		$("#combocliente").html("");
	        		$.each(data, function(id, dato){
	        			$("#combocliente").append('<option value="'+dato.id+'">'+dato.Nombre+'</option>');
	        		});
	        	}
        	}

        });

        //Carga combo concepto
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: {
        		Accion : 'jsonComboConcepto'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function (data) {
	        	if(data.length>0){
	        		$("#comboconcepto").html("");
	        		$.each(data, function(id, dato){
	        			$("#comboconcepto").append(
	        			'<option value="'+dato.id+'">'+dato.concepto+'</option>');
	        		});
	        	}
        	}

        });

        //Carga combo estado
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: {
        		Accion : 'jsonComboEstadoChp'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function (data) {
	        	if(data.length>0){
	        		$("#estado").html("");
	        		$.each(data, function(id, dato){
	        			$("#estado").append('<option value="'+dato.id+'">'+dato.descripcion+'</option>');
	        		});
	        	}
        	}

        });
                 
        //carga datatable
        datatablechp();
        //muestra modal gastos
        $("#ingresarchequespendientes").modal('show');  
        //cargaTablachP(id);
    })
     //fin modal chpendientes

    function datatablechp(){
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: {
    			Accion : 'jsonTablaChequeP'
    		},
    		dataType: 'json',
    		beforeSend: function(){
    		},
    		success: function(data){
    			if(data.length>0){
    				var datos = [];
             		$.each(data, function (i, item) {
              		var obj = [
              		  item.id,
              		  item.planilla,
			          item.N_cheque,
			          item.nombre, //descripcion de la tabla cc_is_banco
			          item.Nombre, //descripcion de la tabla cc_is_cliente
			          item.concepto,
			          item.Monto,
			          item.descripcion,
			          item.Fecha,
			          item.observacion,
              		  null
                 ];
	             // jsonListaDuplicados
	             datos.push(obj);
	             });
	              $('#tblChequeP').DataTable().destroy();
	              var tabla2 = $('#tblChequeP').DataTable({ 
	              data: datos,
	              "columns":[
	                            {
	              	width: "10%",
	              	data: datos.id,
	              },
	                            {
	              	width: "10%",
	              	data: datos.planilla,
	              },
	              {
	              	width: "10%",
	              	data: datos.N_cheque,
	              },
	              {
	              	width: "30%",
	              	data: datos.nombre,
	              },
	              {
	              	width: "20%",
	              	data: datos.Nombre,
	              },
	                            {
	              	width: "20%",
	              	data: datos.concepto,
	              },
	                            {
	              	width: "10%",
	              	data: datos.Monto,
	              },
	                            {
	              	width: "20%",
	              	data: datos.descripcion,
	              },
	                            {
	              	width: "20%",
	              	data: datos.Fecha,
	              },
	                            {
	              	width: "20%",
	              	data: datos.observacion,
	              },
	              {
	              	width: "20%",
	              	data: null,
	              //crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
	              	"render": function ( data, type, row ) {
	              	return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminachequep(\''+row[0]+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
	              tabla2.responsive.recalc().columns.adjust().draw();

    			}else{
    				$('#tblChequeP').DataTable().destroy();
        			$('#tblChequeP').DataTable().clear();
        			$('#tblChequeP').DataTable().draw();
    			}
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
              $('#modalCargando').modal('hide');
              console.log('error');
            }
    	});//fin ajax	
    }//fin function datatablechp

    function eliminachequep(id){
    	$.ajax({
            url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
            method: 'POST',
            async: false,
            data: { 
            	Accion : 'jsonEliminaChequeP',
                id:id
            },
            beforeSend: function () {
            },
            success: function (data) {
	            swal('Registro eliminado','','success');
	            //recarga datatable despues de borrar
	            datatablechp();
            }
        });
    }//fin eliminar cheque

    function GuardaChP(){
	  var idplanilla    = $("#txtplanillachp").val();
	  var ncheque       = $("#txtnCheque").val();
	  var banco         = $("#combobanco").val();
	  var combocliente  = $("#combocliente").val();
	  var comboconcepto = $("#comboconcepto").val();
	  var estado        = $("#estado").val();
	  var fechaRepo     = $("#fechaRepo").val();
	  var txtobs        = $("#txtobs").val();
	  var monto         = $("#monto").val();
    
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'jsonGuardarChequeP',
    		
    		//Rescatando los valores de cada input de la ventana modal gastos
	            idplanilla: idplanilla,
	            ncheque : ncheque,
	            banco: banco,
	            combocliente: combocliente,
	            comboconcepto: comboconcepto,
	            estado: estado,
	            fechaRepo: fechaRepo,
	            txtobs: txtobs,
	            monto: monto
    		},
    		beforeSend: function (){
    		},
    		success: function (data) {
    			swal('Registros Actualizados','¡Exitosamente!','success');
    			//recarga datatable despues de guardar
    			datatablechp();
		        $("#txtplanillachp").val('');
		        $("#txtnCheque").val('');
		        $("#combobanco").val('');
		        $("#combocliente").val('');
		        $("#comboconcepto").val('');
		        $("#estado").val('');
		        $("#fechaRepo").val('');
		        $("#txtobs").val('');
		        $("#monto").val('');
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
    			console.log('error:');
    		}
    	});
	}//Fin guardar cheques pendientes

 //modal cheques contabilidad 
 $("#btnChConta").on("click", function(){
     var id = $("#txtPlanilla").val();
     //carga numero de planilla en txt oculto
     $("#Planillachc").val(id);
     //comprueba que exista N planilla
     if(!id)
     {
	     swal({
	     title: 'Debes seleccionar una planilla',
	     text: "",
	     type: 'warning',
	     showCancelButton: false,
	     confirmButtonColor: '#3085d6',
	     confirmButtonText: 'Aceptar',
	     animation: true,
	     allowOutsideClick: false
	     }).then(function () {
	     $("#ModalChConta").modal('hide');
	     });
	  }
	     //carga combo banco
	     $.ajax({
		     url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
		     method: 'POST',
		     async: false,
		     data: { 
		     Accion : 'jsonComboBanco'
		     },
		     dataType: 'json',
		     beforeSend: function () {
		     },
		     success: function (data) {
			     if(data.length>0){
				     $("#combobancoc").html("");
				     $.each(data, function(id, dato){
				     $("#combobancoc").append('<option value="'+dato.id+'">'+dato.nombre+'</option>');
				     });
			     }
	     	 }
              
         });//fin ajax combobanco

              //Carga combo cliente
              $.ajax({
              	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
              	method: 'POST',
              	async: false,
              	data: {
              		Accion : 'jsonComboCliente'
              	},
              	dataType: 'json',
              	beforeSend: function () {
              	},
              	success: function (data) {
	              	if(data.length>0){
	              		$("#comboclientec").html("");
	              		$.each(data, function(id, dato){
	              			$("#comboclientec").append('<option value="'+dato.rut+'">'+dato.Nombre+'</option>');
	              		});
	              	}
              	}

              });//fin ajax combocliente

             //Carga combo estado
        	 $.ajax({
        	 	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	 	method: 'POST',
        	 	async: false,
        	 	data: {
        	 		Accion : 'jsonComboEstadoChc'
        	 	},
        	 	dataType: 'json',
        	 	beforeSend: function () {
        	 	},
        	 	success: function (data) {
	    	     	if(data.length>0){
	    	     		$("#estadochc").html("");
	    	     		$.each(data, function(id, dato){
	    	     			$("#estadochc").append('<option value="'+dato.idestadochc+'">'+dato.descripcion+'</option>');
	    	     		});
	    	     	}
        	 	}
	 
        	 });
              
              //carga datatable
              datatablechc();
              //muestra modal gastos
              $("#ModalChConta").modal('show');  
            //cargaTablachP(id);
            });
            //fin modal chpendientes

        function datatablechc(){
       	//Cargar datatable
    		$.ajax({
    			url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    			method: 'POST',
	            async: false,
	            data: { 
	            Accion : 'jsonTablaChequeC'
	            },
	            dataType: 'json',
	            beforeSend: function () {
	            },
	            success: function (data) {
	              	if(data.length>0){
	              		var datos = [];
	             		$.each(data, function (i, item) {
	              		var obj = [
	              		  item.planilla,
				          item.N_cheque,
				          item.nombre, //descripcion de la tabla cc_is_banco
				          item.Nombre, //descripcion de la tabla cc_is_cliente
				          item.Monto,
				          item.Fecha,
				          item.Observacion,
				          item.descripcion,
	              		  null
		              ];
		              // jsonListaDuplicados
		              datos.push(obj);
		              });
		              $('#tblChequeC').DataTable().destroy();
		              var tabla3 = $('#tblChequeC').DataTable({ 
			              data: datos,
			              "columns":[
			                            {
			              	width: "10%",
			              	data: datos.planilla,
			              },
			              {
			              	width: "10%",
			              	data: datos.N_cheque,
			              },
			              {
			              	width: "30%",
			              	data: datos.nombre,
			              },
			              {
			              	width: "20%",
			              	data: datos.Nombre,
			              },
			              {
			              	width: "10%",
			              	data: datos.Monto,
			              },
			                            {
			              	width: "20%",
			              	data: datos.Fecha,
			              },
			                            {
			              	width: "20%",
			              	data: datos.Observacion,
			              },
			                            {
			              	width: "20%",
			              	data: datos.descripcion,
			              },
			              {
			              	width: "20%",
			              	data: null,
			              	//crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
			              	"render": function ( data, type, row ) {
			              	return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminachequec(\''+row[0]+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
		              	tabla3.responsive.recalc().columns.adjust().draw();
	              	}
	              	else{
	              		$('#tblChequeC').DataTable().destroy();
	              		$('#tblChequeC').DataTable().clear();
	              		$('#tblChequeC').DataTable().draw();
	              	}
              	}, 
	            error: function (jqXHR, textStatus, errorThrown) {
		            $('#modalCargando').modal('hide');
		            console.log('error');
	            }
    		});//fin ajax
        }


    function eliminachequec(planilla){
    	$.ajax({
            url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
            method: 'POST',
            async: false,
            data: { 
            	Accion : 'jsonEliminaChequeC',
                planilla:planilla
            },
            beforeSend: function () {
            },
            success: function (data) {
	            swal('Registro eliminado','','success');
	            //recarga datatable despues de borrar
	            datatablechc();
            }
        });
    }

    //Funcion para generar el ingreso de cheques contables en la base de datos
    function GuardaChConta(){
  		var planillachc      = $("#Planillachc").val();
  		var nCheque          = $("#nCheque").val();
  		var comboBanco       = $("#combobancoc").val();
  		var comboCliente     = $("#comboclientec").val();
  		var estado           = $("#estadochc").val();
  		var fechaRepo        = $("#fechaRepochc").val();
  		var txtobs           = $("#txtobschc").val();
  		var monto            = $("#txtmontochc").val();
    
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
      			Accion : 'jsonGuardarChequeC',

      			//Rescatando los valores de cada input
      			planillachc: planillachc,
      			nCheque: nCheque,
      			comboBanco: comboBanco,
      			comboCliente: comboCliente,
      			estado: estado,
      			fechaRepo: fechaRepo,
      			txtobs: txtobs,
      			monto: monto
    		},
    		beforeSend: function (){
    		},
    		success: function (data) {
    			swal('Registros Actualizados','¡Exitosamente!','success');
    			//recarga datatable despues de guardar
    			datatablechc();
		    	$("#Planillachc").val('');
		        $("#nCheque").val('');
		        $("#combobancoc").val('');
		        $("#comboclientec").val('');
		        $("#estadochc").val('');
		        $("#fechaRepochc").val('');
		        $("#txtobschc"),val('');
		        $("#txtmontochc").val('');
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
    			console.log('error:');
    		}
    	});
	}//fin funcion guardar cheques contables
            
            //modal ingresar abono
            //modal abono abrir
        $("#btnAbono").on("click", function(){
            var id = $("#txtPlanilla").val();
   			//carga numero de planilla en txt oculto
   			$("#planillaAbono").val(id);
   			//comprueba que exista N planilla
	  	if(!id)
	  	{
	  		swal({
	  		title: 'Debes seleccionar una planilla',
	  		text: "",
	  		type: 'warning',
	  		showCancelButton: false,
	  		confirmButtonColor: '#3085d6',
	  		confirmButtonText: 'Aceptar',
	  		animation: true,
	  		allowOutsideClick: false
	  		}).then(function () {
	  		$("#ingresar_abono").modal('hide');
	  		});
	  	}

	  	//carga combo autorizacion
	    $.ajax({
	    	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
	    	method: 'POST',
	    	async: false,
	    	data: { 
	    	Accion : 'jsonComboAbono'
	    	},
	    	dataType: 'json',
	    	beforeSend: function () {
	    	},
	    	success: function(data){
	    		if(data.length>0){
	    			$("#comboabono").html("");
	    			$.each(data, function(id, dato){
	    			$("#comboabono").append('<option value="'+dato.codigo+'">'+dato.concepto+'</option>');
	    			});
	    		}
	    	}
	    });
	  	//carga combo autorizacion
	    $.ajax({
	    	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
	    	method: 'POST',
	    	async: false,
	    	data: { 
	    	Accion : 'jsonComboAutorizar'
	    	},
	    	dataType: 'json',
	    	beforeSend: function () {
	    	},
	    	success: function(data){
	    		if(data.length>0){
	    			$("#comboautorizar").html("");
	    			$.each(data, function(id, dato){
	    			$("#comboautorizar").append('<option value="'+dato.id+'">'+dato.Nombre+'</option>');
	    			});
	    		}
	    	}
	    });
	    //carga datatable
	    datatableabono();
	    //muestra modal gastos
	    $("#ingresar_abono").modal('show');  
     })
            //fin modal abono


    function datatableabono(){
        //carga datatable
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: { 
        		Accion : 'jsonTablaAbono'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function(data){
        		if(data.length>0){
        			var datos = [];
        			$.each(data, function (i, item) {
        				var obj = [
        				item.Planilla,
        				item.N_nota_credito,
        				item.concepto,
        				item.monto,
        				item.Nombre,
        				item.Observaciones,
        				null
        				];
        				// jsonListaDuplicados
        				datos.push(obj);
        			});
		        	$('#tblAbono').DataTable().destroy();
		        	var tabla4 = $('#tblAbono').DataTable({ 
		        	data: datos,
		        	"columns":[
		        	{
		        	width: "20%",
		        	data: datos.Planilla,
		        	},
		        	{
		        	width: "10%",
		        	data: datos.N_nota_credito,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.concepto,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.monto,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.Nombre,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.Observaciones,
		        	},
		        	{
		        	width: "20%",
		        	data: null,
		        	//crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
		        	"render": function ( data, type, row ) {
		        	return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminaabono(\''+row[0]+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
		        	tabla4.responsive.recalc().columns.adjust().draw();
        		}
        		else{
        			$('#tblAbono').DataTable().destroy();
        			$('#tblAbono').DataTable().clear();
        			$('#tblAbono').DataTable().draw();
        		}
        	}, 
        	error: function (jqXHR, textStatus, errorThrown) {
        		$('#modalCargando').modal('hide');
        		console.log('error');
        	}
        });
    }

    //elimina registros de gastos
    function eliminaabono(Planilla){
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'jsonEliminaAbono',
    			Planilla:Planilla
    		},
    		beforeSend: function () {
    		},
    		success: function (data) {
    			swal('Registro eliminado','','success');
    			//recarga datatable despues de borrar
    			datatableabono();
    		}
    	}); 
    }

     //Funcion para generar el ingreso de los gastos en la base de datos
    function GuardarAbono(){
        var idplanillaabono = $("#planillaAbono").val();
        var nfacturaA       = $("#nFacturaAbono").val();
        var cAbono          = $("#comboabono").val();
        var cAutorizacion   = $("#comboautorizar").val();
        var montoabono      = $("#montoAbono").val();
        var observacionA    = $("#txtObservacionesAbono").val();
    
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'jsonGuardarAbono',
    		
    		//Rescatando los valores de cada input de la ventana modal gastos
              idplanillaabono: idplanillaabono,
              nfacturaA : nfacturaA,
              cAbono: cAbono,
              cAutorizacion: cAutorizacion,
              montoabono: montoabono,
              observacionA: observacionA
    		},
    		beforeSend: function (){
    		},
    		success: function (data) {
    			swal('Registros Actualizados','¡Exitosamente!','success');
    			//recarga datatable despues de guardar
    			datatableabono();
                $("#planillaAbono").val('');
                $("#nFacturaAbono").val('');
                $("#comboabono").val('');
                $("#comboautorizar").val('');
                $("#montoAbono").val('');
                $("#txtObservacionesAbono").val('');
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
    			console.log('error:');
    		}
    	});
	}//Fin funcion guardar abono

   //modal ingresar retiro
            //modal retiro abrir
            $("#btnRetiro").on("click", function(){
              var id = $("#txtPlanilla").val();
   		//carga numero de planilla en txt oculto
   		$("#planillaRetiro").val(id);
   		//comprueba que exista N planilla
	  	if(!id)
	  	{
	  		swal({
	  		title: 'Debes seleccionar una planilla',
	  		text: "",
	  		type: 'warning',
	  		showCancelButton: false,
	  		confirmButtonColor: '#3085d6',
	  		confirmButtonText: 'Aceptar',
	  		animation: true,
	  		allowOutsideClick: false
	  		}).then(function () {
	  		$("#modal_retiro").modal('hide');
	  		});
	  	}

	  	//Combo retiro
	  	$.ajax({
	    	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
	    	method: 'POST',
	    	async: false,
	    	data: { 
	    	Accion : 'jsonComboRetiro',
	    	},
	    	dataType: 'json',
	    	beforeSend: function () {
	    	},
	    	success: function(data){
	    		if(data.length>0){
	    			$("#comboretiro").html("");
	    			$.each(data, function(id, dato){
	    			$("#comboretiro").append('<option value="'+dato.codigo+'">'+dato.Retiro+'</option>');
	    			});
	    		}
	    	}
	    });
	    //carga datatable
	    datatableretiro();
	    //muestra modal gastos
	    $("#modal_retiro").modal('show');    
       })//fin modal retiro 

    function datatableretiro(){
        //carga datatable
        $.ajax({
        	url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        	method: 'POST',
        	async: false,
        	data: { 
        		Accion : 'jsonTablaRetiro'
        	},
        	dataType: 'json',
        	beforeSend: function () {
        	},
        	success: function(data){
        		if(data.length>0){
        			var datos = [];
        			$.each(data, function (i, item) {
        				var obj = [
        				item.planilla,
        				item.motivo,
        				item.monto,
        				item.Retiro,
        				null
        				];
        				// jsonListaDuplicados
        				datos.push(obj);
        			});
		        	$('#tblRetiro').DataTable().destroy();
		        	var tabla5 = $('#tblRetiro').DataTable({ 
		        	data: datos,
		        	"columns":[
		        	{
		        	width: "20%",
		        	data: datos.planilla,
		        	},
		        	{
		        	width: "10%",
		        	data: datos.motivo,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.monto,
		        	},
		        	{
		        	width: "30%",
		        	data: datos.Retiro,
		        	},
		        	{
		        	width: "20%",
		        	data: null,
		        	//crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
		        	"render": function ( data, type, row ) {
		        	return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminaretiro(\''+row[0]+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
		        	tabla5.responsive.recalc().columns.adjust().draw();
        		}
        		else{
        			$('#tblRetiro').DataTable().destroy();
        			$('#tblRetiro').DataTable().clear();
        			$('#tblRetiro').DataTable().draw();
        		}
        	}, 
        	error: function (jqXHR, textStatus, errorThrown) {
        		$('#modalCargando').modal('hide');
        		console.log('error');
        	}
        });
    }

    function eliminaretiro(planilla){
    	$.ajax({
    		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    		method: 'POST',
    		async: false,
    		data: { 
    		Accion : 'jsonEliminaRetiro',
    			planilla:planilla
    		},
    		beforeSend: function () {
    		},
    		success: function (data) {
    			swal('Registro eliminado','','success');
    			//recarga datatable despues de borrar
    			datatableretiro();
    		}
    	}); 
    }

        //Funcion para generar el ingreso de los gastos en la base de datos
    function GuardarRetiro(){
 		var idplanillaretiro      = $("#planillaRetiro").val();
  		var montoretiro           = $("#montoRetiro").val();
  		var motivoretiro          = $("#txtMotivoRetiro").val();
  		var cRetiro 			  = $("#comboretiro").val();
    
    	$.ajax({
      		url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
      		method: 'POST',
      		async: false,
      		data: { 
        		Accion : 'jsonGuardarRetiro',

        		//Rescatando los valores de cada input
        		idplanillaretiro: idplanillaretiro,
        		montoretiro: montoretiro,
        		motivoretiro: motivoretiro,
        		cRetiro: cRetiro
    		},
    		beforeSend: function (){
    		},
    		success: function (data) {
    			swal('Registros Actualizados','¡Exitosamente!','success');
    			//recarga datatable despues de guardar
    			datatableretiro();
    			//$("#modal_retiro").modal('hide');
            	$("#planillaRetiro").val('');
            	$("#montoretiro").val('');
            	$("#txtMotivoRetiro").val('');
            	$("#comboretiro").val('');
    		},
    		error: function (jqXHR, textStatus, errorThrown) {
    			console.log('error:');
    		}
    	});//Fin funcion guardar Gastos
	}

//Eventos para cerrar las ventanas modales 

//Gastos
$("#closeGastos").on("click", function(){
$("#modalgastos").modal("hide");
})

//Cheques pendiente
$("#closechp").on("click", function(){
$("#ingresarchequespendientes").modal("hide");
})

//Cheques contables
$("#closeContable").on("click", function(){
$("#ModalChConta").modal("hide");
})

//Abono
$("#closeAbono").on("click", function(){
$("#ingresar_abono").modal("hide");
})

//Retiro
$("#closeRetiro").on("click", function(){
$("#modal_retiro").modal("hide");
})
//end chp

//fin cierra modales


//restablese todos los txt's                      
$("#activaTxt").on("click", function(){
 restablecer();
 })   

//fin restablece



//funciones
 function restablecer(){
  $('#contenedordatos').fadeIn(1000).html('');
  $("#txtPlanilla").removeAttr("disabled");
  $("#txtPlanilla").val('');
  $("#TxtValPlanilla").val('');
  $("#txtEfectivo").val('');
  $("#txtCheque").val('');
  $("#txtPromae").val('');
  $("#txtflete").val('');
  $("#txtGasto").val('');
  $("#txtChequeP").val('');
  $("#txtChequeC").val('');
  $("#txtAbono").val('');
  $("#txtRetiro").val('');
 }                                

function guarda(){
  var idplanilla   = $("#txtPlanilla").val();
  var val          = $("#TxtValPlanilla").val();
  var f            = $("#txtEfectivo").val();
  var ch           = $("#txtCheque").val();
  var pro          = $("#txtPromae").val();
  var fle          = $("#txtflete").val();
  var gasto        = $("#txtGasto").val();
  var chpendiente  = $("#txtChequeP").val();
  var chconta      = $("#txtChequeC").val();
  var abonoh       = $("#txtAbono").val();
  var retih        = $("#txtRetiro").val();
  $.ajax(
  {
    url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    method: 'POST',
    data: {
      Accion:'guardavalores', 
      idplanilla:idplanilla, 
      val:val, 
      f:f, 
      ch:ch, 
      pro:pro, 
      fle:fle, 
      gasto:gasto,
      chpendiente:chpendiente,
      chconta:chconta,
      abonoh:abonoh,
      retih:retih
    },
    beforeSend: function () {
    },
    success: function (data) {
      swal('Registros Guardados','¡Correctamente!','success');
    }, 
    error: function (error) {
    console.log("Errors:" + error);
  }
  });
}  

function BuscaPlanilla(){
  var id =$("#txtPlanilla").val();
  if(!id)
  {
     swal('Error','planilla vacia', 'warning')
  }else{
  $.ajax(
  {
  url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
  method: 'POST',
  async: true,
  data: {
  Accion:"buscaplanilla",
    planilla:id },
  dataType: 'json',
  beforeSend: function () {
  },
  success: function (data) {
  $('#contenedorTxtValores').fadeIn(1000);
  $("#TxtValPlanilla").val(data[0].valor_history);
  $("#txtEfectivo").val(data[0].efectivo_history);
  $("#txtCheque").val(data[0].cheque_history);
  $("#txtPromae").val(data[0].promae_history);
  $("#txtflete").val(data[0].flete_history);
  $("#txtGasto").val(data[0].Gasto_history);
  $("#txtChequeP").val(data[0].Chpendiente_history);
  $("#txtChequeC").val(data[0].Chcontabilidad_history);
  $("#txtAbono").val(data[0].Abono_history);
  $("#txtRetiro").val(data[0].Retiro_history);
  }, 
  error: function (error) {
  console.log("Errors:" + error);
  }
  });
  }
}

function Buscaplan(){
  var id =$("#txtPlanilla").val();
  if(!id){swal('Error','planilla vacia', 'warning')}else{
   //desactiva txt para evitar errores
  $("#txtPlanilla").attr("disabled","disabled");
  $.ajax(
  {
      url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
      method: 'POST',
      async: true,
      data: { 
      Accion:"cargadatosplanilla",  
      planilla: id,
      },   
      dataType: 'json',                      
  beforeSend: function () {
  $("#contenedordatos").html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');
  },
  success: function (data) {
  if(data.length>0){
    console.log(data[0].Fecha);
  }else{swal('Error','','error')}

  $('#contenedordatos').fadeIn(1000).html('<table width="100%" border="0"><tbody><tr><td>Planilla N°:'+data[0].Planilla+'</td><td>Fecha:'+data[0].Fecha+'</td></tr><tr><td>Conductor:'+data[0].Chofer+'</td><td>Centro:'+data[0].Centro+'</td> </tr></tbody></table>');
  }, 
  error: function (jqXHR, textStatus, errorThrown ) {
  alert('Hubo un error Buscaplan()');
  console.log(textStatus)
  }
  });
  }
}//Fin funcion buscaplan

function buscarFiltro1(){
  var planiFiltro  = $("#txtPlanillaF").val();
  if(!planiFiltro){
    swal('Error','Debe ingresar todos los datos para el filtro', 'warning')
  }else{
      $.ajax({
        url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        method: 'POST',
        async: false,
        data: { 
          Accion : 'jsonTablaFiltro1',
          planiFiltro: planiFiltro
        },
        dataType: 'json',
        beforeSend: function () {
          $('#modalCargando').modal('hide');
        },
        success: function(data){
          if(data.length>0){
            var datos = [];
            $.each(data, function (i, item) {
              var obj = [
              item.Planilla,
              item.Chofer,
              item.Total_ingreso_1,
              item.Total_ingreso,
              item.Diferencias,
              null
              ];
              // jsonListaDuplicados
              datos.push(obj);
            });
            $('#tblFiltrarB').DataTable().destroy();
            var tabla6 = $('#tblFiltrarB').DataTable({ 
              data: datos,
              "columns":[
              {
              width: "25%",
              data: datos.Planilla,
              },
              {
              width: "25%",
              data: datos.Chofer,
              },
              {
              width: "25%",
              data: datos.Total_ingreso_1,
              },
              {
              width: "25%",
              data: datos.Total_ingreso,
              },
              {
              width: "25%",
              data: datos.Diferencias,
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
              tabla6.responsive.recalc().columns.adjust().draw();
          }else{
                  $('#tblFiltrarB').DataTable().destroy();
                  $('#tblFiltrarB').DataTable().clear();
                  $('#tblFiltrarB').DataTable().draw();
                }
              }, 
              error: function (jqXHR, textStatus, errorThrown) {
                $('#modalCargando').modal('hide');
                console.log('error');
              }
        });

      }
  }//fin funcion buscar filtro 1

  function buscarFiltro2(){
    var planillaFiltro = $("#txtPlanillaF").val();
    var centroFiltro   = $("#comboCentroF").val();
    var anoFiltro      = $("#txtAno").val();
    var mesFiltro      = $("#comboMes").val();

      $.ajax({
        url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        method: 'POST',
        async: true,
        data: {
          Accion: 'jsonTablaFiltro2',
          planillaFiltro: planillaFiltro,
          centroFiltro: centroFiltro,
          anoFiltro: anoFiltro,
          mesFiltro: mesFiltro
        },
        dataType: 'json',
        beforeSend: function(){
          $('#modalCargando').modal('hide');
        },
        success: function(data){
          if(data.length>0){
            console.log(data[0].Fecha);
          }else{
            swal('Error','','error')
          }

          $('#contenedortablasumafiltro').fadeIn(1000).html(
            '<table width="100%" border="0"><tbody><tr><td>Año:</td><td></td><td>Retiros:'+data[0].Retiro+'</td></tr><tr><td>Centro:'+data[0].Centro+'</td><td>Trabajador:'+data[0].Chofer+'</td><td>Cobros:</td></tr><tr><td>Planilla:'+data[0].Planilla+'</td><td>Total ingreso a caja:'+data[0].Total_ingreso_1+'</td><td>Diferencias:'+data[0].Diferencias+'</td></tr></tbody></table>');
        },
        error: function (jqXHR, textStatus, errorThrown ) {
          alert('textStatus');
          console.log(textStatus)
        }
      });
  }//fin funcion buscar filtro 2

function cargaComboCentro(){
  //Carga combo estado
  $.ajax({
    url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    method: 'POST',
    async: false,
    data: {
      Accion : 'jsonComboCentro'
    },
    dataType: 'json',
    success: function (data) {
      if(data.length>0){
        $("#comboCentroF").html("");
        $.each(data, function(id, dato){
          $("#comboCentroF").append(
          '<option value="'+dato.id+'">'+dato.Descripcion+'</option>');
        });
      }
    }

  });
}//fin funciones carga combo centro de costos


</script>

             