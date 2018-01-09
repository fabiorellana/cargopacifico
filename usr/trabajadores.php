<?php require('include/valida.php');?>
<!DOCTYPE html>
<html>
<?php require('include/header.php');?>
<body class="hold-transition skin-blue sidebar-mini">

<div class="">

   <header class="main-header">
  <?php include_once "include/menu_arriba.php";?>
   </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
    <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "include/menu.php";?> 
      </ul>
    </section>
  </aside>

  
</div>
</div>

  <!-- pagina -->
  
   <div class="content-wrapper"   id="contenedor" >
   <br class="hidden-xs"><br class="hidden-xs"> <br>
   <ol class="breadcrumb"><li><a href="ver_gerencia.php" >Administrar Trabajadores</a></li></ol>


            
             
         <!--- aquiiiiiiiiiiiiiiii -->
 <div class="container-fluid">
 <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#crear_empresa" ><i class="fa fa-plus" aria-hidden="true" > &nbsp;Crear Empresa</i></a>
 <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#cargos" ><i class="fa fa-address-book-o" aria-hidden="true"></i> &nbsp;Crear Cargos</i></a>
 <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#Crar_trabajador" ><i class="fa fa-address-card" aria-hidden="true"></i> &nbsp;Crear trabajador</i></a>
 </div>         
              <div class="container-fluid">
              
              <div class="col-sm-offset-2 col-sm-8">
              <h3 class="text-center"> <small class="mensaje"></small></h3>
              </div>
              <div class="table-responsive col-sm-12">    
              <table id="dt_trabajadores" class="table table-bordered table-hover" width="100%" >
              <thead>
              <tr>                
              <th>Rut</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>Empresa</th>  
              <th>Centro</th> 
              <th></th>                 
              </tr>
              </thead>          
              </table>
              </div>      
              
              </div>




 


