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
$clientes = ControladorClientes::ctrSeleccionarRegistroClientes(null,null);

?>

<div class="row py-5">
    <input class="form-control mb-4 col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el cliente registrado que quieras" onclick="search()"><i class="fas fa-search"></i>
    <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>IDENTIFICACION DEL CLIENTE</th>
                <th>NOMBRE O EMPRESA DEL CLIENTE</th>
                <th>TELEFONO DEL CLIENTE</th>
                <th>DIRECCION DEL CLIENTE</th>
                <th>BARRIO DEL CLIENTE</th>
                <th>NOMBRE DE CONTACTO DEL CLIENTE</th>
                <th>TELEFONO DE CONTACTO DEL CLIENTE</th>
                <th>CORREO DE CONTACTO DEL CLIENTE</th>
                <th>ESTADO DEL CLIENTE</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="myTable">

        <?php foreach ($clientes as $key => $value):?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["identificacionEC"]; ?></td>
                <td><?php echo $value["nombreEC"]; ?></td>
                <td><?php echo $value["telefonoEC"]; ?></td>
                <td><?php echo $value["direccionEC"]; ?></td>
                <td><?php echo $value["nombreBarrio"]; ?></td>
                <td><?php echo $value["nombrecontEC"]; ?></td>
                <td><?php echo $value["telefonocontEC"]; ?></td>
                <td><?php echo $value["correocontEC"]; ?></td>
                <td><?php echo $value["estadoUSUARIO"]; ?></td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body border border-dark rounded">
                                        <form action="#" method="post" class="text-left">
                                            <label>¿Desea eliminar a este cliente?</label>
                                            <form method="post">
                                                <input type ="hidden" value ="<?php echo $cliente["idEC"];?>" name="eliminarRegistro">
                                                <button class="btn btn-primary rounded-pill btn-block">Si</button>

                                                <?php

                                                $eliminar = new ControladorClientes();
                                                $eliminar ->ctrEliminarRegistroClientes();

                                                ?>
                                            </form>
                                            <button type="button" class="btn btn-danger rounded-pill btn-block my-2" data-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group-vertical">
                            <?php if($value["estadoUSUARIO"] == "Inactivo") :?>
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $value["idUSUARIO"];?>" name="activarRegistro">
                            <button class="btn btn-primary" id="habilitar">Activar</button>

                            <?php

                            $activar = new ControladorClientes();
                            $activar ->ctrActivarRegistroClientes();

                            ?>
                            </form>
                            <?php elseif($value["estadoUSUARIO"] == "Activo"):?>
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $value["idUSUARIO"];?>" name="inactivarRegistro">
                            <button class="btn btn-danger" id="deshabilitar">Inactivar</button>

                            <?php

                            $inactivar = new ControladorClientes();
                            $inactivar ->ctrInactivarRegistroClientes();

                            ?>
                            </form>
                        <?php endif ?>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>        
        </tbody>
    </table>
</div>