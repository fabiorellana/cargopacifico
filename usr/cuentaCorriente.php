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
       
       <aside class="main-sidebar" style="position: fixed;">
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
      
   
              <div class="col-md-12 pull-right" style="position: absolute; margin-left: 60%; margin-top: 8px " id="menuadmin">
              <button type ="" onclick="abono();" class="btn-xs btn btn-primary">Abono</button>
              <button type ="" onclick="Banco();" class="btn-xs btn btn-primary">Banco</button>
              <button type ="" onclick="Cheque();" class="btn-xs btn btn-primary">Cheque</button>
              <button type ="" onclick="Cliente();" class="btn-xs btn btn-primary">Cliente</button>
              <button type ="" onclick="Gastos();" class="btn-xs btn btn-primary">Gastos</button>
              <button type ="" onclick="Conceptos();" class="btn-xs btn btn-primary">Conceptos</button>
              <button type ="" onclick="Producto();" class="btn-xs btn btn-primary">Producto</button>
              <button type ="" onclick="Retiros();" class="btn-xs btn btn-primary">Retiros</button> 
              </div>
          
              <ol class="breadcrumb">
              <li class="active">Cuenta Corriente: <d id="centrotxt"></d></li>
              </ol>

              
             

              <div class="container">
              <form method="post" action="">
                <div class="row">

                  <div class="form-group col-md-2 col-xs-2">
                  Fecha
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" placeholder="Desde" name="txtFecha" id="txtFecha1" class="form-control input-xs" maxlength="4" required="">
                    </div>
                  </div>

                  <div class="form-group col-md-2 col-xs-2">
                  &nbsp;
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" placeholder="Hasta" name="txtFecha" id="txtFecha2" class="form-control input-xs" maxlength="4" required="">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-xs-3">
                    Chofer
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-sort" aria-hidden="true"></i>
                      </div>
                      <select id="comboChoferF" class="form-control chosen-select" required="">
                        <option value="">Seleccione un Chofer</option>
                      </select> 
                    </div>
                  </div>
                  <div class="form-group col-md-2 col-xs-2">
                    Planilla
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-flag-checkered" aria-hidden="true"></i>
                      </div>
                      <input type="text" placeholder="N° Planilla" id="txtPlanillaF" class="input-xs form-control" maxlength="8" required="">
                    </div>
                  </div>

    <div class="form-group col-md-3 col-xs-3">
                    Centro 
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-sort" aria-hidden="true"></i>
                      </div>
                      <select id="comboCentroF" class="form-control input-xs chosen-select" required="">
                        <option value="">Seleccione un Centro</option>
                      </select>  
                    </div>
                  </div>

                </div>

              
              </form>
              </div>

            
              <div class="well well-lg" style="margin-left: 3%; margin-right: 3%;">
                <form method="post" action="">
                  <table width="100%" id="tblFiltrarB" class="table table-condensed table-striped table-primary">
                    <thead>
                      <tr>
                        <th>Planilla</th>
                        <th>Fecha</th>
                        <th>Trabajador</th>
                        <th>Centro</th>
                        <th>Valor</th>
                        <th>Total ingresos </th>
                        <th>Total Retiro</th>
                        <th>Diferencias</th>
                      </tr>
                    </thead>
                  </table>
                </form>
            </div>

           

             <div class="">
             <div class="col-lg-12">
             <div class ="well " id="filtro">
             <table style="width: 100%;" >
             <tbody>
             <tr>
             <td>Retiros: </td>
             <td>Cobros: </td>
             <td>Total ingreso a caja: </td>
             <td>Diferencias: </td>
             </tr>
             </tbody>
             </table>
             </div>
             </div>
             </div>

            <div class="col-lg-2 pull-right">
              <button type="">Btn </button>
            </div>

              <style>

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
                <div class="modal fade" id="modalvalores" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <b>Cuenta Corriente</b>
                </div>
                <div class="modal-body">
                <form method="post" class="form-inline">
                  <input type="text" class="form-control hidden" id="txtPlanilla">
                </form>
                <div class="well well-lg" id="contenedordatos">
                  <form method="post" class="form-inline" role="form">
                  <div class="form-group">
                    <table width="100%" border="0">
                      <tr>
                      <td>N° Planilla:</td>
                      <td>Fecha:</td>
                      </tr>
                      <tr>
                      <td>Conductor:</td>
                      <td>Centro:</td>
                      </tr>
                    </table>
                  </div>
                </form>
                </div>
                <div class="col-lg-12">
                  <div class="well" id="contenedorTxtValores">
                  <form method="post" role="form">
                  <div class="row">
                      <div class="col-lg-5 col-xs-6">
                      Valor
                      <input type="text" name="TxtValPlanilla" id="TxtValPlanilla" class="form-control">
                      </div>
                      <div class="col-lg-2"></div>
                    <div class="col-lg-5 col-xs-6">
                      Gastos
                      <input type="text" id="txtGasto" class="form-control" disabled="">
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-lg-5 col-xs-6">
                      Efectivo
                      <input type="number" name="txtEfectivo" id="txtEfectivo" class="form-control" required=""  />
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5 col-xs-6">
                      Cheque P.
                      <input type="text" id="txtChequeP" class="form-control" disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-5 col-xs-6">
                    Cheque
                    <input type="number" name="txtCheque" id="txtCheque" class="form-control" required="" />
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5 col-xs-6">
                      Cheque C.
                      <input type="text" id="txtChequeC" class="form-control" disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-5 col-xs-6">
                      Promae
                      <input type="number" name="txtPromae" id="txtPromae" class="form-control" required=""/>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5 col-xs-6">
                      Abono
                      <input type="text" id="txtAbono" class="form-control" disabled>
                    </div>
                  </div>               
                  
                  <div class="row">
                    <div class="col-lg-5 col-xs-6">
                      Flete porteo
                      <input type="number" name="txtflete" id="txtflete" class="form-control" required=""/>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5 col-xs-6">
                      Retiro
                      <input type="text" id="txtRetiro" class="form-control" disabled>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>

                <div   align="center">
                <div class="col-md-2"><button type="button" class="btn btn-primary btn-sm" id="btningresarGasto"><i class="fa fa-plus" aria-hidden="true"></i>
                &nbsp;Gastos</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-primary  btn-sm" id="btningresarchequespendientes"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                &nbsp;Cheques P.</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-primary  btn-sm" id="btnChConta"><i class="fa fa-credit-card" aria-hidden="true"></i>
                &nbsp;Cheques C.</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-primary  btn-sm" id="btnAbono"><i class="fa fa-money" aria-hidden="true"></i>
                &nbsp;Abono</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-primary  btn-sm" id="btnRetiro"><i class="fa fa-wpexplorer" aria-hidden="true"></i>
                  &nbsp;Retiro</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-primary  btn-sm" id="btncobro"><i class="fa fa-briefcase" aria-hidden="true"></i>
                &nbsp;Cobros</button></div>

                </div>
                
                <div class="modal-footer">
                <br>
                <div align="center" class="col-md-12">
                <br>
                <br>
                <button type="submit" class="btn btn-danger" id="btnGuardar">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Guardar
                </button>
                </div>
                </div>
              
                </div>
                </div>
                </div>


               <!--ingreso de gastos -->
               <div class="modal fade" id="modalgastos" tabindex="-1"  >
               <div class="modal-dialog modal-lg">
               <div class="modal-content">
               <div class="modal-header">
               <button type="button" class="close"  id="closeGastos">×</button>
               <h4 class="modal-title">Ingresar Gastos</h4>
               </div>
               <div class="modal-body" >
               <form method="post" action="">
               <input type="text" name="planilla" id="txtPlanillaGastos" placeholder="" class="form-control hidden" />
               <div class="col-lg-6"> Item
               <select id="comboGasto" class="form-control"></select>
               </div>
               
               <div class="col-lg-6">
               Monto
               <input type="number" name="txtMonto" placeholder="" id="TxtMonto" class="form-control" required/>
               </div>

               <div class="col-lg-12">
               Observación
               <textarea  name="txtObservacion" id="TxtObs"  class="form-control" required></textarea>
               <br> 
               </div>
               <br>
              <div align="center">
                <br>
                 <input type="button" value="Guardar" name="btnguardaGastos"   class="btn btn-primary" id="BtnguardaGastos"  />
                 <br>
               </div>
               </form>
               </div>
               <br>
               <div class="modal-footer">
             
                <div class="well" >
                    <div class="row">
                      <div class="table-responsive">
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
                 </div><!--Fin container fluid-->
                   </div>
               </div>
               </div>
               </div>    
               <!--Fin ingreso de gastos-->

             
                     <!--ingreso de cheques pendientes -->
                  <div class="modal fade" id="ingresarchequespendientes" tabindex="-1"  >
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content ">
                  <div class="modal-header">
                  <button type="button" class="close"  id="closechp">×</button>
                  <h4 class="modal-title">Ingresar cheques Pendientes</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="">
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
                       <input type="text" name="fechaRepo" id="fechaRepo" placeholder="" class="form-control  " required/>
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
                       <div align="center">
                          <div  class="btn btn-primary" id="btnGuardaChP" /><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            &nbsp;Guardar
                          </div>
                       </div>
                      </form>
                   </div>
                   <div class="modal-footer"> 
                   
                   <div class="well">
                     <div class="row">
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
                    </div>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div> 
                   <!--Fin ingreso de cheques pendientes-->

                   <!--Ingreso de cheques contables-->
                     <div class="modal fade" id="ModalChConta" >
                     <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                     <div class="modal-header">
                     <button type="button" class="close" id ="closeContable" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Ingresar cheques Contabilidad</h4>
                     </div>
                     <div class="modal-body">
                     <form method="post" action="">
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
                     <input type="text" name="fechaRepo" id="fechaRepochc" placeholder="" class="form-control" required/>
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
                    
                      <div class="table-responsive well">
                    <table id="tblChequeC" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
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
                     </div>
                     <!--Fin ingreso de cheques contables-->

                  <!--ingreso abono -->
                  <div class="modal fade" id="ingresar_abono" >
                  <div class="modal-dialog modal-lg">
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
                  <div align="center"><input type="button" value="Guardar" name="btnGuardarAbono" class="btn btn-primary" id="btnGuardarAbono" /></div>

                  </form>
                  </div>
                   <div class="modal-footer">
                 
                  <div class="table-responsive well">
                  <table id="tblAbono" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
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
                  </div>
                  <!--Fin modal ventana abono-->

                  <!-- Modal retiro -->
                  <!--ingreso retiro -->
                  <div class="modal fade" id="modal_retiro" >
                  <div class="modal-dialog modal-lg">
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
                  <div align="center"><input type="button" value="Guardar" name="btn" class="btn btn-primary" id="btnGuardarRetiro" /></div>
                  </form>
                  </div>
                  <div class="modal-footer">
                    <div class="table-responsive well">
                    <table id="tblRetiro" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
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
                  </div>
                  <!--Fin modal ventana retiro-->


                          <!--ingreso cobro -->
