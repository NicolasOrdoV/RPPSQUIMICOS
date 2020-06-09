<?php
$producto = ControladorInventario::ctrSeleccionarProductosStock(null, null);

   if(isset($_POST["id"])){
    $producto = ControladorInventario::ctrCrearProducto(null,null);
   }
    

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
                        <th><a href="#" data-toggle="modal" data-target="#agregar" class="btn btn-success ">Agregar</a></th>
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

    <!--FORMULARIO DE REGISTRO DE PRODUCTO-->

    <div class="modal fade " id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="validationTooltip03" required name="nombrePRODUCTO" class="form-control" placeholder="Ingrese NOMBRE DEL PRODUCTO" value="">


                            <div class="form-group">
                                <label>DESCRIPCION</label>
                                <textarea type="text" name="descripcionPRODUCTO" required class="form-control" placeholder="Ingrese la descripcion" value=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>cantidad</label>
                                <input type="number" name="cantPRODUCTO" required class="form-control" id="validationTooltip01" required placeholder="Ingrese la cantidad" value="">
                            </div>

                            <div class="form-group">
                                <label>VALOR</label>
                                <input type="number" name="valoruPRODUCTO" required class="form-control" placeholder="Ingrese el valor" value="">
                            </div>
                            <button type="submit" class="btn btn-primary">AGREGAR</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>

                </div>
            </div>
        </div>
    </div>
    <aside id="blanco-h" class="col-lg-2"></aside>
</section>

<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>