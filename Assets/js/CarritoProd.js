(function(){
    function $(selector){
        return document.querySelector(selector);
    }
    function Carrito(){
        this.constructor = function(){
            if(!localStorage.getItem("carrito")){
                localStorage.setItem('carrito','[]');
            }
        }
        this.getCarrito = JSON.parse(localStorage.getItem("carrito"));
        this.agregarItem = function(item){
            for(i of consulta){
                if(i.idPRODUCTO === item){
                    var registro = i
                }
            }
            if(!registro){
                return
            }
            var cant = document.getElementById("b").value;
            for (i of this.getCarrito){

                if(i.idPRODUCTO === item){
                    i.cantidad += parseFloat(cant);
                    console.log(this.getCarrito);
                    localStorage.setItem("carrito",JSON.stringify(this.getCarrito))
                    return;
                }
            }
            registro.cantidad = parseFloat(cant);
            this.getCarrito.push(registro);
            console.log(this.getCarrito);
            localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
        }
        this.getTotal = function(){
            var total = 0;
            for (i of this.getCarrito) {
                total += parseFloat(i.cantidad) * parseFloat(i.valoruPRODUCTO);
            }
            return total;
        }
        this.eliminarItem = function(item){
            for (var i in this.getCarrito) {
                if(this.getCarrito[i].idPRODUCTO === item){
                    this.getCarrito.splice(i,1);
                }
            }
            localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
            alert("Se ha eliminado un producto del carrito");
            location.reload();
        }
    }
    function Carrito_View(){
      this.renderCarrito = function(){
           if(carrito.getCarrito.length <= 0){
               var template = `<div class="text-xl-center"><h3>¡No se han añadido Productos!</h3></div><br>`;
               $("#productosCarrito").innerHTML = template;
           }else{
               $("#productosCarrito").innerHTML = "";
               var template = ``;
               for(i of carrito.getCarrito){
                   template += `
                   <tr>
                    <td><img src="Assets/img/productos/${i.imgPRODUCTO}" class="rounded" style="width:30px;" alt="${i.nombrePRODUCTO}"></td>
                    <td>${i.nombrePRODUCTO}</td>
                    <td>$${i.valoruPRODUCTO}</td>
                    <td>${i.cantidad}</td>
                    <td><strong><i>${i.cantidad * i.valoruPRODUCTO}</i></strong></td>
                    <td><button class="btn btn-danger" id="deleteProducto" data-producto="${i.idPRODUCTO}"><i class="fa fa-trash-o" id="deleteProducto" data-producto="${i.idPRODUCTO}"></i></button></td>
                  </tr>
                   `;
               }
               $("#productosCarrito").innerHTML = template;
           }
           $("#totalCarrito > strong").innerHTML = "$"+carrito.getTotal();
       }
       }
    var carrito = new Carrito();
    var carrito_view = new Carrito_View();
    document.addEventListener('DOMContentLoaded',function(){
        carrito.constructor();
        carrito_view.renderCarrito();
    });

    $("#productoDetallado").addEventListener("click",function(ev){
        ev.preventDefault();
        if(ev.target.id === "btn_carrito"){
          var id = ev.target.dataset.producto;
          carrito.agregarItem(id);
          alert("Se ha agregado el producto al carrito");
          location.reload();
        }
    });
    $("#productosCarrito").addEventListener("click",function(ev){
        ev.preventDefault();
        if(ev.target.id === "deleteProducto"){
            carrito.eliminarItem(ev.target.dataset.producto);
        }
    })
//--------------------------------------------------------------------------------------------//
    $('#PedidoCompleto').click(function(e) {
      e.preventDefault()
      if (carrito=='') {
        alert("No se han ingresado productos")
      }else {
        let url = "index.php?paginasPedidos=NuevoPedido"
        let params = {

            Fechaen:$('#FechaEntrega').val(),
            idEmpClien:$('#IdCliente').val(),
            total:$('#totalCarrito').text(),
            idEmp:0,
            Carro:carrito
        }
        //metodo post de ajax para el envio del formulario
        $.post(url, params, function(response) {
          if (typeof response.error !== 'undefined') {
                alert(response.message)
            } else {
              alert("Error al insertar")
            }
        }, 'json').fail(function(error) {
          alert("Inserción Satisfactoria")
          location.href = 'index.php'
        });
      }

    });
})();
