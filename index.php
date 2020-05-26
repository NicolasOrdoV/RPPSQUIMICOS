<?php 

require_once "Controlers/plantilla.controlador.php";
require_once "Controlers/controlador.Usuarios.php";
require_once "Controlers/controlador.Barrios.php";
require_once "Controlers/controlador.Clientes.php";
require_once "Controlers/controlador.Administradores.php";
require_once "Controlers/controlador.Productos.php";
require_once "Controlers/controlador.Inventario.php";
require_once "Models/modelo.Productos.php";
require_once "Models/modelo.Usuarios.php";
require_once "Models/modelo.Barrios.php";
require_once "Models/modelo.Clientes.php";
require_once "Models/modelo.Administradores.php";
require_once "Models/modelo.Inventario.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();


?>
