<?php
if (isset($_POST['idEMPLE'])&&isset($_POST['mps'])) {

  $dataIMP=[
    'idEMPLE'=>$_POST['idEMPLE']
  ];

  $mps=$_POST['mps'];

  $respuestaIngreso=ModeloIngresoMp::nuevoIngreso($dataIMP);

  $lastId=ModeloIngresoMp::getLastId();
  $arrayResp=[];

  if (isset($lastId[0])&&$respuestaIngreso==true) {
    $respDeta=ModeloIngresoMp::saveDetalle($mps,$lastId[0]);
    $cant=IMPController::updateCant($mps);

    if ($respDeta==true) {
      $arrayResp=[
        'success'=>true,
        'message'=>'Ingreso insertado satisfactoriamente'
      ];
    }else {
      $arrayResp=[
        'error'=>true,
        'message'=>'Error en la insercion'
      ];
    }
  }else {
    $arrayResp=[
      'error'=>true,
      'message'=>'Error en los parametros'
    ];
  }
  echo json_encode($arrayResp);
  return;
  echo '<script>
setTimeout(function(){
  window.location = "index.php?paginasIngresoMp=ConsultaIMP"
},1000)
</script>';

}

 ?>
