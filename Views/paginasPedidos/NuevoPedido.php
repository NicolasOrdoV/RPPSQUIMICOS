<?php
if (isset($_POST['idEmp'])&&isset($_POST['Carro'])&&isset($_POST['idEmpClien'])&&isset($_POST["total"])&&isset($_POST["Fechaen"])) {

  $dataPed=[
    'IdEmple'=>$_POST['idEmp'],
    'IdEmpCli' => $_POST['idEmpClien'],
    'Total' => $_POST['total'],
    'fechaEN' => $_POST['Fechaen']

  ];

  $detallePed=$_POST['Carro'];

  $respuestaIngreso= ModeloPedido::nuevoPedido($dataPed);

  $lastId=ModeloPedido::getLastId();
  $arrayResp=[];

  if (isset($lastId[0])&&$respuestaIngreso==true) {
    $respDeta=ModeloPedido::saveDetalle($detallePed,$lastId[0]);

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
  window.location = "index.php"
},1000)
</script>';

}
