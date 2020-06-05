<?php

$producto = ControladorInventario::ctrSeleccionarProductosStock(null, null);
?>
<!--------------Espacio en blanco superior---->
<section class="row">
    <div id="blanco" class="col-lg-12">
        <h1 id="tlprin">Productos en el inventario</h1>
    </div>
</section>
<!------Seccion con espacios en blanco horizontales y catalogo de productos--->
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="row">
            <input class="form-control mb-4 col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el producto registrado que quieras" onclick="search()"><i class="fas fa-search"></i>
            <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Cambiar estado</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($producto as $stocks) : ?>
                        <tr>
                            <td><?php echo $stocks["idPRODUCTO"] ?></td>
                            <td><?php echo $stocks["nombrePRODUCTO"] ?></td>
                            <td><?php echo $stocks["descripcionPRODUCTO"] ?></td>
                            <td><?php echo $stocks["cantPRODUCTO"] ?></td>
                            <td><?php echo $stocks["estadoPRODUCTO"] ?></td>
                            <td>$<?php echo $stocks["valoruPRODUCTO"] ?></td>
                            <td>
                                <button class="btn btn-danger">Agotado</button>
                            </td>
                        </tr>
                    <?php endforeach ?>    
                </tbody>
            </table>
        </div><br>
    </aside>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>
<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>