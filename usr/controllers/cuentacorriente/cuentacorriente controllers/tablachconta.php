<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$rs    = $tabla->con->Consultar("SELECT cc_cheque_contabilidad.planilla, cc_cheque_contabilidad.N_cheque, cc_is_banco.nombre as banco, cc_is_cliente.Nombre as cliente, cc_cheque_contabilidad.Monto, cc_cheque_contabilidad.Fecha, cc_cheque_contabilidad.Observacion, cc_cheque_contabilidad.estado FROM `cc_cheque_contabilidad` inner JOIN cc_is_banco INNER JOIN cc_is_cliente WHERE cc_cheque_contabilidad.Banco_id=cc_is_banco.id and cc_cheque_contabilidad.Rut_cliente=cc_is_cliente.rut
	and Planilla ='$id'");

?>
<br>
							<div class="table-responsive">
							<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
							<tr class="bg-primary">
							<th >N° cheque</th>
							<th>Banco</th>
							<th>Cliente</th>
							<th>Monto</th>
							<th>Fecha</th>
							<th>estado</th>
							<th>Observación</th>
							<th></th>

							</tr>

<?php while ($row = mysqli_fetch_array($rs)) {
	?>
	<tbody>
									<tr>
	<?php $id = $row['N_cheque']?>
									<td class="hidden"> <?php echo $row['0']?></td>
									<td><?php echo $row['N_cheque']?></td>
									<td><?php echo $row['banco']?></td>
									<td><?php echo $row['cliente']?></td>
									<td><?php echo $row['concepto']?></td>
									<td><?php echo $row['Fecha']?></td>
									<td><?php echo $row['estado']?></td>
									<td><?php echo $row['Monto']?></td>
									<td><?php echo $row['observacion']?></td>
									<td><div align="center"><button class="editar"><i class="fa fa-trash " aria-hidden="true"></i>
									</button></div></td>
									</tr>
									</tbody>
	<?php
}
?>
						</table>
						</div>
					<script>
					$("#tabla tbody").on("click", "button.editar", function(){
					var data =  $(this).parents("tr").text();
					var id= data.trim().split('\n')[0].trim();

							swal({
							title: '¿Eliminar?',
							text: "",
							type: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#FF0000',
							confirmButtonText: 'Aceptar',
							cancelButtonText: "No",
							cancelButtonColor: '#398F13',
							animation: true
							}).then(function () {
							$.ajax(
							{
							url: 'controllers/cuentacorriente/eliminachP.php',
							method: 'POST',
							data: {id:id},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")

							cargaTablachP(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>