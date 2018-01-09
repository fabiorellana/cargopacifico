 <?php
$id=$_POST['id_planilla'];
include("../../../model/gestion/Programacion/class.php");
$editar = new Ges_prog;
$editar->carga_update_programacion($id);
