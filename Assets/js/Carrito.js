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
                   <div class="row">
                    <div class="col-md-2 ml-auto"><img src="Assets/img/productos/${i.imgPRODUCTO}" class="rounded" style="width:30px;" alt=""></div>
                    <div class="col-md-2 ml-auto">${i.nombrePRODUCTO}</div>
                    <div class="col-md-2 ml-auto">$${i.valoruPRODUCTO}</div>
                    <div class="col-md-2 ml-auto">${i.cantidad}</div>
                    <div class="col-md-2 ml-auto"><strong><i>${i.cantidad * i.valoruPRODUCTO}</i></strong></div>
                    <div class="col-md-2 ml-auto"><button class="btn btn-danger" id="deleteProducto" data-producto="${i.idPRODUCTO}"><i class="fa fa-trash-o" id="deleteProducto" data-producto="${i.idPRODUCTO}"></i></button></div>
                  </div>
                  <hr>
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
})();
