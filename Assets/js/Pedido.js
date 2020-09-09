$('#alerta').click(function(e) {
  e.preventDefault()
  var carro = localStorage.getItem("carrito")
  if (carro == "[]") {
    alert("No se han ingresado productos")
  } else {
    let url = "index.php?paginasPedidos=NuevoPedido&json=true"
    let params = {
        Fechaen: $('#FechaEntrega').val(),
        idClienEmpre: $('#IdCliente').val(),
        totalPedCar: $('#totalCart').val(),
        idEmp: 2,
        Carro: carro
    }

    $.post(url, params, function(response) {
      if (response.error) {
        console.error(response.message)
      }

      else {
        // TODO
        console.log(params, xd)
      }
    })
  }
});
