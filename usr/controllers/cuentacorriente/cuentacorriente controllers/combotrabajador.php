<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;

$combobox->ComboTrabajador("select Rut, Nombre, Descripcion from ges_trabajadores inner join ges_centro_de_costos where Cargo_id='2' and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id
", "comboTrabajador");