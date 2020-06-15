<?php

$producto = ControladorProductos::ctrSeleccionarProductos();
$barrio = ControladorBarrios::ctrSeleccionarBarrios();

?>
<section class="row py-3">
  <aside class="col-lg-3 py-5" id="fondo2"></aside>
  <form action="#" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
    <h1 class="text-danger">RPPS Quimícos</h1>
    <p>Registro Pedidos</p>
    <div class="form-group">
      <input list="products" class="form-control rounded-pill" id="txt" name="registroProductos" placeholder="En este buscador selecciona el barrio de residencia*" required>
      <datalist id="products">
        <?php foreach ($barrio as $key => $value) : ?>
          <option><?php echo $value["idBARRIO"] . ". ";
                  echo $value["nombreBARRIO"] ?></option>
        <?php endforeach ?>
      </datalist>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control rounded-pill" placeholder="Cantidad Pedido" id="txt" name="registroCantidad" required>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control rounded-pill" placeholder="Subtotal" id="txt" name="registroSubtotal" required>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <button type="submit" class="btn btn-success">Completar Pedido</button>
  </form>
</section>