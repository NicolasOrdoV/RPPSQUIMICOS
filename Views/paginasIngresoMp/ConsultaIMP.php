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
$mps = MPController::consult(null, null);

?>
<section class="row">
    <div id="blanco" class="col-lg-10">
        <h1 id="tlprin">Ingreso de Materia Prima</h1>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui el ingreso registrado que quieras &#x1F50E;' onclick="search()">
        <spam class="btn btn-danger rounded float-right" data-toggle="modal" data-target="#agregar">+Agregar</spam>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
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
                                <center> <select name="idMP_FK" id="mps" class="form-control">
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
                            <div class="form-group">
                                <input type="number" class="form-control rounded-pill" placeholder="Cantidad" id="cant" name="cantidadDI" min="0" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <button id="add" class="btn btn-success mt-4">+</button>
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
                            <tbody id="list-mps">

                            </tbody>
                        </table>
                    </section>

                    <div class="modal-footer">

                        <button id="submin" class="btn btn-success">Agregar</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
                <!-- </form>


                </form>!-->
            </div>
        </div>
    </div>

    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
