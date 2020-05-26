<?php
require_once 'providers/conexion.php';

class ControladorInventario
{
    //Consulta productos para mostrar al usuario

    static public function ctrSeleccionarProductosStock($item,$valor)
    {
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosStock($tabla,$item,$valor);
        return $respuesta;
    }
}
