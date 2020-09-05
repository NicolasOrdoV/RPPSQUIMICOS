// Definir una variable global para cargar las categorias seleccionadas
var arrayMP1 = []

$('#addc').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMP = $("#mpsc").val()
    let nameMP = $("#mpsc option:selected").text()

    if (idMP != '') {

        if (typeof existMP1(idMP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMP1.push({
                'idMP': idMP,
                'nombreMP': nameMP
            })
            showMP1()
        } else {
            alert("La Materia Prima ya se Encuentra Seleccionada")
        }

    } else {
        alert("Debe Seleccionar una Materia Prima")
    }
});


function showMP1() {

    $("#list-mpsc").empty()

    arrayMP1.forEach(function(mp) {
        let html = '<tr><td>' + mp.nombreMP + '</td><td> <button onclick="removeElement1(' + mp.idMP + ')" class="btn btn-danger">X</button></td></tr>'
        $("#list-mpsc").append(html)
    })
}

function existMP1(idMP) {
    let existMP = arrayMP1.find(function(mp) {
        return mp.idMP == idMP
    })
    return existMP
}

function removeElement1(idMP) {
    //obtiene el indice en donde esta la categoria a eliminar
    let index = arrayMP1.indexOf(existMP1(idMP))
        //eliminar el indice del array
    arrayMP1.splice(index, 1)
    showMP1()
}


$('#submincant').click(function(e) {
  e.preventDefault()

  let cant = $("#canti").val()
  let idProd =$("#prod").val()
  let medida=$("#medida").val()
if (cant!='') {
  if (arrayMP1=='') {
    alert("Faltan datos para poder registrar el envasado")
  }else {
    let url = "index.php?paginasProduc=AgregarEx"
    let params = {
        idProd:idProd,
        medida:medida,

        cant:cant,

        mps:arrayMP1
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
