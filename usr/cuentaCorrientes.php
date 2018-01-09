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
              
              <div class="content-wrapper "  style="background-color:#ECF0F5" >
              <br class="hidden-xs">
              <br class="hidden-xs">
              <br class="hidden-xs">

                <ol class="breadcrumb">
                <li class="active">Cuenta Corriente
                <?php require("model/conexion_pros.php");
                error_reporting(0);
                $cnn=Conectar();
                $rut=$_SESSION["Rut"];
                $i=0;
                $sqlCentrosid="select  ges_centro_de_costos.Descripcion from cc_permisos_centros inner join ges_centro_de_costos where Rut='$rut' and ges_centro_de_costos.id=cc_permisos_centros.centro";
                $rscentid=mysqli_query($cnn, $sqlCentrosid);
                while($rowCid=mysqli_fetch_array($rscentid)){
                  $centro [$i] = $rowCid['Descripcion'];
                  $i++;
                }
                  echo $centro[0] ."  ". $centro[1]."  ". $centro[2];  
                  if($centro[0]==1000){echo "todos los centros";}       
                 ?></li>
                <button id="Reload" class="btn btn-box-tool pull-right"><i class="fa fa-refresh" aria-hidden="true"></i>
                </button>
                </ol>

              <br>  
              <!--<?php //permisos admin
              if($p11==1){?>
              <div align="right"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#Mantenedores" ><i class="fa fa-plus" 	    aria-hidden="true" ></i>&nbsp;Mantenedores</a></div>
              <?php } ?>*/
              -->
            

              <div class="container">
              <div class="col-lg-1 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#cliente" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear Cliente</a></div>
              <div class="col-lg-2 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#producto" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear Producto</a></div>
              <div class="col-lg-2 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#Retiro" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear Retiro</a></div>
              <div class="col-lg-2 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#abono" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear Abono</a></div>
              <div class="col-lg-2 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#cheque" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Tipo Cheques</a></div>
              <div class="col-lg-2 col-xs-6"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#gastos" ><i class="fa fa-plus" aria-hidden="true" ></i>&nbsp;Crear Gastos</a></div>
              </div>


                <div id="tableAjax"></div>

                      
                <!-- /.table-responsive -->
            


