// Definir una variable global para cargar las categorias seleccionadas
var arrayPedido = []
var subtotal

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
                'subtotal': subtotal
            })
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
        //eliminar el indice del array
    arrayPedido.splice(index, 1)
    showPedido()
}


$('#submin').click(function(e) {
  e.preventDefault()

  if (arrayMP=='') {
    alert("Faltan datos para poder registrar el ingreso")
  }else {
    let url = "index.php?paginasIngresoMp=NuevoIMP"
    let params = {

        idEMPLE:$('#user').val(),
        mps:arrayMP
    }
    //metodo post de ajax para el envio del formulario
    $.post(url, params, function(response) {
      if (typeof response.error !== 'undefined') {
            alert(response.message)
        } else {
          alert("ERROR")
        }
    }, 'json').fail(function(error) {
      alert("Inserción Satisfactoria")
      location.href = 'index.php?paginasIngresoMp=ConsultaIMP&id='+$('#user').val()
    });
  }
});
