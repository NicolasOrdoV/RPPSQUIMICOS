<?php
  $date = date("d-m-Y");
  $mod_date = strtotime($date."+ 2 days");
  $mod_dates = strtotime($date."+ 5 days");
  if (isset($_POST['total'])) {
    $totalcarr = $_POST['total'];
  }
?>
<input type="hidden" name="fechaEntre" id="FechaEntrega" value="<?php echo date("d-m-y",$mod_date) . "\n";?>">
<input type="hidden" name="idClient" id="IdCliente" value="<?php echo $user["idEC_FK"]; ?>">
<input type="hidden" id="totalCart" value="<?php echo $totalcarr;?>">
<button type="button" id="alerta" name="button"> si </button>
<h3 id="resultado"> </h3>
