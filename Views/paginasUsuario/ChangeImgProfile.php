<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Imagen de perfil</h1>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="row py-3">
            <aside class="col-lg-3 py-5" id="fondo2"></aside>
            <div class="col-lg-7 py-5 needs-validation" id="form" novalidate>
                <a href="?paginasUsuario=ConsultarUsuario&id=<?php echo $user["idUSUARIO"] ?>" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
                <h1 class="text-danger">Nueva imagen</h1>
                <form method="post" enctype="multipart/form-data">  
                    <div class="form-group">
                        <div id="txt" class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-images"></i></div>
                            </div>
                            <input type="file" name="imgUs" class="form-control" required><button class="btn btn-info">+</button>
                        </div>
                    </div>
                </form>
                  <?php
                    if (isset($_FILES['imgUs'])) {
                        $name_img = $_FILES['imgUs']['name'];
                        $type_img = $_FILES['imgUs']['type'];
                        $size_img = $_FILES['imgUs']['size'];

                        $carpeta_destina = $_SERVER['DOCUMENT_ROOT'] . "/RPPSQUIMICOS/Assets/img/Usuarios/";
                        if ($size_img <= 1000000) {
                            if ($type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/jpg") {

                                move_uploaded_file($_FILES['imgUs']['tmp_name'], $carpeta_destina . $name_img);

                    ?>
                                <img src="/RPPSQUIMICOS/Assets/img/Usuarios/<?php echo $name_img ?>" class="col-lg-12 my-2">

                            <?php
                            } else {
                            ?>
                                <script>
                                    alert("Solo se permiten archivos tipo png , jpg y jpeg");
                                </script>

                            <?php
                            }
                        } else {
                            ?>
                            <script>
                                alert("El archivo no puede ser mayor a 1 mega");
                            </script>

                    <?php
                        }
                    }
                  ?>  
                <form method="post">
                    <input type="hidden" name="img" value="<?php echo $name_img ?>">
                    <input type="hidden" name="actualizarIdU" value="<?php echo $_SESSION["user"]["idUSUARIO"];?>">
                    <button type="submit" class="primary-btn rounded">Guardar cambios</button>
                    <?php
                        $actualizar = ControladorUsuarios::updateIMG();
                        if ($actualizar == "ok") {
                            echo '<script>
                            setTimeout(function(){
                                window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
                            },1000);
                            </script>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>