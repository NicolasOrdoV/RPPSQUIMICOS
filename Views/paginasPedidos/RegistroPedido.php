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
$producto = ControladorProductos::ctrSeleccionarProductos();
?>
<section class="row py-3">
  <aside class="col-lg-3 py-5" id="fondo2"></aside>
  <form action="index.php?paginasPedidos=PedidoCompleto" class="col-lg-6 py-5 needs-validation" id="form" method="post" novalidate>
    <h1 class="text-danger">RPPS Quimícos</h1>
    <p>Registro Pedidos</p>
    <div class="form-group">
      <label for="fechaPedido">Fecha del Pedido</label>
      <input type="datetime" class="form-control rounded-pill" id="txt" name="fechaPedido"  value="<?php echo date("d-m-Y");?>">
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <label for="fechaEntrega">Fecha de Entrega</label>
      <?php
        $date = date("d-m-Y");
        $mod_date = strtotime($date."+ 2 days");
      ?>
      <input type="datetime" class="form-control rounded-pill" id="txt" name="fechaEntrega"  value="<?php echo date("d-m-Y",$mod_date) . "\n";?>">
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <label for="registroProductos">Producto</label>
      <input list="products" class="form-control rounded-pill" id="txt" name="registroProductos" placeholder="Selecciona el Producto requerido" required>
      <datalist id="products">
        <?php foreach ($producto as $key => $value) : ?>
          <option>
            <?php echo $value["idPRODUCTO"] . ". ";
                  echo $value["nombrePRODUCTO"] . ". "; echo $value["valoruPRODUCTO"]; 
            ?>          
          </option>
        <?php endforeach ?>
      </datalist>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <label for="registroProductos">Cantidad del producto</label>
      <input type="number" class="form-control rounded-pill" placeholder="Cantidad Pedido" id="txt" name="registroCantidad" onchange="Multiplicar(this.value)" required>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <div class="form-group">
      <label for="registroProductos">Subtotal</label>
      <br>
      <span id="spTotal"></span>
      <div class="valid-feedback">Valido</div>
      <div class="invalid-feedback">El campo no puede quedar vacio.</div>
    </div>
    <button type="submit" class="btn btn-success">Completar Pedido</button>
  </form>
</section>
<script type="text/javascript">
  function Multiplicar (valor) {
    var total = 0;  
    valor = parseInt(valor); 
  
    total = document.getElementById('spTotal').innerHTML;
  
    
    total = (total == null || total == undefined || total == "") ? 0 : total;
  
    total = (parseInt(total) * parseInt(valor));
  
    
    document.getElementById('spTotal').innerHTML = total;
}
</script>