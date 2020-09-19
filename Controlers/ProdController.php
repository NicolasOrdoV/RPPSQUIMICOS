<?php

/**
 * controlador de producto
 */
class ProdController
{
    static public function save($data)
    {

        if (isset($data['imgPROD'])&&isset($data['nombrePROD'])&&isset($data['descripPROD'])&&isset($data['medidaPROD'])&&isset($data['valoruPROD'])) {

            $datos = array(
                "imgPROD" => $data['imgPROD'],
                "nombrePROD" => $data["nombrePROD"],
                "descripPROD" => $data["descripPROD"],
                "medidaPROD" => $data["medidaPROD"],
                "valoruPROD" => $data["valoruPROD"]
            );
            $respuesta = ModeloProducto::nuevoProducto($datos);
            return $respuesta;
        }
    }
    static public function consult($item, $valor)
    {
        $respuesta = ModeloProducto::consultarProducto($item, $valor);
        return $respuesta;
    }

    static public function consult5()
    {
        $respuesta = ModeloProducto::consultarProducto5();
        return $respuesta;
    }

    static public function update($data)
    {
        if (isset($data['idPROD'])&&isset($data['imgPROD'])&&isset($data['nombrePROD'])&&isset($data['descripPROD'])&&isset($data['medidaPROD'])&&isset($data['valoruPROD'])) {

            $datos = array(
                "idPROD" => $data["idPROD"],
                "imgPROD" => $data["imgPROD"],
                "nombrePROD" => $data["nombrePROD"],
                "descripPROD" => $data["descripPROD"],
                "medidaPROD" => $data["medidaPROD"],
                "valoruPROD" => $data["valoruPROD"]
            );

            $respuesta = ModeloProducto::actualizarProducto($datos);

            return $respuesta;
        }
    }
    static public function inactivar()
    {
        if (isset($_POST["inactivarP"])) {

            $valor = $_POST["inactivarP"];

            $respuesta = ModeloProducto::inactivar($valor);

            if ($respuesta == "ok") {
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasProduc=ConsultaProduc";
            },1000)
            </script>';
            }
        }
    }
    static public function activar()
    {
        if (isset($_POST["activarP"])) {

            $valor = $_POST["activarP"];

            $respuesta = ModeloProducto::activar($valor);

            if ($respuesta == "ok") {
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasProduc=ConsultaProduc";
            },1000)
            </script>';
            }
        }
    }
    static public function getById()
    {
        if (isset($_POST['id'])){
            $id=$_POST['id'];

            $respuesta=ModeloProducto::consultarProducto("idPRODUCTO",$id);
            return $respuesta;
        }

    }
}
