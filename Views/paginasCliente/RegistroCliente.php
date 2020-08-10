<?php $locates = LocatesController::selectLocates();?>
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
            <input type="number" class="form-control rounded-pill" autofocus placeholder="Número de identificación*" name="registroIdentificacion" min="11" max="9999999999" required value="<?php echo isset($_POST['registroIdentificacion']) ? $_POST['registroIdentificacion'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group row">
            <div class="col-lg-8">
                <input type="text" class="form-control rounded-pill" placeholder="Nombre de persona o empresa*"  name="registroNombreCom" required value="<?php echo isset($_POST['registroNombreCom']) ? $_POST['registroNombreCom'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control rounded-pill" placeholder="Teléfono fijo de la persona o empresa*"  name="registroTelefono" min="1111" max="9999999" required value="<?php echo isset($_POST['registroTelefono']) ? $_POST['registroTelefono'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" placeholder="Dirección de la persona o empresa*"  name="registroDireccion" required value="<?php echo isset($_POST['registroDireccion']) ? $_POST['registroDireccion'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <select class="form-control rounded-pill" id="lista1" name="lista1">
                    <option value="0">Seleccione la localidad donde vive...</option>
                    <?php foreach($locates as $locate):?>
                        <option value="<?php echo $locate['idLOCALIDAD']?>"><?php echo $locate['nombreLOCALIDAD']?></option>
                    <?php endforeach ?>
                </select>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            
            <div id="select2lista" class="col-lg-6">
                
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-8">
                <input type="text" class="form-control rounded-pill" placeholder="Nombre contacto*"  name="registroNContacto" required value="<?php echo isset($_POST['registroNContacto']) ? $_POST['registroNContacto'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control rounded-pill" placeholder="Teléfono contacto*" name="registroTContacto" min="1111111" max="9999999999" required value="<?php echo isset($_POST['registroTContacto']) ? $_POST['registroTContacto'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            
        </div>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Correó Electronico*"  name="registroEmail" required value="<?php echo isset($_POST['registroEmail']) ? $_POST['registroEmail'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" required>Acepta los <a href="#">términos y condiciones</a> para continuar con el registro
              <div class="valid-feedback">Valido.</div>
              <div class="invalid-feedback">Debes aceptar los terminos y condiciones.</div>
            </label>
        </div>
        <?php
           $answer = new ControladorClientes();
           $answer -> ctrRegistroClientes();
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
<script src="Assets/js/vendor/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#lista1').val(1);
        recargarLista();

        $('#lista1').change(function(){
            recargarLista();
        });
    }) 
</script>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
            url:"Views/paginasCliente/datos.php",
            data:"barrio=" + $('#lista1').val(),
            success:function(r){
                $('#select2lista').html(r);
            }
        });
    }
</script>
