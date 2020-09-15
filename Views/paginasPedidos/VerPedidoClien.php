<?php

$ped=ControladorPedidos::getById();
$data=ControladorPedidos::show($ped['idPEDIDO']);
 ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Ver Pedido</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-dark">Lista de pedidos<span class="lnr lnr-arrow-right"></a>
                        <a href="#" class="text-light">Ver Pedido</a>
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
         <a href="?paginasPedidos=pedidoCliente&id=<?php echo $user["idEMPLEADO"] ?>" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
         <h1 class="text-danger">Información </h1>
         <div class="form-group">
           <h5><strong>Fecha Realizado: </strong><?php echo $ped['fecharPEDIDO']; ?></h5>
           <h5><strong>Fecha Entrega:</strong> <?php echo $ped['fechaenPEDIDO']; ?></h5>
         </div>
         <div class="form-group">
          <h5><strong>Cliente:</strong> <?php echo $ped['clien']; ?></h5>
          <h5><strong>Empleado: </strong><?php echo $ped['empleado']; ?></h5>
         </div>
         <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
             <thead class="thead-dark">
                 <tr>
                     <th>Producto</th>
                     <th>Cantidad</th>
                     <th>Subtotal</th>
                 </tr>
             </thead>
             <tbody id="myTable">
                 <?php
                 foreach ($data as $d) : ?>
                     <tr>
                         <td><?php echo $d['producto']; ?></td>
                         <td><?php echo $d['cantidadDP']; ?></td>
                         <th><?php echo $d['subtotalDP']; ?></th>
                     </tr>
                 <?php endforeach ?>
             </tbody>
         </table>
         <div class="columns">
           <div class="text-right">
               <h4 class="card-title">Total: </h4>
           </div>
           <div class="text-right">
               <h1 class="card-title"  ><strong><?php echo $ped['totalPEDIDO']; ?></strong></h1>
           </div>
       </div>
       </form>
     </div>
   </aside>
   <aside id="blanco-h" class="col-lg-2"></aside>
 </section>
 <section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>
