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
if (isset($_GET['id'])) {
    $item = "idPRODUCTO";
    $valor = $_GET['id'];
    $producto = ControladorInventario::ctrSeleccionarProductosStock($item, $valor);
}
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Editar Producto</h1>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="card w-50 m-auto">
        <div class="card-header">
            <h5 class="m-auto">Editar producto</h5>
        </div>
        <div class="card-body w-100">
            <form action="#" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="idPRODUCTO" value="<?php echo $producto["idPRODUCTO"]?>">
                <div class="form-group">
                    <label>Nombre del producto</label>
                    <input type="text" required name="nombrePRODUCTO" class="form-control" placeholder="Ingrese Nombre del producto" value="<?php echo $producto['nombrePRODUCTO']?>">
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                </div>
                <div class="form-group">
                    <label>Descripción del producto</label>
                    <input type="text" rows="3" name="descripcionPRODUCTO" required class="form-control" placeholder="Ingrese la descripción del producto" value="<?php echo $producto['descripcionPRODUCTO']?>">
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                </div>

                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantPRODUCTO" required class="form-control" required placeholder="Ingrese la cantidad del producto" value="<?php echo $producto['cantPRODUCTO']?>">
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                </div>

                <div class="form-group">
                    <label>Valor</label>
                    <input type="number" name="valoruPRODUCTO" required class="form-control" placeholder="Ingrese el valor unitario del producto" value="<?php echo $producto['valoruPRODUCTO']?>">
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                </div>   
        </div>
        <div class="card-footer m-auto">
            <button type="submit" class="btn btn-danger rounded-pill">Actualizar</button>
            <a href="index.php?paginasAdministradores=GestionInventario" class="btn btn-primary rounded-pill">Volver</a>
        </div>
        <?php
        $actualizar = ControladorInventario::ctrActualizarProducto($_POST);
        if ($actualizar == "ok") {
            echo '<script>
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=GestionInventario"
            },1000)
            </script>';
        }
        ?>
        </form>
    </div>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>