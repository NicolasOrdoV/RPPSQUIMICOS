<?php
error_reporting(0);
session_start();
$user = $_SESSION["user"];
$usuario = ControladorUsuarios::ctrSeleccionarUsuarios(null, null);
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="icon" href="Assets/img/Logo.ico">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>RPPS QUIMICOS</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="Assets/css/linearicons.css">
    <link rel="stylesheet" href="Assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/themify-icons.css">
    <link rel="stylesheet" href="Assets/css/bootstrap.css">
    <link rel="stylesheet" href="Assets/css/owl.carousel.css">
    <link rel="stylesheet" href="Assets/css/nice-select.css">
    <link rel="stylesheet" href="Assets/css/nouislider.min.css">
    <link rel="stylesheet" href="Assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="Assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="Assets/css/magnific-popup.css">
    <link rel="stylesheet" href="Assets/css/main.css">
    <link rel="stylesheet" href="Assets/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styleLR.css">
    <link rel="stylesheet" href="Assets/css/jquery.dataTables.min.css">
    <script src="push.js/push.min.js"></script>
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <?php if($user == "" || $user["idROL_FK"] == 1 ):?>
                        <a class="navbar-brand logo_h" href="index.php"><img src="Assets/img/logo.png" alt="" width="200"></a>
                    <?php else:?>
                        <a class="navbar-brand logo_h" href="?paginasAdministradores=MenuInicio"><img src="Assets/img/logo.png" alt="" width="200"></a>
                    <?php endif?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <?php if ($user == "") : ?>
                                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>

                                    <li class="nav-item"><a href="?paginasProduc=Catalog&pages=1" class="nav-link "
                                    >Tienda</a></li>
                                <li class="nav-item"><a class="nav-link" href="?paginasUsuario=hagging">Contacto</a></li>
                                <li class="nav-item"><a class="nav-link" href="?paginasUsuario=InicioSesion">Iniciar Sesión</a></li>
                            <?php elseif ($user["idROL_FK"] == 1) : ?>
                                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                                <li class="nav-item"><a href="?paginasProduc=Catalog&pages=1" class="nav-link "
                                    >Tienda</a></li>

                                </li>
                                <li class="nav-item submenu dropdown">
                                    <?php if($user['img'] == ""){?>
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"><img src="Assets/img/Perfil.jpg ?>" width="20"><?php echo $user["nombrecontEC"]; ?></a>
                                    <?php }else{ ?>
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"><img src="Assets/img/Usuarios/<?php echo $user["img"] ?>" width="20"><?php echo $user["nombrecontEC"]; ?></a>
                                    <?php } ?>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="?paginasUsuario=ConsultarUsuario&id=<?php echo $user["idUSUARIO"] ?>" class="nav-link">
                                            Mi perfil
                                        </a></li>
                                        <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                            Salir<i class="fas fa-sign-out-alt"></i>
                                        </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="?paginasPedidos=pedidoCliente">Mis pedidos</a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="?paginasAdministradores=MenuInicio">Inicio</a></li>
                                <li class="nav-item submenu dropdown">
                                    <?php if($user['imgEmp'] == ""){?>
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"><img src="Assets/img/Perfil.jpg ?>" width="20"><?php echo $user["nombreEMPLEADO"]; ?></a>
                                    <?php }else{ ?>
                                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                         aria-expanded="false"><img src="Assets/img/Empleados/<?php echo $user["imgEmp"]?>" width="20"><?php echo $user["nombreEMPLEADO"];?></a>
                                    <?php } ?>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="?paginasAdministradores=ConsultarUnAdmin&id=<?php echo $user["idEMPLEADO"] ?>" class="nav-link">
                                            Mi perfil
                                        </a></li>
                                        <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                            Salir<i class="fas fa-sign-out-alt"></i>
                                        </a></li>
                                    </ul>
                                </li>
                            <?php endif?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($user == "") : ?>
                                <li class="nav-item">
                                    <a href="?paginasPedidos=Carrito" class="cart"><span class="ti-shopping-cart-full"></span></a>
                                </li>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            <?php elseif($user["idROL_FK"] == 1):?>

                                <li class="nav-item">
                                    <a href="?paginasPedidos=Carrito" class="cart"><span class="ti-bag"></span></a>
                                </li>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            <?php else :?>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                           <?php endif?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="post" action="?paginasProduc=Catalog&pages=1">
                    <input type="text" class="form-control" name="busqueda" id="search_input" placeholder="¿Que estas buscando?">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <main class="container-fluid">
        <!-- Modal Cierre sesion-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <?php if ($user["idROL_FK"] == 1) : ?>
                            ¿Seguro deseas salir <span class="font-weight-bold"><?php echo $user["nombrecontEC"] ?></span> de tu sesión?
                        <?php else : ?>
                            ¿Seguro deseas salir <span class="font-weight-bold"><?php echo $user["nombreEMPLEADO"] ?></span> de tu sesión?
                        <?php endif ?>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="index.php?paginasCliente=salir" class="btn btn-primary ">Si</a>
                        <button type="button" class="btn btn-danger " data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if (isset($_GET["paginasCliente"])) {
                if (
                    $_GET["paginasCliente"] == "ConsultaCliente" ||
                    $_GET["paginasCliente"] == "salir" ||
                    $_GET["paginasCliente"] == "DetalleProducto" ||
                    $_GET["paginasCliente"] == "RegistroPedido" ||
                    $_GET["paginasCliente"] == "CarritoVacio"
                ) {
                    include "Views/paginasCliente/" . $_GET["paginasCliente"] . ".php";
                } else {
                    include "Views/error404.php";
                }
            } elseif (isset($_GET["paginasUsuario"])) {
                if (
                    $_GET["paginasUsuario"] == "InicioSesion" ||
                    $_GET["paginasUsuario"] == "RegistrarUsuario" ||
                    $_GET["paginasUsuario"] == "ConsultarUsuario" ||
                    $_GET["paginasUsuario"] == "RecuperarContrasena" ||
                    $_GET["paginasUsuario"] == "RestauraContrasenaUs" ||
                    $_GET["paginasUsuario"] == "ChangeImgProfile" ||
                    $_GET["paginasUsuario"] == "hagging"
                ) {
                    include "Views/paginasUsuario/" . $_GET["paginasUsuario"] . ".php";
                } else {
                    include "Views/error404.php";
                }
            } elseif (isset($_GET["paginasAdministradores"])) {
                if (
                    $_GET["paginasAdministradores"] == "ConsultarAdmin" ||
                    $_GET["paginasAdministradores"] == "ConsultarUnAdmin" ||
                    $_GET["paginasAdministradores"] == "GestionInventario" ||
                    $_GET["paginasAdministradores"] == "RestauraContrasenaAd" ||
                    $_GET["paginasAdministradores"] == "EditarProducto" ||
                    $_GET["paginasAdministradores"] == "MenuInicio" ||
                    $_GET["paginasAdministradores"] == "changeImgProfileEm"
                ) {
                    include "Views/paginasAdministradores/" . $_GET["paginasAdministradores"] . ".php";
                } else {
                    include "Views/error404.php";
                }
            }elseif (isset($_GET["paginasIngresoMp"])) {
              if ($_GET["paginasIngresoMp"] == "ConsultaIMP"||$_GET["paginasIngresoMp"]=="NuevoIMP"||$_GET["paginasIngresoMp"]="VerIMP" ){

                    include "Views/paginasIngresoMp/" . $_GET["paginasIngresoMp"] . ".php";
                }else{
                    include "Views/error404.php";
                }
            }elseif (isset($_GET["paginasMp"])) {
                if ($_GET["paginasMp"] == "ConsultaMP" || $_GET["paginasMp"]=="RegistroMP"){

                    include "Views/paginasMp/" . $_GET["paginasMp"] . ".php";
                }else{
                    include "Views/error404.php";
                }
            }elseif (isset($_GET["paginasProduc"])) {
                if ($_GET["paginasProduc"] == "ConsultaProduc" ||
                    $_GET["paginasProduc"] == "RegistroProduc" ||
                    $_GET["paginasProduc"] == "NuevoProd"      ||
                    $_GET["paginasProduc"] == "AgregarProd"    ||
                    $_GET["paginasProduc"] == "AgregarEx"      ||
                    $_GET["paginasProduc"] == "Catalog"){

                    include "Views/paginasProduc/" . $_GET["paginasProduc"] . ".php";
                }else{
                    include "Views/error404.php";
                }
            } elseif (isset($_GET["paginasPedidos"])) {
                if (
                      $_GET["paginasPedidos"] == "RegistroPedido" ||
                      $_GET["paginasPedidos"] == "confirmacion" ||
                      $_GET["paginasPedidos"] == "Carrito" ||
                      $_GET["paginasPedidos"] == "PedidoCompleto"||
                      $_GET["paginasPedidos"] == "NuevoPedido" ||
                      $_GET["paginasPedidos"] == "PedidoData" ||
                      $_GET["paginasPedidos"] == "pedidoCliente"

                ) {
                    include "Views/paginasPedidos/" . $_GET["paginasPedidos"] . ".php";
                } else {
                    include "Views/error404.php";
                }
            } else {
                include "Views/home.php";
            }
        ?>

    </main>
    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="justify-content-center text-center">
                <img src="Assets/img/Logo.png" class="img-fluide" width="450">
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0 text-secondary"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todo los derechos reservados | GAROWARE SOFTWARE
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="Assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
     crossorigin="anonymous"></script>
    <script src="Assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="Assets/js/jquery.nice-select.min.js"></script>
    <script src="Assets/js/jquery.sticky.js"></script>
    <script src="Assets/js/nouislider.min.js"></script>
    <!--<script src="Assets/js/countdown.js"></script>-->
    <script src="Assets/js/jquery.magnific-popup.min.js"></script>
    <script src="Assets/js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="https://kit.fontawesome.com/0e7adc6a46.js" crossorigin="anonymous"></script>
    <script src="Assets/js/gmaps.min.js"></script>
    <script src="Assets/js/main.js"></script>
    <script type="text/javascript" src="Assets/js/main2.js"></script>
    <script src="Assets/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#menu-toggle").on('click', function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script src="Assets/js/script.js"></script>
    <script type="text/javascript" src="Assets/js/imp.js"></script>
    <script type="text/javascript" src="Assets/js/prod.js"></script>
    <script type="text/javascript" src="Assets/js/validation.js"></script>
    <script type="text/javascript" src="Assets/js/search.js"></script>
    <script src="Assets/js/eye.js"></script>
    <script src="Assets/js/CarritoProd.js"></script>
    <script src="Assets/js/Pedido.js"></script>
    <script src="Assets/js/pedidoAdmin.js"></script>
    <script src="Assets/js/valiPedido.js"></script>
    <script src="Assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>

</body>

</html>
