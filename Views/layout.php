<?php
//error_reporting(0);
session_start();
$user = $_SESSION["user"];
$usuario = ControladorUsuarios::ctrSeleccionarUsuarios(null, null);
?>
<!DOCTYPE html>
<html lang="es-Us">
<head>
    <!--<meta charset="UTF-8">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>RPPS Quimícos</title>
    <link rel="icon" href="Assets/img/Logo.ico">
    <!--Hoja auxiliar para adaptacion del proyecto-->
    <link rel="StyleSheet" href="Assets/css/style.css">
    <!--LINKS DE ACCESO A BOOTSTRAP CON INTERNET-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--LINKS DE ACCESO A BOOTSTRAP SIN INTERNET-->
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">-->
</head>
<body>
    <header class="d-flex toggled" id="wrapper">
        <!-- Menu vertical deslizable-->
        <nav class="bg-white border-right" id="sidebar-wrapper">
            <div id="title1" class="sidebar-heading">RPPS Quimícos</div>
            <hr>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action" id="flush">Inicio</a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">
                    <h2>Filtros</h2>
                    <form method="post" action="#">
                        <label><input type="checkbox" id="cbox1" value="mayorPrecio"> Mayor precio</label><br>
                        <input type="checkbox" id="cbox2" value="menorPrecio"> <label for="cbox2">Menor precio</label>
                        <input type="text" name="nombreProducto" placeholder="Nombre del producto">
                    </form>
                </a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">
                    <h2>Precio</h2>
                    <form method="post" action="">
                        $<input type="text" name="pMinimo" placeholder="Minimo">
                        $<input type="text" name="pMaximo" placeholder="Maximo">
                    </form>
                </a>
                <a href="index.php" class="list-group-item list-group-item-action" id="flush">
                    <h3 class="font-weight-bold">Catálogo</h3>
                </a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Alcoholes>></a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Varsoles>></a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Pegantes>></a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Ácidos>></a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Thinner>></a>
                <a href="#" class="list-group-item list-group-item-action" id="flush">Diablo rojo>></a>
                <?php if ($user["idROL_FK"] == 1) : ?>
                    <a href="index.php?paginasUsuario=ConsultarUsuario&id=<?php echo $user["idUSUARIO"] ?>" class="list-group-item list-group-item-action text-bold" id="flush">
                        <img src="Assets/img/Perfil.jpg" class="img-fluide" width="30" height="30">Mi cuenta
                    </a>
                <?php elseif ($user["idROL_FK"] == 2) : ?>
                    <a href="index.php?paginasPedidos=RegistroPedido" id="flush" class="list-group-item list-group-item-action">
                        <h3>Registrar Pedido<i class="fab fa-jedi-order"></i></h3>
                    </a>
                    <a href="?paginasCliente=ConsultaCliente" class="list-group-item list-group-item-action text-danger" id="flush">Lista de clientes
                        <i class="fas fa-users"></i>
                    </a>
                    <a href="index.php?paginasAdministradores=GestionInventario" class="list-group-item list-group-item-action" id="flush">Gestion de inventario<i class="fas fa-boxes"></i>
                    </a>
                    <a href="index.php?paginasAdministradores=ConsultarUnAdmin&id=<?php echo $user["idEMPLEADO"] ?>" class="list-group-item list-group-item-action text-bold" id="flush">
                        <img src="Assets/img/Perfil.jpg" class="img-fluide" width="30" height="30">Mi cuenta
                    </a>
                <?php elseif ($user["idROL_FK"] == 3) : ?>
                    <a href="index.php?paginasAdministradores=ConsultarAdmin" class="list-group-item list-group-item-action" id="flush">Gestionar Administradores<i class="fas fa-user-astronaut"></i>
                    </a>
                    <a href="index.php?paginasAdministradores=GestionInventario" class="list-group-item list-group-item-action" id="flush">Gestion de inventario<i class="fas fa-boxes"></i>
                    </a>
                    <a href="?paginasCliente=ConsultaCliente" class="list-group-item list-group-item-action text-danger" id="flush">Lista de clientes
                        <i class="fas fa-users"></i>
                    </a>
                    <a href="index.php?paginasAdministradores=ConsultarUnAdmin&id=<?php echo $user["idEMPLEADO"] ?>" class="list-group-item list-group-item-action text-bold" id="flush">
                        <img src="Assets/img/Perfil.jpg" class="img-fluide" width="30" height="30">Mi cuenta
                    </a>
                <?php endif ?>
            </div>
        </nav>
        <!-- barra de navegacion horizontal -->
        <nav id="page-content-wrapper">
            <!------Barra de navegacion horizontal con boton de activacion al menu deslizable----->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom navbar-fluid sticky-top row" id="nav1">
                <div class="col-lg-1">
                    <button type="button" class="btn btn-outline-primary" id="menu-toggle">
                        <img src="Assets/img/menu.png" class="d-inline-block align-top pull-left" width="30" height="30">
                    </button>
                </div>
                <div class="col-lg-11" id="navbarSupportedContent">
                    <ul class="navbar-nav col-lg-12">
                        <li class="nav-brand col-lg-1">
                            <a href="index.php">
                                <img class="d-inline-block align-top pull-left" width="70" height="50" src="Assets/img/Contraste4.jpg">
                            </a>
                        </li>
                        <li class="nav-brand col-lg-7">
                            <i class="fas fa-search"></i><input type="text" id="bqd" placeholder="¿Qué estás buscando?">
                        </li>
                        <?php if ($user == "") : ?>
                            <li id="op1" class="nav-item col">
                                <a href="index.php?paginasPedidos=CarritoVacio" id="nab">Ir al carrito<i class="fas fa-cart-plus"></i>
                                </a>
                            </li>
                            <li id="op1" class="nav-item col">
                                <a href="index.php?paginasUsuario=InicioSesion" id="nab">Ingresar<i class="fas fa-door-open"></i></a>
                            </li>
                            <li id="op1" class="nav-item col">
                                <a href="index.php?paginasCliente=RegistroCliente" id="nab">Registrarse<i class="fas fa-user-plus"></i></a>
                            </li>
                        <?php elseif ($user["idROL_FK"] == 1) : ?>
                            <li id="op1" class="nav-item col">
                                <a href="index.php?paginasPedidos=CarritoVacio" id="nab">Ir al carrito<i class="fas fa-cart-plus"></i>
                                </a>
                            </li>
                            <li id="op1" class="nav-item col">
                                <a href="#" id="nab">
                                    <img src="Assets/img/Perfil.jpg" width="30" height="30"><?php echo $user["nombrecontEC"]; ?>
                                </a>
                            </li>
                            <li id="op1" class="nav-item col">
                                <button type="button" data-toggle="modal" class="btn btn-light" data-target="#exampleModal">
                                    Salir<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </li>
                        <?php else : ?>
                            <li id="op1" class="nav-item col">
                                <a href="#" id="nab">
                                    <img src="Assets/img/Perfil.jpg" width="30" height="30"><?php echo $user["nombreEMPLEADO"]; ?>
                                </a>
                            </li>
                            <li id="op1" class="nav-item col">
                                <button type="button" data-toggle="modal" class="btn btn-light" data-target="#exampleModal">
                                    Salir<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </nav>
            <main class="container-fluid">
                <!-- Modal -->
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
                                <a href="index.php?paginasCliente=salir" class="btn btn-primary rounded-pill">Si</a>
                                <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET["paginasCliente"])) {
                    if (
                        $_GET["paginasCliente"] == "RegistroCliente" ||
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
                        $_GET["paginasUsuario"] == "RestauraContrasenaUs"
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
                        $_GET["paginasAdministradores"] == "EditarProducto"
                    ) {
                        include "Views/paginasAdministradores/" . $_GET["paginasAdministradores"] . ".php";
                    } else {
                        include "Views/error404.php";
                    }
                } elseif (isset($_GET["paginasPedidos"])) {
                    if (
                        $_GET["paginasPedidos"] == "RegistroPedido" ||
                        $_GET["paginasPedidos"] == "CarritoVacio" ||
                        $_GET["paginasPedidos"] == "CarritoPedido"
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
        </nav>
    </header>
    <footer class="row">
        <div id="footer" class="col-lg-12">©Copyright: GAROWARE SOFTWARE<br>
            DERECHOS RESERVADOS 2020</div>
    </footer>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://kit.fontawesome.com/0e7adc6a46.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <!--<script type="text/javascript" src="Assets/js/jquery.min.js"></script>-->
    <!-- Popper JS -->
    <!--<script type="text/javascript" src="Assets/js/popper.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
    <!--<script type="text/javascript" src="Assets/js/bootstrap.min.js"></script>-->

    <!-- Script para deslizar y desplazar pantalla al menu -->
    <script type="text/javascript">
        $("#menu-toggle").on('click', function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <!-- Script para validar formularios -->
    <script type="text/javascript" src="Assets/js/validation.js"></script>
    <!-- Script para buscar datos en lista de clientes -->
    <script type="text/javascript" src="Assets/js/search.js"></script>
    <!-- Script para mostrar u ocultar la contraseña cuando se digita -->
    <script type="text/javascript" src="Assets/js/eye.js"></script>
</body>
</html>