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
<<<<<<< HEAD
    
=======
    //metodo post de ajax para el envio del formulario
>>>>>>> 8273cd4d9df776028457b83ef09e412462e0fff0
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
<<<<<<< HEAD

       
=======
>>>>>>> 8273cd4d9df776028457b83ef09e412462e0fff0
  }
});
