<?php
if (isset($_GET["id"])) {
    $item = "idPRODUCTO";
    $valor = $_GET["id"];
    $stock = ControladorInventario::ctrSeleccionarProductosStock($item,$valor);
}
?>
<section class="row py-5">
	<aside class="col-lg-1"></aside>
    <div class="col-lg-4">
    	<img src="Assets/img/Varsol.jpg" class="img-fluid rounded border border-ligth b">
    </div>
    <aside class="col-lg-2"></aside>
    <form  id="form" class="col-lg-4 border border-dark" method="post" action="index.php?paginasPedidos=CarritoPedido" oninput="x.value=parseInt(a.value)">
    	<h1 name="nombreProd" id="nombreProd"><?php echo $stock["nombrePRODUCTO"]?></h1>
    	<p class="mb" name="descripcionProd" id="descripcionProd"><?php echo $stock["descripcionPRODUCTO"]?></p>
    	<h1 class="mb-5"name="valoruProd" id="valoruProd">$<?php echo $stock["valoruPRODUCTO"]?></h1>
        <h4 class="mb" name="cantProd" id="cantProd">Cantidad existente: <?php echo $stock["cantPRODUCTO"]?></h4>
    	<p class="mb-5">Unidades: 1 
          <input type="range" id="a" name="a" value="0">
          100
          <input type="number" id="b" name="x" for="a" value="1" class="form-control rounded-pill"></p>
        <a href="index.php" class="btn btn-danger"> Volver al listado</a>
        <button class="btn btn-primary">Añadir al carrito</button>
    </form>
    <aside class="col-lg-1"></aside>
</section>