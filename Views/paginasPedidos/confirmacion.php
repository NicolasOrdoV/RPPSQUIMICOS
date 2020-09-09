<?php
  $date = date("Y-m-d");
  $mod_date = strtotime($date."+ 2 days");
  $mod_dates = strtotime($date."+ 5 days");
  if (isset($_POST['total'])) {
    $totalcarr = $_POST['total'];
  }
?>
<input type="hidden" name="fechaEntre" id="FechaEntrega" value="<?php echo date("Y-m-d",$mod_date) . "\n";?>">
<input type="hidden" name="idClient" id="IdCliente" value="<?php echo $user["idEC_FK"]; ?>">
<?php echo $totalcarr;?>
<input type="hidden" id="totalCart" value="<?php echo $totalcarr;?>">
<button type="button" id="alerta" name="button"> si </button>
<h3 id="resultado"> </h3>
