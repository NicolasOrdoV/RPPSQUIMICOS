// Definir una variable global para cargar las categorias seleccionadas
var arrayPedido = []
var subtotal
var valoru

$('#btnP').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let can = $("#cantiP").val()

    let idProd = $("#Prds").val()
    let nameProd = $("#Prds option:selected").text()

    let idClien = $("#cliPed").val()
    let nameClien = $("#cliPed option:selected").text()
    for(i of consultaProd){
      if (i.idPRODUCTO==idProd) {
       subtotal= i.valoruPRODUCTO * can;
       valoru=i.valoruPRODUCTO
      }
    }

    if (idProd != '') {
      if (can != ''){
      if (idClien != ''){
        if (typeof existPedido(idProd) === 'undefined') {
            //agregar nuevo objeto al array
            arrayPedido.push({
                'idPRODUCTO': idProd,
                'nombrePRODUCTO': nameProd,
                'idEC' : idClien,
                'nombreEC' : nameClien,
                'cantidad' : can,
                'subtotal': subtotal,
                'valoruPRODUCTO':valoru
            })
            document.getElementById('totalPedido').innerHTML = '$'+suma();
            document.getElementById("totalPedidoValor").value = suma();
            document.getElementById("idCliente").value = idClien;
            desaparecer()
            showPedido()
            cleanPedido()
        } else {
            alert("Ya se encuentra el producto seleccionado")
        }

      } else {
        alert("Debe seleccionar un cliente")
      }
    } else {
      alert("Debe ingresar una cantidad")
    }

    } else {
        alert("Debe Seleccionar un producto")
    }
});

function suma() {
    var tottal = 0

    arrayPedido.forEach(function(prod) {
    tottal = tottal + parseInt(prod.subtotal, 0)
})
    return tottal
}
function cleanPedido(){
  $("#cantiP").val("")

}
function desaparecer(){
  $('#ocultarCli').hide();
}

function showPedido() {

    $("#PrdsLS").empty()

    arrayPedido.forEach(function(prod) {
        let html = '<tr><td>' + prod.nombrePRODUCTO + '</td><td>' + prod.cantidad + '</td><td>'+prod.subtotal+'</td><td> <button onclick="removeElementPedido(' + prod.idPRODUCTO + ')" class="btn btn-danger">X</button></td></tr>'
        $("#PrdsLS").append(html)
    })
}

function existPedido(idPRODUCTO) {
    let existPedido = arrayPedido.find(function(prod) {
        return prod.idPRODUCTO == idPRODUCTO
    })
    return existPedido
}

function removeElementPedido(idPRODUCTO) {
    //obtiene el indice en donde esta la categoria a eliminar
    let index = arrayPedido.indexOf(existPedido(idPRODUCTO))
    document.getElementById('totalPedido').innerHTML = '$'+suma() - subtotal;
    document.getElementById("totalPedidoValor").value = suma()-subtotal;
        //eliminar el indice del array
    arrayPedido.splice(index, 1)
    showPedido()
}


$('#finalPed').click(function(e) {
  e.preventDefault()

  if (arrayPedido=='') {
    alert("Faltan datos para poder registrar el pedido")
  }else {
    let url = "index.php?paginasPedidos=NuevoPedido&json=true"
    let params = {

        idEmp:$('#user').val(),
        totalPedCar: $('#totalPedidoValor').val(),
        Fechaen:$('#fechaEnAdmin').val(),
        idClienEmpre:$('#idCliente').val(),
        prods:arrayPedido
    }
    //metodo post de ajax para el envio del formulario
    $.post(url, params, function(response) {
      if (response.error) {
        console.error(response.message)
      }

      else {

        window.localStorage.removeItem("carrito")
        Push.create("Felicidades!", {
        body: "Su pedido se ha registrado exitosamente!",
        icon: 'Assets/img/logo2.png',
        timeout: 4000,
        onClick: function () {
            window.location="index.php";
            this.close();
        }
        });
        location.href = 'index.php?paginasPedidos=ConsultaPedidos&id='+$('#user').val()
      }
    })
  }
});
