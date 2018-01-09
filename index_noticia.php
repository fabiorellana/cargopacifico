<?php
include "funciones/conexion.php";
$cnn=Conectar();
error_reporting(0)

?>
<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/csslogin.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    
       
        
     
        <script language="javascript">
    //fecha arriba
            $(document).ready(function (){     
                                   var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                                   var fecha = new Date();
                                  $("#tiempo").text(diasSemana[fecha.getDay()]+ " " + fecha.getDay() +" de "+  meses[fecha.getMonth()+1]+ " de " + fecha.getFullYear() );
                                
                 });
        </script>
        
        <title>Transporte Cargo Pacifico</title>
        <link rel="shortcut icon" href="img/favicon.png">
    </head><body style="background-color:#F5F9FC">
        <font style="text-transform: capitalize;">
            <header class="navbar navbar-mycolor  navbar-fixed-top  ">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><span><img id="logotcp" src="images/l0go.png" width="390px" height="auto" style="position:absolute; top:20px;"></span></a>
                        
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse" >
                        <ul class="nav navbar-nav navbar-right "  >
                            <li >
                                <h1 class="intranet">Intranet</h1>   </li>
                                   
                        </ul>
                    </div>
                </div>
            </header>
            
            <br>
            <br>
           
            
         
            <div class="navbarcorto navbar-default">
                <div class="container">
                    <div class="navbar-header"></div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <br>
                        <ul class="col-lg-4"></ul>
                        <ul class="nav navbar-nav btn btn-group-xs">
                            <div id="tiempo" style="font-size:11px; color:#000"></div>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <div class="btn-group btn-group-xs">
                                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">S.I.I.<i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="http://www.sii.cl/pagina/valores/correccion/correccion2016.htm" target="_new">Corrección monetaria</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://www.sii.cl/pagina/valores/dolar/dolar2017.htm" target="_new">Dolar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group btn-group-xs">
                                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown" target="_new">Indicadores&nbsp;<span class="fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="http://www.bcentral.cl/es/faces/estadisticas/CNacionales/Imacec;jsessionid=qO5qt_ckrrolqPz7FKf1xY6ktuhSlHbazIJ21qYONn_3Qkcl1QZ0!-777045838!NONE?_afrLoop=1270007098775082&amp;_afrWindowMode=0&amp;_afrWindowId=null#!%40%40%3F_afrWindowId%3Dnull%26_afrLoop%3D1270007098775082%26_afrWindowMode%3D0%26_adf.ctrl-state%3D15vcudn8y7_4" target="_new">Imacec</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://www.enap.cl/pag/53/784/informe-precios" target="_new">Informe Semanal precio de combustibles</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://www.economiaynegocios.cl/indicadores/ipc.asp" target="_new">IPC</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://www.economiaynegocios.cl/mercados/monedas.asp" target="_new">Monedas</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://www.economiaynegocios.cl/indicadores/index.asp" target="_new">UF - IVP - UTM</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown"> Calculadora&nbsp;<span class="fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="http://www.economiaynegocios.cl/calculadora_vf/" target="_new">Conversión de Monedas</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="http://cl.lasdistancias.com/" target="_new">Distancia entre Ciudades</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">Busqueda&nbsp;<span class="fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="http://www.bencinaenlinea.cl/web2/buscador.php?region=8" target="ventana">Bencineras</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </font>
        <br>
        <br>
        
         <br>
        <br>
        
        
        
        <div class="container">
        
        
        
        
        
        <div class="col-lg-3 ">
      <div class="panel panel-primary sombradiv">
  <div class="panel-heading">
    <h3 class="panel-title">Iniciar Sesión</h3>
  </div>
  <div class="panel-body">
      <form class="form-horizontal" method="POST">
        <div class="form-group">
        <input type="text" placeholder="Ingrese Rut sin Puntos con guión" class="form-control col-lg-8"  name="usuario" required>
        </div>
        <div class="form-group ">
        <input type="password" placeholder="Contraseña" required class="form-control" name="pass">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Recuperar Contraseña</a>
       </div>
       
        
       
      
       
   
        <input type="submit" value="Entrar" name="entrar" class="btn btn-primary  btn-block">
        
        <br>
        
        
        <?php 
        if($_POST['entrar']=="Entrar"){
          
          $usr=$_POST['usuario'];
		   $pass=$_POST['pass'];
		   $_SESSION['pasw']=$pass;
		
        //sentencias sql
        $sqlusr="select count(rut) as usr, id as id, id_usr from tcp_lgn where tcp_lgn.rut='$usr'";
      
        $rs=mysql_query($sqlusr, $cnn);
        while($row=mysql_fetch_array($rs)){
          
          $usrbd=$row['usr'];
		  $idusr=$row['id'];
		   $idusrsession=$row['id_usr'];
          }
		  
		  if(!($usrbd)||!($idusr)){echo "<div class=' alert alert-danger'>Error de usuario o Contraseña</div>";}else{
		  
		    $sqlpass="select tcp_lgn.conpss as pass from tcp_lgn where id='$idusr'";
          
          $rspass=mysql_query($sqlpass, $cnn);
		  
        while($rowpass=mysql_fetch_array($rspass)){
          
          $passbd=$rowpass['pass'];
          }
		  
		if (password_verify($pass, $passbd)) {
			
			
          	//id usr en var de sesion
           $_SESSION["idusr"] = $idusrsession;
			echo "<script>window.location='redirigir.php'</script>";
			
		} else {
			echo "<div class=' alert alert-danger'>Error de usuario o Contraseña</div>";
		}
		  
          
        
		
		     

 
		  }

		
	

      
          
          
    }?>
         </form>
  </div>
  
</div>
<a  href="solicitar_ayuda.php"  class="btn btn-danger btn-block">Solicitar Ayuda</a>

         </div>
         <br class="hidden-lg">
         <br class="hidden-lg">
       
         <div class="col-lg-9">
         <div class="panel panel-default ">
  <div class="panel-heading "><div class="tt"  style="color:#000">Noticias</div></div>
  <div class="panel-body " id="noticias">
  <?php 
  $id_noticia=$_GET['idnoticia'];
$sqlnoticias="select * from noticias where id=$id_noticia";
$rs=mysql_query($sqlnoticias,$cnn);
while($rownoticias=mysql_fetch_array($rs)){
 

  ?>
    <div class="col-lg-12">
    <?php echo "<h6 style='font-size:10px'>".$rownoticias['fecha']."<h6>" ?>
    <?php echo "<b style='font-size:20px; margin-left=50%' align='center'>".$rownoticias['titular']."<b>" ?>
     <?php echo "<br>"?>
    <?php echo "<br><div align='center'><img  width='450px' height='auto'  class='img-responsive' align='center' src=usr/".$rownoticias['ruta'].""; ?>
    <?php echo "<br>"?>
        <?php echo "<h6 style='font-size:16px' align='justify'>".$rownoticias['noticia']."<h6>" ?>

    
	</div>
<?php }?>


  </div>
  <div align="right" style="font-size:12px" ><a href="index.php">Volver</a></div>
</div>
</div>
          
              
        
        
    
         
         
      
       
    <script>
    $( document ).ready(function() {
    $( "#noticias" ).load( "noticias/noticiasajaxs.php" );
  });
  </script>
</body></html>