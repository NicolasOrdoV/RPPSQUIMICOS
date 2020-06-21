<?php
if (isset($_GET["id"])) {
    $item  = "idPRODUCTO";
    $valor = $_GET["id"];
    $stock = ControladorInventario::ctrSeleccionarProductosStock($item,$valor);
    $consulta = ControladorProductos::ctrSeleccionarProductos();
  }
?>
<section class="row py-5">
	<aside class="col-lg-1"></aside>
    <div class="col-lg-4">
    	<img src="Assets/img/Productos/<?php echo $stock["imgPRODUCTO"] ?>" class="img-fluid rounded border border-ligth b">
    </div>
    <aside class="col-lg-2"></aside>
    <form  id="form" class="col-lg-4 border border-dark" action="#" method="post" oninput="x.value=parseInt(a.value)">
    <div id="productoDetallado">
      <input id="idProd" type="hidden" name="" value="">
    	<h1 name="nombreProd" id="nombreProd"><?php echo $stock["nombrePRODUCTO"]?></h1>
    	<p class="mb" name="descripcionProd" id="descripcionProd"><?php echo $stock["descripcionPRODUCTO"]?></p>
    	<h1 class="mb-5"name="valoruProd" id="valoruProd">$<?php echo $stock["valoruPRODUCTO"]?></h1>
        <h4 class="mb" name="cantProd" id="cantProd">Cantidad existente: <?php echo $stock["cantPRODUCTO"]?></h4>
    	<p class="mb-5">Unidades: 1
          <input type="range" id="a" name="a" min="1" max="<?php echo $stock["cantPRODUCTO"]; ?>" value="1" step="2">
          <?php echo $stock["cantPRODUCTO"] ?>
          <input type="number" id="b" name="x" for="a" value="1" class="form-control rounded-pill"></p>
        <button id="btn_carrito" class="btn btn-primary" data-producto="<?php echo $stock["idPRODUCTO"]; ?>">Añadir al carrito <i class="fas fa-cart-plus"></i></button>
    </div>
    <a href="index.php" class="btn btn-danger my-1">Volver a la tienda <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
    </form>
    <aside class="col-lg-1"></aside>
</section>
<script type="text/javascript">
  var consulta = <?php echo json_encode($consulta); ?>;
</script>
