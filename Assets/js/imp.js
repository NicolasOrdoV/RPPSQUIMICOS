// Definir una variable global para cargar las categorias seleccionadas
var arrayMP = []

$('#addi').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMP = $("#mpsi").val()
    let nameMP = $("#mpsi option:selected").text()
    let cant = $("#canti").val()

    if (idMP != '') {
      if (cant != '') {

        if (typeof existMP(idMP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMP.push({
                'idMP': idMP,
                'nombreMP': nameMP,
                'cantidadDI': cant
            })
            showMP()
            clean()
        } else {
            alert("La Materia Prima ya se Encuentra Seleccionada")
        }
      }else {
        alert("Falta registrar la cantidad")
      }

    } else {
        alert("Debe Seleccionar una Materia Prima")
    }
});

function clean(){
  $("#canti").val("")
  $("#mpsi").val("")

}

function showMP() {

    $("#list-mpsi").empty()

    arrayMP.forEach(function(mp) {
        let html = '<tr><td>' + mp.nombreMP + '</td><td>' + mp.cantidadDI + '</td><td> <button onclick="removeElement(' + mp.idMP + ')" class="btn btn-danger">X</button></td></tr>'
        $("#list-mpsi").append(html)
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
