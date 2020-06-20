// Definir una variable global para cargar las categorias seleccionadas
var arrayMP = []

$('#add').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMP = $("#mps").val()
    let nameMP = $("#mps option:selected").text()
    let cant = $("#cant").val()

    if (idMP != '') {

        if (typeof existMP(idMP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMP.push({
                'idMP': idMP,
                'nombreMP': nameMP,
                'cantidadDI': cant
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

    $("#list-mps").empty()

    arrayMP.forEach(function(mp) {
        let html = '<tr><td>' + mp.nombreMP + '</td><td>' + mp.cantidadDI + '</td><td> <button onclick="removeElement(' + mp.idMP + ')" class="btn btn-danger">X</button></td></tr>'
        $("#list-mps").append(html)
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


function mandarDatos() {
    
    

    let url = "../RPPSQUIMICOS/Views/paginasIngresoMP/ConsultaIMP.php"
    let params = {
        
        test: 'test'
    }

    //metodo post de ajax para el envio del formulario
    $.post(url, params, function(response) {
        console.log(response);
    }, 'json').fail(function(error) {
        alert("Error Insertando la Pelicula")
    });
}