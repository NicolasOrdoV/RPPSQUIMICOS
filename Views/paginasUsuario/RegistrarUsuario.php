<?php

if(isset($_GET["id"])){

    $item = "idEC";
    $valor = $_GET["id"];
    $cliente = ControladorClientes::ctrSeleccionarRegistroClientes($item,$valor);
}
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Registro de usuarios</h1>
            </div>
        </div>
    </div>
</section>
<div class="cont my-5">
   <div class="form sign-in mx-1">
    <form action="#" class="needs-validation" method="post" novalidate>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Nombre del Usuario" name="registrarUsuario" value="<?php echo $cliente["correocontEC"]; ?>" required readonly>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" autofocus placeholder="Contraseña" name="registrarContraseña" aria-describedby="passwordHelpBlock"required>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Tu contraseña debe tener entre 8 a 20 caracteres, entre letras y números, sin espacios ni emojis.
            </small>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-pill" placeholder="Confirmar contraseña" name="registrarContraseñaC" required>
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
                        echo '<div class="alert alert-primary">
                            <h2 class="alert-heading"> ¡FELICIDADES!</h2>
                            <p>Registros ingresados de manera safisfactoria</p>
                            <h3 class="font-text-bold">LO PROMETIDO ES DEUDA:</h3>
                            <p>Haz recibido una notificación en tu correo confirmando que creaste esta cuenta.</p>
                            <p>Ahora! Si estas apresurado y no tienes tiempo para mirar el correo,puedes acceder sin problemas al sistema, solo accede al inicio de sesión y entra para conocer todos nuestros productos. </p>
                            <a href="index.php?paginasUsuario=InicioSesion" class="btn btn-primary">Ir al inicio de sesión</a>
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
        <div class="form-button">
            <button id="submit" type="submit" class="submit butone">Terminar registro</button>
        </div>
    </form>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2 class="text-light">Excelente</h2>
        <p>Termina tu registro y comienza a navegar con nosotros.</p>
      </div>
    </div>
  </div>
</div>