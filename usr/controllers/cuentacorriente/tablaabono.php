<?php
$id = $_POST['planilla'];
require ("../../model/cuentacorriente/MantenedorClass.php");
$tabla = new Mantenedor;
$rs    = $tabla->con->Consultar("SELECT cc_abono.Planilla, cc_abono.N_nota_credito as nfactura, cc_is_abono.concepto as conceptoabono, cc_abono.monto as montoabono, autorizaciones.Nombre as nombreautorizacion, cc_abono.Observaciones as obsabono FROM cc_abono INNER JOIN cc_is_abono INNER JOIN autorizaciones where cc_abono.Planilla = '$id'" );

?>
<br>

			<table width="100%"  class="table table-condensed table-bordered " id="tabla" >
			<tr class="bg-primary">
			<th >N° Factura</th>
			<th>Concepto</th>
			<th>Autorizado</th>
			<th>Monto</th>
			<th>Observaciones</th>
			<th>Eliminar</th>
			</tr>

<?php while ($row = mysqli_fetch_array($rs)) {?>
				<tbody>
				<tr>
				<td class="hidden"> <?php echo $row['0'];?></td>
				<td><?php echo $row['nfactura'];?></td>
				<td><?php echo $row['conceptoabono'];?></td>
				<td><?php echo $row['nombreautorizacion'];?></td>
				<td><?php echo "$".$row['montoabono'];?></td>
				<td><?php echo $row['obsabono']; ?></td>
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
							url: 'controllers/cuentacorriente/eliminaabono.php',
							method: 'POST',
							data: {planilla:planilla},
							beforeSend: function () {
							},
							success: function (data) {
							swal("Registro Eliminado", "", "success")
							cargaTablaAbono(<?php echo $id;?>);

							},
							error: function (error) {
							console.log("Errors:" + error);
							}
							});

							});
					})
					</script>