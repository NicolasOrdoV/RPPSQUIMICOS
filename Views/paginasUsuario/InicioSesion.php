<?php $locates = LocatesController::selectLocates();?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Inicio Sesion/Registrarse</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html" class="text-dark">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html" class="text-dark">Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<div class="cont my-5">
  <div class="form sign-in mx-1">
    <form action="#" method="POST" class="needs-validation" novalidate>
      <div class="text-center">
        <img src="Assets/img/Logo1.png" class="img-fluide" width="200">
        <h2 class="text-center">Iniciar Sesión</h2>
      </div>
        <?php
            $ingreso = new ControladorUsuarios();
            $ingreso -> ctrIngresoUsuario();
        ?>
        <div class="form-group">
            <span>Correo electronico</span>*
            <input type="email" name="ingresoNombre" required />
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <div class="form-group">
            <span>Contraseña</span>*
            <input type="password" name="ingresoContraseña" required />
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <p class="forgot-pass"><a href="index.php?paginasUsuario=RecuperarContrasena">¿Se te olvido tu contraseña?</a></p>
        <button type="submit" class="submit butone">Ingresar</button>
    </form>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2 class="text-light">¿Nuevo aqui?</h2>
        <p>Registrate para conocer mas de esta maravillosa tienda, ¡adentrate! Se que te va a a encantar</p>
      </div>
      <div class="img__text m--in">
        <h2 class="text-light">¿Ya eres uno de los nuestros?</h2>
        <p>Si ya tienes una cuenta, ven y inicia sesión con nosotros.</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Registrate</span>
        <span class="m--in">Inicia sesión</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2 class="text-center my-2">Registrate</h2>
      <form action="#" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
            <input type="number" placeholder="Número de identificación*" name="registroIdentificacion" min="11" max="9999999999" required value="<?php echo isset($_POST['registroIdentificacion']) ? $_POST['registroIdentificacion'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" placeholder="Nombre de persona o empresa*"  name="registroNombreCom" required value="<?php echo isset($_POST['registroNombreCom']) ? $_POST['registroNombreCom'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            <div class="col-lg-6">
                <input type="number" placeholder="Teléfono fijo de la persona o empresa*"  name="registroTelefono" min="1111" max="9999999" required value="<?php echo isset($_POST['registroTelefono']) ? $_POST['registroTelefono'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Dirección de la persona o empresa*"  name="registroDireccion" required value="<?php echo isset($_POST['registroDireccion']) ? $_POST['registroDireccion'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group">
            <select class="form-control" id="lista1" name="lista1">
                <option value="0">Selecciona la localidad donde vives</option>
                <?php foreach($locates as $locate):?>
                    <option value="<?php echo $locate['idLOCALIDAD']?>"><?php echo $locate['nombreLOCALIDAD']?></option>
                <?php endforeach ?>
            </select>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div> <br><br>   
        <div id="select2lista" class="form-group">
            
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" placeholder="Nombre contacto*"  name="registroNContacto" required value="<?php echo isset($_POST['registroNContacto']) ? $_POST['registroNContacto'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div>
            <div class="col-lg-6">
                <input type="number" placeholder="Teléfono contacto*" name="registroTContacto" min="1111111" max="9999999999" required value="<?php echo isset($_POST['registroTContacto']) ? $_POST['registroTContacto'] : '' ?>">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
            </div> 
        </div>
        <div class="form-group">
            <input type="email" placeholder="Correó Electronico*"  name="registroEmail" required value="<?php echo isset($_POST['registroEmail']) ? $_POST['registroEmail'] : '' ?>">
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
        </div>
        <div class="form-group form-check">
          Acepta los <a href="#">términos y condiciones</a> para continuar con el registro
        </div>
        <?php
           $answer = new ControladorClientes();
           $answer -> ctrRegistroClientes();
        ?> 
        <div class="form-group">
            <button id="submit" type="submit" class="submit butone">Continuar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--================End Login Box Area =================-->
<script src="Assets/js/vendor/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#lista1').val(0);
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