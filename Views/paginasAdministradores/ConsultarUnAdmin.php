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

    $item1 = "idEMPLEADO";
    $valor1 = $_GET["id"];
    $admin = ControladorAdministradores::ctrSeleccionarRegistrosAdministradores($item1,$valor1);
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
                <h1><?php echo $admin["nombreEMPLEADO"];?></h1>
                <h2><?php echo $admin["correoEMPLEADO"]?></h2>
                <p>Identificacion:<?php echo $admin["identificacionEMPLEADO"]?></p>
                <h3>Telefono:<?php echo $admin["telefonoEMPLEADO"]?></h3>
                <a href="#" class="text-dark" data-toggle="modal" data-target="#myModal">Editar datos del perfil</a><br>
                <a href="#" class="text-dark">Editar datos del envio</a><br>
                <a href="#" class="text-dark" data-toggle="modal" data-target="#changePassword">Seguridad</a><br>
                
            <!--CAMBIO DE CONTRASEÑA-->
                <div class="modal fade" id="changePassword" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content border border-dark">
                        <div class="modal-body">
                          <form action="#" method="post" class="text-left needs-validation" novalidate>
                            <div class="form-group">
                                <label> Nueva contraseña<small class="text-danger">*</small>:</label>
                                <input type="password" name="actualizarContraseñaEm" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <label> Confirmar contraseña<small class="text-danger">*</small>:</label>
                                <input type="password" name="actualizarContraseñaEmC" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="actualizarIdEm" class="form-control rounded" value="<?php echo $admin["idEMPLEADO"];?>">
                            </div>
                            <?php
                            if (isset($_POST["actualizarContraseñaEm"])) {
                                $acConEm = $_POST["actualizarContraseñaEm"];
                                $acConEmC = $_POST["actualizarContraseñaEmC"];

                                if ($acConEm == $acConEmC) {
                                    $actualizar = ControladorAdministradores::ctrActualizarRegistroContraseñaEmAdmin();
                                    if ($actualizar == "ok") {
                                        echo '<script>
                                        setTimeout(function(){
                                            window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$user["idEMPLEADO"].'"
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
                <a href="" class="text-left"> Cambiar foto de perfil</a>
                <hr>

            <!--FORMULARIO DE REGISTRO DE EMPLEADO-->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content justify-content-center" id="modal">
                            <div class="modal-body text-left">
                              <h3>Nombre del empleado:<small> <?php echo $admin["nombreEMPLEADO"]?>
                                <a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal2">Editar</a></small>    
                              </h3>
                              <h3>Correo electronico:<small> <?php echo $admin["correoEMPLEADO"]?>
                                <a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal3">Editar</a></small>    
                              </h3>
                              <h3>Identificación empleado:<small> <?php echo $admin["identificacionEMPLEADO"]?>
                                <a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal4">Editar</a></small>
                              </h3> 
                              <h3>Telefono de contacto:<small> <?php echo $admin["telefonoEMPLEADO"]?>
                                <a href="#" class="text-danger mx-2" data-toggle="modal" data-target="#myModal5">Editar</a></small>
                              </h3>
                              <button type="button" id="btnReg" class="btn btn-primary rounded-pill btn-lg mt-5" data-dismiss="modal">Guardar cambios</button>
                              <button type="button" id="btnReg" class="btn btn-danger rounded-pill btn-lg mt-5" data-dismiss="modal">Cancelar</button>
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
                                <label> Nuevo nombre de empleado<small class="text-danger">*</small>:</label>
                                <input type="text" name="actualizarNombreEm" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <label> Confirmar nombre de empleado<small class="text-danger">*</small>:</label>
                                <input type="text" name="actualizarNombreEmC" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="actualizarIdEm" class="form-control rounded" value="<?php echo $admin["idEMPLEADO"];?>">
                            </div>
                            <?php
                            if (isset($_POST["actualizarNombreEm"])) {
                                $acNomEm = $_POST["actualizarNombreEm"];
                                $acNomEmC = $_POST["actualizarNombreEmC"];

                                if ($acNomEm == $acNomEmC) {
                                    $actualizar = ControladorAdministradores::ctrActualizarRegistroNombreEmAdmin();
                                    if ($actualizar == "ok") {
                                        echo '<script>
                                        setTimeout(function(){
                                            window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$user["idEMPLEADO"].'"
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
                                <div class="alert alert-info">
                                    <h4 class="alert-heading"> Nota: </h4>
                                    <p>Con este correo usted inicia sesion, por  lo que si lo llega a modificar recuerdelo para volver a iniciar sesion de forma protocolaria.</p>
                                </div>
                                <label> Nuevo correo<small class="text-danger">*</small>:</label>
                                <input type="email" name="actualizarEmailEm" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <label> confirmar correo<small class="text-danger">*</small>:</label>
                                <input type="email" name="actualizarEmailEmC" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="actualizarIdEm" class="form-control rounded" value="<?php echo $admin["idEMPLEADO"];?>">
                            </div>
                            <?php

                            if (isset($_POST["actualizarEmailEm"])) {
                                
                                $acEmailEm = $_POST["actualizarEmailEm"];
                                $acEmailEmC = $_POST["actualizarEmailEmC"];

                                if ($acEmailEm == $acEmailEmC) {

                                    $actualizar = ControladorAdministradores::ctrActualizarRegistroEmailEmAdmin();
                                    if ($actualizar == "ok") {
                                        echo '<script>
                                        setTimeout(function(){
                                            window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$user["idEMPLEADO"].'"
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
                                La identificación y el documento son datos unicos por lo que si es necesario cambiarlo,debe ser por error humano de registro.</div>
                                <label> identificacion<small class="text-danger">*</small>:</label>
                                <input type="number" name="actualizarIdentEm" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <label> Confirmar identificación<small class="text-danger">*</small>:</label>
                                <input type="number" name="actualizarIdentEmC" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="actualizarIdEm" class="form-control rounded" value="<?php echo $admin["idEMPLEADO"];?>">
                            </div>
                            <?php
                            if (isset($_POST["actualizarIdentEm"])) {
                                
                                $actIdenEm = $_POST["actualizarIdentEm"];
                                $actIdenEmC = $_POST["actualizarIdentEmC"];

                                if ($actIdenEm == $actIdenEmC) {
                                    
                                    $actualizar = ControladorAdministradores::ctrActualizarRegistroIdentEmAdmin();
                                    if ($actualizar == "ok") {
                                        echo '<script>
                                        setTimeout(function(){
                                            window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$user["idEMPLEADO"].'"
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
                                <label> Nuevo telefono<small class="text-danger">*</small>:</label>
                                <input type="email" name="actualizarTelEm" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <label> Confirmar telefono<small class="text-danger">*</small>:</label>
                                <input type="email" name="actualizarTelEmC" class="form-control rounded" required>
                                <div class="valid-feedback">Valido</div>
                                <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="actualizarIdEm" class="form-control rounded" value="<?php echo $admin["idEMPLEADO"];?>">
                            </div>
                            <?php
                            if (isset($_POST["actualizarTelEm"])) {
                                $acTelEm = $_POST["actualizarTelEm"];
                                $acTelEmC = $_POST["actualizarTelEmC"];

                                if ($acTelEm == $acTelEmC) {
                                    
                                    $actualizar = ControladorAdministradores::ctrActualizarRegistroTelEmAdmin();
                                    if ($actualizar == "ok") {
                                        echo '<script>
                                        setTimeout(function(){
                                            window.location = "index.php?paginasAdministradores=ConsultarUnAdmin&id='.$user["idEMPLEADO"].'"
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
            </article>
        </div>
    <aside class="col-lg-3" id="blanco-h"></aside>
</div>