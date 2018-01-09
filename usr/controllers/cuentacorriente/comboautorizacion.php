<?php
require("../../model/cuentacorriente/MantenedorClass.php");
$combobox = new Mantenedor;
$combobox->comboautorizado("select * from autorizaciones", "comboAUtorizado");