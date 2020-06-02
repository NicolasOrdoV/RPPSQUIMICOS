<?php

if(isset($_GET["id"])){

    $item = "idEC";
    $valor = $_GET["id"];
    $cliente = ControladorClientes::ctrSeleccionarRegistroClientes($item,$valor);
}
?>

<section class="row py-3">
    <aside class="col-lg-3 py-5" id="fondo2"></aside>
    <form action="#" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
        <h1 class="text-danger">RPPS Quimícos</h1>
        <p>Registro Usuario</p>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Nombre del Usuario" id="txt" name="registrarUsuario" value="<?php echo $cliente["correocontEC"]; ?>" required readonly>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" autofocus placeholder="Contraseña" id="txt" name="registrarContraseña" aria-describedby="passwordHelpBlock"required>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Tu contraseña debe tener entre 8 a 20 caracteres, entre letras y números, sin espacios ni emojis.
            </small>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" placeholder="Confirmar contraseña" id="txt" name="registrarContraseñaC" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
                <input type="hidden" class="form-control rounded-pill" id="txt" name="registrarEC" value ="<?php echo $valor;?>">
        </div>
        <?php

        if (isset($_POST["registrarContraseña"])) {
            
            $regCon = $_POST["registrarContraseña"];
            $regConC = $_POST["registrarContraseñaC"];

            if ($regCon == $regConC) {
                $registro = ControladorUsuarios::ctrRegistroUsuarios($_POST);
                if($registro == "ok"){
                    ControladorUsuarios::enviarCorreoUser($_POST);
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    </script>';
                    echo '<div class="alert alert-success">
                        <h2 class="alert-heading"> ¡FELICIDADES!</h2>
                        <p>Registros ingresados de manera safisfactoria</p>
                        <h3 class="font-text-bold">LO PROMETIDO ES DEUDA:</h3>
                        <p>Haz recibido una notificación en tu correo confirmando que creaste esta cuenta.</p>
                        <p>Ahora! Si estas apresurado y no tienes tiempo para mirar el correo,puedes acceder sin problemas al sistema, solo accede al inicio de sesión y entra para conocer todos nuestros productos. </p>
                        <a href="index.php?paginasUsuario=InicioSesion" class="btn btn-success">Ir al inicio de sesión</a>
                    </div>';
                }
                if ($registro == "error") {
                    echo '<div class="alert alert-danger">La contraseña no cumple con las caracteristicas. No usar caracteres especiales</div>';
                }
            }else{
                echo '<div class="alert alert-danger">Los datos no coinciden, por favor revisar</div>';
            }
        }
        ?>
        <button type="submit" id="btnReg" class="btn btn-danger rounded-pill btn-lg btn-block">Terminar registro<i class="fas fa-flask"></i></button>
    </form>
    <aside class="col-lg-3" id="blanco-h"></aside>
</section>