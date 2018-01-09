<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$rs    = $tabla->con->Consultar("select cc_is_gastos.descripcion, cc_gastos.Monto, cc_gastos.Observacion, cc_gastos.id from cc_gastos inner join cc_is_gastos where Planilla='$id' and cc_gastos.Id_gasto=cc_is_gastos.id");

?>
<br>

			<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
			<tr class="bg-primary">
			<th >Gasto</th>
			<th>Observación</th>
			<th>Monto</th>
			<th>Eliminar</th>
			</tr>

<?php while ($row = mysqli_fetch_array($rs)) {?>
				<tbody>
				<tr>
				<td class="hidden"> <?php echo $row['3']?></td>
				<td><?php echo $row['0']?></td>
				<td><?php echo $row['2']?></td>
				<td><?php echo "$".$row['1']?></td>
				<td><div align="center"><button class="editar"><i class="fa fa-trash " aria-hidden="true"></i>
				</button></div></td>
				</tr>
				</tbody>
	<?php }?>
			</table>

					<script>
					$("#tabla tbody").on("click", "button.editar", function(){
					var data =  $(this).parents("tr").text();

							swal({
							title: '¿Estas seguro de eliminar gasto?',
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
							url: 'controllers/cuentacorriente/eliminagasto.php',
							method: 'POST',
							data: {planilla:idPlanilla},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")
							cargaTablaGastos(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>