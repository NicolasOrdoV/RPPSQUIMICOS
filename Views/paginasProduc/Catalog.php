<?php
    if(isset($_POST["busqueda"])){
        $busqueda=$_POST["busqueda"];
        $productos = ControladorInventario::ctrSeleccionarProductosUsuario(null,null);
        //var_dump($busqueda);
        $articlePages = 4;
        $totalProducts = count($productos);
        $pages = $totalProducts/4;
        $pages = ceil($pages);
        if (!($_GET)) {
            header('Location:?paginasProduc=Catalog&pages=1');
        }
        if ($_GET['pages']>$pages || $_GET['pages']<= 0 ) {
           header('Location:?paginasProduc=Catalog&pages=1');
        }
        $init = ($_GET['pages']-1)*$articlePages;
        $producto = ControladorInventario::ctrSeleccionarProductosBusqueda($busqueda,$init,$articlePages);
    }else{
        $productos = ControladorInventario::ctrSeleccionarProductosUsuario(null,null);
        $articlePages = 4;
        $totalProducts = count($productos);
        $pages = $totalProducts/4;
        $pages = ceil($pages);
        if (!($_GET)) {
            header('Location:?paginasProduc=Catalog&pages=1');
        }
        if ($_GET['pages']>$pages || $_GET['pages']<= 0 ) {
           header('Location:?paginasProduc=Catalog&pages=1');
        }
        $init = ($_GET['pages']-1)*$articlePages;
        $producto = ControladorInventario::ctrListPages($init,$articlePages);
        //echo $pages;
    }
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Catálogo de productos</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Catalogo de productos</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!------Seccion con espacios en blanco horizontales y catalogo de productos
<form  method="post" action="?paginasProduc=Catalog">
    <select name="busqueda" id="busqueda">
        <option value="">Todos</option>
        <option value="Thinner">Thinners</option>
        <option value="Alcohol">Alcoholes</option>
        <option value="Varsol">Varsoles</option>
        <option value="Destapa Cañerias">Destapa Cañerias</option>
        <option value="Liquido Muriatico">Liquidos Muriaticos</option>
    </select>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>--->

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
                        <a href="index.php?paginasCliente=DetalleProducto&id=<?php echo $stocks["idPRODUCTO"]?>" class="btn btn-info">Ver <i class="fas fa-search"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div><br>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
    <div class="m-auto">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item <?php echo $_GET['pages']<=1 ? 'disabled' : '' ;?>"><a class="page-link" href="?paginasProduc=Catalog&pages=<?php echo $_GET['pages']-1;?>"><i class="fas fa-arrow-left"></i></a></li>
            <?php for ($i=0; $i < $pages ; $i++) { ?>
                <li class="page-item <?php echo $_GET['pages']==$i+1 ? 'active' : '' ;?>"><a class="page-link" href="?paginasProduc=Catalog&pages=<?php echo $i+1?>"><?php echo $i+1 ?></a></li>
            <?php } ?>
            <li class="page-item <?php echo $_GET['pages']>=$pages ? 'disabled' : '' ;?>"><a class="page-link" href="?paginasProduc=Catalog&pages=<?php echo $_GET['pages']+1;?>"><i class="fas fa-arrow-right"></i></a></li>
          </ul>
        </nav>
    </div>
</section>
<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
