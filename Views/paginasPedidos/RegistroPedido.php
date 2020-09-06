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
$prd=ProdController::consult(null,null);
$clie= ControladorClientes::ctrSeleccionarRegistroClientes(null, null);
//$_SESSION[];
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Registrar Pedido</h1>
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
                <a href="index.php?paginasAdministradores=MenuInicio" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
                <h1 class="text-danger">Nuevo Pedido</h1>

                <!--<form method="POST">!-->
                    <div class="form-group">
                        <h2><?php echo date("d-m-y") ?></h2>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="cantiP" name="canti" min="1" placeholder="Cantidad a ingresar">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Selecciona el Producto</label>
                                <center> <select name="idMP_FK" id="Prds" class="form-control">
                                        <option value="">Seleccione..</option>
                                        <?php
                                        foreach ($prd as $pd) {
                                        ?>
                                            <option value="<?php echo $pd['idPRODUCTO'] ?>"><?php echo $pd['nombrePRODUCTO']." ".$pd["medidaPRODUCTO"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></center>
                            </div>
                            <div class="form-group">
                              <label>Selecciona el cliente</label>
                              <center> <select name="idMP_FK" id="cliPed" class="form-control">
                                      <option value="">Seleccione..</option>
                                      <?php
                                      foreach ($clie as $cl) {
                                      ?>
                                          <option value="<?php echo $cl['idEC'] ?>"><?php echo $cl['nombreEC'] ?></option>
                                      <?php
                                      }
                                      ?>
                                  </select></center>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <button id="btnP" class="btn btn-success mt-4"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <section class="col-md-12 flex-nowrap table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="PrdsLS">

                            </tbody>
                        </table>
                    </section>
                    <div class="form-group">

                        <button id="finalPed" class="primary-btn">Agregar</button>
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
