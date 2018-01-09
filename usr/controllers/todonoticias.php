
<?php
session_start();

error_reporting(0);

include "../../funciones/funciones.php";
$cnn=Conectar();
//recupera ajax

$busq=$_POST['c'];
echo $busq;

	//busca con Titular
$sql="SELECT * FROM int_noticias  where titular like '%$busq%'";

	




	






$rs=mysql_query($sql,$cnn);
?>
<br>
		<table class='table table-condensed table-hover' align='center'>
				<tr class="success">
				<th> <b> Fecha </b> </th>
				<th> <b> Titular</b> </th>
				<th> <b> noticia </b> </th>
				<th> </th>
                <th> </th>
                <th> </th>
			
				</tr>
	<?php			
while($row=mysql_fetch_array($rs)){
	?>
	
 				<tr>
				<td><?php echo $row['fecha'] ; ?></td>
			    <td> <?php echo cutString($row['titular'], 50);?></td>
                <td> <?php echo cutString($row['noticia'], 60);?></td>
              
				              
				<td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate"   id="target" data-id="<?php echo $row['id']?>" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Ver</button></th>
				<td><a href="eliminar_noticia.php?id=<?php echo $row['id'] ?>" class="Eliminar usuario btn btn-danger" >Eliminar</a></td>
                 	 </tr>
				 <?php	}?>
			
  			

</table>

 
  <div class="modal fade"  id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
       
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title">Editar Noticia</h4>
          
          
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
                    url: "ajax/modaleditarnoticia.php",
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