<!-- ./wrapper -->
<?php require('include/footer.php');?>






    
</body>
            

              <!-- Modal editar -->
              <form id="" action="carga_datos/trabajadores/update_trabajadores.php" method="POST">
              <div class="modal fade" id="EditarTrabajador" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="modalEliminarLabel">Editar Trabajador</h4>
              </div>
              <div class="modal-body">              
              <input type="text" placeholder="Rut" name="txtRut" id="txtRut" class="form-control hidden"  >
              <br>
              <label for="ejemplo_password_3" class="" >Nombre Completo<b ></b></label>
              <input type="text" placeholder="Nombre" name="txtNombre" id="txtNombre" class="form-control">
              <br>
              <label for="ejemplo_password_3" class="" >Empresa actual <b id="emp"></b></label>
              <select name="empresa" class="form-control" required="required">
              <option></option>
              
              <?php 
              require("model/conexion_pros.php");
              $cnn=Conectar();
              $sql_empresas="select * from ges_empresa where Estado=1";
              $rs_empresa=mysqli_query($cnn, $sql_empresas);
              while($row_empresa=mysqli_fetch_array($rs_empresa)){?>
              
              <option value="<?php echo $row_empresa['Id']?>"><?php echo $row_empresa['Nombre']?></option>
              <?php }?>
              </select>                 <br>
              <label for="ejemplo_password_3">Centro actual &nbsp; <b id="cce"></b></label>
              <select name="txtcentro" class="form-control" required="required">
              <option></option>
              
              <?php $sql_Centro="select * from ges_centro_de_costos";
              $rs_Centro=mysqli_query($cnn, $sql_Centro);
              while($row_Centro=mysqli_fetch_array($rs_Centro)){?>
              
              <option value="<?php echo $row_Centro['id']?>"><?php echo $row_Centro['Descripcion']?></option>
              <?php }?>
              </select>     
              
              <br>
              <label for="ejemplo_password_3">Cargo actual &nbsp; <b id="carg"></b></label>
              <select name="cargo" id="" class="form-control">
              <option></option>
              <?php $sql_Cargo="select * from int_cargo";
              $rs_Cargo=mysqli_query($cnn, $sql_Cargo);
              while($row_Cargo=mysqli_fetch_array($rs_Cargo)){?>
              
              <option value="<?php echo $row_Cargo['Id']?>"><?php echo $row_Cargo['Descripcion']?></option>
              <?php }?>
              </select> 
              <br>
              <input type="text" placeholder="Dirección" name="txtDireccion" id="txtDireccion" class="form-control">
              <br>
              <input type="text" placeholder="Telefono" name="txtcelular" id="txtcelular" class="form-control">
              <br>
              <input type="text" placeholder="Fecha contrato" name="txtInicio" id="txtInicio" class="form-control">
              <br>
              <input type="text" placeholder="Termino de contrato" name="txttermino" id="txttermino" class="form-control">
              
              
              </div>
              <div class="modal-footer">
              <button type="submit"   class="btn btn-primary" >Guardar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              </div>
              </div>
              </div>
              </div>
              </form>





                           <!--crear trabajador -->
                           <div class="modal fade" id="Crar_trabajador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h4 class="modal-title">Crear Trabajador</h4>
                           </div>
                           <div class="modal-body">
                           <form class="form-horizontal" method="post">
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           <div class="col-lg-6 col-sm-5">
                           <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut" maxlength="8" required>
                           </div>
                           <div class="col-lg-2 col-sm-1">
                           <input type="text" class="form-control" id="dv" name="dv" placeholder="DV" maxlength="1" required>
                           </div>
                           <div class="col-lg-1 col-sm-1" name="destino" id="destinorut">
                           
                           </div>
                           </div>
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           <div class="col-lg-8">
                           <input type="text" class="form-control" id="nombre" name="nombre"    placeholder="Nombre completo" required>
                           </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           
                           <div class="col-lg-8">
                           <label for="ejemplo_password_3" class="control-label">Fecha de nacimiento</label>
                           
                           <input type="date" class="form-control" id="" name="fecnac"    placeholder="Nacimiento" required>
                           </div>
                           </div>
                           
                           
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           <div class="col-lg-8">
                           <input type="text" class="form-control" id="" name="direccion"    placeholder="Direccion" required>
                           </div>
                           </div>
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           <div class="col-lg-3">
                           <input type="text" class="form-control" id="" name="Ciudad"    placeholder="Ciudad" required>
                           </div>
                           <div class="col-lg-1 col-sm-3"></div>
                           <div class="col-lg-4">
                           <input type="text" class="form-control" id="" name="telefono"    placeholder="Telefono" required>
                           </div>
                           </div>
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           
                           <div class="col-lg-4">
                           <label for="ejemplo_password_3" class="" >Empresa</label>
                           <select name="empresa" class="form-control" required="required">
                           <option></option>
                           
                           <?php $sql_empresas="select * from ges_empresa where Estado=1";
                           $rs_empresa=mysql_query($sql_empresas,$cnn);
                           while($row_empresa=mysql_fetch_array($rs_empresa)){?>
                           
                           <option value="<?php echo $row_empresa['Id']?>"><?php echo $row_empresa['Nombre']?></option>
                           <?php }?>
                           </select>     
                           </div>
                           
                           
                           <div class="col-lg-4">
                           <label for="ejemplo_password_3">Centro de costos</label>
                           <select name="cc" class="form-control" required="required">
                           <option></option>
                           
                           <?php $sql_Centro="select * from ges_centro_de_costos";
                           $rs_Centro=mysql_query($sql_Centro,$cnn);
                           while($row_Centro=mysql_fetch_array($rs_Centro)){?>
                           
                           <option value="<?php echo $row_Centro['id']?>"><?php echo $row_Centro['Descripcion']?></option>
                           <?php }?>
                           </select>     
                           </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           
                           <div class="col-lg-8">
                           <label for="ejemplo_password_3" class="" required="required">Cargo</label>
                           
                           <select name="cargo" class="form-control">
                           <option></option>
                           <?php $sql_Cargo="select * from int_cargo";
                           $rs_Cargo=mysql_query($sql_Cargo,$cnn);
                           while($row_Cargo=mysql_fetch_array($rs_Cargo)){?>
                           
                           <option value="<?php echo $row_Cargo['Id']?>"><?php echo $row_Cargo['Descripcion']?></option>
                           <?php }?>
                           </select>     
                           </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           
                           <div class="col-lg-8">
                           <label for="ejemplo_password_3" >Tipo contrato</label>
                           
                           <select name="t_contrato" id="t_contrato" class="form-control" required="required">
                           <option></option>
                           
                           <?php $sql_tipo_contrato="select * from ges_tipo_contrato";
                           $rs_tipo_contrato=mysql_query($sql_tipo_contrato,$cnn);
                           while($row_tipo_contrato=mysql_fetch_array($rs_tipo_contrato)){?>
                           
                           <option value="<?php echo $row_tipo_contrato['id']?>"><?php echo $row_tipo_contrato['Tipo']?></option>
                           <?php }?>
                           </select>     
                           </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-lg-2 col-sm-5"></div>
                           
                           <div class="col-lg-4">
                           <label for="ejemplo_password_3" >Fecha contrato</label>
                           
                           <input type="date" class="form-control" id="feccontrato" name="feccontrato"    placeholder="" required>
                           </div>
                           <div class="col-lg-4">
                           <label for="ejemplo_password_3" >Fecha Termino de contrato</label>
                           
                           <input type="date" class="form-control" id="" name="fectermino"    placeholder="">
                           </div>
                           </div>
                           
                           
                           <div class="form-group">
                           <div class="col-lg-12" align="center">
                           <input type="submit" class="btn btn-success"  name="crear" value="Crear">
                           </div>
                           </div>
                           </form>
                           <?php if($_POST['crear']=="Crear"){
                           $rut=$_POST['rut'];
                           $dv=$_POST['dv'];
                           $nombre=$_POST['nombre'];
                           $fecnac=$_POST['fecnac'];
                           $direccion=$_POST['direccion'];
                           $ciudad=$_POST['Ciudad'];
                           $telefono=$_POST['telefono'];
                           $empresa=$_POST['empresa'];
                           $centrocosto=$_POST['cc'];
                           $cargo=$_POST['cargo'];
                           $tipocontrato=$_POST['t_contrato'];
                           $iniciocontrato=$_POST['feccontrato'];
                           $terminocontrato=$_POST['fectermino'];
                           $rutcompleto=$rut."-".$dv;
                           
                           crea_trabajador($rutcompleto, $nombre, $cargo, $empresa, $centrocosto, $direccion, $telefono, $fecnac, $ciudad, $iniciocontrato, $tipocontrato, $terminocontrato);
                           
                           $descripcion="Trabajador Rut $rutcompleto creado";
                           guarda_log($idusr, $cc, $descripcion);
                           
                           
                           
                           }?>
                           
                           </div>
                           </div>
                           </div>
                           </div>
