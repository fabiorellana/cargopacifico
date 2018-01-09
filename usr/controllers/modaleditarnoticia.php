<?php 
$cons=$_POST['b'];
include "../../funciones/funciones.php";
$cnn=Conectar();
$sql="select * from int_noticias where id=".$cons."";

$rs=mysql_query($sql, $cnn);

while($row=mysql_fetch_array($rs)){


?>
<form method="post" action="updatenoticias.php">
<div class="form-group">
<input type="text" name="id"  class="hidden" value="<?php echo $row['id'];?>">

<div class=" col-lg-12 ">
            <label for="codigo" class="control-label">Fecha</label>
            <input type="date" class="form-control " id="rut" name="Fecha"  value="<?php echo $row['fecha'];?>"">
			</div>
            </div>
            <div class="form-group">
          <div class=" col-lg-12">
		 
            <label for="nombre" class="control-label">Titular</label>
            <input type="text" class="form-control" id="nombre" name="Titular" value="<?php echo $row['titular'];?>"  >
          </div>
          </div>
          
           <div class="col-xs-12 col-md-12">
		  <div class="form-group">
            <label for="continente" class="control-label">Noticia</label>
            <textarea name="Noticia" rows="13"  class="form-control" id="Cargo" ><?php echo $row['noticia'];?></textarea> 
  		</div>
        </div>
        
        
        
       
        
        
      <br /><br />
      
		
   
		 
 		  
            
            
          
  <div class="modal-footer">
          <div class="form-group">
         
          <?php }?>
            <p>&nbsp;</p>
            
            <p><a class="btn btn-default" data-dismiss="modal">Cancelar</a>
              <input type="submit" value="Guardar" name="guardar" class="btn btn-primary">
            </p>
    </div>
            </div>
         </form>
       
		 
         
         
         
         