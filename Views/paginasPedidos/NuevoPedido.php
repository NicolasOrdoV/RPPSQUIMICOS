<?php
if (isset($_POST['idEmp'])&&isset($_POST['idClienEmpre'])&&isset($_POST["totalPedCar"])&&isset($_POST["Fechaen"])) {

  $dataPed=[
    'IdEmple'=>$_POST['idEmp'],
    'IdEmpCli' => $_POST['idClienEmpre'],
    'Total' => $_POST['totalPedCar'],
    'fechaEN' => $_POST['Fechaen']

  ];
  if (isset($_POST['prods'])) {
    $detallePed = $_POST['prods'];
  }else{
  $detallePed = json_decode($_POST['Carro'], true);
}

  $respuestaIngreso= ModeloPedido::nuevoPedido($dataPed);

  $lastId = ModeloPedido::getLastId();
  $arrayResp=[];

  if (isset($lastId) && $respuestaIngreso==true) {
    $respDeta=ModeloPedido::saveDetalle($detallePed,$lastId[0]);

    if ($respDeta==true) {
      $arrayResp=[
        'error'=>false,
        'message'=>'Ingreso insertado satisfactoriamente'
      ];
    } else {
      $arrayResp=[
        'error'=>true,
        'message'=>'Error en la insercion'
      ];
    }
  } else {
    $arrayResp=[
      'error'=>true,
      'message'=>'Error en los parametros'
    ];
  }

  echo json_encode($arrayResp);
}

else {
  $response = array(
      "error" => true,
      "message" => "datos no completos"
  );

  var_dump( json_encode($response));
}


  $cliente = ControladorClientes::ctrSeleccionarClienteEspecifico($user['idEC_FK']);
  $admin = ControladorAdministradores::ctrSeleccionarAdministradorJefe(2);
  $correo = new ControladorPedidos();
  $correo -> enviarCorreoPedidoCliente($cliente);
  $correo -> enviarCorreoPedidoAdminNotifica($cliente, $admin);


?>
