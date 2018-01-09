<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;
$combobox->listarbox("select * from ges_centro_de_costos", "comboCentro");