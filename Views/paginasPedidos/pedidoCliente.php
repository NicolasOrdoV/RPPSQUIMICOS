<?php
$peds = ModeloPedido::consultarPedsCliente($user['idEC_FK']);
var_dump($peds);
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
                  var_dump($pedi);
                  ?>

                    <tr>
                        <td><?php echo $pedi["idPEDIDO"]; ?></td>
                        <td><?php echo $pedi["fecharPEDIDO"]; ?></td>
                        <td><?php echo $pedi["fechaenPEDIDO"]; ?></td>
                        <td><?php echo $pedi["totalPEDIDO"]; ?></td>
                        <td><?php echo $pedi["estadoPEDIDO"]; ?></td>
                        <td>
                            <div class="btn-group">

                                <?php if ($pedi["estadoPEDIDO"]=="pendiente"||$pedi["estadoPEDIDO"]=="en preparacion"){ ?>
                                <form method="post" class="text-left">
                                    <input type="hidden" value="<?php echo $pedi["idPEDIDO"] ?>" name="cancelPedido">
                                    <button type="submit" class="btn btn-danger m-1" title="Cancelar">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                    <?php



                                    ?>
                                </form>
                              <?php }elseif ($pedi["estadoPEDIDO"]=="entregado") {
                                ?>
                                  <label> Entregado</label>

                                <?php
                              }else{?>
                                  <label>Cancelado</label>
                              <?php }  ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>
