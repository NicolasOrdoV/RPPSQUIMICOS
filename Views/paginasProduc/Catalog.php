<?php $producto = ControladorInventario::ctrSeleccionarProductosUsuario(null,null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Catálogo de productos</h1>
            </div>
        </div>
    </div>
</section>
<!------Seccion con espacios en blanco horizontales y catalogo de productos--->
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="row">         
            <?php foreach ($producto as $stocks) : ?>
                <div class="card" style="width: 18rem; display: inline-block;">
                    <a href="index.php?paginasCliente=DetalleProducto&id=<?php echo $stocks["idPRODUCTO"]?>">
                        <img src="/RPPSQUIMICOS/Assets/img/Productos/<?php echo $stocks["imgPRODUCTO"] ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $stocks["nombrePRODUCTO"]; ?></h5>
                        <p class="card-text"><?php echo $stocks["descripcionPRODUCTO"]; ?></p>
                        <p class="card-text">precio:$<?php echo $stocks["valoruPRODUCTO"]; ?></p>
                        <a href="index.php?paginasCliente=DetalleProducto&id=<?php echo $stocks["idPRODUCTO"]?>" class="btn btn-danger">Ver <i class="fas fa-search"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div><br>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