<!-- fin crear trabajador-->

                           <!--crear cargos -->
                           <div class="modal fade" id="cargos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h4 class="modal-title">Crear Cargo</h4>
                           </div>
                           <div class="modal-body">
                           <form class="form-horizontal" method="post">
                           
                           <div class="form-group">
                           
                           <div class="col-lg-12">
                           <input type="text" class="form-control" id="" name="nombre"    placeholder="Nombre del cargo">
                           <br />
                           <div align="center"> <input type="submit" class="btn btn-success" name="btn_crear_cargo" value="Crear"></div>
                           
                           </div>
                           </div>
                           </form>




                           <?php if($_POST['btn_crear_cargo']=="Crear"){
                           $nombre=$_POST['nombre'];
                           crea_cargo($nombre);
                           $descripcion="Cargo $nombre creado";
                           guarda_log($id_usr, $cc, $descripcion);
                           }?>
                           
                           <h2 align="center">Cargos</h2>
                           <table width="200" border="0" class="table table-striped table-hover">
                           <tr class="success">
                           <td>#</td>
                           <td>Nombre</td>
                           
                           </tr>
                           <?php $sql_empresas="select * from int_cargo";
                           $rs_empresa=mysql_query($sql_empresas,$cnn);
                           while($row_empresa=mysql_fetch_array($rs_empresa)){
                           
                           ?>
                           <tr>
                           <td><?php echo $row_empresa['Id']?></td>
                           <td><?php echo $row_empresa['Descripcion']?></td>
                           </tr>
                           <?php }?>
                           </table>
                           </div>
                           </div>
                           </div>
                           </div>
