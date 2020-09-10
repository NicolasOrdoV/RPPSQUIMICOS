var carrototal = document.getElementById("carritoTotal").value
function validacion() {
  if (carrototal == 0) {
    alert('Seleccione un producto antes de continuar');
    return false;
  }
  return true;

}
