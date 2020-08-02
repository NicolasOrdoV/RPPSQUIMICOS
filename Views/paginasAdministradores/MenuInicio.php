<?php
if(!isset($_SESSION["validarIngreso"])){
    echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
    return;  
}else{
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
        return;
    }
}
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h1 class="text-dark">Bienvenido <?php echo $user["nombreEMPLEADO"]?></h1>
            </div>
        </div>
    </div>
</section>
<section class="row">
	<aside class="col-lg-12">
		<div class="row py-5">
			<aside class="col-lg-3 py-5" id="fondo2"></aside>
			<div class="col-lg-6" id="form">
				<h3>¿Que quieres hacer hoy?</h3><hr>
				<div class="btn-group btn-group-lg btn-block">
					<a href="index.php?paginasCliente=ConsultaCliente" class="btn btn-danger btn-lg mx-1">Lista de clientes<i class="fas fa-users"></i></a>
					<a href="?paginasMp=ConsultaMP" class="btn btn-danger btn-lg">Consultar materia prima<i class="fas fa-flask"></i></a>
				</div>
				<div class="btn-group btn-group-lg btn-block my-1">
					<a href="?paginasProduc=ConsultaProduc" class="btn btn-danger mx-1">Consulta de productos<i class="fas fa-wine-bottle"></i></a>
					<a href="?paginasIngresoMp=ConsultaIMP&id=<?php echo $user["idEMPLEADO"] ?>" class="btn btn-danger">Consultar ingresos de la materia prima<i class="fas fa-clipboard-list"></i></a>
				</div>
				<div class="btn-group btn-group-lg btn-block my-1">
					<a href="index.php?paginasPedidos=RegistroPedido" class="btn btn-danger mx-1">Registrar Pedido<i class="fab fa-jedi-order"></i></a>
					<a href="index.php?paginasAdministradores=GestionInventario" class="btn btn-danger">Gestion de inventario<i class="fas fa-boxes"></i></a>
				</div>
				<?php if($user["idROL_FK"] == 3):?>
					<a href="index.php?paginasAdministradores=ConsultarAdmin" class="btn btn-danger btn-block btn-lg">Gestionar Administradores<i class="fas fa-user-astronaut"></i>
                    </a>
			    <?php endif?>
				<a href="index.php?paginasAdministradores=ConsultarUnAdmin&id=<?php echo $user["idEMPLEADO"] ?>" class="btn btn-primary btn-block mx-1">Mi perfil<img src="Assets/img/Perfil.jpg" class="img-fluide" width="30" height="30"></a>
			</div>
			<aside class="col-lg-3 py-5" id="fondo1"></aside>
		</div>
	</aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>