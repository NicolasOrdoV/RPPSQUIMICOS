// Definir una variable global para cargar las categorias seleccionadas
var arrayMP = []

$('#nuevoIMP').click(function(e){
  e.preventDefault();
  $('#alertImp').hide();
});
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
          document.getElementById('text-alert').innerHTML="La Materia Prima ya se Encuentra Seleccionada";
          $('#alertImp').show();
        }
      }else {
        document.getElementById('text-alert').innerHTML="Falta registrar la cantidad";
        $('#alertImp').show();
      }

    } else {
      document.getElementById('text-alert').innerHTML="Debe Seleccionar una Materia Prima";
      $('#alertImp').show();

    }
});

function clean(){
  $("#canti").val("")
  $('#alertImp').hide();

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
    document.getElementById('text-alert').innerHTML="Faltan datos para poder registrar el ingreso";
    $('#alertImp').show();

  }else {
    let url = "index.php?paginasIngresoMp=NuevoIMP"
    let params = {

        idEMPLE:$('#user').val(),
        mps:arrayMP
    }
    //metodo post de ajax para el envio del formulario
    $.post(url, params, function(response) {
      if (response.error) {
        console.error(response.message)
      }

      else {

        
        Push.create("Felicidades!", {
        body: "El ingreso se ha registrado exitosamente!",
        icon: 'Assets/img/logo2.png',
        timeout: 4000,
        onClick: function () {
            window.location="index.php?paginasIngresoMp=ConsultaIMP&id="+$('#user').val();
            this.close();
        }
        });


      }
    });
  }
});
