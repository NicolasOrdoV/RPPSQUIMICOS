<?php
if(!isset($_SESSION["validarIngreso"])){

    echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
    return;
}else{
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
        return;
    }
}
$data = ProdController::getById();  ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Editar Producto</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-dark">Lista de productos<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Editar producto</a>
                </nav>
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
        <a href="index.php?paginasProduc=ConsultaProduc" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
        <h1 class="text-danger">Actualizar Datos</h1>
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <div id="txt" class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-images"></i></div>
              </div>
              <input type="file" name="imgPROD" class="form-control"><button class="btn btn-info">+</button>
            </div>


          </div>
        </form>
        <?php
        if (isset($_FILES['imgPROD'])) {
          $name_img = $_FILES['imgPROD']['name'];
          $type_img = $_FILES['imgPROD']['type'];
          $size_img = $_FILES['imgPROD']['size'];

          $carpeta_destina = $_SERVER['DOCUMENT_ROOT'] . "/RPPSQUIMICOS/Assets/img/Productos/";
          if ($size_img <= 1000000) {
            if ($type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/jpg") {

              move_uploaded_file($_FILES['imgPROD']['tmp_name'], $carpeta_destina . $name_img);

        ?>
              <img src="/RPPSQUIMICOS/Assets/img/Productos/<?php echo $name_img ?>" class="col-lg-4">

            <?php
              $img=$name_img;
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
        } else {
          ?>

          <img src="/RPPSQUIMICOS/Assets/img/Productos/<?php echo $data['imgPRODUCTO']?>" class="col-lg-4">
        <?php
        $img=$data['imgPRODUCTO'];

        }
        ?>
        <form method="POST">

          <input type="hidden" name="idPROD" value="<?php echo $data['idPRODUCTO'] ?>">

          <input type="hidden" name="imgPROD" value="<?php echo $img ?>">
          <div class="form-group">
            <input type="text" class="form-control rounded-pill" placeholder="Nombre" id="txt" name="nombrePROD" value="<?php echo $data['nombrePRODUCTO'] ?>" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
          </div>
          <div class="form-group">
          <input type="text" class="form-control rounded-pill" placeholder="Descripción" id="txt" name="descripPROD" value="<?php echo $data['descripcionPRODUCTO'] ?>" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
          </div>
          <div class="form-group">
            <input type="number" class="form-control rounded-pill" placeholder="Medida" id="txt" name="medidaPROD" min="0" step="0.01" value="<?php echo $data['medidaPRODUCTO'] ?>" required>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
          </div>
          <div class="form-group">
            <div id="txt" class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">$</div>
              </div>
              <input type="number" class="form-control" name="valoruPROD" placeholder="Valor Unitario" min="0"  value="<?php echo $data['valoruPRODUCTO'] ?>" required>
              <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
            </div>
          </div>
          <button type="submit" class="primary-btn">Generar</button>
          <?php $actualizar = ProdController::update($_POST);
        if ($actualizar == "ok") {
          echo '<script>Push.create("Felicidades!", {
          body: "El producto se ha actualizado exitosamente!",
          icon: "Assets/img/logo2.png",
          timeout: 4000,
          onClick: function () {
              window.location="?paginasProduc=ConsultaProduc";
              this.close();
          },
          onClose:function () {
              window.location="?paginasProduc=ConsultaProduc";
          }
        });</script>';
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
