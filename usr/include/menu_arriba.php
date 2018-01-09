                                    <!-- Logo -->
                                    <a href="index.php" class="logo" style="position: fixed;">
                                    <!-- mini logo for sidebar mini 50x50 pixels -->
                                    <span class="logo-mini"><b>T</b>CP</span>
                                    <!-- logo for regular state and mobile devices -->
                                    <span class="logo-lg"><b>Intranet</b> TCP</span>
                                    </a>
                                    <!-- Header Navbar: style can be found in header.less -->
                                    <nav class="navbar  navbar-fixed-top">
                                    <!-- Sidebar toggle button-->
                                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="btnColapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    </a>
                                    
                                    <div class="navbar-custom-menu ">
                                    <ul class="nav navbar-nav">
                                    
                                    
                                    
                                    <!-- Mensajes-->
                                   
                                    
                                    <!-- Notificaciones -->
                                    <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o fa-lg"></i>
                                    <span class="label label-warning" id="cantidad_noti"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li class="header">Notificaciones</li>
                                    <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id="noti_panel">
                                    </ul>
                                    </li>
                                    <li class="footer"><a href="#">Ver todo</a></li>
                                    </ul>
                                    </li>
                                    <!-- fin notificaciones -->
                                      <!-- Informacion de usuario-->
                                     <?php 
                                     include("model/include/class.php");
                                     $info = new incluye();
                                     $info->infousr();
                                     $info=null;
                                     ?>
                                   
                                               
                                     <!-- Menu Footer-->
                                     <li class="user-footer">
                                     <div class="pull-left">
                                     <a href="#" id="cambiapass" class="btn btn-default btn-flat">Cambiar contraseña</a>
                                     </div>
                                     <div class="pull-right">
                                     <a href="#" onclick="cerrarsesion()" class="btn btn-default btn-flat">Salir</a>
                                     </div>
                                     
                                     </li>
                                     </ul>
                                     </div>
                                    
                                     </nav>
<script>
function cerrarsesion(){
swal({
  title: "¿Estas seguro?",
  text: "saldras del sistema",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, sacame de aqui",
  cancelButtonText: "No, Cancelar",
  closeOnConfirm: false,
  closeOnCancel: false
}).then(function () {
window.location ="controllers/login/cerrarSesion.php";         
        });
}
</script>