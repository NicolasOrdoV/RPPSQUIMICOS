// Definir una variable global para cargar las categorias seleccionadas
$( document ).ready(function() {
    $('#alertProd').hide();
});
var arrayMP1 = []
var cantDis
var nomMp
var cantCom



$('#addc').click(function(e) {
    //Deshabilitar Submit del Formulario
    e.preventDefault();

    let idMP = $("#mpsc").val()
    let nameMP = $("#mpsc option:selected").text()
    let medida=$("#medida").val()
    let cant = $("#canti").val()
    cantCom=cant
    for(i of consultaMp){
      if (i.idMP==idMP) {
        nomMp=i.nombreMP
        if (i.tipoMP=="SOLIDO") {
          cantDis=(i.cantMP*1000)/medida
        }else if (i.tipoMP=="LIQUIDO") {
          cantDis=(i.cantMP*3785)/medida
        }else {
          cantDis=i.cantMP
        }
      }
    }
if (cant!='') {

    if (idMP != '') {
      if (cantDis>=cant) {

        if (typeof existMP1(idMP) === 'undefined') {
            //agregar nuevo objeto al array
            arrayMP1.push({
                'idMP': idMP,
                'nombreMP': nameMP
            })
            desaparecer1()
            showMP1()
        } else {
          document.getElementById('text-alertProd').innerHTML="La Materia Prima ya se Encuentra Seleccionada";
          $('#alertProd').show();
        }
      }else {
        document.getElementById('text-alertProd').innerHTML="No hay suficiente de "+nomMp;
        $('#alertProd').show();
      }

    } else {
      document.getElementById('text-alertProd').innerHTML="Debe Seleccionar una Materia Prima";
      $('#alertProd').show();
    }
  }else {
    document.getElementById('text-alertProd').innerHTML="Debe ingresar una cantidad";
    $('#alertProd').show();
  }
});

function desaparecer1(){
  $('#canti').hide();
  document.getElementById('mostrarCantidad').innerHTML ="Cantidad: "+cantCom;
  $('#alertProd').hide();
}
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
      if (response.error) {
        console.error(response.message)
      }

      else {


        Push.create("Felicidades!", {
        body: "El envasado se ha registrado exitosamente!",
        icon: 'Assets/img/logo2.png',
        timeout: 4000,
        onClick: function () {
            window.location="?paginasProduc=ConsultaProduc";
            this.close();
        },
        onClose:function () {
            window.location="?paginasProduc=ConsultaProduc";
        }
        });



      }
    });
  }
});
