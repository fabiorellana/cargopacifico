<?php
sleep(1);
include("../../model/cuentacorriente/MantenedorClass.php");
$consulta= new Mantenedor;
$val=$_POST['planilla'];
$sql="select count(Planilla), Planilla, Fecha, Centro, Corte, Cargas, Chofer from cc_history where Planilla=$val";

$rs=$consulta->con->Consultar($sql);

while($row=mysqli_fetch_array($rs)){
	if($row[0]==0){echo "No existen Registros para la planilla ingresada";exit();}
?>
<div align="center" >
<table width="100%" border="0">
<tr>
<td>Planilla N°:<?php echo $row['1'];?></td>
<td>Fecha: <?php echo $row['2'];?></td>
</tr>
<tr>
<td>Conductor: <?php echo $row['3'];?></td>
<td>Centro: <?php echo $row['4'];?></td>
</tr>
<tr>
<td>Corte: <?php echo $row['5'];?></td>
<td>Cargas: <?php echo $row['6'];?></td>
</tr>
</table>
</div>
<?php } ?>