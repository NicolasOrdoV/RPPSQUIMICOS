<?php $locates = LocatesController::selectLocates();?>
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
<div class="form-body" class="container-fluid">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3 class="text-danger">RPPS QUÍMICOS</h3>
                    <p>Registrate</p>
                    <div class="page-links">
                        <a href="?paginasUsuario=InicioSesion">Iniciar Sesión</a><a href="?paginasCliente=RegistroCliente" class="active">Registrarse</a>
                    </div>
                    <form action="#" class="py-5 needs-validation" method="post" novalidate>
                        <div class="form-group">
                            <input type="number" class="form-control rounded-pill" placeholder="Número de identificación*" name="registroIdentificacion" min="11" max="9999999999" required value="<?php echo isset($_POST['registroIdentificacion']) ? $_POST['registroIdentificacion'] : '' ?>">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control rounded-pill" placeholder="Nombre de persona o empresa*"  name="registroNombreCom" required value="<?php echo isset($_POST['registroNombreCom']) ? $_POST['registroNombreCom'] : '' ?>">
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
                            </div>
                            <div class="col-lg-6">
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
                        <div class="form-group">
                            <select class="form-control rounded-pill" id="lista1" name="lista1">
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
                                <input type="text" class="form-control rounded-pill" placeholder="Nombre contacto*"  name="registroNContacto" required value="<?php echo isset($_POST['registroNContacto']) ? $_POST['registroNContacto'] : '' ?>">
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no cumple con las condiciones.</div>
                            </div>
                            <div class="col-lg-6">
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
                              Acepta los <a href="#">términos y condiciones</a> para continuar con el registro
                        </div>
                        <?php
                           $answer = new ControladorClientes();
                           $answer -> ctrRegistroClientes();
                        ?> 
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Continuar</button>
                        </div>
                        <div class="form-group">
                            <p>¿Ya tienes una cuenta?
                                <a href="index.php?paginasUsuario=InicioSesion">Inicia sesión</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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