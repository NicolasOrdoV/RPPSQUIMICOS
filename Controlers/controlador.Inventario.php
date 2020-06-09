<?php
require_once 'providers/conexion.php';

class ControladorInventario
{
    //Consulta productos para mostrar al usuario

    static public function ctrSeleccionarProductosStock($item, $valor)
    {
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosStock($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrCrearProducto($data)
    {
        if (isset($data["nombrePRODUCTO"])) {

            $tabla = "producto";
            $datos = array(
                            "nombrePRODUCTO" => $data["nombrePRODUCTO"],
                            "descripcionPRODUCTO" => $data["descripcionPRODUCTO"],
                            "cantPRODUCTO" => $data["cantPRODUCTO"],
                            "estadoPRODUCTO" => "Activo",
                            "valoruPRODUCTO" => $data["valoruPRODUCTO"]
                          );
            $respuesta = ModeloInventario::mdlCrearProducto($tabla, $datos);
            return $respuesta;
        }
    }
}
