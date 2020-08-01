<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html" class="text-dark">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html" class="text-dark">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row py-3">
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
        <button type="submit" id="btnReg" class="btn btn-danger rounded-pill btn-lg btn-block">Enviar correo<i class="fas fa-flask"></i></button>
    </form>
    <aside class="col-lg-3 py-5" id="fondo1"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>