<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$rs    = $tabla->con->Consultar("SELECT * FROM cc_retiro where planilla = '$id'");

?>
<br>

			<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
			<tr class="bg-primary">
			<th >Monto</th>
			<th>Motivo</th>
			<th>Eliminar</th>
			</tr>

<?php while ($row = mysqli_fetch_array($rs)) {?>
				<tbody>
				<tr>
				<td class="hidden"> <?php echo $row['0'];?></td>
				<td><?php echo "$".$row['monto'];?></td>
				<td><?php echo $row['motivo'];?></td>
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

							var planilla= data.trim().split('\n')[0].trim();

							$.ajax(
							{
							url: 'controllers/cuentacorriente/eliminaretiro.php',
							method: 'POST',
							data: {planilla:planilla},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")
							cargaTablaRetiro(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>