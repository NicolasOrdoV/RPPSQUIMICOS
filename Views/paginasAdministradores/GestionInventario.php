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
$producto = ControladorInventario::ctrSeleccionarProductosStock(null, null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Productos en el inventario</h1>
            </div>
        </div>
    </div>
</section>
<!------Seccion con espacios en blanco horizontales y catalogo de productos--->
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el producto registrado que quieras" onclick="search()">
        <spam class="btn btn-danger rounded float-right" data-toggle="modal" data-target="#agregar">+Agregar</spam>
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Acciones</th>
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
                            <a href="index.php?paginasAdministradores=EditarProducto&id=<?php echo $stocks["idPRODUCTO"]?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            <form method="post">
                                <input type="hidden" value="<?php echo $stocks["idPRODUCTO"]?>" name="eliminarRegistro">
                                <button type="submit" class="btn btn-danger my-1"><i class="fas fa-trash"></i></button>
                                <?php
                                $eliminar = new ControladorInventario();
                                $eliminar -> ctrEliminarProducto();
                                ?>
                            </form>
                            
                        <div class="btn-group-vertical">
                            <?php if($stocks["estadoPRODUCTO"] == "Inactivo") :?>
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $stocks["idPRODUCTO"];?>" name="activarRegistro">
                            <button class="btn btn-primary" id="habilitar">Activar</button>

                            <?php

                            $activar = new ControladorInventario();
                            $activar ->ctrActivarRegistroInventario();

                            ?>
                            </form>
                            <?php elseif($stocks["estadoPRODUCTO"] == "Activo"):?>
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $stocks["idPRODUCTO"];?>" name="inactivarRegistro">
                            <button class="btn btn-danger" id="deshabilitar">Inactivar</button>

                            <?php

                            $inactivar = new ControladorInventario();
                            $inactivar ->ctrInactivarRegistroInventario();

                            ?>
                            </form>
                        <?php endif ?> 
                        </td>
                        </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>

    <!--FORMULARIO DE REGISTRO DE PRODUCTO-->

    <div class="modal fade " id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label>Nombre del producto</label>
                            <input type="text" id="validationTooltip03" required name="nombrePRODUCTO" class="form-control" placeholder="Ingrese Nombre del producto">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="form-group">
                            <label>Descripción del producto</label>
                            <textarea type="text" name="descripcionPRODUCTO" required class="form-control" placeholder="Ingrese la descripción del producto"></textarea>
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>

                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" name="cantPRODUCTO" required class="form-control" id="validationTooltip01" required placeholder="Ingrese la cantidad del producto">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="number" name="valoruPRODUCTO" required class="form-control" placeholder="Ingrese el valor unitario del producto">
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $registro = ControladorInventario::ctrCrearProducto($_POST);
                if ($registro == "ok") {
                    echo '<script>
                    setTimeout(function(){
                        window.location = "index.php?paginasAdministradores=GestionInventario"
                    },1000)
                    </script>';
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</section>

<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>