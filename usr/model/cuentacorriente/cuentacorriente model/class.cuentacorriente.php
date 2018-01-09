<?php


require("../../../dist/conexion.php");
//http://blog.reaccionestudio.com/instanciar-una-clase-dentro-de-otra-en-php-5/

	
		class Cuentacorriente{
		public $con;
		
		
		function __construct()
		{
		$this->con = new Conexion;
		
		}
		
		function __destruct(){
		$this->con = null;
		}	
		
					
					function info($planilla){
					$sql="select * from ges_programacion inner JOIN ges_centro_de_costos where Planilla='$planilla' and ges_programacion.cent_costo=ges_centro_de_costos.id";

					
					
					$cons=$this->con->Consultar($sql);
					if(isset($cons)){ 
					?>   
					<form method="post" >
					<?php
					while ($row=mysqli_fetch_array($cons)){
					echo '<div class="col-lg-6 col-xs-12">';
					echo 'Planilla N°: '. $row['Planilla'];
					
					echo '</div>';
					echo '<div class="col-lg-6 col-xs-6">';
					echo 'Conductor: '. $row['Conductor'];
					echo '</div>';
					echo '<div class="col-lg-6 col-xs-6">';
					echo 'Fecha°: '. $row['Fecha_ccu'];
					echo '</div>';
					echo '<div class="col-lg-6 col-xs-6">';
					echo 'Centro: '. $row['Descripcion'];
					echo '</div>';
					echo '<div class="col-lg-6 col-xs-6">';
					echo 'Corte: '. $row['Corte_ccu'];
					echo '</div>';
					echo '<div class="col-lg-6 col-xs-6">';
					echo 'N° de cargas: '. $row['N_cargas'];
					echo '</div>';
					echo '<br>';
					echo '<br>';
					echo '<br>';
					echo '<input type="text" value="'.$row['Planilla'].'" name="txtPlanilla" id="txtPlanilla" class="hidden"';
					
					?>
					<br />
					<br />
					<br />
					<?php $sqlvalorPlanilla="select * from cc_valores where planilla=$planilla ";
					$rsvalores=	$this->con->Consultar($sqlvalorPlanilla);
					while($rowValores=mysqli_fetch_array($rsvalores)){
					?>
					
					
					<div class="col-lg-3 "> Valor Planilla</div>
					<br>

					<div class="col-lg-3">
					<font color='black' >
					<input type="number" name="txtValorPlanilla" id="txtValorPlanilla" value="<?php echo $rowValores[1]; ?>" required="" />
					</font>
					</div>

					<div class="col-lg-9">
					
					<div class="col-lg-7 col-xs-12">
					<a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#ingresarGasto" ><i class="fa fa-credit-card" aria-hidden="true"></i>
					&nbsp;Gastos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					
					<div class="col-lg-5 col-xs-12"><a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#ingresarchequespendientes" ><i class="fa fa-list-alt" aria-hidden="true"></i>
					&nbsp;Cheques P</a>
					</div>
					
					</div>
					<br />
					<br />
					
					<div class="col-lg-3">Efectivo</div>
					<br>
					<div class="col-lg-3">
					<font color='black' >
					<input type="number" name="txtEfectivo" id="txtEfectivo" value="<?php echo $rowValores[2]; ?>" required="" />
					</font>
					</div>

					<div class="col-lg-9">
					<div class="col-lg-7 col-xs-12">
					<a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#chconta" >
					<i class="fa fa-address-card" aria-hidden="true"></i>
					&nbsp;Cheques C</a>
					</div>
					<div class="col-lg-5 col-xs-12">
					<a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#ingresoAbono" >
					<i class="fa fa-address-card" aria-hidden="true"></i>
					&nbsp; Abono&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					</div>

					<br />
					<br />
					<div class="col-lg-3">Cheque</div>
					<br>
					<div class="col-lg-3">
					<font color='black' >
					<input type="number" name="txtCheque" id="txtCheque" value="<?php echo $rowValores[3]; ?>" required=""/>
					</font>
					</div>

					<div class="col-lg-9">
					<div class="col-lg-7 col-xs-12">
					<a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#retiro" >
					<i class="fa fa-sign-out" aria-hidden="true"></i>
					&nbsp;Retiro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					<div class="col-lg-5 col-xs-12">
					<a class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#mod_cobros" >
					<i class="fa fa-money" aria-hidden="true"></i>
					&nbsp;Cobros&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					</div>

					<br />
					<br />
					<div class="col-lg-3">Promae</div>
					<br>
					<div class="col-lg-4">
					<font color='black' >
					<input type="number" name="txtPromae" id="txtPromae" value="<?php echo $rowValores[4]; ?>" required=""/>
					</font>
					</div>


					<div class="col-lg-5"></div>
					<br />
					<br />
					<div class="col-lg-3">Flete porteo</div>
					<br>
					<div class="col-lg-4">
					<font color='black' >
					<input type="number" name="txtflete" id="txtflete" value="<?php echo $rowValores[5]; ?>" required=""/>
					</font>
					</div>
					<div class="col-lg-5"></div>
					<?php } ?>
					<br />
					<br />
					<br />
					<br />
					<div align="center"><button  data-dismiss="modal" class="btn btn-primary open "><i class="fa fa-floppy-o" aria-hidden="true"></i>
					&nbsp;Guardar</button></div>
					</form>
					
					<?php
					
					
					
					
					}
					}
					
					}


				function JsonCargaValoresPlanilla($idplanilla){
				$sql="Select * from cc_valores where planilla='".$idplanilla."'";
				$rs=$this->con->Consultar($sql);
				if(!$rs){die("Error");
				}else{
				while($data = mysqli_fetch_assoc($rs)){
				$arreglo["data"][]=array_map("utf8_encode",$data);
				}
				echo  json_encode($arreglo);
				}
				mysqli_free_result($rs);
				
				}		
				
	}
	
	
	
	
	
	

		
		
	
		
		
							
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
			


?>