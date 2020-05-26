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
if (isset($_GET["id"])) {

	$item = "idUSUARIO";
	$valor = $_GET["id"];
    $usuario = ControladorUsuarios::ctrSeleccionarUsuarios($item,$valor);
    $barrios = ControladorBarrios::ctrSeleccionarBarrios();
}
?>
<div class="row">
    <div id="blanco" class="col-lg-12">
        <h1 id="tlprin">Mi cuenta</h1>
    </div>
</div>
<div class="row">
	<aside class="col-lg-3" id="blanco-h"></aside>
		<div class="col-lg-6 py-5 border border-dark" id="form1">
            <figure>
            	<img src="Assets/img/Perfil.jpg" class="float-left">
            </figure>
            <article class="text-right"> 
	            <h1><?php echo $usuario["nombrecontEC"]?></h1>
	            <h2 class="text-danger">Nickname : <?php echo $usuario["nombreUSUARIO"]?></h2>
	            <h2><?php echo $usuario["identificacionEC"]?></h2>
	            <p><?php echo $usuario["correocontEC"]?></p>
	            <h3><?php echo $usuario["direccionEC"]?></h3>
	            <h3><?php echo $usuario["telefonocontEC"]?></h3>
	            <h3><?php echo $usuario["nombreBARRIO"]?></h3>
	            <a href="#" class="text-dark" data-toggle="modal" data-target="#myModal">Editar datos del perfil</a><br>
	            <a href="#" class="text-dark">Editar datos del envio</a><br>
	            <a href="#" class="text-dark" data-toggle="modal" data-target="#changePassword">Seguridad</a><br>
	            <a href="" class="text-left"> Cambiar foto de perfil</a>
	            <hr>

            <!--CAMBIO DE CONTRASEÑA DE USUARIO-->
	            <div class="modal fade" id="changePassword" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
					          	<label> Nueva contraseña<small class="text-danger">*</small>:</label>
					          	<input type="password" name="actualizarConU" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar contraseña<small class="text-danger">*</small>:</label>
					          	<input type="password" name="actualizarConUC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" value="<?php echo $_SESSION["user"]["idUSUARIO"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarConU"])) {
				          		$acConU = $_POST["actualizarConU"];
				          		$acConUC = $_POST["actualizarConUC"];

				          		if ($acConU == $acConUC) {
				          			
				          			$actualizar = ControladorUsuarios::ctrActualizarRegistroConUsuario();
				          			if ($actualizar == "ok") {
								        echo '<script>
							            setTimeout(function(){
							                window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
								        },1000);
								        </script>';
								    }
				          		}else{
				          			echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          		}
				          	}
				          	?>
					        <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>

            <!--FORMULARIO DE EDICIÓN DE USUARIO-->
	            <div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog modal-lg">
				        <div class="modal-content justify-content-center" id="modal">
					        <div class="modal-body text-left">
					          <h3>Nombre completo del usuario:<small> <?php echo $usuario["nombrecontEC"]?> 
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal2">Editar</a></small>    
							  </h3>
							  <h3>Nombre del usuario:<small> <?php echo $usuario["nombreUSUARIO"]?> 
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal3">Editar</a></small>    
							  </h3>
							  <h3>Identificacion usuario:<small> <?php echo $usuario["identificacionEC"]?>
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal4">Editar</a></small>
					          </h3>	
					          <h3>Correo electronico:<small> <?php echo $usuario["correocontEC"]?>
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal5">Editar</a></small>
					          </h3>
					          <h3>Direccion:<small> <?php echo $usuario["direccionEC"]?>
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal6">Editar</a></small>
					          </h3>	          
					          <h3>Telefono:<small> <?php echo $usuario["telefonocontEC"]?>
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal7">Editar</a></small>
					          </h3>
					          <h3>Barrio:<small> <?php echo $usuario["nombreBARRIO"]?>
					          	<a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal8">Editar</a></small>
					          </h3>
					        </div>
				        </div>     
				    </div>
                </div>
