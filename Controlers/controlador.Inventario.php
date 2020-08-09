<?php
require_once 'providers/conexion.php';

class ControladorInventario
{
    //Consulta productos para mostrar al administrador

    static public function ctrSeleccionarProductosStock($item, $valor)
    {
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosStock($tabla, $item, $valor);
        return $respuesta;
    }

    //consulta productos para mostrar al cliente/usuario
    static public function ctrSeleccionarProductosUsuario($item, $valor){
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosUsuario($tabla, $item, $valor);
        return $respuesta;
    }

    //consultar ultimos 3 productos agregados
        static public function ctrSleccionarUltimos3Prod($item,$valor){
            $tabla="producto";
            $respuesta=ModeloInventario::mdlSeleccionarUltimos3Prod($tabla,$item,$valor);
            return $respuesta;
        }

    //INACTIVAR UN PRODUCTO
    public function ctrInactivarRegistroInventario(){

        if(isset($_POST["inactivarRegistro"])){

            $tabla = "producto";
            $valor = $_POST["inactivarRegistro"];

            $respuesta = ModeloInventario::mdlInactivarRegistroInventario($tabla,$valor);

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

    //ACTIVAR UN PRODUCTO
    public function ctrActivarRegistroInventario(){

        if(isset($_POST["activarRegistro"])){

            $tabla = "producto";
            $valor = $_POST["activarRegistro"];

            $respuesta = ModeloInventario::mdlActivarRegistroInventario($tabla,$valor);

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