<!-- ./wrapper -->

              
             
              
              
              
              
              <!-- valores modal -->
              <div class="modal fade modal-primary" id="modalvalores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Valores</h4>
              </div>
              <div class="modal-body" id="contenedorValores">
              
              
              
              </div>
              <div class="modal-footer"></div>
              </div>
              </div>
              </div>
               
               <!--ingreso de gastos -->
               <div class="modal fade modal-primary" id="ingresarGasto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
               <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title">Ingresar Gastos</h4>
               </div>
               <div class="modal-body">
               <form method="post" action="">
               <input type="text" name="planilla" id="PlanillaGA" placeholder="" class="form-control  " />
              <div class="col-lg-6"> Item
               <div id="listboxgasto"></div>
               </div>
               <div class="col-lg-6">
               Observación
               <textarea  name="txtObservacion" id="TxtObs"  class="form-control" ></textarea> 
              </div>
              <div class="col-lg-6">
               Monto
               <input type="text" name="txtMonto" placeholder="" id="TxtMonto" class="form-control" />
               </div>

             <div id="contenedorTablaGastos"></div>

               <div class="modal-footer" >
               <div align="center" class="col-lg-12"><br><input  value="Guardar" name="btn"  data-dismiss="modal" id="btnGuardaGasto" class="btn btn-success"  /></div>
               </div>
               </form>
               </div>
               </div>
               </div>
               </div>

                   <!--ingreso de cheques pendientes -->
                   <div class="modal fade modal-primary" id="ingresarchequespendientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                   <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title">Ingresar cheques Pendientes</h4>
                   </div>
                   <div class="modal-body">
                   <form method="post">
                   <input type="text" name="planilla" id="txtplanillachp" placeholder="" class="form-control hidden  " />
                   <br>                   
                   <div class="col-lg-6">
                   N° de cheque 
                   <input type="number" name="nCheque" id="nCheque" placeholder="" class="form-control" required  />
                   </div>
                   <div class ="col-lg-6">
                   Banco
                   <div id    ="listboxchp"></div>
                   </div>
                   <div class="col-lg-6"> 
                   Cliente
                   <div id="listboxcliente"></div>
                   </div>
                   <div class="col-lg-6"> 
                   Concepto
                   <div id="listboxconcepto"></div>
                   </div>
                   <div class="col-lg-12"> 
                   Estado
                   <select name="estado" id="estado" class="form-control" required>
                   <option value=""></option>
                   <option value="1">Pendiente</option>
                   <option value="2">Aceptado</option>
                   <option value="3">Efectivo</option>
                   <option value="4">Contabilidad</option>
                   <option value="5">Nulo</option>
                   </select>
                   </div>
                   <div class="col-lg-6"> 
                   Fecha de reposición
                   <input type="date" name="fechaRepo" id="fechaRepo" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-6"> 
                   Observación
                   <input type="text" name="txtobs" id="txtobs" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-12"> 
                   Monto
                   <input type="text" name="monto" id="monto" placeholder="" class="form-control  " required/>
                   <br>
                   </div>
                   <div align="center"><input  value="Guardar" name="btn" class="btn btn-success" data-dismiss="modal" /></div>
                   </div>
                   <div class="modal-footer"> </div>
                   </form>
                   </div>
                   </div>
                   </div>
                   </div>
               



                  
                  <!--ingreso abono -->
                  <div class="modal fade modal-primary" id="ingresoAbono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Ingresar Abono</h4>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="controllers/cuentacorriente/guardaAbono.php">
                  <input type="text" name="planilla" id="planillaAbono" placeholder="" class="form-control  hidden" />
                  <br>
                  <div class="col-lg-12">
                  N° Factura
                  <input type="number" name="nFactura" id="" placeholder="" class="form-control  " required />
                  </div>
                  <div class="col-lg-6">
                  Concepto
                  <div id="listboxconceptoabono"></div>
                  </div>

                  <div class="col-lg-6">
                  Autorizado
                  <input type="text" name="txtAutorizado" id="" placeholder="" class="form-control  " required=""/>
                  </div>

                  <div class="col-lg-12">
                  Monto
                  <input type="text" name="monto" id="" placeholder="" class="form-control  " required="" />
                  <br>
                  </div>
                  <div align="center"><input type="submit" value="Guardar" name="btn" class="btn btn-success" /></div>
                 
                  </form>
                  </div>
                   <div class="modal-footer" >
                  
                  </div>
                  </div>
                  </div>
                  </div>

  <!--ingreso retiro -->
                  <div class="modal fade modal-primary" id="retiro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Retiro</h4>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="controllers/cuentacorriente/guardaRetiro.php">
                  <input type="text" name="planilla" id="planillaRetiro" placeholder="" class="form-control  hidden" />
                  <br>
                 
                  Monto
                  <input type="number" name="monto" id="" placeholder="" class="form-control  " required="" />
                  <br>
                  Motivo
                  <div id="listRetiro"></div>
                
                  
                    <div class="modal-footer">
                  <div align="center"><input type="submit" value="Guardar" name="btn" class="btn btn-success" /></div>
                  </div>
                  </form>
                  </div>
                  </div>
                  </div>
