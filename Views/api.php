<?php
  if (isset($_REQUEST["paginasPedidos"])) {
      if ($_GET["paginasPedidos"] == "NuevoPedido" ||
          $_GET["paginasPedidos"] == "PedidoData")
      {
         include "paginasPedidos/" .  $_GET["paginasPedidos"] . ".php";
      }

      else
      {
          include "Views/error404.php";
      }
  }
?>
