<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$rs    = $tabla->con->Consultar("SELECT cc_cheque_contabilidad.planilla, cc_cheque_contabilidad.N_cheque as nchequeconta, cc_is_banco.nombre as nombanco, cc_is_cliente.Nombre as nomcliente, cc_cheque_contabilidad.estado as estadoconta, cc_cheque_contabilidad.Fecha as fechaconta, cc_cheque_contabilidad.Observacion as obsconta, cc_cheque_contabilidad.Monto  as montoconta from cc_cheque_contabilidad inner join cc_is_banco inner join cc_is_cliente 
where cc_cheque_contabilidad.planilla = '$id'");

?>
<br>
							<div class="table-responsive">
							<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
							<tr class="bg-primary">
							<th>N° cheque</th>
							<th>Banco</th>
							<th>Cliente</th>
							<th>Monto</th>
							<th>Fecha</th>
							<th>Estado</th>
							<th>Observación</th>
							<th></th>

							</tr>

<?php while ($row = mysqli_fetch_array($rs)) {
	?>

	<?php
	//estado
	switch ($row['estadoconta']) {
		case 1:
			$estado = "Depositado";
			break;
		case 2:
			$estado = "Pendiente de deposito";
			break;
	}
	?>
	<tbody>
									<tr>
									<td class="hidden"> <?php echo $row['0'];?></td>
									<td><?php echo $row['nchequeconta'];?></td>
									<td><?php echo $row['nombanco'];?></td>
									<td><?php echo $row['nomcliente'];?></td>
									<td><?php echo $row['montoconta'];?></td>
									<td><?php echo $row['fechaconta'];?></td>
									<td><?php echo $estado;?></td>
									<td><?php echo $row['obsconta'];?></td>
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

							swal({
							title: '¿Estas seguro de eliminar este registro?',
							text: "",
							type: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#FF0000',
							confirmButtonText: 'Aceptar',
							cancelButtonText: "No",
							cancelButtonColor: '#398F13',
							animation: true
							}).then(function () {

							var idPlanilla= data.trim().split('\n')[0].trim();

							$.ajax(
							{
							url: 'controllers/cuentacorriente/eliminachconta.php',
							method: 'POST',
							data: {planilla:idPlanilla},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")
							cargaTablachconta(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>