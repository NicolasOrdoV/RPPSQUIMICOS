<div class="row">
    <div id="blanco" class="col-lg-12"></div>
</div>
<div class="row py-3">
    <aside class="col-lg-7 py-5" id="fondo1"></aside>
    <form action="#" class="col-lg-4 py-5 needs-validation" id="form" method="post" novalidate>
        <h1 class="text-danger">RPPS Quimícos</h1>
        <p>Inicio Sesion</p>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Correo del usuario"
                name="ingresoNombre" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <div class="form-group input-group">
            <input type="password" class="form-control rounded-pill" placeholder="Contraseña" id="pass"
                name="ingresoContraseña" required>
                <div class="input-group-prepend">
                    <div class="input-group-text rounded-pill">
                        <a href="#" class="text-dark" id="icon-click" onclick="eye()">
                            <i class="fas fa-eye" id="icon"></i>
                        </a>
                    </div>
                </div> 
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>

        <?php

           $ingreso = new ControladorUsuarios();
           $ingreso -> ctrIngresoUsuario();

        ?>
        <button type="submit" id="btnReg" class="btn btn-danger rounded-pill btn-lg btn-block">Iniciar
            Sesion</button>
    </form>
    <aside class="col-lg-1" id="blanco-h"></aside>
</div>
<div class="row py-1">
    <div class="col-lg-7"></div>
    <div class="col-lg-4 border border-secondary pt-4" id="in">
        <p>¿No posee una cuenta?
            <a href="index.php?paginasCliente=RegistroCliente" id="in1">Registrarse</a>
        </p>
        <p>¿Se te olvido tu contraseña?
            <a href="index.php?paginasUsuario=RecuperarContrasena" id="in1">Recuperar contraseña</a>
        </p>
    </div>
    <div class="col-lg-1"></div>
</div>