<!-----------------------------Modales de editar datos-------------------------->
<!-- ************************************************************************ -->
<!-- ************************************************************************ -->
				<div class="modal fade" id="myModal2" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
				          		<div class="alert alert-info">
	                                <h4 class="alert-heading"> Nota: </h4>
	                                <p>Este dato es el que ves en el encabezado de tu sesión, por lo que tal vez no se vean reflejados los campos. Por favor cierra y abre de nuevo tu sesión para aplicar completamente estos cambios</p>
                                </div>
					          	<label> Nombre completo<small class="text-danger">*</small>:</label>
					          	<input type="text" name="actualizarNombreCom" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar nombre completo<small class="text-danger">*</small>:</label>
					          	<input type="text" name="actualizarNombreComC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $usuario["idEC"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarNombreCom"])) {
				          		$acNomCom = $_POST["actualizarNombreCom"];
				          		$acNomComC = $_POST["actualizarNombreComC"];

				          		if ($acNomCom == $acNomComC) {
				          			
				          			$actualizar = ControladorClientes::ctrActualizarRegistroNombreComUsuario();
				          			if ($actualizar == "ok") {
								        echo '<script>
							            setTimeout(function(){
							                window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
								        },1000);
								        </script>';
								    }
				          		}else{
				          			echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          		}
				          	}
				          	?>
					        <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
				<div class="modal fade" id="myModal3" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
				          		<div class="alert alert-warning">
                                    <h4 class="alert-heading"> Nota: </h4>
                                <p>Con este correo usted inicia sesion, por  lo que si lo llega a modificar recuerdelo para volver a iniciar sesion de forma protocolaria.</p>
                                </div>
					          	<label> Nuevo de usuario<small class="text-danger">*</small>:</label>
					          	<input type="email" name="actualizarNombreUs" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> confirmar nombre de usuario<small class="text-danger">*</small>:</label>
					          	<input type="email" name="actualizarNombreUsC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idUSUARIO"];?>">
				          	</div>
				          	<?php

					        if (isset($_POST["actualizarNombreUs"])) {
					        	
					        	$acNom = $_POST["actualizarNombreUs"];
					        	$acNomC = $_POST["actualizarNombreUsC"];

						        if ($acNom == $acNomC) {

						        	$actualizar = ControladorUsuarios::ctrActualizarRegistroNombreUsuario();

						        	if($actualizar == "ok"){
						            echo '<script>
						            setTimeout(function(){
						                window.location = "?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
							        },1000);
							        </script>';
							        }
						        }else{
						        	echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
						        }
					        }
					        ?>
					        <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
                <div class="modal fade" id="myModal4" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
				          		<div class="alert alert-warning">
                                    <h4 class="alert-heading"> Nota: </h4>
                                La identificacion y el documento son datos unicos por lo que si es necesario cambiarlo,debe ser por error humano de registro.</div>
					          	<label> identificacion<small class="text-danger">*</small>:</label>
					          	<input type="number" name="actualizarIdentEC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar identificacion<small class="text-danger">*</small>:</label>
					          	<input type="number" name="actualizarIdentECC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idEC"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarIdentEC"])) {
				          		
				          		$actIdenEC = $_POST["actualizarIdentEC"];
				          		$actIdenECC = $_POST["actualizarIdentECC"];

				          		if ($actIdenEC == $actIdenECC) {
				          			
				          			$actualizar = ControladorClientes::ctrActualizarRegistroIdentUsuario();
				          			if ($actualizar == "ok") {
				          				echo '<script>
				          				setTimeout(function(){

				          				window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
                                        },1000);
				          				</script>';
				          			}
				          		}else{
				          			echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          		}
				          	}
				          	?> 
				            <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
                <div class="modal fade" id="myModal5" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
					          	<label> Nuevo correo<small class="text-danger">*</small>:</label>
					          	<input type="email" name="actualizarCorreoUs" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar correo<small class="text-danger">*</small>:</label>
					          	<input type="email" name="actualizarCorreoUsC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idEC"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarCorreoUs"])) {
				          		$acCorreoUs = $_POST["actualizarCorreoUs"];
				          		$acCorreoUsC = $_POST["actualizarCorreoUsC"];

				          		if ($acCorreoUs == $acCorreoUsC) {
				          			
				          			$actualizar = ControladorClientes::ctrActualizarRegistroCorreoUsuario();

				          			if ($actualizar == "ok") {
				          				echo '<script>
				          				setTimeout(function(){

				          				window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
                                        },1000);
				          				</script>';
				          			}
				          		}else{
				          			echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          		}
				          	}
				          	?>
				            <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
                <div class="modal fade" id="myModal6" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
					          	<label> Nueva direccion<small class="text-danger">*</small>:</label>
					          	<input type="text" name="actualizarDireccionUs" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar direccion<small class="text-danger">*</small>:</label>
					          	<input type="text" name="actualizarDireccionUsC" class="form-control rounded" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idEC"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarDireccionUs"])) {
				          	 	$acDirUs = $_POST["actualizarDireccionUs"];
				          	 	$acDirUsC = $_POST["actualizarDireccionUsC"];

				          	 	if ($acDirUs == $acDirUsC) {
				          	 		$actualizar = ControladorClientes::ctrActualizarRegistroDireccionUsuario();

				          	 		if ($actualizar == "ok") {
				          	 			echo '<script>
				          	 			setTimeout(function(){
				          	 				window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
				          	 			},1000)
				          	 			</script>';
				          	 		}
				          	 	}else{
				          	 		echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          	 	}
				          	} 
				          	?>
				            <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
                <div class="modal fade" id="myModal7" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
					          	<label> Nuevo telefono<small class="text-danger">*</small>:</label>
					          	<input type="number" name="actualizarTelefonoUs" class="form-control rounded" min="0" max="9999999999" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<label> Confirmar telefono<small class="text-danger">*</small>:</label>
					          	<input type="number" name="actualizarTelefonoUsC" class="form-control rounded" min="0" max="9999999999" required>
					          	<div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idEC"];?>">
				          	</div>
				          	<?php
				          	if (isset($_POST["actualizarTelefonoUs"])) {
				          	 	$acTelUs = $_POST["actualizarTelefonoUs"];
				          	 	$acTelUsC = $_POST["actualizarTelefonoUsC"];

				          	 	if ($acTelUs == $acTelUsC) {
				          	 		$actualizar = ControladorClientes::ctrActualizarRegistroTelefonoUsuario();

				          	 		if ($actualizar == "ok") {
				          	 			echo '<script>
				          	 			setTimeout(function(){
				          	 				window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
				          	 			},1000)
				          	 			</script>';
				          	 		}
				          	 	}else{
				          	 		echo '<div class="alert alert-danger">Los datos no coinciden,por favor revisar</div>';
				          	 	}
				          	} 
				          	?>
				            <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
                <div class="modal fade" id="myModal8" role="dialog">
				    <div class="modal-dialog modal-lg modal-dialog-centered">
				      <div class="modal-content border border-dark">
				        <div class="modal-body">
				          <form action="#" method="post" class="text-left needs-validation" novalidate>
				          	<div class="form-group">
					          	<label> Nuevo barrio<small class="text-danger">*</small>:</label>
					          	<input list="strets" class="form-control rounded-pill" id="txt" name="actualizarBarrioUs" placeholder="En este buscador selecciona el nuevo barrio de residencia*" required>
					            <datalist id="strets">
					                <?php foreach ($barrios as $key => $usuario1):?>                   
					                <option><?php echo $usuario1["idBARRIO"]. ". "; echo $usuario1["nombreBARRIO"]."-"; echo $usuario1["nombreLOCALIDAD"]?></option>
					                <?php endforeach ?>
					            </datalist>
					            <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
				          	</div>
				          	<div class="form-group">
					          	<input type="hidden" name="actualizarIdU" class="form-control rounded" value="<?php echo $_SESSION["user"]["idEC"];?>">
				          	</div>
				          	<?php
				          	$actualizar = ControladorClientes::ctrActualizarRegistroBarrioUsuario();
				          	if ($actualizar == "ok") {
				          	 	echo '<script>
				          	 	setTimeout(function(){
				          	 		window.location = "index.php?paginasUsuario=ConsultarUsuario&id='.$_SESSION["user"]["idUSUARIO"].'"
				          	 	},1000)
				          	 	</script>';
				          	} 
				          	?>
				            <button type="submit" class="btn btn-danger">Guardar cambios</button>
				            <button type="reset" class="btn btn-dark">Cancelar</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
            </article>
        </div>
	<aside class="col-lg-3" id="blanco-h"></aside>
</div>