</div>
                     <!--ingreso de cheques conta -->
                     <div class="modal fade modal-primary" id="chconta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Ingresar cheques Contabilidad</h4>
                     </div>
                     <div class="modal-body">
                     <form method="post" action="controllers/cuentacorriente/guardachconta.php">
                     <input type="text" name="planilla" id="Planillachc" placeholder="" class="form-control hidden " />
                      <div class="col-lg-6">
                     N° de cheque
                     <input type="number" name="nCheque" id="" placeholder="" class="form-control" required />
                     </div>
                     <div class="col-lg-6">
                     Banco
                     <div id="listboxchc"></div>
                     </div>
                     <div class="col-lg-6">
                     Cliente
                     <div id="listboxclientec"></div>
                     </div>
                     <div class="col-lg-6">
                     Estado
                     <select name="estado" class="form-control" required>
                     <option value=""></option>
                     <option value="1">Depositado</option>
                     <option value="2">Pendiente de deposito</option>
                     </select>
                     </div>
                     <div class="col-lg-6">
                     Fecha de reposición
                     <input type="date" name="fechaRepo" id="" placeholder="" class="form-control  " required/>
                     </div>
                     <div class="col-lg-6">
                     Observación
                     <textarea  name="txtobs" id="" placeholder="" class="form-control  " required ></textarea>
                     </div>
                     <div class="col-lg-12">
                     Monto
                     <input type="number" name="monto" id="" placeholder="" class="form-control  " required/>
                     <br>
                     </div>
                     <div align="center"><br><input type="submit" value="Guardar" name="btn" class="btn btn-success" /></div>
                     </form>
                    </div>
                     <div class="modal-footer">
                     </div>
                     </div>
                     </div>
                     </div>
              
                    
                    <div class="modal fade modal-primary" id="Retiro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Crear Retiro</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="controllers/cuentacorriente/creaRetiro.php">
                    
                    Retiro
                    <input type="text" name="txtRetiro" placeholder="" class="form-control" />
                    
                    <br />
                    <input type="submit" value="Crear" name="btnCrearRetiro" class="btn btn-success" />
                    </form>
                    
                    </div>
                    </div>
                    </div>
                    </div>
                    
              
              
              <div class="modal fade modal-primary" id="producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Crear Producto</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="controllers/cuentacorriente/creaProducto.php">
              Id Producto
              <input type="text" name="txtId" placeholder="EJ: 11111111-1" class="form-control" />
              Descripcion
              <input type="text" name="txtDescripcion" placeholder="" class="form-control" />
              
              <br />
              <input type="submit" value="Crear" name="btnCrearProducto" class="btn btn-success" />
              </form>
              
              </div>
              </div>
              </div>
              </div>
              
              <div class="modal fade modal-primary" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Crear Abono</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="controllers/cuentacorriente/creaAbono.php">
              
              Concepto
              <input type="text" name="txtConcepto" placeholder="" class="form-control" />
              
              <br />
              <input type="submit" value="Crear" name="btnCrearabono" class="btn btn-success" />
              </form>
             
              </div>
              </div>
              </div>
              </div>
              
              
              <div class="modal fade modal-primary" id="cheque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Crear concepto cheque</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="controllers/cuentacorriente/creaCheque.php">
              Concepto
              <input type="text" name="txtcheque" placeholder="" class="form-control" />
               <br />
              <input type="submit" value="Crear" name="btnCrearcheque" class="btn btn-success" />
              </form>
             
              </div>
              </div>
              </div>
              </div>
              
              <div class="modal fade modal-primary" id="gastos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Crear concepto Gastos</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="controllers/cuentacorriente/creaGastos.php">
              Concepto
              <input type="text" name="txtgastos" placeholder="" class="form-control" />
              <br />
              <input type="submit" value="Crear" name="btnCreargastos" class="btn btn-success" />
              </form>
            
              </div>
              </div>
              </div>
              </div>
              
              <div class="modal fade modal-primary" id="cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Crear cliente</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="controllers/cuentacorriente/creaCliente.php">
              Rut
              <input type="text" name="txtrut" placeholder="EJ: 11111111-1" class="form-control" />
              Nombre
              <input type="text" name="txtnombre" placeholder="" class="form-control" />
              Razón social
              <input type="text" name="txtRazon" placeholder="" class="form-control" />
              Dirección
              <input type="text" name="txtDirecc" placeholder="" class="form-control" />
              <br />
              <div class="modal-footer">  <input type="submit" value="Crear" name="btnCrearCliente" class="btn btn-success" />
              </form>
              </div>
              </div>
              </div>
              </div> 
              
              </div>
              
              <div class="control-sidebar-bg"></div>
              
              
              <?php require('include/footer.php');?>
              
              </div>
              </body>