<div class="modal fade" id="modalcobro" >
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" id="closeRetiro" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">Cobros</h4>
</div>
<div class="modal-body">
<form method="post" action="">
<input type="text" name="planilla" id="planillaRetiro" placeholder="" class="form-control hidden" />
<div class="col-md-3">
Factura
<input type="number"  id="txtfactura" placeholder="" class="form-control  " required="" />
</div>
<div class="col-md-4">
 Producto
<select id="comboproducto" class="form-control "></select>
</div>
<div class="col-md-5">
Cantidad
<input type="number"  id="txtcantidadcobro" placeholder="" class="form-control  " required="" />
</div>
<div class="col-md-6">
Observación
<input type="text"  id="txtobscobro" placeholder="" class="form-control  " required="" />
</div>
<div class="col-md-4">
Valor
<input type="number"  id="txtvalorcobro" placeholder="" class="form-control  " required="" />
</div>
<div align="center" class="col-md-12">
<br>
<input type="button" value="Guardar" name="btn" class="btn btn-primary" onclick="guardacobro();" />
</div>
</form>
</div>
<br>
<div class="modal-footer">
<br>
<div class="table-responsive well">
<table id="tblcobro" class="table-striped table-condensed table-hover table-responsive" style="width: 100%;">
<thead>
<tr>
<th>Factura</th>
<th>Producto</th>
<th>cantidad</th>
<th>Observación</th>
<th>$</th>
<th></th>
</tr>
</thead>
</table>
</div>
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


                            <!-- Modal -->
      <div id="modalabonos" class="modal fade" role="dialog">
      <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Tipo de abono</h4>
      </div>
      <div class="modal-body">
      <table id='tblabono' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Concepto</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearabono()'>+</button> </div>
      <div id="divcrearabono" >      </div>
      </div>
      
      </div>
      </div>  
      </div>  

        <div id="modalbanco" class="modal fade" role="dialog">
      <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Bancos</h4>
      </div>
      <div class="modal-body">
      <table id='tblbanco' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Rut</th><th></th><th>Nombre</th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearbanco()'>+</button> </div>
      <div id="divcrearbanco" >      </div>
      </div>
      
      </div>
      </div>  
      </div>


      <div id="modalcheque" class="modal fade" role="dialog">
      <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Cheques</h4>
      </div>
      <div class="modal-body">
      <table id='tblcheque' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th>Descripción<th></th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearcheque()'>+</button>  </div>
      <div id="divcrearcheque" >      </div>
      </div>
      
      </div>
      </div>  
      </div>    


          <div id="modalcliente" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Cliente</h4>
      </div>
      <div class="modal-body">
      <table id='tblcliente' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Rut</th><th>Nombre</th><th>Giro</th><th>Dirección</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearcliente()'>+</button> </div>
      <div id="divcrearcliente" >      </div>
      </div>
      
      </div>
      </div>  
      </div>  

      <div id="modalitemgastos" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Gastos</h4>
      </div>
      <div class="modal-body">
      <table id='tblgastos' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Descripción</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='creargastos()'>+</button>  </div>
      <div id="divcreargastos" >      </div>
      </div>
      
      </div>
      </div>  
      </div>  


            <div id="modalconceptos" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Concepto</h4>
      </div>
      <div class="modal-body">
      <table id='tblconcepto' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Concepto</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearconcepto()'>+</button>  </div>
      <div id="divcrearconcepto" >      </div>
      </div>
      
      </div>
      </div>  
      </div>  


            <div id="modalproducto" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Producto</h4>
      </div>
      <div class="modal-body">
      <table id='tblproducto' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>Codigo</th><th>Descripción</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='creaproducto()'>+</button> </div>
      <div id="divcreaproducto" >      </div>
      </div>
      
      </div>
      </div>  
      </div>    


            <div id="modalretiro" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Crear Retiro</h4>
      </div>
      <div class="modal-body">
      <table id='tblretiro' class='table-striped table-condensed table-hover table-responsive' style='width: 100%;'><thead><tr><th>#</th><th>Nombre</th><th></th></tr></thead></table>
      </div>
      <div class="modal-footer">
      <div class=""><button class='btn btn-primary pull-left' onclick='crearetiro()'>+</button> </div>
      <div id="divcrearetiro" >      </div>
      </div>
      
      </div>
      </div>  
      </div>  




