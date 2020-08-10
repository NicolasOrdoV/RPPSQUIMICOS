<?php

require_once "Controlers/plantilla.controlador.php";
require_once "Controlers/controlador.Usuarios.php";
require_once "Controlers/controlador.Barrios.php";
require_once "Controlers/controlador.Clientes.php";
require_once "Controlers/controlador.Administradores.php";
require_once "Controlers/controlador.Productos.php";
require_once "Controlers/controlador.Inventario.php";
require_once "Controlers/MPController.php";
require_once "Controlers/IMPController.php";
require_once "Controlers/ProdController.php";
require_once "Controlers/LocatesController.php";
require_once "Models/modelo.Mp.php";
require_once "Models/modelo.IngresoMp.php";
require_once "Models/modelo.Producto.php";
require_once "Models/modelo.Productos.php";
require_once "Models/modelo.Usuarios.php";
require_once "Models/modelo.Barrios.php";
require_once "Models/modelo.Clientes.php";
require_once "Models/modelo.Administradores.php";
require_once "Models/modelo.Inventario.php";
require_once "Models/modeloPedidos.php";
require_once "Models/Locates.php";


$home = new HomeController();
$home -> ctrBringeHome();
