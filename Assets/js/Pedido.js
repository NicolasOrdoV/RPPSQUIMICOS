$('#alerta').click(function(e) {
  e.preventDefault()
  if (localStorage.getItem("carrito")== "[]") {
    alert("No se han ingresado productos")
  }else {
    let url = "index.php?paginasPedidos=NuevoPedido"
    let params = {

        Fechaen:$('#FechaEntrega').val(),
        idEmpClien:$('#IdCliente').val(),
        total:$('#totalCart').val(),
        idEmp:0,
        Carro:localStorage.getItem("carrito")
    }
    //metodo post de ajax para el envio del formulario
    /* $.post(url, params, function(response) {
      if (typeof response.error !== 'undefined') {
            alert(response.message)
        } else {
          alert("Error al insertar")
        }
    }, 'json').fail(function(error) {
      alert("Inserción Satisfactoria")
      //location.href = 'index.php?paginasPedidos=NuevoPedido'
    }); */


        $.ajax({
           type: "POST",
           url: url,
           data: params,
           beforeSend: function () {
             $("#resultado").html("Procesando, espere por favor...");
          },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
            }
       });

  }
});
