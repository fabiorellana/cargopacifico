<?php 

class menu
{
    
   public $con;
    function __construct()
    {
        $this->con = new Conexion();
    }
    
    function __destruct()
    {
    $this->con = null;
    }

    function menu(){


$idusr= $_SESSION["idusr"];
$sql="select * from int_permisos where rut='$idusr'";

$rs=$this->con->Consultar($sql);

while($row=mysqli_fetch_array($rs)){
  
  $p1=$row['Administrar_usuarios'];
  $p2=$row['Programacion_programador'];
  $p3=$row['programacion_deposito'];
  $p4=$row['Administrar_programacion'];   
  $p5=$row['cc_usu'];
  $p6=$row['cc_admin'];
  $p7=$row['flota_1'];
  $p8=$row['flota_2'];
  $p9=$row['botelleros'];

  }
?>

<li class="header hidden-xs">Menu</li>
   
        <?php if($p1==1){ ?>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        <span>Administrar</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="crear-usr.php"><i class="fa fa-users" aria-hidden="true"></i>Usuarios</a></li>
        </ul>
        </li>
        <?php }?> 
               
          
        
           
 
    
            
            <?php  if($p2==1){?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <span>Programación</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="programador.php"><i class="fa fa-check-square-o" aria-hidden="true"></i>
            Programar</a></li>  
            <?php  if($p3==1) {?> <li><a href="centro.php"><i class="fa fa-eercast" aria-hidden="true"></i>Programación Deposito</a></li> <?php } ?> 
            </ul>
            </li>
            <?php } ?>
            
            <?php  if($p4==1){?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-address-book-o" aria-hidden="true"></i>
            <span>Gestión</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

            <li><a href="endesarrollo.html"><i class="fa fa-file-code-o" aria-hidden="true"></i>Licencias Fallas</a></li>
            <?php  if($p4==1) {?> <li><a href="admin_programacion.php"><i class="fa fa-file-code-o" aria-hidden="true"></i>Admin Programación</a></li><?php } ?>
          
            </ul>
            </li>
     <?php } ?> 


            
                  <?php  if($p5==1 or $p6==1){?>
            <li class="treeview">
            <a href="#">
<i class="fa fa-money" aria-hidden="true"></i>
            <span>Cuenta Corriente</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <?php  if($p5==1 or $p6==1) {?> <li><a href="cuentaCorriente.php"><i class="fa fa-file-code-o" aria-hidden="true"></i>Cuenta corriente</a></li><?php } ?>
            </ul>
            </li>
            <?php } ?>
            
            
               <?php  if($p7==1 || $p8==1){?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-truck" aria-hidden="true"></i>
            <span>Flota</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="flota_estado.php"><i class="fa fa-stethoscope" aria-hidden="true"></i>Estado Flota</a></li>  
            <?php if($p8==1){ ?> <li><a href="flota_gestion.php"><i class="fa fa-gear" aria-hidden="true"></i>Gestión Flota</a></li><?php } ?> 
            </ul>
            </li>
            <?php } ?>

                  
            

          <?php

}

}
