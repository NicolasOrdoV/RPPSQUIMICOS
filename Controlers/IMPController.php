<?php
/**
 * controlador de ingreso de materia prima
 */
class IMPController{

    static public function consult($item, $valor)
    {
        $respuesta = ModeloIngresoMp::consultarIngreso($item,$valor);
        return $respuesta;
    }
    static public function getById(){
      if (isset($_POST['id'])){
          $id=$_POST['id'];

          $respuesta=ModeloIngresoMp::consultarIngreso("idIMP",$id);
          return $respuesta;
      }
    }
    static public function show($id){
        $respuesta=ModeloIngresoMp::showIMP($id);
        return $respuesta;


    }
    static public function updateCant($data){
      foreach ($data as $d) {
        $mp=MPController::getById($d['idMP']);
        $c=ModeloIngresoMp::editCantidad($mp['idMP'],$mp['cantMP'],$d['cantidadDI'],1);
      }


    }


}


?>
