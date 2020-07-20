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
<section class="row">
    <div id="blanco" class="col-lg-12">
        <h1 id="tlprin">Producto</h1>
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
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Selecciona la materia prima utilizada</label>
                                <center> <select name="idMP_FK" id="mpsc" class="form-control">
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

                        </div>
                        <div class="col-md-3">
                            <button id="addc" class="btn btn-success mt-4"><i class="fas fa-plus"></i></button>
                        </div>
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

                        <button id="submincant" class="btn btn-success">Agregar</button>
                    </div>
                <!--</form>!-->


            </div>

        </div>


    </aside>

    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
