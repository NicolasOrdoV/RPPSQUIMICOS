<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark" id="labelCarrito">Carrito <i class="fa fa-shopping-basket" aria-hidden="true"></i></h1>
            </div>
        </div>
    </div>
</section>
<div style="padding: 10em;">
<br>
<br>
<table class="table">

  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
      <th scope="col">Retirar</th>
    </tr>
  </thead>

<tbody id="productosCarrito">

</tbody>
</table>
  <div class="columns">
    <div class="text-right">
        <h4 class="card-title">Total: </h4>
    </div>
    <div class="text-right">
        <h1 class="card-title" id="totalCarrito"><strong>$0</strong></1>
    </div>
</div>
<?php if ($user == "") : ?>
  <div class="text-right">
    <a href= "index.php?paginasUsuario=InicioSesion" type="button" class="primary-btn rounded">Iniciar Sesion<i class="fas fa-cart-plus"></i></a>
  </div>
<?php elseif($user["idROL_FK"] == 1):?>
  <input type="hidden" id="IdCliente" value="<?php echo $user["idEC_FK"]; ?>">
  <div class="text-right">
    <?php
      $date = date("d-m-Y");
      $mod_date = strtotime($date."+ 2 days");
      $mod_dates = strtotime($date."+ 5 days");
    ?>
    <p>El pedido Llega entre el <strong><?php echo date("d",$mod_date) . "\n";?></strong> de <strong><?php setlocale(LC_TIME, "spanish"); echo(strftime("%B",$mod_date));?> </strong>y<strong> <?php echo date("d",$mod_dates) . "\n";?></strong> de <strong><?php setlocale(LC_TIME, "spanish"); echo(strftime("%B",$mod_dates)); ?></strong></P>
      <input type="hidden" id="FechaEntrega" value="<?php echo date("d-m-y",$mod_date) . "\n";?>">
    <button id="PedidoCompleto" class="primary-btn rounded">Completar Pedido<i class="fas fa-cart-plus"></i></button>
  </div>
<?php endif?>
</div>
<div id="productoDetallado"></div>

