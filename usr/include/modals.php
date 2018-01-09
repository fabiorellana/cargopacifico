<!-- crear noticia -->
<div class="modal fade" id="crear_noticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     		<div class="modal-dialog">
        	<div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Crear noticia</h4>
          	</div>
          	<div class="modal-body">
             <form action="" method="post" enctype="multipart/form-data"  >
              <div class="form-group has-success">
                  <input  type="date" class="form-control " id="fecha" name="fecha" />
                </div>
                <div class="form-group has-success">
                  <input  type="text" class="form-control " placeholder="Titular" id="titular" name="titular" />
                </div>
             
                <div class="form-group">
                  <textarea name="noticia" rows="13"   class="form-control " id="noticia"></textarea>
                </div>
               Subir imagen:
              <input type="file" name="uploadedfile" id="imagen" />
                <div id="respuesta"></div>
                <br />
                
                <input type="submit" class="btn btn-success" name="publicar" value="Publicar" />
                <?php if($_POST['publicar']=="Publicar"){
					
					
					$fecha=$_POST['fecha'];
					$titular=$_POST['titular'];
					$noticia=$_POST['noticia'];
					
					
					
											//subir archivo
										  
						$uploadedfileload="true";
						$uploadedfile_size=$_FILES['uploadedfile'][size];
						echo $_FILES['uploadedfile'][name];
						if ($_FILES['uploadedfile'][size]>2000000)
						{$msg=$msg."El archivo es mayor que 2 MB, debes reduzcirlo antes de subirlo<BR>";
						$uploadedfileload="false";}
						
						if (!($_FILES['uploadedfile'][type] =="image/jpeg" OR $_FILES['uploadedfile'][type] =="image/gif" OR $_FILES['uploadedfile'][type] =="image/png"))
						{$msg=$msg." Tu archivo tiene que ser JPG, PNG o GIF. Otros archivos no son permitidos<BR>";
						$uploadedfileload="false";}
						
						$file_name=$_FILES['uploadedfile'][name];
						$add="img_noticias/$file_name";
						if($uploadedfileload=="true"){
						
						if(move_uploaded_file ($_FILES['uploadedfile'][tmp_name], $add)){
						echo " Noticia creada satisfactoriamente";
						$sql="insert into int_noticias values('','$fecha','$titular','$add','$noticia')";
						mysql_query($sql, $cnn);
						}else{echo "Error al crear noticia ";}
						
						}else{echo $msg;}}
						?>
						
									  </form>
      
          </div>
          </div>
          </div>
          </div>
          
