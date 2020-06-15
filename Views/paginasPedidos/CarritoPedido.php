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
          
            </tbody>
        </table>
        <h2 class="text-right">Total: <h2 Class="text-right" style="color: red">$0</h2></h2>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="text" class="form-control" placeholder="Correo Electronico" aria-label="Email" aria-describedby="basic-addon1">

            <button class="btn btn-danger">Completar pedido</button>
        </div>
    </form>
    </article>
</section>
<?php 

$aCarrito = array();
$sHTML = '';
$fPrecioTotal = 0;

//Vaciamos el carrito

if(isset($_GET['vaciar'])) {
    unset($_COOKIE['carrito']);
}

//Obtenemos los productos anteriores

if(isset($_COOKIE['carrito'])) {
    $aCarrito = unserialize($_COOKIE['carrito']);
}

//Anyado un nuevo articulo al carrito

if(isset($_GET['nombre']) && isset($_GET['precio'])) {
    $iUltimaPos = count($aCarrito);
    $aCarrito[$iUltimaPos]['nombre'] = $_GET['nombre'];
    $aCarrito[$iUltimaPos]['precio'] = $_GET['precio'];
}

//Creamos la cookie (serializamos)

$iTemCad = time() + (60 * 60);
setcookie('carrito', serialize($aCarrito), $iTemCad);



//Imprimimos el contenido del array

foreach ($aCarrito as $key => $value) {
    $sHTML .= '-> ' . $value['nombre'] . ' ' . $value['precio'] . '<br>';
    $fPrecioTotal += $value['precio'];
}

//Imprimimos el precio total

$sHTML .= '<br>------------------<br>Precio total: ' . $fPrecioTotal;

?>