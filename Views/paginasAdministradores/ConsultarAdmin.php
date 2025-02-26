<?php
require_once "Controlers/tools.php";

if(!isset($_SESSION["validarIngreso"])){
    
    echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
    return;  
}else{
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
        return;
    }
}
$instancia = new tools();
$codigo = $instancia->randomCode();
$admins = ControladorAdministradores::ctrSeleccionarRegistrosAdministradores(null,null);?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-first">
                <h3>Gestión de administradores
	        	    <spam class="primary-btn rounded" data-toggle="modal" data-target="#myModal">+Añadir admin</spam>
		        </h3>
		        <hr>
            </div>
        </div>
    </div>
</section>
<section class="row py-5">
	<div class="col-lg-2"></div>
    <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content justify-content-center" id="modal">
				<div class="modal-header">
			        <h1 class="modal-title text-center">Añadir Admin</h1>
		        </div>
				<div class="modal-body text-left">
					<form action="#" method="post" class="needs-validation" novalidate>
						<div class="form-group">
							<label>Identificación<span class="text-danger">*</span></label>
							<input type="number" name="registrarIdentificacionAd" class="form-control rounded-pill" required value="<?php echo isset($_POST['registrarIdentificacionAd']) ? $_POST['registrarIdentificacionAd'] : '';?>">
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Nombres y apellidos<span class="text-danger">*</span></label>
							<input type="text" name="registrarNombreAd" class="form-control rounded-pill" required value="<?php echo isset($_POST['registrarNombreAd']) ? $_POST['registrarNombreAd'] : '';?>">
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Telefono<span class="text-danger">*</span></label>
							<input type="number" name="registrarTelefonoAd" class="form-control rounded-pill" min="0" max="9999999999" required value="<?php echo isset($_POST['registrarTelefonoAd']) ? $_POST['registrarTelefonoAd'] : '';?>">
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Correo electronico<span class="text-danger">*</span></label>
							<input type="email" name="registrarCorreoAd" class="form-control rounded-pill" required value="<?php echo isset($_POST['registrarCorreoAd']) ? $_POST['registrarCorreoAd'] : '';?>">
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Contraseña<span class="text-danger">*</span></label>
							<input type="password" name="registrarContraseñaAd" class="form-control rounded-pill" required value="<?php echo $codigo?>" readonly>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<?php

						$registro = ControladorAdministradores::ctrRegistroAdministradores();

						if ($registro == "ok") {
							ControladorAdministradores::enviarCorreoAdmin($_POST);
							echo '<script>
				            setTimeout(function(){
                               window.location = "index.php?paginasAdministradores=ConsultarAdmin"
				            },1000)
				            </script>';
						}
						if ($registro == "error") {
							echo '<script>alert("Los campos tienen caracteres no permitidos,remitase de nuevo al formulario y corrija lo que esta mal.");</script>';
						}
						?>
					    <button type="submit" class="primary-btn rounded mt-5 float-right">Guardar cambios</button>
					</form>
			    </div>
			</div>     
		</div>
    </div>
    <div class="col-lg-2"></div>
</section>
<section class="row">
	<aside id="blanco-h" class="col-lg-2"></aside>
	<aside class="col-lg-8" id="form2">
		<?php foreach ($admins as $admin):?>
			<div class="col-lg-12">
				<h1>
					<?php if($admin["imgEmp"] == "") {?>
					    <img src="Assets/img/Perfil.jpg" class="img-fluide" width="80" height="80">
					<?php }else{ ?>
					    <img src="Assets/img/Empleados/<?php echo $admin["imgEmp"]?>" class="img-fluide rounded-circle" width="80" height="80">
					<?php } ?>        
					<?php echo $admin["nombreEMPLEADO"]; ?>
				<h1>
				<div class="btn-group float-right">
		            <div class="btn-group-vertical float-right">
		            	<?php if($admin["estadoEMPLEADO"] == "Inactivo"):?>
		                <form method="post">
		                    <input type ="hidden" value ="<?php echo $admin["idEMPLEADO"];?>" name="activarRegistro">
		                    <button class="btn btn-primary rounded-pill m-1">Activar</button>

		                    <?php

		                    $activar = new ControladorAdministradores();
		                    $activar ->ctrActivarRegistroAdministradores();

		                    ?>
		                </form>
		                <?php elseif($admin["estadoEMPLEADO"] == "Activo"):?>
		                <form method="post">
		                    <input type ="hidden" value ="<?php echo $admin["idEMPLEADO"];?>" name="inactivarRegistro">
		                    <button class="btn btn-danger rounded-pill m-1">Inactivar</button>

		                    <?php

		                    $inactivar = new ControladorAdministradores();
		                    $inactivar ->ctrInactivarRegistroAdministradores();

		                    ?>
		                </form>
		                <?php endif ?>
		            </div>
		          	<form action="#" method="post">
		          		<input type ="hidden" value ="<?php echo $admin["idEMPLEADO"];?>" name="eliminarAd">
		          		<button type="submit" class="btn btn-danger rounded-pill" data-toggle="modal" data-target="#myModal2"><i class="fas fa-trash-alt"></i> </button>
		          	<?php

		          	$eliminar = new ControladorAdministradores();
		          	$eliminar -> ctrEliminarAdministrador();
		          	
		          	?>	
		          	</form>
	            </div>    
				<h2 class="font-weight-bold">Datos Admin:</h2>
				<p><span class="text-danger">Identificacion:</span><?php echo $admin["identificacionEMPLEADO"]?></p>
				<p><span class="text-danger">Telefono:</span><?php echo $admin["telefonoEMPLEADO"]?><span class="text-danger"> Email:</span><?php echo $admin["correoEMPLEADO"]?></p>
				<p><span class="text-danger">Estado:</span><?php echo $admin["estadoEMPLEADO"]?></p>
				<hr>
		    </div>
		<?php endforeach ?>
	</aside>
</section>
<section class="row">
    <div id="blanco" class="col-lg-12"></div>
</section>