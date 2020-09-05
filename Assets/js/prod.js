// Definir una variable global para cargar las categorias seleccionadas
var arrayMP = []

$('#addc').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMP = $("#mpsc").val()
    let nameMP = $("#mpsc option:selected").text()

    if (idMP != '') {

        if (typeof existMP(idMP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMP.push({
                'idMP': idMP,
                'nombreMP': nameMP
            })
            showMP()
        } else {
            alert("La Materia Prima ya se Encuentra Seleccionada")
        }

    } else {
        alert("Debe Seleccionar una Materia Prima")
    }
});


function showMP() {

    $("#list-mpsc").empty()

    arrayMP.forEach(function(mp) {
        let html = '<tr><td>' + mp.nombreMP + '</td><td> <button onclick="removeElement(' + mp.idMP + ')" class="btn btn-danger">X</button></td></tr>'
        $("#list-mpsc").append(html)
    })
}

function existMP(idMP) {
    let existMP = arrayMP.find(function(mp) {
        return mp.idMP == idMP
    })
    return existMP
}

function removeElement(idMP) {
    //obtiene el indice en donde esta la categoria a eliminar
    let index = arrayMP.indexOf(existMP(idMP))
        //eliminar el indice del array
    arrayMP.splice(index, 1)
    showMP()
}


$('#submincant').click(function(e) {
  e.preventDefault()

  let cant = $("#canti").val()
  let idProd =$("#prod").val()
  let medida=$("#medida").val()
if (cant!='') {
  if (arrayMP=='') {
    alert("Faltan datos para poder registrar el envasado")
  }else {
    let url = "index.php?paginasProduc=AgregarEx"
    let params = {
        idProd:idProd,
        medida:medida,

        cant:cant,

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
      location.href = 'index.php?paginasProduc=ConsultaProduc'
    });
  }
}else {
  alert("Falta registrar la cantidad")
}
});
