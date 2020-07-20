<?php
if (isset($_POST['idProd'])&&isset($_POST['cant'])&&isset($_POST['mps'])&&isset($_POST['medida'])) {

  $mps=$_POST['mps'];
    $respDeta=ModeloProducto::saveDetalle($mps,$_POST['idProd'],$_POST['cant'],$_POST['medida']);

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
  window.location = "index.php?paginasProduc=ConsultaProduc"
},1000)
</script>';

 ?>
