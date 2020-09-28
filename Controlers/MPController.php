<?php

/**
 * controlador de materia prima
 */

class MPController
{
    static public function save($data)
    {
        if (isset($data['identMP'])&&isset($data['nombreMP'])&&isset($data['tipoMP'])) {

            $datos = array(
                "identMP" => $data["identMP"],
                "nombreMP" => $data["nombreMP"],
                "tipoMP" => $data["tipoMP"]
            );
            $respuesta = ModeloMp::nuevaMp($datos);
            return $respuesta;
        }
    }
   static public function consult($item, $valor)
    {
        $respuesta = ModeloMp::consultarMP($item, $valor);
        return $respuesta;
    }
   static public function update($data)
    {
        if (isset($data['idMP'])&&isset($data['identMP'])&&isset($data['nombreMP'])&&isset($data['tipoMP'])) {

            $datos = array(
                "idMP" => $_POST["idMP"],
                "identMP" => $_POST["identMP"],
                "nombreMP"=>$_POST["nombreMP"],
                "tipoMP"=>$_POST["tipoMP"]
            );

            $respuesta = ModeloMp::actualizarMP( $datos);

            return $respuesta;
        }
    }
    static public function inactivar()
    {
        if (isset($_POST["inactivarMP"])) {

            $valor = $_POST["inactivarMP"];

            $respuesta = ModeloMp::inactivar($valor);

            if ($respuesta == "ok") {
              echo '<script>Push.create("Felicidades!", {
              body: "La materia prima se ha inactivado exitosamente!",
              icon: "Assets/img/logo2.png",
              timeout: 2000,
              onClick: function () {
                  window.location="?paginasMp=ConsultaMP";
                  this.close();
              },
              onClose:function () {
                  window.location="?paginasMp=ConsultaMP";
              }
            });</script>';
            }
        }
    }
    static public function activar()
    {
        if (isset($_POST["activarMP"])&&isset($_POST["cantMp"])) {

            $valor = $_POST["activarMP"];
            $cant=$_POST["cantMp"];

            $respuesta = ModeloMp::activar($valor,$cant);

            if ($respuesta == "ok") {
              echo '<script>Push.create("Felicidades!", {
              body: "La materia prima se ha activado exitosamente!",
              icon: "Assets/img/logo2.png",
              timeout: 2000,
              onClick: function () {
                  window.location="?paginasMp=ConsultaMP";
                  this.close();
              },
              onClose:function () {
                  window.location="?paginasMp=ConsultaMP";
              }
            });</script>';
            }
        }
    }
    static public function getById()
    {
        if (isset($_POST['id'])){
            $id=$_POST['id'];

            $respuesta=ModeloMp::consultarMP("idMP",$id);
            return $respuesta;
        }

    }
}
