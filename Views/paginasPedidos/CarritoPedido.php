
<section class="row py-5">
    <article class="container">
        <h2>Mi Carrito</h2>
        <hr>
    <form action="#">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Detalle</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Precio por unidad</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $aCarrito = array();
                $sHTML = '';
                if(isset($_COOKIE['carrito'])) {
                    $aCarrito = unserialize($_COOKIE['carrito']);
                }
                if(isset($_POST['nombreProd']) && isset($_POST['descripcionProd']) && isset($_POST['valoruProd']) && isset($_POST['b'])) {
                    $iUltimaPos = count($aCarrito);
                    $aCarrito[$iUltimaPos]['nombreProd'] = $_POST['nombreProd'];
                    $aCarrito[$iUltimaPos]['descripcionProd'] = $_POST['descripcionProd'];
                    $aCarrito[$iUltimaPos]['valoruProd'] = $_POST['valoruProd'];
                    $aCarrito[$iUltimaPos]['b'] = $_POST['b'];
                }
                $iTemCad = time() + (60 * 60);
                setcookie('carrito', serialize($aCarrito), $iTemCad);

                foreach ($aCarrito as $key => $value) {
                    $sHTML .= '-> ' . $value['nombreProd'] . ' ' . $value['descripcionProd'] . $value['valoruProd'] .  $value['x'];
                    $fPrecioTotal += $value[''];
                }
                
            ?>

                <tr><td><?php// echo $sHTML; ?></td></tr>
            </tbody>
        </table>
        
        <h2 class="text-right">Total: <h2 Class="text-right" style="color: red"><?php //echo $fPrecioTotal; ?></h2></h2>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="text" class="form-control" placeholder="Correo Electronico" aria-label="Email" aria-describedby="basic-addon1">
            <button class="btn btn-danger" name="vaciar">Cancelar Pedido</button>
            <button class="btn btn-primary">Completar pedido</button>
        </div>
    </form>
    </article>
</section>
