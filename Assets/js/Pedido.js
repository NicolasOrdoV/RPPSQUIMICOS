$('#alerta').click(function(e) {
  e.preventDefault()
  var carro = localStorage.getItem("carrito")
  if (carro == "[]") {
    alert("No se han ingresado productos")
  }else {
    let url = "index.php?paginasPedidos=NuevoPedido"
    let params = {
        Fechaen:$('#FechaEntrega').val(),
        idEmpClien:$('#IdCliente').val(),
        total:$('#totalCart').val(),
        idEmp:0,
        Carro:carro
    }

    //metodo post de ajax para el envio del formulario
    $.post(url, params, function(response) {
      if (typeof response.error !== 'undefined') {
            alert(response.message)
        } else {
          alert("Inserción Satisfactoria")
          location.href = 'index.php?paginasPedidos=NuevoPedido'
        }
    }, 'json').fail(function(error) {
      alert("Inserción Fallida ("+error.responseText+")")
      console.log(error)
      console.log(error.message)
    });
  }
});
