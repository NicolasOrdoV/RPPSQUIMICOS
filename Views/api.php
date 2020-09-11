<?php
  if (isset($_REQUEST["paginasPedidos"])) {
      if ($_GET["paginasPedidos"] == "NuevoPedido" )
      {
         include "paginasPedidos/" .  $_GET["paginasPedidos"] . ".php";
      }

      else
      {
          include "Views/error404.php";
      }
  }
?>
