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

    static public function ctrActualizarProducto($data){
        if (isset($data["idPRODUCTO"])) {
            $tabla = "producto";
            $datos = array(
                            "idPRODUCTO" => $data["idPRODUCTO"],
                            "nombrePRODUCTO" => $data["nombrePRODUCTO"],
                            "descripcionPRODUCTO" => $data["descripcionPRODUCTO"],
                            "cantPRODUCTO" => $data["cantPRODUCTO"],
                            "valoruPRODUCTO" => $data["valoruPRODUCTO"]
                          );
            $respuesta = ModeloInventario::mdlActualizarProducto($tabla, $datos);
            return $respuesta;
        }
    }

    public function ctrEliminarProducto(){
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "producto";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloInventario::mdlEliminarProducto($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=GestionInventario";
            },1000)
            </script>';
            }
        }
    }
}
