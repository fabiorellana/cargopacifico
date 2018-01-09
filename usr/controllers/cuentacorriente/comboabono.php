<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;
$combobox->comboabono("select * from cc_is_abono", "comboABono");