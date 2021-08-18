<?php $nomsoc = $_SESSION["nombre"];
$tipo = $_SESSION["tipo"];
?>

<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

</script>
<div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">



    <!-- Branding -->
    <div class="navbar-header col-md-2">
        <a class="navbar-brand" href="index.php">
            INTRANET 2.0
        </a>
        <div class="sidebar-collapse">
            <a href="#">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Branding end -->


    <!-- .nav-collapse -->
    <div class="navbar-collapse">

        <!-- Page refresh -->
        <ul class="nav navbar-nav refresh">
            <li class="divided">
                <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
            </li>
        </ul>
        <!-- /Page refresh -->

        <!-- Search -->

        <!-- Search end -->

        <!-- Quick Actions -->
        <ul class="nav navbar-nav quick-actions">

            <li class="dropdown divided">

                <a href="logout.php"><i class="fa fa-power-off"></i> Cerrar sesión</a>
            </li>





            <li class="dropdown divided user" id="current-user">
                <div class="profile-photo">
                    <img src="assets/images/nouser.png" alt />
                </div>
                <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                    <?php echo $nomsoc ?> <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu arrow settings">

                    <li>

                        <h3>Backgrounds:</h3>
                        <ul id="color-schemes">
                            <li><a  onclick="setCookie('back', 'bg-1', 365)" href="#" class="bg-1"></a></li>
                            <li><a onclick="setCookie('back', 'bg-2', 365)" href="#" class="bg-2"></a></li>
                            <li><a onclick="setCookie('back', 'bg-3', 365)" href="#" class="bg-3"></a></li>
                            <li><a onclick="setCookie('back', 'bg-4', 365)" href="#" class="bg-4"></a></li>
                            <li><a onclick="setCookie('back', 'bg-5', 365)" href="#" class="bg-5"></a></li>
                            <li><a onclick="setCookie('back', 'bg-6', 365)" href="#" class="bg-6"></a></li>
                        </ul>

                    </li>



                    <li>
                        <a href="logout.php"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                    </li>
                </ul>
            </li>


        </ul>
        <!-- /Quick Actions -->



        <!-- Sidebar -->
        <ul class="nav navbar-nav side-nav" id="sidebar">

            <li class="collapsed-content"> 
                <ul>
                    <li class="search"><!-- Collapsed search pasting here at 768px --></li>
                </ul>
            </li>

            <li class="navigation" id="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="#navigation">Menu Principal <i class="fa fa-angle-up"></i></a>

                <ul class="menu">
                    <li>

                        <img src="assets/img/brand/white2.png" style="width: 100%">

                    </li>



                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file-text-o"></i> Atencion al cliente <b class="fa fa-plus dropdown-plus"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="chat.php">
                                    <i class="fa fa-caret-right"></i> Administracion de tickets
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-caret-right"></i> Estadisticas
                                </a>
                            </li>
                            
                            <li>
                                <a href="historial.php">
                                    <i class="fa fa-caret-right"></i> Asignacion de tickets
                                </a>
                            </li>
                            
<?php if($tipo==1 && $tipo==2 && $tipo==0){
 ?>  
<li>
                                <a href="historial.php">
                                    <i class="fa fa-caret-right"></i> Asignacion de tickets
                                </a>
                            </li>
                            
                            
<?php    
}
?>
                            

                        </ul>
                    </li>
<?php if($tipo==1){
 ?>  
<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i> Administrador del sistema <b class="fa fa-plus dropdown-plus"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="usuarios.php">
                                    <i class="fa fa-caret-right"></i> Administracion de usuarios
                                </a>
                            </li>
                            <li>
                                <a href="clientes.php">
                                    <i class="fa fa-caret-right"></i> Administracion de clientes
                                </a>
                            </li>
<li>
                                <a href="areas.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Areas
                                </a>
                            </li>
                            <li>
                                <a href="carros.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Carros
                                </a>
                            </li>
                            <li>
                                <a href="remolques.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Remolques
                                </a>
                            </li>
                            <li>
                                <a href="propietario.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Propietarios
                                </a>
                            </li>
                            <li>
                                <a href="arrendatario.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Arrendatarios
                                </a>
                            </li>
                            <li>
                                <a href="notificado.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Notificados
                                </a>
                            </li>
                            <li>
                                <a href="operadores.php">
                                    <i class="fa fa-caret-right"></i> Administracion de Operadores
                                </a>
                            </li>

                        </ul>
                    </li>
                            
<?php    
}
?>
<?php if($tipo==1){
 ?>  

<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file-text-o"></i> Noticias <b class="fa fa-plus dropdown-plus"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li>
                                <a href="crearnoticias.php">
                                    <i class="fa fa-caret-right"></i> Crear noticias
                                </a>
                            </li>
                           <!-- <li><a href="editarnot.php"><i class="fa fa-caret-right"></i> Editar noticias </a>  </li> -->

                            <li>
                                <a href="elimnot.php">
                                    <i class="fa fa-caret-right"></i> Eliminar noticias
                                </a>
                            </li>
                             <li>
                                <a href="crearnoticiasweb.php">
                                    <i class="fa fa-caret-right"></i> Crear blog
                                </a>
                            </li>
                           <!-- <li><a href="editarnot.php"><i class="fa fa-caret-right"></i> Editar noticias </a>  </li> -->

                            <li>
                                <a href="elimnotweb.php">
                                    <i class="fa fa-caret-right"></i> Eliminar blog
                                </a>
                            </li>

                        </ul>
                    </li>


<?php    
}
?>


<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-toolbox"></i> Herramientas <b class="fa fa-plus dropdown-plus"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            
                            
                            <li>
                                <a href="subirdatas.php">
                                    <i class="fa fa-caret-right"></i> Generar Datastage
                                </a>
                            </li>
                            
                            
                           <!-- <li><a href="editarnot.php"><i class="fa fa-caret-right"></i> Editar noticias </a>  </li> -->

                            

                        </ul>
                    </li>
                </ul>
            </li>
           

        </ul>

        <!-- Sidebar end -->





    </div>
    <!--/.nav-collapse -->





</div>