<!-- fin crear cargos-->


            
            <!-- Crear empresa-->
            <div class="modal fade" id="crear_empresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Crear Empresa</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="post">
            <div class="form-group">
            <label for="ejemplo_email_3" class="col-lg-2 control-label">Rut</label>
            
            <div class="col-lg-7 col-sm-5">
            <input type="text" class="form-control" id="" name="rut" placeholder="Rut" maxlength="8">
            </div>
            <div class="col-lg-2 col-sm-1">
            <input type="text" class="form-control" id="" name="dv" placeholder="DV">
            </div>
            </div>
            
            <div class="form-group">
            <label for="ejemplo_password_3" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-9">
            <input type="text" class="form-control" id="" name="nombre"    placeholder="Nombre">
            </div>
            </div>
            
            <div class="form-group">
            <div class="col-lg-12" align="center">
            <input type="submit" class="btn btn-success" name="crear_empresa" value="Crear">
            </div>
            </div>
            </form>
            <?php if($_POST['crear_empresa']=="Crear"){
            $rut=$_POST['rut'];
            $dv=$_POST['dv'];
            $rutcompleto=$rut."-".$dv;
            $nombre=$_POST['nombre'];
            crea_empresa($rutcompleto, $nombre);
            $descripcion="Empresa RUT $rutcompleto nombre $nombre creada";
            guarda_log($id_usr, $cc, $descripcion);
            
            }?>
            
            <h2 align="center">Empresas</h2>
            
            <table width="527" border="0" class="table table-striped table-hover">
            <tr class="success">
            <td width="108">Rut</td>
            <td width="293">Nombre</td>
            <td width="112">Estado</td>
            
            </tr>
            <?php $sql_empresas="select * from ges_empresa";
            $rs_empresa=mysql_query($sql_empresas,$cnn);
            while($row_empresa=mysql_fetch_array($rs_empresa)){
            
            ?>
            <tr>
            <td><?php echo $row_empresa['Rut']?></td>
            <td><?php echo $row_empresa['Nombre']?></td>
            <td><?php if($row_empresa['Estado']==1){echo'<button  type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
            </button> ';}else{echo'<button  type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>
            
            </button> ';}?></td>
            </tr>
            <?php }?>
            </table>
            </div>
            </div>
            </div>
            </div>
<!-- fin crear empresa -->

                                <script>
                                $(document).ready(function() {
                                listar();
                                verificarRut();
                                $("#btnColapse").trigger("click");
                                });
                                function verificarRut(){
                                $("#nombre").focus(function(evento){					
                                var rut = $("#rut").val();
                                var validador = $("#dv").val();
                                evento.preventDefault();
                                $('#destinorut').html('<div><img src="../images/ajax-loader.gif"/></div>');
                                $("#destinorut").load("../funciones/verificarrut.php", {Rut: rut, Verf: validador}, function(){ })
                                });
                                
                                }                                   

                   function listar(){
                   var table = $("#dt_trabajadores").DataTable({
                   
                   
  
                   language: {
                 "sProcessing":     "Procesando...",
                 "sLengthMenu":     "Mostrar _MENU_ registros",
                 "sZeroRecords":    "No se encontraron resultados",
                 "sEmptyTable":     "Ningún dato disponible en esta tabla",
                 "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                 "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                 "sInfoPostFix":    "",
                 "sSearch":         "Buscar:",
                 "sUrl":            "",
                 "sInfoThousands":  ",",
                 "sLoadingRecords": "Cargando...",
                 "oPaginate": {
                 "sFirst":    "Primero",
                 "sLast":     "Último",
                 "sNext":     "Siguiente",
                 "sPrevious": "Anterior"
                 },
                 "oAria": {
                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                 }
                   },
                   
                   "ajax":{
                   "method":"POST",
                   "url":"controllers/gestion/Trabajadores/listar_trabajadores.php"
                   },
                   
                   "columns":[
                   {"data":"Rut"},
                   {"data":"Nombre"},
                   {"data":"cargo"},
                   {"data":"empresa"},
                   {"data":"centro"},
                   
                   {"defaultContent":"<button type='button' class='editar btn btn-success btn-xs' data-toggle='modal' data-target='#EditarTrabajador'><i class='fa fa-pencil-square-o' ></i></button>  <button type='button' class='eliminar btn btn-danger btn-xs' id='btnEliminar' ><i class='fa fa-trash-o'></i></button>"}
                   
                   ]
                   
                   })
                   
                   ObtenerDataEditar("#dt_trabajadores tbody", table);
                   ObtenerDataEliminar("#dt_trabajadores tbody", table);
                   }
                   
                   var ObtenerDataEditar = function (tbody, table){
                   $(tbody).on("click", "button.editar", function(){
                   var data = table.row( $(this).parents("tr")).data();
                   $("#txtRut").val(data.Rut);
                   $("#txtNombre").val(data.Nombre);
                   $("#emp").text(data.empresa);
                   $("#cce").text(data.centro);
                   $("#carg").text(data.cargo);
                   $("#txtDireccion").val(data.Direccion);
                   $("#txtCelular").val(data.Celular);
                   $("#txtInicio").val(data.Fecha_contrato);
                   $("#txttermino").val(data.Fecha_termino_contrato);


                   
                   
                   })
                   }

                   var ObtenerDataEliminar = function (tbody, table){
                   $(tbody).on("click", "button.eliminar", function(){
                   var data = table.row( $(this).parents("tr")).data();
                   alert ('hola');
                   swal({
                   title: '¿Estas seguro de Eliminar al trabajador?',
                   text: ""+data.Nombre+"",
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Si, Eliminalo'
                   }).then(function () {
                   swal(
                   'Eliminado!',
                   'El trabajador '+data.Nombre+' fue eliminado',
                   'success'
                   )
                   })

                   // Asumiendo que se realizó la petición al servidor
$.post('controllers/cuentacorriente/listar.php', {productos: productosJSON},
    function(respuesta) {
        // Convertir la cadena enviada desde PHP a un vector de objetos en JavaScript
        lista = JSON.parse(respuesta);
 
        // Recorrer el vector de objetos e imprimir la propiedad "nombre" en la consola
        for(var i in lista){
            console.log(lista[i].nombre);
        }
}).error(
    function(){
        console.log('Error al ejecutar la petición');
    }
);
                   })
                   }

                    
  </script>
</html>