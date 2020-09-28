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
$mps=MPController::consult(null,null);
$data=ProdController::getById();
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Agregar envasado al producto</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-dark">Lista de productos<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Agregar envasado al producto</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="row py-3">
            <aside class="col-lg-3 py-5" id="fondo2"></aside>
            <div class="col-lg-7 py-5 needs-validation" id="form" novalidate>
                <a href="index.php?paginasProduc=ConsultaProduc" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
                <h1 class="text-danger">Agregar a existencia</h1>

                <!--<form method="POST">!-->
                    <div class="form-group">
                      <input type="hidden" id="prod" value="<?php echo $data["idPRODUCTO"]; ?>">
                      <input type="hidden" id="medida" value="<?php echo $data["medidaPRODUCTO"]; ?>">
                        <h2><?php echo $data["nombrePRODUCTO"]; ?></h2>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="canti" name="canti" min="1" placeholder="Cantidad a ingresar">
                        <h3 class="card-title"  id="mostrarCantidad"><strong></strong></h3>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Selecciona la materia prima utilizada</label>
                                <center> <select name="idMP_FK" id="mpsc" class="form-control">
                                        <option value="">Seleccione..</option>
                                        <?php
                                        foreach ($mps as $mp) {
                                          if ($mp["estadoMP"]!="Inactivo") {

                                        ?>
                                            <option value="<?php echo $mp['idMP'] ?>"><?php echo $mp['nombreMP'] ?></option>
                                        <?php

                                      }else {

                                      }
                                    }
                                        ?>
                                    </select></center>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <button id="addc" class="btn btn-success mt-4"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="alert alert-warning"  id="alertProd" role="alert">
                      <h4 class="alert-heading">Ocurrio un problema</h4>
                      <p id="text-alertProd"></p>
                      <hr>
                    <!--  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>!-->
                    </div>
                    <section class="col-md-12 flex-nowrap table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>MP</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="list-mpsc">

                            </tbody>
                        </table>
                    </section>
                    <div class="form-group">

                        <button id="submincant" class="primary-btn">Agregar</button>
                    </div>
                <!--</form>!-->
            </div>
        </div>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
<script type="text/javascript">
  var consultaMp=<?php echo json_encode($mps);  ?>;
</script>
