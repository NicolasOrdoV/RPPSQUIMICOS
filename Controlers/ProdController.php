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
              echo '<script>Push.create("Felicidades!", {
              body: "El producto se ha inactivado exitosamente!",
              icon: "Assets/img/logo2.png",
              timeout: 2000,
              onClick: function () {
                  window.location="?paginasProduc=ConsultaProduc";
                  this.close();
              },
              onClose:function () {
                  window.location="?paginasProduc=ConsultaProduc";
              }
            });</script>';
            }
        }
    }
    static public function activar()
    {
        if (isset($_POST["activarP"])) {

            $valor = $_POST["activarP"];

            $respuesta = ModeloProducto::activar($valor);

            if ($respuesta == "ok") {
              echo '<script>Push.create("Felicidades!", {
              body: "El producto se ha activado exitosamente!",
              icon: "Assets/img/logo2.png",
              timeout: 2000,
              onClick: function () {
                  window.location="?paginasProduc=ConsultaProduc";
                  this.close();
              },
              onClose:function () {
                  window.location="?paginasProduc=ConsultaProduc";
              }
            });</script>';
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
