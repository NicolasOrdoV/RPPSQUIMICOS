<?php
if(!isset($_SESSION["validarIngreso"])){

    echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
    return;
}else{
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
        return;
    }
}
$produc = ProdController::consult(null, null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html" class="text-dark">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html" class="text-dark">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12">
        <h1 id="tlprin">Producto</h1>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui el producto registrado que quieras &#x1F50E;' onclick="search()">
        <a href="?paginasProduc=NuevoProd" class="btn btn-danger rounded float-right" >+Agregar</a>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Medida</th>
                    <th>Valor unitario</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($produc as $p) : ?>
                    <tr>
                        <td><?php echo $p["idPRODUCTO"] ?></td>
                        <td>
                            <img src="Assets/img/Productos/<?php echo $p["imgPRODUCTO"] ?>" class="img-fluid rounded border border-ligth b" width="150">
                        </td>
                        <td><?php echo $p["nombrePRODUCTO"]; ?></td>
                        <td><?php echo $p["descripcionPRODUCTO"]; ?></td>
                        <td><?php echo $p["medidaPRODUCTO"]; ?></td>
                        <td><?php echo $p["valoruPRODUCTO"]; ?></td>
                        <td><?php echo $p["cantPRODUCTO"]; ?></td>
                        <td><?php echo $p["estadoPRODUCTO"]; ?></td>
                        <td>
                            <div class="btn-group">
                              <form action="index.php?paginasProduc=AgregarProd" method="post" class="text-left">
                                  <input type="hidden" value="<?php echo $p["idPRODUCTO"] ?>" name="id">
                                  <button class="btn btn-success m-1" title="Agregar"><i class="fas fa-plus"></i></button>

                              </form>
                                <form action="index.php?paginasProduc=RegistroProduc" method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $p["idPRODUCTO"] ?>" name="id">
                                    <button class="btn btn-warning m-1" title="Editar"><i class="far fa-edit"></i></button>

                                </form>
                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $p["idPRODUCTO"] ?>" name="eliminarRegistro">
                                    <button type="submit" class="btn btn-danger m-1" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <?php

                                    $eliminar = new ProdController();
                                    $eliminar->delete();

                                    ?>
                                </form>
                            </div>


                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>