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
$ing = IMPController::consult(null, null);
$mps = MPController::consult(null, null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Ingreso de Materia Prima</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Lista de materia prima</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui el ingreso registrado que quieras &#x1F50E;' onclick="search()">
        <spam class="primary-btn rounded float-right" data-toggle="modal" data-target="#agregar">+Agregar</spam>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($ing as $i) : ?>
                    <tr>
                        <td><?php echo $i["idIMP"] ?></td>
                        <td><?php echo $i["fechaIMP"]; ?></td>
                        <td><?php echo $i["empleado"]; ?></td>
                        <td>
                            <div class="btn-group">
                                <form action="index.php?paginasIngresoMp=VerIMP&id=<?php echo $i["idIMP"]; ?>" method="post">
                                  <input type="hidden" name="id" value="<?php echo $i["idIMP"]; ?>">
                                  <button type="submit" class="btn btn-info" title="Ver"><i class="fas fa-eye"></i></button>
                                </form>
                            </div>


                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>

    <div class="modal fade " id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo ingreso de materia prima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="#" method="post">
                        <form action="#" method="POST">!-->
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Materia Prima</label>
                                <input type="hidden" id="user" value="<?php echo $admin['idEMPLEADO'] ?>">
                                <center> <select name="idMP_FK" id="mpsi" class="form-control">
                                        <option value="">Seleccione..</option>
                                        <?php
                                        foreach ($mps as $mp) {
                                        ?>
                                            <option value="<?php echo $mp['idMP'] ?>"><?php echo $mp['nombreMP'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></center>
                            </div>
                            <div class="form-group m-5">
                                <input type="number" class="form-control rounded-pill" placeholder="Cantidad" id="canti" name="cantidadDI" min="1" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <button id="addi" class="btn btn-success mt-4">+</button>
                        </div>
                    </div>

                    <section class="col-md-12 flex-nowrap table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>MP</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="list-mpsi">

                            </tbody>
                        </table>
                    </section>

                    <div class="modal-footer">


                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="submin" class="primary-btn rounded">Agregar</button>
                    </div>

                </div>
                <!-- </form>


                </form>!-->
            </div>
        </div>
    </div>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
