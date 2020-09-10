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
<div style="padding-left: 15em; padding-right: 13em; padding-top: 5em; padding-bottom: 15em">
      <h1 class="text-center">¿Todo está listo?</h1>
      <input type="hidden" name="fechaEntre" id="FechaEntrega" value="<?php echo date("Y-m-d",$mod_date) . "\n";?>">
      <input type="hidden" name="idClient" id="IdCliente" value="<?php echo $user["idEC_FK"]; ?>">
      <input type="hidden" id="totalCart" value="<?php echo $totalcarr;?>">
      <button type="button" class="btn btn-primary" id="alerta" name="button"> Si </button>
      <button type="button" class="btn btn-danger" id="alerta" name="button"> No </button>      
</div>
<div id="productoDetallado"></div>
