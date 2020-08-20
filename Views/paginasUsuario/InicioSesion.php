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
<div class="form-body" class="container-fluid">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3 class="text-danger">RPPS QUÍMICOS</h3>
                    <p>Iniciar Sesión</p>
                    <div class="page-links">
                        <a href="?paginasUsuario=InicioSesion" class="active">Iniciar Sesión</a><a href="?paginasCliente=RegistroCliente">Registrarse</a>
                    </div>
                    <form action="#" class="needs-validation" method="post" novalidate="novalidate">
                        <?php
                            $ingreso = new ControladorUsuarios();
                            $ingreso -> ctrIngresoUsuario();
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="text" name="ingresoNombre" placeholder="Correo electronico*" required value="<?php echo isset($_POST['ingresoNombre']) ? $_POST['ingresoNombre'] : '' ?>">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="ingresoContraseña" placeholder="Cointraseña*" required>
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Ingresar</button>
                        </div>
                    </form>
                    <div class="col-md-12 form-group">
                        <a href="index.php?paginasUsuario=RecuperarContrasena">¿Se te olvido tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Login Box Area =================-->