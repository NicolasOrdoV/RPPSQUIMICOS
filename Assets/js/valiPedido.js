function validacion() {
  if (localStorage.getItem("carrito") == "[]") {

    Push.create("RPPSQUIMICOS", {
    body: "Seleccione un producto antes de continuar",
    icon: 'Assets/img/logo2.png',
    timeout: 4000,
    onClick: function () {
        window.location="index.php?paginasProduc=Catalog";
        this.close();
    }
    });
    return false;
  }else {
      return true;
  }


}
