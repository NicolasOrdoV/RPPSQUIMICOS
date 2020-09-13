<?php
    $cliente = ControladorClientes::ctrSeleccionarClienteEspecifico($user['idEC_FK']);
    $admin = ControladorAdministradores::ctrSeleccionarAdministradorJefe(2);
    $correo = new ControladorPedidos();
    $correo -> enviarCorreoPedidoCliente($cliente);
    $correo -> enviarCorreoPedidoAdminNotifica($cliente, $admin);
    if (isset($_POST['home'])) {
        ?>
        <script>
          window.location = "index.php"
        </script>

        <?php
    } else {
      ?>
      <script>
        window.location = "index.php?paginasPedidos=pedidoCliente"
      </script>

      <?php
    }

?>
