<?php
require ("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;
$combobox->combo_item_gastos("select * from cc_is_gastos", "comboGAstos");