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
$producto = ControladorInventario::ctrSeleccionarProductosStock(null, null);
//var_dump($_SESSION["user"]);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Productos en el inventario</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Consultar inventario</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!------Seccion con espacios en blanco horizontales y catalogo de productos--->
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <input class="form-control col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el producto registrado que quieras" onclick="search()">
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
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
                        <td><img loading="lazy" src="Assets/img/Productos/<?php echo $stocks["imgPRODUCTO"] ?>" width="130"> </td> 
                        <td><?php echo $stocks["nombrePRODUCTO"] ?></td>
                        <td><?php echo $stocks["descripcionPRODUCTO"] ?></td>
                        <td><?php echo $stocks["cantPRODUCTO"];?></td>
                        <td><?php echo $stocks["estadoPRODUCTO"] ?></td>
                        <td>$<?php echo $stocks["valoruPRODUCTO"] ?></td>
                        <td>
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
</section>
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Materia prima en el inventario</h1>
            </div>
        </div>
    </div>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
        <aside class="col-lg-8">
            
        <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CAS</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php $mps = MPController::consult(null, null);
                foreach ($mps as $mp) : ?>
                    <tr>
                        <td><?php echo $mp["idMP"] ?></td>
                        <td><?php echo $mp["identificacionMP"]; ?></td>
                        <td><?php echo $mp["nombreMP"]; ?></td>
                        <td><?php echo $mp["tipoMP"]; ?></td>
                        <td><?php echo $mp["cantMP"]; 
                        // if ($mp["cantMP"]<=3){
                        //     ControladorInventario::ctrSendNotifyCuantity($_SESSION["user"]["correoEMPLEADO"],$mp["cantMP"],$mp["nombreMP"]);
                        // } ?></td>
                        </td>
                        
                        <td><?php echo $mp["estadoMP"]; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </aside>
</section>

<!------Espacio en blanco inferior------>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>

<?php
  $producs_pe=array();
foreach($producto as $stocks){
    if ($stocks["cantPRODUCTO"]<=3 && $stocks["estadoPRODUCTO"]=="Activo"){
        //     ControladorInventario::ctrSendNotifyCuantity($_SESSION["user"]["correoEMPLEADO"],$stocks["cantPRODUCTO"],$stocks["nombrePRODUCTO"]);
        array_push($producs_pe,'"'.$stocks["nombrePRODUCTO"].'"');
    }
}
//print_r($producs_pe);
ControladorInventario::ctrSendNotifyCuantity($_SESSION["user"]["correoEMPLEADO"],$producs_pe);
?>