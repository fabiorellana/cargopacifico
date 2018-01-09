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
require_once './Clases/Oca.php';
?>
<br><br><br>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <h3>
    Carga de archivos de Facturación CCU-Interplantas
    </h3>
    <a href="./archivos/_formato_fact_interplanta.xlsx">Descargar Formato Excel</a><br><br>
    <form name="importa" method="post" action="" enctype="multipart/form-data" >
        Seleccione Quincena: <select class="form-control" name="quincena">
            <option value="1">Primera</option>
            <option value="2">Segunda</option>
        </select>
   
        Seleccione Mes: 
        <select name="mes" class="form-control">
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
        <select name="year" class="form-control">
	        <?php
	        echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
	        echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
	        ?>
        </select>
        
        <br>
        Seleccione archivo Excel:
        <input class="btn btn-default" type="file" name="excel" /><br/><br/>
        <input class="btn btn-primary" type='submit' name='enviar' value="Importar" />
        <input type="hidden" value="upload" name="action" />
    </form>
</div>
<div class="clearfix"></div><br>
<div class="col-sm-12 col-md-6 col-lg-4">
<div id="mensajeria" class="panel panel-primary">
  <div class="panel-body">
	<?php
	    $importados = extract($_POST);
	    $oca = new Oca();
	    $busca = 0;
	    $busca = $oca->buscarPeriodo($quincena, $mes, $year);
	    if($busca > 0){
	    	echo "&bull;&nbsp;Periodo ingresado ya existe.";
	    	$action = "error";
	    }
	    if (isset($action)&&$action == "upload") 
	    {
	        $archivo = $_FILES['excel']['name'];
	        $tipo = $_FILES['excel']['type'];
	        $destino = "carga_archivos/".time().".xlsx";
	        if (copy($_FILES['excel']['tmp_name'],$destino))
	        {
	        	echo "&bull;&nbsp;Archivo Cargado Con Exito";
	        }
	        else
	        {
	            echo "&bull;&nbsp;Error Al Cargar el Archivo";
	        }
	////////////////////////////////////////////////////////
	if (file_exists ($destino)) 
	{
	require_once('lib/excel/PHPExcel.php');
	require_once('lib/excel/PHPExcel/Reader/Excel2007.php');
	    $objReader = new PHPExcel_Reader_Excel2007();
	    $objPHPExcel = $objReader->load($destino); 
	    $objFecha = new PHPExcel_Shared_Date();
	    $objPHPExcel->setActiveSheetIndex(0);
	    $errores = 0;
	    $cuenta_hojas = $objPHPExcel->getSheetCount();
	    if($cuenta_hojas>1){
	    	echo "<br/>&bull;&nbsp;Error: el archivo no debe contener más de una hoja excel.";
	    	$errores++;
	    }
	    $i=1;
	    $oca->fac_quincena=$quincena;
	    $oca->fac_mes=$mes;
	    $oca->fac_ano=$year;
	    $oca->fac_transportista=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	    $oca->fac_oca=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	    $oca->fac_guias=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	    $oca->fac_origen=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	    $oca->fac_destino=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	    $oca->fac_tramo=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	    $oca->fac_fecha_hora_orden=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
	    $oca->fac_patente=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
	    $oca->fac_rampla=$objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
	    $oca->fac_bahias=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
	    $oca->fac_precio_vc=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
	    $oca->fac_valor_a_pagar=$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
	    $oca->fac_fecha_hora_aprobacion=$objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
	    $oca->fac_fecha_hora_recepcion=$objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
	    $validaTitulos = $oca->validaTitulos();
	    if($validaTitulos != "OK"){
	    	echo "<br/>&bull;&nbsp;Error: ".$validaTitulos;
	    	$errores++;
	    }
	    $i=2; 
	    $param=0;
	    $contador=0;
	    date_default_timezone_set('UTC');
	    while($param==0 && $errores==0)
	    {
	    	    $oca->fac_quincena=$quincena;
		        $oca->fac_mes=$mes;
		        $oca->fac_ano=$year;
		        $oca->fac_transportista=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		        $oca->fac_oca=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		        $oca->fac_guias=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		        $oca->fac_origen=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		        $oca->fac_destino=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		        $oca->fac_tramo=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		        $val = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(), $adjustToTimezone = TRUE));
		        $oca->fac_fecha_hora_orden=$val;
		        $patente = str_replace("-", "", trim($objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue()));
		        $oca->fac_patente=strtoupper($patente);
		        $rampla = str_replace("-", "", trim($objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue()));
		        $oca->fac_rampla=strtoupper($rampla);
		        $oca->fac_bahias=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		        $oca->fac_precio_vc=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		        $oca->fac_valor_a_pagar=$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		        $fac_fecha_hora_aprobacion = date('Y/m/d H:i:s',PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue()));
		        $oca->fac_fecha_hora_aprobacion=$fac_fecha_hora_aprobacion;
		        $fac_fecha_hora_recepcion= date('Y/m/d H:i:s',PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue()));
		        $oca->fac_fecha_hora_recepcion=$fac_fecha_hora_recepcion;
		        
	    	    if($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()==NULL)
		        {
		            $param=1;
		        }
		        else{
		        	$oca->insertaOca();
		        }
	    	
	        $i++;
	        $contador++;
	    }
	    $oca=null;
	    if($contador>0){
	        	$totalIngresados=$contador-1;
	        	echo "<br/>&bull;&nbsp;Total elementos subidos: $totalIngresados ";
	    	}
	    }
	        else
	    {
	        echo "<br/>&bull;&nbsp;Necesitas primero importar el archivo";}
	       unlink($destino);
	    }
	    
	?>
	</div>
	</div>
	</div>
</div>
<!-- ./wrapper -->
                


 

  

  <div class="control-sidebar-bg"></div>

<?php require('./include/modals.php');?>

<?php require('./include/footer.php');?>


<script>
$(document).ready(function() {
	
		setInterval("notificacion_arriba()", 1000);
		setInterval("notificacion_panel()", 1000);
		

				
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
<?php 
if($importados == 0){
	echo '$("#mensajeria").hide();';
}
else{
	echo '$("#mensajeria").show();';
}
?>
</script>
                
                
                
                 <script>

$('#mover').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdMover").val(consulta);            
});
                
</script>

     <script>

$("txt").on("click",function() {
	
	
	var tst= $("#txt").val();            

alert("hola"); 
alert(tst);        
});
                
</script>




<script>




$('#CambiarNombre').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdnombre").val(consulta);            
});
                
</script>


<!-- propiedades-->
<script>
$('#propiedades').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	    $("#contenedorpropiedades").load("archivo.php", {id: consulta}, function(){

			  });            
});
                
</script>
<!-- fin-->
<script>

$('#eliminar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtIdeliminar").val(consulta);            
});

$('#permisos').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});


    $('#sidebar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget); // BotÃ³n que activÃ³ el modal	
	 var codigo = button.data('id');
	 alert (codigo)
	 var consulta = codigo;       
	 $("#txtpermisos").val(consulta);            
});



</script> 

<script>
	$(document).ready(function(){
		
		$("#btnguardar").hide();
$( "#txt" ).click(function() {
	alert("hola");
$("#btnguardar").show();

});

	
})</script>

<script>
$("#subir_archivo").click(function(){
 $('#cargando').html('<div><img src="../images/ajax-loader.gif"/></div>');
})
</script>
   
</body>
</html>