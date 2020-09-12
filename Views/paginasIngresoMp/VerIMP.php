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
$in=IMPController::getById();
$data=IMPController::show($in['idIMP']);
 ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Ver ingreso de Materia Prima</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-dark">Lista de materia prima<span class="lnr lnr-arrow-right"></a>
                        <a href="#" class="text-light">Ver materia prima</a>
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
         <a href="?paginasIngresoMp=ConsultaIMP&id=<?php echo $user["idEMPLEADO"] ?>" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
         <h1 class="text-danger">Información</h1>
         <div class="form-group">
           <h4>Fecha: <?php echo $in['fechaIMP']; ?></h4>
         </div>
         <div class="form-group">
          <h4>Hecho por: <?php echo $in['empleado']; ?></h4>
         </div>
         <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
             <thead class="thead-dark">
                 <tr>
                     <th>Materia Prima</th>
                     <th>Cantidad</th>
                 </tr>
             </thead>
             <tbody id="myTable">
                 <?php
                 foreach ($data as $d) : ?>
                     <tr>
                         <td><?php echo $d['mp']; ?></td>
                         <td><?php echo $d['cantidadDI']; ?></td>
                     </tr>
                 <?php endforeach ?>
             </tbody>
         </table>
       </form>
     </div>
   </aside>
   <aside id="blanco-h" class="col-lg-2"></aside>
 </section>
 <section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
