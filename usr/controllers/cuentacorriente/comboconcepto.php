<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;
$combobox->listarbox("select * from cc_is_concepto", "comboconcepto");