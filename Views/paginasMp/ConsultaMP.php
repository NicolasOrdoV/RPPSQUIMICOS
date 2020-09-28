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
$mps = MPController::consult(null, null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Materia Prima</h1>
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
        <div class="col-12 justify-content-between">
            <input class="form-control mb-4 col-lg-7 border border-danger rounded-pill" id="tableSearch" type="text" placeholder='Busca aqui la materia prima registrada que quieras &#x1F50E;' onclick="search()">
            <spam class="primary-btn rounded float-right" data-toggle="modal" data-target="#agregar">+Agregar</spam>
        </div>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CAS</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($mps as $mp) : ?>
                    <tr>
                        <td><?php echo $mp["idMP"] ?></td>
                        <td><?php echo $mp["identificacionMP"]; ?></td>
                        <td><?php echo $mp["nombreMP"]; ?></td>
                        <td><?php echo $mp["tipoMP"]; ?></td>
                        <td><?php echo $mp["cantMP"]; ?></td>
                        <td><?php echo $mp["estadoMP"]; ?></td>
                        <td>
                            <div class="btn-group">
                                <form action="index.php?paginasMp=RegistroMP&id=<?php echo $mp["idMP"] ?>" method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $mp["idMP"] ?>" name="id">
                                    <button class="btn btn-warning m-1"  title="Editar"><i class="far fa-edit"></i></button>

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

    <div class="modal fade " id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva materia prima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-pill" placeholder="Número CAS" id="txt" name="identMP" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control rounded-pill" placeholder="Nombre" id="txt" name="nombreMP" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <center>
                                    <h5>Tipo</h5>
                                    <div class="form-check">
                                        <label for="tipo1">
                                          <input type="radio" name="tipoMP" id="tipo1" value="LIQUIDO">Liquido
                                        </label>
                                        <label for="tipo1">
                                          <input type="radio" name="tipoMP" id="tipo2" value="SOLIDO">Solido
                                        </label>
                                        <label for="tipo1">
                                          <input type="radio" name="tipoMP" id="tipo3" value="ENVASE">
                                          <label class="form-check-label" for="tipo3">Envase
                                        </label>
                                    </div>
                                </center>
                            </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="primary-btn">Agregar</button>
                    <?php
                    $registro = MPController::save($_POST);
                    if ($registro == "ok") {
                      echo '<script>Push.create("Felicidades!", {
                      body: "La materia prima se ha registrado exitosamente!",
                      icon: "Assets/img/logo2.png",
                      timeout: 4000,
                      onClick: function () {
                          window.location="?paginasMp=ConsultaMP";
                          this.close();
                      },
                      onClose:function () {
                          window.location="?paginasMp=ConsultaMP";
                      }
                    });</script>';
                    }
                    ?>

                </div>
                </form>
                </form>
            </div>
        </div>
    </div>

    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