<!--modal Mover -->
			<div class="modal fade" id="mover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     		<div class="modal-dialog">
        	<div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Seleccionar carpeta</h4>
          	</div>
          	<div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdMover" class="hidden" name="txtidmover" />
            
            <select name="select_carpeta" class="form-control">
           	<option value="0">Principal</option>	  

            <?php $sql_carperta="select id, nombre from int_carpeta where rut_usr='$idusr'";
			
				 $rs_carpeta= mysql_query($sql_carperta, $cnn);
				  while($row_carpeta=mysql_fetch_array($rs_carpeta)){
					 ?> 
                    
			<option value="<?php echo $row_carpeta['id'] ?>" placeholder="Nombre de la carpeta" required><?php echo $row_carpeta['nombre']?></option>
			<?php } ?> 
            </select>
            <br />          
        <div class="modal-footer">
       
            <a class="btn btn-default" data-dismiss="modal">Cancelar</a>
           <input type="submit" class="btn btn-success" value="Mover" name="mover" />
        </div>
           </form>
           <?php 
		   if($_POST['mover']=="Mover"){
		   $idmover=$_POST['txtidmover'];
		   $id_carpeta=$_POST['select_carpeta'];
		   
		   $sqlmover="UPDATE `int_archivos` SET `carpeta_id` = '$id_carpeta' WHERE `int_archivos`.`id` = $idmover" ;
		   mysql_query($sqlmover, $cnn);
		   echo "<script>document.location ='misarchivos.php'</script>";
		   }
		   ?>
      
          </div>
          </div>
          </div>
          </div>
          
  <!--modal Renombrar -->
            <div class="modal fade" id="CambiarNombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Renombrar</h4>
            </div>
            <div class="modal-body">
            <form method="post">
            <input type="text" id="txtIdnombre" name="txtIdnombre" class="hidden" />
            <input type="text" placeholder="Nombre" class="form-control" name="txtnombrecarpeta" maxlength="30" required />
            <br />
            <br />
            <br />
          
        
            <a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Guardar" name="crear" />
		<?php 
		if($_POST['crear']=="Guardar"){
		
		$nuevonombre=$_POST['txtnombrecarpeta'];
		$idarchivo=$_POST['txtIdnombre'];
		
		$renombre="UPDATE `int_archivos` SET `nombre` = '$nuevonombre' WHERE `int_archivos`.`id` = $idarchivo";
		mysql_query($renombre, $cnn);
		echo "<script>document.location ='misarchivos.php'</script>";

		}
		
		?>
           </form>
          </div>
          </div>
          </div>
 		  </div>
 
 <!--modal eliminar -->
 		  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">¿Eliminar?</h4>
          </div>
          <div class="modal-body">
          <div class="alert alert-warning">
  			<p>Los archivos eliminados permaneceran durante 24 Hrs. en la papelera, <br /> Pasado este tiempo seran eliminados definitivamente del servidor</p>
		  </div>
          <form method="post">
          <input type="text" id="txtIdeliminar" name="txtIdeliminar" class="hidden" />
        <div align="center">  
        <input type="submit" value="Si" class="btn btn-danger btn-lg"  name="eliminar"/>
          <button class="btn btn-success btn-lg"  data-dismiss="modal">Cancelar</button>
          </div>
          
		  </form>
          <?php if($_POST['eliminar']=="Si"){
			 
			$ideliminar=$_POST['txtIdeliminar'];
			$sqleliminar="UPDATE `int_archivos` SET `estado` = '0' WHERE `int_archivos`.`id` = $ideliminar";
			echo $sqleliminar;
			mysql_query($sqleliminar, $cnn);
			echo "<script>document.location ='misarchivos.php'</script>";

			  
			  }?>
          </div>
          </div>
          </div>
          </div>

              <!-- modal crear carpeta -->
        			<div class="modal fade" id="crear_carpeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             		<div class="modal-dialog">
                	<div class="modal-content">
                  	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Crear carpeta</h4>
                 	</div>
                 	<div class="modal-body">
                      <form method="post">
                   <input type="text" placeholder="Nombre de la carpeta" class="form-control" name="txtnombrecarpeta" maxlength="30" required />
                  
                     <br />
                   <p></p>
<a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Crear carpeta" name="crear" />

                       </form>
            <?php if($_POST['crear']=="Crear carpeta"){
				
				$nom=$_POST['txtnombrecarpeta'];
				$sqlcarpeta="insert into int_carpeta values('', '$nom','$idusr','$id_dpto')";
					mysql_query($sqlcarpeta, $cnn);			
				   echo "<script>alert('Carpeta creada');</script>";			
			    echo "<script>document.location ='misarchivos.php'</script>";
				
				} ?>
                
                </div>
                </div>
             	</div>
         		</div>


               <!-- Modal propiedades-->
          <div class="modal fade lg" id="propiedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" align="center">Propiedades del archivo</h4>
          </div>
          <div class="modal-body" id="contenedorpropiedades">
          
          <form method="post">
          <input type="text" id="txtpropiedades" name="txtpropiedades" class="" />
        
          
      </form>
        
          </div>
          </div>
          </div>
          </div>

                
                <!-- modal permisos -->
                <div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
         	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Compartir</h4>
            </div>
            <div class="modal-body">
            <form method="post">
                <table>
        <td width="50%">
       
        <input type="radio" id="radios" name="radios" value="dpto" />
                  <input type="text" id="txtpermisos" name="txtpermisos" class="hidden" />

         <label>Compartir con Departamento </label>
         &nbsp;&nbsp;
        </td>
        <td width="50%">
        
		<input type="radio" id="radios" name="radios" value="usr" required />
        <label>Compartir con Usuario </label>
		</td>
        </table>
        <input type="text" name="buscador" id="buscador" placeholder="Usuario o departamento" class="form-control" />
        <br />
        <br />
            <div id="contenedormodal"></div>
          
        
            <a class="btn btn-default" data-dismiss="modal">Close</a>
           <input type="submit" class="btn btn-success" value="Guardar" name="crear" />
		
		
		
           </form>
          </div>
          </div>
          </div>
 		  </div>
          
    
          
          
          
  
          
 
          