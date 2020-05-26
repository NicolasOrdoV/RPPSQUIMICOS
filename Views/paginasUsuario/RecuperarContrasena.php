<div class="row py-3">
    <aside class="col-lg-3 py-5" id="fondo1"></aside>
    <form action="#" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
        <h1 class="text-danger">RPPS Quimícos</h1>
        <p>Recuperar contraseña</p>
        <div class="form-group">
            <input type="email" class="form-control rounded-pill" placeholder="Correo electronico*" id="txt" name="recuperarUsuario" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <?php

        $correo = new ControladorUsuarios();
        $correo -> enviarCorreoRecUser($_POST);
        
        ?>
        <button type="submit" id="btnReg" class="btn btn-danger rounded-pill btn-lg btn-block">Enviar correó<i class="fas fa-flask"></i></button>
    </form>
    <aside class="col-lg-3 py-5" id="fondo1"></aside>
</div>