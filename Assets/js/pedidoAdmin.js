// Definir una variable global para cargar las categorias seleccionadas
var arrayPed = []

$('#btnP').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let can = $("#cantiP").val()

    let idProd = $("#Prds").val()
    let nameProd = $("#Prds option:selected").text()

    let idClien = $("#cliPed").val()
    let nameClien = $("#cliPed option:selected").text()


    if (idProd != '') {
      if (can != ''){
      if (idClien != ''){
        if (typeof existProd(idProd) === 'undefined') {
            //agregar nuevo objeto al array
            arrayPed.push({
                'idPRODUCTO': idProd,
                'nombrePRODUCTO': nameProd,
                'idEC' : idClien,
                'nombreEC' : nameClien,
                'cantidad' : can
            })

            showPed()
            cleanP()
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

function cleanP(){
  $("#cantiP").val("")

}

function showPed() {

    $("#PrdsLS").empty()

    arrayPed.forEach(function(prd) {
        let html = '<tr><td>' + prd.nombrePRODUCTO + '</td> <td>'+ prd.cantidad + '</td><td><button onclick="removeElementP(' + prd.idPRODUCTO + ')" class="btn btn-danger">X</button></td></tr>'
        $("#PrdsLS").append(html)
    })
}

function existProd(idProd) {
    let existProd = arrayPed.find(function(prd) {
        return prd.idProd == idProd
    })
    return existProd
}

function removeElementP(idProd) {
    //obtiene el indice en donde esta la categoria a eliminar
    let index = arrayPed.indexOf(existProd(idProd))
        //eliminar el indice del array
    arrayPed.splice(index, 1)
    showPed()
}


$('#finalPed').click(function(e) {
  e.preventDefault()
  let cant = $("#cantiP").val()
if (cant!='') {
  if (arrayPed=='') {
    alert("Faltan datos para poder registrar el Pedido")
  }else {
    let url = "index.php?paginasPedidos=PedidoData"
    let params = {
        arrPed:arrayPed
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
      location.href = 'index.php?paginasProduc=ConsultaProduc'
    });
  }
}else {
  alert("Falta registrar la cantidad")
}
});
