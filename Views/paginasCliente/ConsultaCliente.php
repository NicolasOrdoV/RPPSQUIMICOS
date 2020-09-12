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
$clientes = ControladorClientes::ctrSeleccionarRegistroClientes(null,null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Lista de clientes</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Lista de cliente</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row py-5">
  <div style="padding-left: 14em; padding-right: 12em">

    <input class="form-control mb-4 col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el cliente registrado que quieras &#128269;" onclick="search()">
    <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>IDENTIFICACION DEL CLIENTE</th>
                <th>NOMBRE O EMPRESA DEL CLIENTE</th>
                <th>TELEFONO DEL CLIENTE</th>
                <th>DIRECCION DEL CLIENTE</th>
                <th>BARRIO DEL CLIENTE</th>
                <th>NOMBRE DE CONTACTO DEL CLIENTE</th>
                <th>TELEFONO DE CONTACTO DEL CLIENTE</th>
                <th>CORREO DE CONTACTO DEL CLIENTE</th>
                <th>ESTADO DEL CLIENTE</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="myTable">

        <?php foreach ($clientes as $cliente):?>
            <tr>
                <td><?php echo $cliente["idEC"]; ?></td>
                <td><?php echo $cliente["identificacionEC"]; ?></td>
                <td><?php echo $cliente["nombreEC"]; ?></td>
                <td><?php echo $cliente["telefonoEC"]; ?></td>
                <td><?php echo $cliente["direccionEC"]; ?></td>
                <td><?php echo $cliente["nombreBarrio"]; ?></td>
                <td><?php echo $cliente["nombrecontEC"]; ?></td>
                <td><?php echo $cliente["telefonocontEC"]; ?></td>
                <td><?php echo $cliente["correocontEC"]; ?></td>
                <td><?php echo $cliente["estadoUSUARIO"]; ?></td>
                <td>

                    <div class="btn-group">
                        <form action="#" method="post" class="text-left">
                          <input type="hidden" value="<?php echo $cliente["idEC"]?>" name="eliminarRegistro">
                        <button type="submit" class="btn btn-danger m-1">
                            <i class="fas fa-trash"></i>
                        </button>
                        <?php

                        $eliminar = new ControladorClientes();
                        $eliminar ->ctrEliminarRegistroClientes($_POST);

                        ?>
                        </form>
                        <div class="btn-group-vertical">
                            <?php if($cliente["estadoUSUARIO"] == "Inactivo") :?>
                                <form method="post">
                                    <input type ="hidden" value ="<?php echo $cliente["idUSUARIO"];?>" name="activarRegistro">
                                <button class="btn btn-primary" id="habilitar">Activar</button>

                                <?php

                                $activar = new ControladorClientes();
                                $activar ->ctrActivarRegistroClientes();

                                ?>
                                </form>
                            <?php elseif($cliente["estadoUSUARIO"] == "Activo"):?>
                                <form method="post">
                                    <input type ="hidden" value ="<?php echo $cliente["idUSUARIO"];?>" name="inactivarRegistro">
                                <button class="btn btn-danger" id="deshabilitar">Inactivar</button>

                                <?php

                                $inactivar = new ControladorClientes();
                                $inactivar ->ctrInactivarRegistroClientes();

                                ?>
                                </form>
                            <?php endif ?>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
</div>
