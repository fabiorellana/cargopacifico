<?php

/**
 *Mantenedor
 */
//archivo de conexion
require ("../../../dist/conexion.php");

class Mantenedor {
	public $con;
	function __construct() {
		$this->con = new Conexion;

	}

	function __destruct() {
		$this->con = null;
	}

	function Agregar($tabla, $valores) {
		$insert    = "insert into $tabla values ($valores)";
		$resultado = $this->con->Consultar($insert);
		if (!$resultado) {echo "<script>alert('hubo un error')</script>";}

	}

	function Editar($tabla, $valores, $where) {
		$update = "update $tabla set $valores where $where";
		echo $update;
		$resultado = $this->con->Consultar($update);
		if (!$resultado) {echo "hubo un error al actualizar los registros";}
	}

	function Eliminar($tabla, $where) {
		$delete    = "delete from $tabla  where $where";
		$resultado = $this->con->Consultar($update);
		if (!$resultado) {echo "hubo un error al Eliminar los registros";}
	}

	function Json($consulta) {

		$query     = $consulta;
		$resultado = $this->con->Consultar($query);
		if (!$resultado) {die("Error");
		} else {
			while ($data = mysqli_fetch_assoc($resultado)) {
				$arreglo = array_map("utf8_encode", $data);
			}
			echo json_encode($arreglo);
		}
		mysqli_free_result($resultado);
	}

	function JsonCuentaC() {
		session_start();
		$rut = $_SESSION["Rut"];
		//consulta centros para cuenta corriente
		$sqlCentros = "select centro from cc_permisos_centros where Rut='$rut'";
		$rs         = $this->con->Consultar($sqlCentros);
		$i          = 0;
		while ($row = mysqli_fetch_array($rs)) {
			$centro[$i] = $row['centro'];
			$i++;
		}
		if ($centro[0] == 1000) {$where = "";} else { $where = " Centro ='".$centro[0]."' or Centro='".$centro[1]."' or Centro='".$centro[2]."'";}

		$query     = "SELECT cc_history.Planilla, cc_history.Fecha, ges_centro_de_costos.Descripcion as Centro, cc_history.Corte, cc_history.Cargas, cc_history.Chofer, cc_history.Chofer, cc_history.Valor, cc_history.Efectivo, cc_history.Cheque, cc_history.Promae, cc_history.Total_ingreso_1, cc_history.Gastos, cc_history.Ch_pendiente, cc_history.Ch_conta, cc_history.Abono, cc_history.Retiro, cc_history.Total_ingreso, cc_history.Cobros, cc_history.Diferencias, cc_history.Flete_porteo FROM `cc_history` INNER JOIN ges_centro_de_costos where cc_history.Centro=ges_centro_de_costos.id and $where";
		$resultado = $this->con->Consultar($query);
		if (!$resultado) {die("Error");
		} else {
			while ($data = mysqli_fetch_assoc($resultado)) {
				$arreglo["data"][] = array_map("utf8_encode", $data);
			}
			echo json_encode($arreglo);
		}
		mysqli_free_result($resultado);
	}

	//nombre de la tabla
	function listarbox($sql, $nombre) {

		$rs = $this->con->Consultar($sql);
		if ($rs == true) {
			echo "<select name=".$nombre." id=".$nombre."  class='form-control' required>";
			echo "<option value=''></option>";
			while ($row = mysqli_fetch_array($rs)) {

				echo "<option value=".$row['0'].">".$row['0']." &nbsp;--&nbsp; ".$row['2']."</option>";

			}
			echo "</select>";
		}
	}

	//item cuenta corriente gastos

	//nombre de la tabla
	function combo_item_gastos($sql, $nombre) {

		$rs = $this->con->Consultar($sql);
		if ($rs == true) {
			echo "<select name=".$nombre." id=".$nombre."  class='form-control' required>";
			echo "<option value=''></option>";
			while ($row = mysqli_fetch_array($rs)) {

				echo "<option value=".$row['0'].">".$row['0']." &nbsp;--&nbsp; ".$row['1']."</option>";

			}
			echo "</select>";
		}
	}

	//nombre de la tabla
	function ComboTrabajador($sql, $nombre) {

		$rs = $this->con->Consultar($sql);
		if ($rs == true) {
			echo "<select name=".$nombre." id=".$nombre."  class='form-control' required>";
			echo "<option value=''></option>";
			while ($row = mysqli_fetch_array($rs)) {

				echo "<option value=".$row['0'].">".$row['2']."&nbsp;&nbsp;&nbsp;      ".$row['1']."</option>";

			}
			echo "</select>";
		}
	}

}