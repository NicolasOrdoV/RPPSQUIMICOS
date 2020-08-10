<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Imagen de perfil de empleado</h1>
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
                <a href="?paginasAdministradores=ConsultarUnAdmin&id=<?php echo $user["idEMPLEADO"] ?>" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
                <h1 class="text-danger">Nueva imagen de empleado</h1>
                <form method="post" enctype="multipart/form-data">  
                    <div class="form-group">
                        <div id="txt" class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-images"></i></div>
                            </div>
                            <input type="file" name="img" class="form-control" required><button class="btn btn-info">+</button>
                        </div>
                    </div>
                </form>
                  <?php
                    if (isset($_FILES['img'])) {
                        $name_img = $_FILES['img']['name'];
                        $type_img = $_FILES['img']['type'];
                        $size_img = $_FILES['img']['size'];

                        $carpeta_destina = $_SERVER['DOCUMENT_ROOT'] . "/RPPSQUIMICOS/Assets/img/Empleados/";
                        if ($size_img <= 1000000) {
                            if ($type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/jpg") {

                                move_uploaded_file($_FILES['img']['tmp_name'], $carpeta_destina . $name_img);

                    ?>
                                <img src="/RPPSQUIMICOS/Assets/img/Empleados/<?php echo $name_img ?>" class="col-lg-12 my-2">

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
                    <input type="hidden" name="imgEmp" value="<?php echo $name_img ?>">
                    <input type="hidden" name="actualizarIdEm" value="<?php echo $user["idEMPLEADO"];?>">
                    <button type="submit" class="primary-btn rounded">Guardar cambios</button>
                    <?php
                        $actualizar = ControladorAdministradores::updateIMG();
                        if ($actualizar == "ok") {
                            echo '<script>
                            setTimeout(function(){
                                window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$_SESSION["user"]["idEMPLEADO"].'"
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