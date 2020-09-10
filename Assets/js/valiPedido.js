function validacion() {
  if (localStorage.getItem("carrito") == "[]") {

    Push.create("Carrito", {
    body: "Seleccione un producto antes de continuar",
    icon: 'Assets/img/logo2.png',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
    });
    return false;
  }else {
      return true;
  }


}
