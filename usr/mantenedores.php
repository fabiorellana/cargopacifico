

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
  
  <div class="content-wrapper container-fluid"  style="background-color:#ECF0F5" >
  <br>
  <br><br>
  		<button type ="" onclick="abono();"">Abono</button>
		<button type ="" onclick="Banco();">Banco</button>
		<button type ="" onclick="Cheque();">Cheque</button>
		<button type ="" onclick="Cliente();">Cliente</button>
		<button type ="" onclick="Gastos();">Gastos</button>
		<button type ="" onclick="Conceptos();">Conceptos</button>
		<button type ="" onclick="Producto();">Producto</button>
		<button type ="" onclick="Retiros();">Retiros</button>
  
  </div>
<!-- ./wrapper -->
                


 

  

  <div class="control-sidebar-bg"></div>

<?php require('include/modals.php');?>

<?php require('include/footer.php');?>


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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearabono()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearbanco()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearcheque()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearcliente()'>+</button>	</div>
			<div id="divcrearcliente" >      </div>
			</div>
			
			</div>
			</div>	
			</div>	

					<div id="modalgastos" class="modal fade" role="dialog">
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
			<div class=""><button class='btn btn-primary pull-left' onclick='creargastos()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearconcepto()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='creaproducto()'>+</button>	</div>
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
			<div class=""><button class='btn btn-primary pull-left' onclick='crearetiro()'>+</button>	</div>
			<div id="divcrearetiro" >      </div>
			</div>
			
			</div>
			</div>	
			</div>									

</body>
<script src="../dist/mantenedorescuentacorriente.js" type="text/javascript" ></script>
</html>








	
														
											