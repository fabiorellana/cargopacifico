<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$sql   = "SELECT cc_cheque_pendiente.id, cc_cheque_pendiente.N_cheque, cc_is_banco.nombre, cc_is_cliente.Nombre, cc_cheque_pendiente.concepto, cc_cheque_pendiente.Monto, cc_cheque_pendiente.estado, cc_cheque_pendiente.observacion, cc_is_concepto.concepto, cc_cheque_pendiente.Fecha from cc_cheque_pendiente inner JOIN cc_is_banco inner join cc_is_cliente inner JOIN cc_is_concepto where cc_cheque_pendiente.Banco_id=cc_is_banco.id and cc_cheque_pendiente.cliente_id=cc_is_cliente.id and cc_cheque_pendiente.concepto=cc_is_concepto.id
and Planilla ='$id'";

$rs = $tabla->con->Consultar($sql);

?>
<br>

<div class="table-responsive">
<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
<tr class="bg-primary">
<th >N° cheque</th>
<th>Banco</th>
<th>Cliente</th>
<th>Concepto</th>
<th>estado</th>
<th>Observación</th>
<th>Monto</th>

<th></th>


</tr>
<?php while ($row = mysqli_fetch_array($rs)) {?>

	<?php
	//estado
	switch ($row['estado']) {
		case 1:
			$estado = "Pendiente";
			break;
		case 2:
			$estado = "Aceptado";
			break;
		case 3:
			$estado = "Efectivo";
			break;
		case 4:
			$estado = "Contabilidad";
			break;
		case 5:
			$estado = "Nulo";
			break;
	}
	?>
												<tbody>
												<tr>
												<td class="hidden"> <?php echo $row['0']?></td>
												<td><?php echo $row['N_cheque']?></td>
												<td><?php echo $row['nombre']?></td>
												<td><?php echo $row['Nombre']?></td>
												<td><?php echo $row['concepto']?></td>
												<td><?php echo $estado;?></td>
												<td><?php echo $row['observacion']?></td>
												<td><?php echo $row['Monto']?></td>
												<td><div align="center"><button class="editar"><i class="fa fa-trash " aria-hidden="true"></i>
												</button></div></td>
												</tr>
												</tbody>
	<?php }?>
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
								alert(id);
							$.ajax(
							{
							url: 'controllers/cuentacorriente/eliminachp.php',
							method: 'POST',
							data: {id:id},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")

							cargatablachpendiente(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>