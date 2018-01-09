<?php
error_reporting(0);

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'sistcp');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ges_trabajadores ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT ges_trabajadores.Rut, ges_trabajadores.codigo_ayu, ges_trabajadores.codigo_cond, ges_trabajadores.Nombre, ges_trabajadores.Estado, int_cargo.Descripcion as cargo, ges_empresa.Nombre as empresa, ges_centro_de_costos.Descripcion as centro from ges_trabajadores INNER JOIN int_cargo INNER JOIN ges_empresa INNER JOIN ges_centro_de_costos where ges_trabajadores.Cargo_id=int_cargo.Id  and ges_trabajadores.Empresa_id=ges_empresa.Id and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id and ((ges_trabajadores.Nombre like '%$busq%' )or (ges_centro_de_costos.Descripcion  like '%$busq%')or(int_cargo.Descripcion like '%$busq%') or (ges_trabajadores.Rut like '%$busq%'))  order by Rut LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
		<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>Rut</th>
				  <th>codigo</th>
				  <th>Nombre</th>
				  <th>Empresa</th>
				  <th>Cargo</th>
                   <th>Centro</th>
                  <th>Editar</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $row['Rut'];?></td>
					<td><?php echo $row['codigo_ayu'];?></td>
					<td><?php echo $row['Nombre'];?></td>
					<td><?php echo $row['Nombre'];?></td>
					<td><?php echo $row['cargo'];?></td>
                    <td><?php echo $row['centro'];?></td>
                    <td><button type='button' class='btn btn-info btn-xs' data-toggle='modal' data-target='#dataUpdate'   id='target' data-id="<?php echo $row['Rut'];?>" ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<div class="table-pagination pull-right">
			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
		</div>
		
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>

 <div class="modal fade"  id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">  
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  <h4 class="modal-title">Editar</h4>
  <div class="modal-body">
  <p id="tabla"></p>
  </div>   
  </div>
  </div>
  </div>
  
   <script>

$('#dataUpdate').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) // Botón que activó el modal
	
	 var codigo = button.data('id')	 

	
	 var consulta = codigo;
	 
	  $.ajax({
                    type: "POST",
                    url: "ajax/modal_editar_trabajadores.php",
                    data: "b="+consulta,
                    beforeSend: function(){
                          //imagen de carga
						
                          $("#tabla").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){
						                                                     
                          $("#tabla").empty();
                          $("#tabla").append(data);
						                                                               
                    }
              });
              
});
       
</script>