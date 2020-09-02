// Definir una variable global para cargar las categorias seleccionadas
var arrayMPP = []

$('#addc').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMPP = $("#mpsc").val()
    let nameMPP = $("#mpsc option:selected").text()


    if (idMPP != '') {

        if (typeof existMP(idMPP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMPP.push({
                'idMP': idMPP,
                'nombreMP': nameMPP
            })
            showMPP()
            cleanP()
        } else {
            alert("La Materia Prima ya se Encuentra Seleccionada")
        }

    } else {
        alert("Debe Seleccionar una Materia Prima")
    }
});

function cleanP(){
  $("#mpsc").val("")

}

function showMPP() {

    $("#list-mpsc").empty()

    arrayMPP.forEach(function(mp) {
        let html = '<tr><td>' + mp.nombreMP + '</td><td><button onclick="removeElementP(' + mp.idMP + ')" class="btn btn-danger">X</button></td></tr>'
        $("#list-mpsc").append(html)
    })
}

function existMPP(idMP) {
    let existMP = arrayMPP.find(function(mp) {
        return mp.idMP == idMP
    })
    return existMP
}

function removeElementP(idMP) {
    //obtiene el indice en donde esta la categoria a eliminar
    let index = arrayMPP.indexOf(existMP(idMP))
        //eliminar el indice del array
    arrayMPP.splice(index, 1)
    showMP()
}


$('#submincant').click(function(e) {
  e.preventDefault()
  let cant = $("#canti").val()
if (cant!='') {
  if (arrayMPP=='') {
    alert("Faltan datos para poder registrar el envasado")
  }else {
    let url = "index.php?paginasProduc=AgregarEx"
    let params = {


        canti:can,

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