<script>

 $(document).ready(function() {
 $("#tableAjax").load("controllers/cuentacorriente/tablaAjax.php");
 $("#btnColapse").trigger("click");
 });

 //btn recargar
$( "#Reload" ).click(function() {
$("#tableAjax").load("controllers/cuentacorriente/tablaAjax.php");
 });



 //valores                                      
 $("#modalvalores").on("hidden.bs.modal", function() {
 //cuando se cierra modal  se envian por post y guarda
 var txtPlanilla      =  $("#txtPlanilla").val();
 var txtValorPlanilla =  $("#txtValorPlanilla").val();
 var txtEfectivo      =  $("#txtEfectivo").val();
 var txtCheque        =  $("#txtCheque").val();
 var txtPromae        =  $("#txtPromae").val();
 var txtflete         =  $("#txtflete").val();                                       
$.post("controllers/cuentacorriente/guardaValores.php", {txtPlanilla:txtPlanilla, txtValorPlanilla:txtValorPlanilla, txtEfectivo:txtEfectivo, txtCheque:txtCheque, txtPromae:txtPromae, txtflete:txtflete})
//recarga pagina simulando click
$("#Reload").trigger("click");
 });


    //Gastos
    $("#ingresarGasto").on("hidden.bs.modal", function() {
    //cuando se p´resiona boton se envian por post y recarga tabla
    var txtPlanilla    =  $("#PlanillaGA").val();
    var cc_is_gastos   =  $("#cc_is_gastos").val();
    var txtObservacion =  $("#TxtObs").val();
    var TxtMonto       =  $("#TxtMonto").val();       
    $.post( "controllers/cuentacorriente/guardagastos.php",{planilla:txtPlanilla, cc_is_gastos:cc_is_gastos, txtObservacion:txtObservacion, TxtMonto:TxtMonto });
    $("#Reload").trigger("click");
    
    $("#PlanillaGA").val("");
    $("#cc_is_gastos").val("");
    $("#TxtObs").val("");
    $("#TxtMonto").val("");   
    
    });

 $("#ingresarGasto").on("show.bs.modal", function(){
  var txtPlanilla    =  $("#PlanillaGA").val();
  $.post("controllers/cuentacorriente/listaGasto.php", {idPlanilla: txtPlanilla}, function(htmlexterno){
   $("#contenedorTablaGastos").html(htmlexterno);
 })
})





 //Cheques pendientes
 $("#ingresarchequespendientes").on("hidden.bs.modal", function() {
 //cuando se cierra modal  se envian por post y guarda
 var planilla      =  $("#txtplanillachp").val();
 alert (planilla);
 var nCheque       =  $("#nCheque").val();
 var cc_is_banco   =  $("#cc_is_banco").val();
 var cc_is_cliente =  $("#cc_is_cliente").val();  
 var cc_is_cheque  =  $("#cc_is_cheque").val();
 var monto         =  $("#monto").val();
 var estado        =  $("#estado").val();
 var fechaRepo     =  $("#fechaRepo").val();  
 var txtobs        =  $("#txtobs").val();       
$.post( "controllers/cuentacorriente/guardachpendientes.php",{planilla:planilla, nCheque:nCheque, cc_is_banco:cc_is_banco,cc_is_cliente:cc_is_cliente, cc_is_cheque:cc_is_cheque, monto:monto, estado:estado, fechaRepo:fechaRepo, txtobs:txtobs});
});



                                        




</script>

</html>