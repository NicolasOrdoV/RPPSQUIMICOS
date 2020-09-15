<?php
  $date = date("Y-m-d");
  $mod_date = strtotime($date."+ 2 days");
  $mod_dates = strtotime($date."+ 5 days");
  if (isset($_POST['total'])) {
    $totalcarr = $_POST['total'];
  }
?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark" id="labelCarrito">Finalizar pedido<i class="fa fa-shopping-basket" aria-hidden="true"></i></h1>
            </div>
        </div>
    </div>
</section>

<div style="padding-left: 20em; padding-right: 20em; padding-top: 5em; padding-bottom: 5em">
      <div class="border border-dark rounded-sm" style="padding: 3em">
      <h1 class="text-center">¿Quieres Completar tu Pedido?</h1>

      <input type="hidden" name="fechaEntre" id="FechaEntrega" value="<?php echo date("Y-m-d",$mod_date) . "\n";?>">
      <input type="hidden" name="idClient" id="IdCliente" value="<?php echo $user["idEC_FK"]; ?>">
      <input type="hidden" id="totalCart" value="<?php echo $totalcarr;?>">
      <div class="d-flex justify-content-center" style="padding-top: 4em">
      <a href="index.php?paginasProduc=Catalog&pages=1" style="margin: 1em" class="btn btn-secondary btn-lg btn-block" name="button"> Aún faltan cosas <i class="far fa-clock"></i></a>
      <button type="button" style="margin: 1em" class="btn btn-info btn-lg btn-block" id="alerta" name="button" data-toggle="modal" data-target="#Confirma"> ¡Claro! <i class="far fa-check-circle"></i> </button>


      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Confirma" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Pedido Completo!</h5>
          <!--<span aria-hidden="true">&times;</span>-->
        </button>
      </div>
      <div class="modal-body">

          <p>Felicidades el pedido se registró correctamente.</p> <br>
          <p>Seleccione una opción y se enviará un email con la información correspondiente a <h6><strong><?php echo $user["nombreUSUARIO"]; ?> </strong><h6></p>


      </div>
      <div class="modal-footer">
        <form action="index.php?paginasPedidos=PedidoData" method="post">
          <input type="hidden" id="home" name="home" value="home">
          <button class="btn btn-secondary">Volver al Inicio</button>
        </form>
        <form action="index.php?paginasPedidos=PedidoData" method="post">
          <button class="btn btn-info">Ver mis pedidos</button>
        </form>

      </div>
    </div>
  </div>
</div>
