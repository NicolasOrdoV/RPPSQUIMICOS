<?php
if (isset($_GET["id"])) {
    
    $item = "idUSUARIO";
    $valor = $_GET["id"];
    $user = ControladorUsuarios::ctrSeleccionarUsuarios($item,$valor);
}
?>
<div class="row py-3">
    <aside class="col-lg-3 py-5" id="fondo1"></aside>
    <form action="#" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
        <h1 class="text-danger">RPPS Quimícos</h1>
        <p>Nueva contraseña</p>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" placeholder="Nueva contraseña*" id="txt" name="actualizarConU" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" placeholder="Confirmar contraseña*" id="txt" name="actualizarConUC" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <div class="form-group">
            <input type="hidden" name="actualizarIdU" value="<?php echo $user["idUSUARIO"]?>">
        </div>
        <?php
            if (isset($_POST["actualizarConU"])) {
                $acConU = $_POST["actualizarConU"];
                $acConUC = $_POST["actualizarConUC"];

                if ($acConU == $acConUC) {
                                    
                $actualizar = ControladorUsuarios::ctrActualizarRegistroConUsuario();
                    if ($actualizar == "ok") {
                        echo '<script>
                            if(window.history.replaseState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                            </script>';
                        echo '<div class="alert alert-success">
                             <h2 class="alert-heading">Excelente</h2>
                            <p>Se ha actualizado tu contraseña de manera safistactoria. por favor inicia sesión para conocer todos nuestros productos</p>
                            <a href="index.php?paginasUsuario=InicioSesion" class="btn btn-success">Ir al inicio de sesión</a>
                            </div>';
                    }
                }else{
                    echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
                }
            }
        ?>
        <button type="submit" id="btnReg" class="btn btn-danger rounded-pill btn-lg btn-block">Recuperar<i class="fas fa-flask"></i></button>
    </form>
    <aside class="col-lg-3" id="blanco-h"></aside>
</div>