<?php
$peds = ControladorPedidos::consultaPed($user['idEC_FK']);
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Mis Pedidos</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Mis pedidos</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Fecha recibido</th>
                    <th>Fecha entrega</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                foreach ($peds as $pedi) :
                  ?>

                    <tr>
                        <td><?php echo $pedi["idPEDIDO"]; ?></td>
                        <td><?php echo $pedi["fecharPEDIDO"]; ?></td>
                        <td><?php echo $pedi["fechaenPEDIDO"]; ?></td>
                        <td><?php echo $pedi["totalPEDIDO"]; ?></td>
                        <td><?php echo $pedi["estadoPEDIDO"]; ?></td>
                        <td>
                          <div class="btn-group">
                              <form action="index.php?paginasPedidos=VerPedidoClien&id=<?php echo $pedi["idPEDIDO"] ?>" method="post" class="text-left">
                                  <input type="hidden" value="<?php echo $mp["idPEDIDO"] ?>" name="id">
                                  <button class="btn btn-info m-1"  title="Ver"><i class="fas fa-eye"></i></button>

                              </form>
                              <?php if ($pedi["estadoPEDIDO"]=="Pendiente"){ ?>
                              <form method="post" class="text-left">
                                  <input type="hidden" value="<?php echo $pedi["idPEDIDO"] ?>" name="cancelarClie">
                                  <button type="submit" class="btn btn-danger m-1" title="Cancelar">
                                      <i class="fas fa-times-circle"></i>
                                  </button>
                                  <?php

                                  $inactivar = new ControladorPedidos();
                                  $inactivar->editarEstado();


                                  ?>
                              </form>
                            <?php }elseif($pedi['estadoPEDIDO']=="En produccion"){?>


                              <form method="post" class="text-left">
                                  <input type="hidden" value="<?php echo $pedi["idPEDIDO"] ?>" name="cancelarClie">
                                  <button type="submit" class="btn btn-danger m-1" title="Cancelar">
                                      <i class="fas fa-times-circle"></i>
                                  </button>
                                  <?php

                                  $inactivar = new ControladorPedidos();
                                  $inactivar->editarEstado();


                                  ?>
                              </form>

                          <?php }elseif ($pedi['estadoPEDIDO']=="En camino") {

                         }elseif ($pedi['estadoPEDIDO']=="Entregado") {

                        } else{

                        } ?>
                          </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>
