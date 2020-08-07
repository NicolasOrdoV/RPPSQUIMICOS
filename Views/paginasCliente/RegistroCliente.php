<?php $barrios = ControladorBarrios::ctrSeleccionarBarrios();?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Registrate con nosotros</h1>
            </div>
        </div>
    </div>
</section>
<section class="row py-3">
    <aside class="col-lg-3 py-5" id="fondo2"></aside>
    <form action="#" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
        <h1 class="text-danger">RPPS Quimícos</h1>
        <p>Registro inicial</p>
        <div class="form-group">
            <input type="number" class="form-control rounded-pill" autofocus placeholder="Número de identificación*" id="txt" name="registroIdentificacion" min="11" max="9999999999" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" placeholder="Nombre de persona o empresa*" id="txt" name="registroNombreCom" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="number" class="form-control rounded-pill" placeholder="Teléfono fijo de la persona o empresa*" id="txt" name="registroTelefono" min="1111" max="9999999" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" placeholder="Dirección de la persona o empresa*" id="txt" name="registroDireccion" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input list="strets" class="form-control rounded-pill" id="txt" name="registroBarrios" placeholder="En este buscador selecciona el barrio de residencia*" required>
            <datalist id="strets">
                <?php foreach ($barrios as $key => $value):?>                   
                <option><?php echo $value["idBARRIO"]. ". "; echo $value["nombreBARRIO"]. "-"; echo $value["nombreLOCALIDAD"]?></option>
                <?php endforeach ?>
            </datalist>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" placeholder="Nombre contacto*" id="txt" name="registroNContacto" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="number" class="form-control rounded-pill" placeholder="Teléfono contacto*" id="txt" name="registroTContacto" min="1111111" max="9999999999" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Correó Electronico*" id="txt" name="registroEmail" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" required>Acepta los <u>términos y condiciones</u> para continuar con el registro
              <div class="valid-feedback">Valido.</div>
              <div class="invalid-feedback">Debes aceptar los terminos y condiciones.</div>
            </label>
        </div>
        <?php
        if (isset($_POST['registroIdentificacion'])) {
            if (preg_match('/^[0-9]+$/', $_POST['registroIdentificacion']) &&
                filter_var($_POST['registroEmail'] , FILTER_VALIDATE_EMAIL)) {

                $registro = ControladorClientes::ctrRegistroClientes($_POST);
                if(!is_null($registro)){
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location = "index.php?paginasUsuario=RegistrarUsuario&id='.$registro[0][0].'";
                    </script>';          
                }
            }else{
                echo '<div class="alert alert-danger">Lo sentimos,hay campos que no estan correctos y deben corregirse</div>';
            }
        }
        ?> 
        <button type="submit" id="btnReg" class="primary-btn">Continuar<i class="fas fa-angle-double-right"></i></button>
    </form>
    <aside class="col-lg-3" id="blanco-h"></aside>
</section>
<section class="row py-1">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 border border-secondary pt-4" id="in">
        <p>¿Ya tienes una cuenta?
            <a href="index.php?paginasUsuario=InicioSesion" id="in1">Inicia sesión</a>
        </p>
    </div>
    <div class="col-lg-4"></div>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
