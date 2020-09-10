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
        localStorage.clear()
        Push.create("Felicidades!", {
        body: "Su pedido se ha registrado exitosamente!",
        icon: 'Assets/img/logo2.png',
        timeout: 4000,
        onClick: function () {
            window.location="index.php";
            this.close();
        }
        });
      }
    })
  }
});