<script src="../dist/mantenedorescuentacorriente.js" type="text/javascript" ></script>

</html>


<script>
 $(document).ready(function() {

//variable para centros
  var aux=centros();


  $("#btnColapse").trigger("click");
  cargaComboCentro(aux);
  cargaComboChofer(aux);
  datatableFiltro('','','','','',aux);
  $("#txtFecha1").datepicker();
  $("#txtFecha2").datepicker();

});

 //Filtrar datos
$("#txtFecha1").on('change', function(){
    var aux=centros();
  var fecha1F = $("#txtFecha1").val();
  var fecha2F = $("#txtFecha2").val();
  var choferF = $("#comboChoferF").val();
  var centroF = $("#comboCentroF").val();
  var planillaF = $("#txtPlanillaF").val();
  datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, aux );
});

$("#txtFecha2").on('change', function(){
   var aux=centros();
  var fecha1F = $("#txtFecha1").val();
  var fecha2F = $("#txtFecha2").val();
  var choferF = $("#comboChoferF").val();
  var centroF = $("#comboCentroF").val();
  var planillaF = $("#txtPlanillaF").val();
  datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, aux);
}); 

$("#comboChoferF").on('change', function(){
  var aux=centros();
  var fecha1F = $("#txtFecha1").val();
  var fecha2F = $("#txtFecha2").val();
  var choferF = $("#comboChoferF").val();
  var centroF = $("#comboCentroF").val();
  var planillaF = $("#txtPlanillaF").val();
  datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, aux);
});

$("#comboCentroF").on('change', function(){
  var aux=centros();
  var fecha1F = $("#txtFecha1").val();
  var fecha2F = $("#txtFecha2").val();
  var choferF = $("#comboChoferF").val();
  var centroF = $("#comboCentroF").val();
  var planillaF = $("#txtPlanillaF").val();
  datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, aux);
});

$("#txtPlanillaF").on('change', function(){
  var aux=centros();
  var fecha1F = $("#txtFecha1").val();
  var fecha2F = $("#txtFecha2").val();
  var choferF = $("#comboChoferF").val();
  var centroF = $("#comboCentroF").val();
  var planillaF = $("#txtPlanillaF").val();
  datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, aux);
});
                                       
 //guarda valores modal ingreso de valores planilla                                                          
