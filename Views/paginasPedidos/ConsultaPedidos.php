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
if (isset($_GET["id"])) {
    $item1 = "idEMPLEADO";
    $valor1 = $_GET["id"];
    $admin = ControladorAdministradores::ctrSeleccionarRegistrosAdministradores($item1,$valor1);
}
$pedidos=ControladorPedidos::consultaGeneral(null,null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Pedidos</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Lista de pedidos</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="col-12 justify-content-between">
            <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui el pedido registrado que quieras &#x1F50E;' onclick="search()">
            <a href="?paginasPedidos=RegistroPedido&id=<?php echo $admin['idEMPLEADO']; ?>" class="primary-btn float-right" >+Agregar</a>
        </div>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Fecha Realizado</th>
                    <th>Fecha Entrega</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($pedidos as $p) : ?>
                    <tr>
                        <td><?php echo $p["idPEDIDO"] ?></td>
                        <td><?php echo $p["fecharPEDIDO"]; ?></td>
                        <td><?php echo $p["fechaenPEDIDO"]; ?></td>
                        <td><?php echo $p["clien"]; ?></td>
                        <td><?php echo $p["emple"]; ?></td>
                        <td><?php echo $p["estadoPEDIDO"]; ?></td>
                        <td>
                            <div class="btn-group">
                                <form action="index.php?paginasPedidos=VerPedidoAdmin&id=<?php echo $p["idPEDIDO"] ?>" method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $mp["idPEDIDO"] ?>" name="id">
                                    <button class="btn btn-info m-1"  title="Ver"><i class="fas fa-eye"></i></button>

                                </form>
                                <?php if ($mp["estadoMP"]=="EXISTENCIA"||$mp["estadoMP"]=="AGOTADO"){ ?>


                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $mp["idMP"] ?>" name="inactivarMP">
                                    <button type="submit" class="btn btn-danger m-1" title="Inactivar">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                    <?php

                                    $inactivar = new MPController();
                                    $inactivar->inactivar();

                                    ?>
                                </form>
                              <?php }else{?>
                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $mp["idMP"] ?>" name="activarMP">
                                    <input type="hidden" name="cantMp" value="<?php echo $mp["cantMP"]; ?>">
                                    <button type="submit" class="btn btn-info m-1" title="Activar">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    <?php

                                    $activar = new MPController();
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
