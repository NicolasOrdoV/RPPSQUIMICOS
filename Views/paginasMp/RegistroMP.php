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
$data = MPController::getById();  ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Materia Prima</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-dark">Lista de materia prima<span class="lnr lnr-arrow-right"></a>
                    <a href="#" class="text-light">Lista de materia prima</a>
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
      <form class="col-lg-6 py-5 needs-validation" id="form" method="POST" novalidate>
        <a href="index.php?paginasMp=ConsultaMP" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
        <h1 class="text-danger">Actualizar datos</h1>
        <div class="form-group">
          <input type="hidden" name="idMP" value="<?php echo $data['idMP'] ?>">
          <input type="text" class="form-control rounded-pill" placeholder="Número CAS" id="txt" name="identMP" value="<?php echo $data['identificacionMP'] ?>" required>
          <div class="valid-feedback">Valido</div>
          <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control rounded-pill" placeholder="Nombre" id="txt" name="nombreMP" value="<?php echo $data['nombreMP'] ?>" required>
          <div class="valid-feedback">Valido</div>
          <div class="invalid-feedback">El campo no puede quedar vacio.</div>
        </div>
        <h5>Tipo</h5><br>
        <div class="form-group row">
          <?php if ($data['tipoMP'] == "LIQUIDO") {  ?>
            <div class="col-3 text-center">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo1" value="LIQUIDO" checked>
              <label class="form-check-label" for="tipo1">Liquido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo2" value="SOLIDO">
              <label class="form-check-label" for="tipo2">Solido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo3" value="ENVASE">
              <label class="form-check-label" for="tipo3">Envase</label>
            </div>
          <?php } elseif ($data['tipoMP'] == "SOLIDO") {  ?>
            <div class="col-3 text-center">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo1" value="LIQUIDO">
              <label class="form-check-label" for="tipo1">Liquido</label>
            </div>
            <div class="col-3 text-center">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo2" value="SOLIDO" checked>
              <label class="form-check-label" for="tipo2">Solido</label>
            </div>
            <div class="col-3 text-center">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo3" value="ENVASE">
              <label class="form-check-label" for="tipo3">Envase</label>
            </div>
          <?php } elseif($data['tipoMP']=="ENVASE") {  ?>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo1" value="LIQUIDO">
              <label class="form-check-label" for="tipo1">Liquido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo2" value="SOLIDO">
              <label class="form-check-label" for="tipo2">Solido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo3" value="ENVASE" checked>
              <label class="form-check-label" for="tipo3">Envase</label>
            </div>
          <?php  }else{ ?>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo1" value="LIQUIDO">
              <label class="form-check-label" for="tipo1">Liquido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo2" value="SOLIDO">
              <label class="form-check-label" for="tipo2">Solido</label>
            </div>
            <div class="col-3">
              <input class="form-check-input" type="radio" name="tipoMP" id="tipo3" value="ENVASE" >
              <label class="form-check-label" for="tipo3">Envase</label>
            </div>
          <?php } ?>
        </div>
        <button type="submit" class="primary-btn">Generar</button>
        <?php $actualizar = MPController::update($_POST);
        if ($actualizar == "ok") {
          echo '<script>
                    setTimeout(function(){
                        window.location = "index.php?paginasMp=ConsultaMP"
                    },1000)
                    </script>';
        }
        ?>
      </form>
    </div>
  </aside>
  <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>