$("#btnGuardar").on("click", function(){
  var aux=centros();
guarda();
$("#modalvalores").modal("hide");
 datatableFiltro('','','','','',aux);

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

    
    //Modal gastos
    $("#btningresarGasto").on("click", function(){
      var id = $("#txtPlanilla").val();
      //carga numero de planilla en txt oculto
      $("#txtPlanillaGastos").val(id);
      //carga combo item
      $.ajax({
        url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        method: 'POST',
        async: false,
        data: { 
        Accion : 'comboitemgasto'
        },
        dataType: 'json',
        beforeSend: function () {
          $("body").css("cursor", "progress");
        },
        success: function (data) { 
          $("body").css("cursor", "default");
           if(data.length>0){
            $("#comboGasto").html('<option value=""></option>');
            $.each(data, function(id, dato){
              $("#comboGasto").append('<option value="'+dato.idgastos+'">'+dato.descripcion+'</option>');
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error:' + textStatus);
          }
      });

      //carga datatable
      datatablegastos();
      //muestra modal gastos
      $("#modalgastos").modal('show');       
    });


    function datatablegastos(){
      var planigasto = $("#txtPlanillaGastos").val();

        //carga datatable
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'tblgasto',
            planigasto: planigasto
          },
          dataType: 'json',
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function(data){
            $("body").css("cursor", "default");
            console.log(data);
            if(data.length>0){
              var datos = [];
              $.each(data, function (i, item) {
                var obj = [
                item.id_gasto,
                item.planilla_gasto,
                item.tipo_gasto,
                item.monto_gasto,
                item.obs_gasto,
                null
                ];
                // jsonListaDuplicados
                datos.push(obj);
              });
              $('#tblGastos').DataTable().destroy();
              var tabla = $('#tblGastos').DataTable({
              "searching": false, 
              data: datos,
              "columns":[
              {
                "visible": false,
                width: "5%",
                data: datos.id_gasto,
              },
              {
                width: "20%",
                data: datos.planilla_gasto,
              },
              {
                width: "10%",
                data: datos.tipo_gasto,
              },
              {
                width: "30%",
                data: datos.monto_gasto,
              },
              {
                width: "30%",
                data: datos.obs_gasto,
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

    }//fin datatablegastos


    //elimina registros de gastos
    function eliminagasto(id_gasto){
      var planillagasto = $("#txtPlanillaGastos").val();
      var eliminag = confirm("¿Desea eliminar este registro?");

      //Preguntamos si desea eliminar este registro
      if(eliminag){
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
          Accion : 'eliminagasto',
            id_gasto:id_gasto,
            planillagasto: planillagasto
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            datatablegastos();
            datatableFiltro('','','','','',aux);

          }//fin success
        }); 
      }//fin if
    }

       $("#modalgastos").on('hide.bs.modal', function(){
       var idplanillagastos    =  $("#txtPlanillaGastos").val();
       modalPlanilla(idplanillagastos);
       })
       
       $("#ingresarchequespendientes").on('hide.bs.modal', function(){
       var id = $("#txtPlanilla").val();
       modalPlanilla(id);
       })
       
       $("#ModalChConta").on('hide.bs.modal', function(){
       var id = $("#txtPlanilla").val();
       modalPlanilla(id);
       })

       $("#ingresar_abono").on('hide.bs.modal', function(){
       var id = $("#txtPlanilla").val();
       modalPlanilla(id);
       })
       
       $("#modal_retiro").on('hide.bs.modal', function(){
       var id = $("#txtPlanilla").val();
       modalPlanilla(id);
       })
       

    

    //Funcion para generar el ingreso de los gastos en la base de datos
    function guardaGastos(){
        var aux=centros();
      var idplanillagastos    =  $("#txtPlanillaGastos").val();
      var montogastos         =  $("#TxtMonto").val();
      var obsgastos           =  $("#TxtObs").val();
      var descripciongastos   =  $("#comboGasto").val();
    
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
          $("body").css("cursor", "progress");
        },
        success: function (data) {
          $("body").css("cursor", "default");
          swal('Registros Actualizados','¡Exitosamente!','success');
          //recarga datatable despues de guardar
          datatablegastos();
          $("#comboGasto").val('');
          $("#TxtMonto").val('');
          $("#TxtObs").val('');
          var aux=centros();
          datatableFiltro('','','','','',aux);
          
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('error:');
        }
      });//Fin funcion guardar Gastos

  }//fin modal gastos 

    //Modal cheques pendientes
    $("#btningresarchequespendientes").on("click", function(){
        var id = $("#txtPlanilla").val();
        //carga numero de planilla en txt oculto
        $("#txtplanillachp").val(id);
        $("#fechaRepo").datepicker();

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
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            if(data.length>0){
              $("#combobanco").html('<option value=""></option>');
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
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            if(data.length>0){
              $("#combocliente").html('<option value=""></option>');
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
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            if(data.length>0){
              $("#comboconcepto").html('<option value=""></option>');
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
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            if(data.length>0){
              $("#estado").html('<option value=""></option>');
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
    })
     //fin modal chpendientes

    function datatablechp(){
      var planichequep = $("#txtplanillachp").val();

      //Carga datatable
      $.ajax({
        url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
        method: 'POST',
        async: false,
        data: {
          Accion : 'jsonTablaChequeP',
          planichequep: planichequep
        },
        dataType: 'json',
        beforeSend: function(){
          $("body").css("cursor", "progress");
        },
        success: function(data){
          $("body").css("cursor", "default");
          if(data.length>0){
            var datos = [];
            $.each(data, function (i, item) {
              var obj = [
                item.id_chp,
                item.planilla_chp,
                item.ncheque_chp,
                item.banco_chp, //descripcion de la tabla cc_is_banco
                item.cliente_chp, //descripcion de la tabla cc_is_cliente
                item.concepto_chp,
                item.monto_chp,
                item.estado_chp,
                item.fecha_chp,
                item.obs_chp,
                null
              ];
               // jsonListaDuplicados
               datos.push(obj);
               });
                $('#tblChequeP').DataTable().destroy();
                var tabla2 = $('#tblChequeP').DataTable({ 
                "searching": false, 
                data: datos,
                "columns":[
                    {
                  "visible": false,
                  width: "10%",
                  data: datos.id_chp,
                },
                              {
                  width: "10%",
                  data: datos.planilla_chp,
                },
                {
                  width: "10%",
                  data: datos.ncheque_chp,
                },
                {
                  width: "30%",
                  data: datos.banco_chp,
                },
                {
                  width: "20%",
                  data: datos.cliente_chp,
                },
                              {
                  width: "20%",
                  data: datos.concepto_chp,
                },
                              {
                  width: "10%",
                  data: datos.monto_chp,
                },
                              {
                  width: "20%",
                  data: datos.estado_chp,
                },
                              {
                  width: "20%",
                  data: datos.fecha_chp,
                },
                              {
                  width: "20%",
                  data: datos.obs_chp,
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

    function eliminachequep(id_chp){
      var planillaPendiente = $("#txtplanillachp").val();
      var eliminachp = confirm("¿Desea eliminar este registro?");

      if(eliminachp){
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonEliminaChequeP',
            id_chp:id_chp,
            planillaPendiente: planillaPendiente
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            datatablechp();
            datatableFiltro('','','','','',aux);
          },
          error: function(textStatus){
            console.log(textStatus);
          }
        });
      }//fin if
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
          $("body").css("cursor", "progress");
        },
        success: function (data) {
          $("body").css("cursor", "default");
          swal('Registros Actualizados','¡Exitosamente!','success');
          //recarga datatable despues de guardar
          datatablechp();
            $("#txtnCheque").val('');
            $("#combobanco").val('');
            $("#combocliente").val('');
            $("#comboconcepto").val('');
            $("#estado").val('');
            $("#fechaRepo").val('');
            $("#txtobs").val('');
            $("#monto").val('');
            datatableFiltro('','','','','',aux);
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
     $("#fechaRepochc").datepicker();

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
          $("body").css("cursor", "progress");
         },
         success: function (data) {
          $("body").css("cursor", "default");
           if(data.length>0){
             $("#combobancoc").html('<option value=""></option>');
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
                  $("body").css("cursor", "progress");
                },
                success: function (data) {
                  $("body").css("cursor", "default");
                  if(data.length>0){
                    $("#comboclientec").html('<option value=""></option>');
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
              $("body").css("cursor", "progress");
            },
            success: function (data) {
              $("body").css("cursor", "default");
              if(data.length>0){
                $("#estadochc").html('<option value=""></option>');
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
            });
            //fin modal chpendientes

        function datatablechc(){
          var planichequec = $("#Planillachc").val();
        //Cargar datatable
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
              async: false,
              data: { 
                Accion : 'jsonTablaChequeC',
                planichequec:planichequec
              },
              dataType: 'json',
              beforeSend: function () {
                $("body").css("cursor", "progress");
              },
              success: function (data) {
                $("body").css("cursor", "default");
                  if(data.length>0){
                    var datos = [];
                  $.each(data, function (i, item) {
                    var obj = [
                    item.idchc,
                    item.planilla_chc,
                    item.ncheque_chc,
                    item.banco_chc, //descripcion de la tabla cc_is_banco
                    item.cliente_chc, //descripcion de la tabla cc_is_cliente
                    item.monto_chc,
                    item.fecha_chc,
                    item.obs_chc,
                    item.estado_chc,
                      null
                  ];
                  // jsonListaDuplicados
                  datos.push(obj);
                  });
                  $('#tblChequeC').DataTable().destroy();
                  var tabla3 = $('#tblChequeC').DataTable({ 
                    "searching": false, 
                    data: datos,
                    "columns":[
                    {
                      "visible": false,
                      width: "5%",
                      data: datos.idchc,
                    },
                                  {
                      width: "10%",
                      data: datos.planilla_chc,
                    },
                    {
                      width: "10%",
                      data: datos.ncheque_chc,
                    },
                    {
                      width: "30%",
                      data: datos.banco_chc,
                    },
                    {
                      width: "20%",
                      data: datos.cliente_chc,
                    },
                    {
                      width: "10%",
                      data: datos.monto_chc,
                    },
                                  {
                      width: "20%",
                      data: datos.fecha_chc,
                    },
                                  {
                      width: "20%",
                      data: datos.obs_chc,
                    },
                                  {
                      width: "20%",
                      data: datos.estado_chc,
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


    function eliminachequec(idchc){
      var planillaContabilidad = $("#Planillachc").val();
      var eliminachc = confirm("¿Desea eliminar este registro?");

      if(eliminachc){
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonEliminaChequeC',
            idchc:idchc,
            planillaContabilidad:planillaContabilidad
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            datatablechc();
            datatableFiltro('','','','','',aux);
          }
        });
      }
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
          $("body").css("cursor", "progress");
        },
        success: function (data) {
          $("body").css("cursor", "default");
          swal('Registros Actualizados','¡Exitosamente!','success');
          //recarga datatable despues de guardar
          datatablechc();
            $("#nCheque").val('');
            $("#combobancoc").val('');
            $("#comboclientec").val('');
            $("#estadochc").val('');
            $("#fechaRepochc").val('');
            $("#txtobschc").val('');
            $("#txtmontochc").val('');
            datatableFiltro('','','','','',aux);
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
              $("body").css("cursor", "progress");
            },
            success: function(data){
              $("body").css("cursor", "default");
              if(data.length>0){
                $("#comboabono").html('<option value=""></option>');
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
              $("body").css("cursor", "progress");
            },
            success: function(data){
              $("body").css("cursor", "default");
              if(data.length>0){
                $("#comboautorizar").html('<option value=""></option>');
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
     })//fin modal abono


    function datatableabono(){
      var planiiabono = $("#planillaAbono").val();
        //carga datatable
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonTablaAbono',
            planiiabono: planiiabono
          },
          dataType: 'json',
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function(data){
            $("body").css("cursor", "default");
            if(data.length>0){
              var datos = [];
              $.each(data, function (i, item) {
                var obj = [
                item.id_abono,
                item.planilla_abono,
                item.ncredito_abono,
                item.concepto_abono,
                item.monto_abono,
                item.autorizado_abono,
                item.obs_abono,
                null
                ];
                // jsonListaDuplicados
                datos.push(obj);
              });
              $('#tblAbono').DataTable().destroy();
              var tabla4 = $('#tblAbono').DataTable({
              "searching": false,  
              data: datos,
              "columns":[
              {
                "visible": false,
                width: "5%",
                data: datos.id_abono,
              },
              {
              width: "20%",
              data: datos.planilla_abono,
              },
              {
              width: "10%",
              data: datos.ncredito_abono,
              },
              {
              width: "30%",
              data: datos.concepto_abono,
              },
              {
              width: "30%",
              data: datos.monto_abono,
              },
              {
              width: "30%",
              data: datos.autorizado_abono,
              },
              {
              width: "30%",
              data: datos.obs_abono,
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
    function eliminaabono(id_abono){
      var planiabono = $("#planillaAbono").val();
      var eliminab = confirm("¿Desea eliminar este registro?");

      if(eliminab){
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
          Accion : 'jsonEliminaAbono',
            id_abono:id_abono,
            planiabono:planiabono
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            datatableabono();
            datatableFiltro('','','','','',aux);
          }
        }); 
      }
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
          $("body").css("cursor", "progress");
        },
        success: function (data) {
          $("body").css("cursor", "default");
          swal('Registros Actualizados','¡Exitosamente!','success');
          //recarga datatable despues de guardar
          datatableabono();
          $("#nFacturaAbono").val('');
          $("#comboabono").val('');
          $("#comboautorizar").val('');
          $("#montoAbono").val('');
          $("#txtObservacionesAbono").val('');
          datatableFiltro('','','','','',aux);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('error:');
        }
      });
  }//Fin funcion guardar abono

$("#btncobro").on("click", function(){
 $("#modalcobro").modal('show'); 
 var planilla = $("#txtPlanilla").val();

              $.ajax({
              url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
              method: 'POST',
              async: false,
              data: { 
              Accion : 'combocobro'
              },
              dataType: 'json',
              beforeSend: function () {
              $("body").css("cursor", "progress");
              },
              success: function (data) { 
              $("body").css("cursor", "default");
              if(data.length>0){
              $("#comboproducto").html('<option value=""></option>');
              $.each(data, function(id, dato){
              $("#comboproducto").append('<option value="'+dato.Cod_ccu+'">'+dato.Cod_ccu+' &nbsp;&nbsp;'+dato.Descripcion+'</option>');
              });
              }
              },
              error: function (jqXHR, textStatus, errorThrown) {
              console.log('error:' + textStatus);
              }
              }); 

               aeaeaea(planilla);
      
})


function aeaeaea(planilla)
{


              $.ajax({
              url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
              method: 'POST',
              async: false,
              data: { 
              Accion : 'jsontblcobro',
              planilla:planilla
              },
              dataType: 'json',
              beforeSend: function () {
              $("body").css("cursor", "progress");
             
              },
              success: function (data) { 
              $("body").css("cursor", "default");
             if(data.length>0){
              var datos = [];
              $.each(data, function (i, item) {
                var obj = [
                item.N_factura,
                item.Descripcion,
                item.Cantidad,
                item.Observacion,
                item.Total,
                null
                ];
                // jsonListaDuplicados
                datos.push(obj);
              });
              $('#tblcobro').DataTable().destroy();
              var tabla5 = $('#tblcobro').DataTable({ 
              "searching": false, 
              data: datos,
              "columns":[
           
              {
              width: "20%",
              data: datos.N_factura,
              },
              {
              width: "20%",
              data: datos.Descripcion,
              },
              {
              width: "10%",
              data: datos.Cantidad,
              },
              {
              width: "30%",
              data: datos.Observacion,
              },
               {
              width: "20%",
              data: datos.Total,
              },
              {
              width: "20%",
              data: null,
              //crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
              "render": function ( data, type, row ) {
              return '<div align="center"><button class="btn btn-danger btn-xs" onclick="eliminacobro(\''+row[0]+'\', \''+planilla+'\');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
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
            
            }
            else{
              $('#tblcobro').DataTable().destroy();
              $('#tblcobro').DataTable().clear();
              $('#tblcobro').DataTable().draw();
            }
              },
              error: function (jqXHR, textStatus, errorThrown) {
              console.log('error111:' + textStatus);
              }
              });  
}

function guardacobro()
{
   var planilla = $("#txtPlanilla").val();
var txtfactura       = $("#txtfactura").val();
var comboproducto    = $("#comboproducto").val();
var txtMotivo        = $("#txtMotivo").val();
var txtcantidadcobro = $("#txtcantidadcobro").val();
var txtobscobro      = $("#txtobscobro").val();
var txtvalorcobro    = $("#txtvalorcobro").val();

$.ajax({
url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
method: 'POST',
async: false,
data: { 
Accion : 'guardacobro',
planilla:planilla,
txtfactura:txtfactura,
comboproducto:comboproducto,
txtMotivo:txtMotivo,
txtcantidadcobro:txtcantidadcobro,
txtobscobro:txtobscobro,
txtvalorcobro:txtvalorcobro
},
beforeSend: function () {
$("body").css("cursor", "progress");
},
success: function(data){
$("body").css("cursor", "default");
swal('Cobro Ingresado','','success');
aeaeaea(planilla);
}
});

}


  function eliminacobro(factura, planilla){

    swal({
    title: 'Eliminar cobro?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then(function () {
         $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'eliminacobro',
            factura:factura,
            planilla:planilla
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            aeaeaea(planilla);
          }
        });
    })
     
    
}
    

   //modal ingresar retiro
            //modal retiro abrir
      $("#btnRetiro").on("click", function(){
        var id = $("#txtPlanilla").val();
        //carga numero de planilla en txt oculto
        $("#planillaRetiro").val(id);

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
            $("body").css("cursor", "progress");
          },
          success: function(data){
            $("body").css("cursor", "default");
            if(data.length>0){
              $("#comboretiro").html('<option value=""></option>');
              $.each(data, function(id, dato){
              $("#comboretiro").append('<option value="'+dato.Codigo+'">'+dato.Retiro+'</option>');
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
      var planiretiro = $("#planillaRetiro").val();
        //carga datatable
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonTablaRetiro',
            planiretiro: planiretiro
          },
          dataType: 'json',
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function(data){
            $("body").css("cursor", "default");
            if(data.length>0){
              var datos = [];
              $.each(data, function (i, item) {
                var obj = [
                item.id_retiro,
                item.planilla_retiro,
                item.motivo_retiro,
                item.monto_retiro,
                item.retirado_retiro,
                null
                ];
                // jsonListaDuplicados
                datos.push(obj);
              });
              $('#tblRetiro').DataTable().destroy();
              var tabla5 = $('#tblRetiro').DataTable({ 
              "searching": false, 
              data: datos,
              "columns":[
              {
                "visible": false,
                width: "5%",
                data: datos.id_retiro,
              },
              {
              width: "20%",
              data: datos.planilla_retiro,
              },
              {
              width: "10%",
              data: datos.motivo_retiro,
              },
              {
              width: "30%",
              data: datos.monto_retiro,
              },
              {
              width: "30%",
              data: datos.retirado_retiro,
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

    function eliminaretiro(id_retiro){
      var planillareti = $("#planillaRetiro").val();
      var eliminareti = confirm("¿Desea eliminar este registro?");

      if(eliminareti){
          $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonEliminaRetiro',
            id_retiro:id_retiro,
            planillareti:planillareti
          },
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
            $("body").css("cursor", "default");
            swal('Registro eliminado','','success');
            //recarga datatable despues de borrar
            datatableretiro();
            datatableFiltro('','','','','',aux);
          }
        });
      } 
    }

    //Funcion para generar el ingreso de los gastos en la base de datos
    function GuardarRetiro(){
      var idplanillaretiro      = $("#planillaRetiro").val();
      var montoretiro           = $("#montoRetiro").val();
      var motivoretiro          = $("#txtMotivoRetiro").val();
      var cRetiro               = $("#comboretiro").val();
    
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
          $("body").css("cursor", "progress");
        },
        success: function (data) {
          $("body").css("cursor", "default");
          swal('Registros Actualizados','¡Exitosamente!','success');
          //recarga datatable despues de guardar
          datatableretiro();
          $("#montoRetiro").val('');
          $("#txtMotivoRetiro").val('');
          $("#comboretiro").val('');
          datatableFiltro('','','','','',aux);
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
  $.ajax({
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
      $("body").css("cursor", "progress");
    },
    success: function (data) {
      $("body").css("cursor", "default");
      swal('Registros Actualizados','¡Correctamente!','success');
      datatableFiltro('','','','','',aux);
    }, 
    error: function (error) {
    console.log("Errors7:" + error);
  }
  });
}  

function modalPlanilla(planilla_hs){
  $("#txtPlanilla").val(planilla_hs);
  $.ajax({
    url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    method: 'POST',
    async: true,
    data: {
      Accion:"buscaplanilla",
      planilla:planilla_hs 
    },
    dataType: 'json',
    beforeSend: function () {
      $("#modalCargando").modal('show');
      $("body").css("cursor", "progress");
    },
    success: function (data) {
      $("body").css("cursor", "default");
      $("#TxtValPlanilla").val(data[0].Valor);
      $("#txtEfectivo").val(data[0].Efectivo);
      $("#txtCheque").val(data[0].Cheque);
      $("#txtPromae").val(data[0].Promae);
      $("#txtflete").val(data[0].Flete_porteo);
      $("#txtGasto").val(data[0].Gastos);
      $("#txtChequeP").val(data[0].Ch_pendiente);
      $("#txtChequeC").val(data[0].Ch_conta);
      $("#txtAbono").val(data[0].Abono);
      $("#txtRetiro").val(data[0].Retiro);
      $("#modalCargando").modal('hide');
    }, 
    error: function (error) {
    console.log("Errors6:" + error);
    }
  });

  $.ajax({
      url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
      method: 'POST',
      async: true,
      data: { 
      Accion:"cargadatosplanilla",  
      planilla: planilla_hs
      },   
      dataType: 'json',                      
      beforeSend: function () {
        $("body").css("cursor", "progress");
      },
      success: function (data) {
        $("body").css("cursor", "default");
        if(data.length>0){
          console.log(data[0].Fecha);
        }else{swal('Error','','error')}

        $('#contenedordatos').fadeIn(1000).html('<table width="100%" border="0"><tbody><tr><td>Planilla N°:'+data[0].planilla_history+'</td><td>Fecha:'+data[0].fecha_history+'</td></tr><tr><td>Conductor:'+data[0].chofer_history+'</td><td>Centro:'+data[0].centro_history+'</td> </tr></tbody></table>');
      }, 
      error: function (jqXHR, textStatus, errorThrown ) {
        console.log("error5: "+textStatus);
      }
  });
  $("#modalvalores").modal('show'); 
}




  function centros(){
    var auxiliar = "";
          $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
          Accion:"permisoscentros",  
           },   
          dataType: 'json',                      
          beforeSend: function () {
            $("body").css("cursor", "progress");
          },
          success: function (data) {
$("body").css("cursor", "default");
            if(data[0].centro==1000){
              $("#centrotxt").text("Administrador");
              $("#menuadmin").show();
            }else{
              $("#centrotxt").text(data[0].Descripcion +' '+ data[1].Descripcion);
               $("#menuadmin").hide();
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




  function datatableFiltro(fecha1F, fecha2F, choferF, centroF, planillaF, centrousr){
   
    //Cargar datatable
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion : 'jsonTablaFiltro1',
            fecha1F: fecha1F,
            fecha2F: fecha2F,
            choferF: choferF,
            centroF: centroF,
            planillaF: planillaF,
            centrousr:centrousr
          },
          dataType: 'json',
          beforeSend: function () {
            $("#modalCargando").modal('show');
            $("body").css("cursor", "progress");
          },
          success: function(data){
            $("#filtro").html('');
            $("body").css("cursor", "default");
           
            $("#modalCargando").modal('hide');
            if(data.length>0){
              var sumadif = 0;
              var sumaing = 0 ;
              var sumaretiro=0;
              var sumacobros =0;
              var sumaefectivo =0;
              var sumacheque =0;
              var sumapromae =0;
              var sumaabono =0;
              var sumagastos =0;
              var sumachp =0;
              var sumachc =0;
              var sumaflete =0;
              var datos = [];
                 $.each(data, function (i, item) {
                 var obj = [
                 item.planilla_hs,
                 item.fecha_hs,
                 item.chofer_hs,
                 item.centro_hs,
                 moneda(item.valor_hs),
                 moneda(item.total_ingresocajas_hs),
                 moneda(item.total_ingreso_hs),
                 moneda(item.diferencias_hs),
                 moneda(item.Retiro),
                 moneda(item.Cobros),
                 moneda(item.Efectivo),
                 moneda(item.Cheque),
                 moneda(item.Promae),
                 moneda(item.Abono),
                 moneda(item.Abono),
                 moneda(item.Ch_pendiente),
                 moneda(item.Ch_conta),
                 moneda(item.Flete_porteo),
                null
                 ];
                 
                     sumadif = sumadif + parseInt(item.diferencias_hs) ;
                     sumaing = sumaing + parseInt(item.total_ingresocajas_hs) ;
                     sumaretiro = sumaretiro + parseInt(item.Retiro) ;
                     sumacobros = sumacobros + parseInt(item.Cobros) ;
                     sumaefectivo = sumaefectivo + parseInt(item.Efectivo) ;
                     sumacheque = sumacheque + parseInt(item.Cheque) ;
                     sumapromae = sumapromae + parseInt(item.Promae) ;
                     sumaabono = sumaabono + parseInt(item.Abono) ;
                     sumagastos = sumagastos + parseInt(item.total_ingreso_hs) ;
                     sumachp = sumachp + parseInt(item.Ch_pendiente) ;
                     sumachc = sumachc + parseInt(item.Ch_conta) ;
                     sumaflete = sumaflete + parseInt(item.Flete_porteo) ;
                   
                 // jsonListaDuplicados
                 datos.push(obj);
                 });
$("#filtro").html('<b>Efectivo: </b>$'+moneda(sumaefectivo)+'&nbsp; <b>Cheque: </b>$'+moneda(sumacheque)+' &nbsp; <b>Promae: </b>$'+moneda(sumapromae)+' &nbsp; <b>Ingreso a caja: </b>$'+moneda(sumaing)+'  &nbsp; <b>Gastos: </b>$'+moneda(sumagastos)+' &nbsp; <b>Cheque Pendiente: </b>$'+moneda(sumachp)+' &nbsp; <b>Cheque conta: </b>$'+moneda(sumachc)+'&nbsp; <b>Abono: </b>$'+moneda(sumaabono)+'&nbsp; <b>Retiro: </b>$'+moneda(sumaretiro)+'&nbsp; <b>Total ingreso: </b>$'+moneda(sumaing)+'&nbsp; <b>Cobros: </b>$'+moneda(sumacobros)+'&nbsp; <b>Diferencias: </b>$'+moneda(sumadif)+' <b>Flete: </b>$'+moneda(sumaflete)+'');
              $('#tblFiltrarB').DataTable().destroy();

              var tabla6 = $('#tblFiltrarB').DataTable({
                "searching": false, 
                data: datos,
                "columns":[
                {
                  width: "5%",
                  data: datos.planilla_hs,
                  //crea boton para eliminar y pasa dato row, row es el valor que pasa a la funcion
                  "render": function ( data, type, row ) {
                  return '<div align="center"><a href="\#\" onclick="modalPlanilla(\''+row[0]+'\');">'+row[0]+'</a></div>';
                  }
                },
                {
                  width: "7%",
                  data: datos.fecha_hs,
                },
                {
                  width: "25%",
                  data: datos.chofer_hs,
                },
                {
                  width: "15%",
                  data: datos.centro_hs,
                },
                 {
                  width: "7%",
                  data: datos.valor_hs,
                },
                {
                  width: "10%",
                  data: datos.total_ingresocajas_hs,
                },
                {
                  width: "10%",
                  data: datos.total_ingreso_hs,
                },
                {
                  width: "10%",
                  data: datos.diferencias_hs
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
                    $('#tblFiltrarB').DataTable().destroy();
                    $('#tblFiltrarB').DataTable().clear();
                    $('#tblFiltrarB').DataTable().draw();
                  }

                }, 
                error: function (jqXHR, textStatus, errorThrown) {
                  console.log('error3');
               }
        });
    
        //Cargar datos de la suma de cada registro
        $.ajax({
          url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
          method: 'POST',
          async: false,
          data: { 
            Accion:"jsonCargaDatosTablaSuma",  
            choferF: choferF,
            centroF: centroF,
            planillaF: planillaF
          },   
          dataType: 'json',                      
          beforeSend: function () {
          },
          success: function (data) {
          
            if(data.length>0){
              console.log(data[0].Fecha);
            }else{swal('Error','','error')}

            $('#contenedordatos').fadeIn(1000).html('<table width="100%" border="0"><tbody><tr><td>Planilla N°:'+data[0].planilla_history+'</td><td>Fecha:'+data[0].fecha_history+'</td></tr><tr><td>Conductor:'+data[0].chofer_history+'</td><td>Centro:'+data[0].centro_history+'</td> </tr></tbody></table>');
          }, 
          error: function (jqXHR, textStatus, errorThrown ) {
            console.log("error2: "+textStatus);
          }
      });
  }//fin funcion datatableFiltro

function cargaComboCentro(centrousr){

  //Carga combo estado
  if(centrousr.length>1){

      if(centrousr.length>0){
        $.each(centrousr, function(id, dato){
          $("#comboCentroF").append(
          '<option value="'+dato.centro+'">'+dato.Descripcion+'</option>');
        });
      }
  }else{

  $.ajax({
    url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    method: 'POST',
    async: false,
    data: {
      Accion : 'jsonComboCentro',
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
          $("#comboCentroF").append(
          '<option value="'+dato.id+'">'+dato.Descripcion+'</option>');
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('error1:' + textStatus);
    }

  });
}
}//fin funciones carga combo centro de costos

function cargaComboChofer(centrousr){
  //Carga combo chofer
  $.ajax({
    url: 'controllers/cuentacorriente/ctocorriente_ajax.php',
    method: 'POST',
    async: false,
    data: {
      Accion : 'jsonComboChofer',
      centrousr:centrousr
    },
    dataType: 'json',
    success: function(data){

          if(data.length>2){
          $.each(data, function(id, dato){
          $("#comboChoferF").append(
          '<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
          });
          }

          if(data[1].length>0){
          $.each(data[1], function(id, dato){
          $("#comboChoferF").append(
          '<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
          });
          }

          if(data[0].length>0){
          $.each(data[0], function(id, dato){
          $("#comboChoferF").append(
          '<option value="'+dato.Rut+'">'+dato.Nombre+'</option>');
          });
          }
        $(".chosen-select").chosen();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('errorpppxp:' + textStatus);
    }
  });
}

function valoressuma(suma){

}


</script>

             