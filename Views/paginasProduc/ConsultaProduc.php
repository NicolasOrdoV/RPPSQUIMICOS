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
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Producto</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Lista de productos</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui el producto registrado que quieras &#x1F50E;' onclick="search()">
        <a href="?paginasProduc=NuevoProd" class="primary-btn float-right" >+Agregar</a>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
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
                                <?php if ($p["estadoPRODUCTO"]=="Activo"){ ?>


                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $p["idPRODUCTO"] ?>" name="inactivarP">
                                    <button type="submit" class="btn btn-danger m-1" title="Inactivar">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                    <?php

                                    $inactivar = new ProdController();
                                    $inactivar->inactivar();

                                    ?>
                                </form>
                              <?php }else{?>
                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $p["idPRODUCTO"] ?>" name="activarP">
                                    <button type="submit" class="btn btn-info m-1" title="Activar">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    <?php

                                    $activar = new ProdController();
                                    $activar->activar();

                                    ?>
                                </form>

                              <?php }  ?>
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
