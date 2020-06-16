<?php
if(isset($_POST['idEMPLE'])&&isset($_POST['mps'])){
    $datosIMP=[
        'idEMPLE'=>$_POST['idEMPLE']
    ];
$mps=$_POST['mps'];

$respuesta=ModeloIngresoMp::nuevoIngreso($datosIMP);
return $respuesta;
}
/**
 * controlador de ingreso de materia prima
 */
class IMPController{
    static public function save()
    {
            $datosIMP=[
                'idEMPLE'=>$_POST['idEMPLE']
            ];
            $respuesta = ModeloIngresoMp::nuevoIngreso($datosIMP);
            return $respuesta;
        
    }
    static public function consult($item, $valor)
    {
        $respuesta = ModeloIngresoMp::consultarIngreso($item,$valor);
        return $respuesta;
    }

  
}


?>