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
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="Assets/img/login.png" alt="">
                    <div class="hover">
                        <h4>¿No tienes una cuenta?</h4>
                        <p>Regístrate con nosotros y podrás realizar los pedidos de los productos que tú quieras.<br>¡ANIMATE!</p>
                        <a class="primary-btn" href="?paginasCliente=RegistroCliente">Registrate</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Inicia Sesión.</h3>
                    <form action="#" class="row login_form needs-validation" method="post" id="contactForm" novalidate="novalidate">
                        <?php
                            $ingreso = new ControladorUsuarios();
                            $ingreso -> ctrIngresoUsuario();
                        ?>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="name" name="ingresoNombre" placeholder="Nombre de usuario" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre de usuario'" required value="<?php echo isset($_POST['ingresoNombre']) ? $_POST['ingresoNombre'] : '' ?>">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="col-md-12 form-group input-group">
                            <input type="password" class="form-control" id="name" name="ingresoContraseña" placeholder="Contraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contraseña'" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text rounded">
                                    <a href="#" class="text-dark" id="icon-click" onclick="eye()">
                                        <i class="fas fa-eye" id="icon"></i>
                                    </a>
                                </div>
                            </div> 
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Recuerdame</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="primary-btn">Ingresar</button>
                            <a href="index.php?paginasUsuario=RecuperarContrasena">¿Se te olvido tu contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->