<?php

require_once 'providers/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ControladorUsuarios
{
	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Usuarios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //registrar Usuarios

    static public function ctrRegistroUsuarios($data){

      try {
        if(isset($data["registrarUsuario"])){

          if (preg_match('/^[0-9a-zA-Z]+$/', $data["registrarContraseña"]) &&
              preg_match('/^[0-9a-zA-Z]+$/', $data["registrarContraseñaC"])) {
            $tabla = "usuario";
            $datos = array("nombreUSUARIO" => $data["registrarUsuario"],
                           "contrasenaUSUARIO" => $data["registrarContraseña"],
                           "estadoUSUARIO" => $data["registrarEstado"],
                           "idEC_FK" => $data["registrarEC"],
                           "idROL_FK" => $data["registrarRoll"]
                         );

            $respuesta = ModeloUsuarios::mdlRegistrarUsuarios($tabla,$datos);
            return $respuesta;
          }else{
            $respuesta = "error";
            return $respuesta;
          }
        }
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
    }
    //Consultar usuarios

    static public function ctrSeleccionarUsuarios($item,$valor){
      try {
         $tabla = "usuario";
         $respuesta = ModeloUsuarios::mdlSeleccionarRegistroUsuarios($tabla,$item,$valor);
         return $respuesta;
       } catch (PDOException $e) {
          echo $e->getMessage();
       }
    }

    //Ingreso al sistema usuarios

    public function ctrIngresoUsuario(){
      try {
        if(isset($_POST["ingresoNombre"])){

           $tabla = "usuario";
           $item = "nombreUSUARIO";
           $valor = $_POST["ingresoNombre"];
           $respuestaU = ModeloUsuarios::mdlSeleccionarRegistroUsuarios($tabla, $item, $valor);

           $tabla1 = "empleado";
           $item1 = "correoEMPLEADO";
           $valor1 = $_POST["ingresoNombre"];
           $respuestaA = ModeloAdministradores::mdlSeleccionarRegistroAdministradores($tabla1, $item1,$valor1);

          if($respuestaU["nombreUSUARIO"] == $_POST["ingresoNombre"] && 
            $respuestaU["contrasenaUSUARIO"] == $_POST["ingresoContraseña"] &&
            $respuestaU["estadoUSUARIO"] == "Activo"){

            $_SESSION["user"] = $respuestaU;   
            $_SESSION["validarIngreso"] = "ok";
            echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);

            }
            window.location = "index.php";
            </script>';
          }elseif ($respuestaU["nombreUSUARIO"] == $_POST["ingresoNombre"] && 
            $respuestaU["contrasenaUSUARIO"] == $_POST["ingresoContraseña"] &&
            $respuestaU["estadoUSUARIO"] == "Inactivo" ) {
            echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            </script>';
            echo '<div class="alert alert-danger">
                   <h4 class="font-text-bold">¡LO SENTIMOS!</h4>
                   <h5>El usuario esta inactivado de manera temporal</h5>
                   <p>Para volver a activar esta cuenta,es necesario que envies un correo electronico a <a class="alert-link">RPPSQUIMICOS@CORREOEMPRESARIAL.COM</a> y solicitar tu activacion inmediata.</p>
                   <p>La activación de tu cuenta podra estar disponible en el transcurso del dia.</p>
                  </div>';
          }elseif ($respuestaA["correoEMPLEADO"] == $_POST["ingresoNombre"] && 
            $respuestaA["contrasenaEMPLEADO"] == $_POST["ingresoContraseña"] &&
            $respuestaA["estadoEMPLEADO"] == "Activo") {

              $_SESSION["user"] = $respuestaA;   
              $_SESSION["validarIngreso"] = "ok";
              echo '<script>
              if(window.history.replaceState){

                  window.history.replaceState(null,null,window.location.href);

              }
              window.location = "index.php";
              </script>';
          }elseif ($respuestaA["correoEMPLEADO"] == $_POST["ingresoNombre"] && 
            $respuestaA["contrasenaEMPLEADO"] == $_POST["ingresoContraseña"] &&
            $respuestaA["estadoEMPLEADO"] == "Inactivo") {
             echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            </script>';
            echo '<div class="alert alert-danger">
                   <h4 class="font-text-bold">¡LO SENTIMOS!</h4>
                   <h5>El empleado esta inactivado de manera temporal</h5>
                   <p>Para volver a activar esta cuenta,es necesario que envies un correo electronico a <a class="alert-link">RPPSQUIMICOS@CORREOEMPRESARIAL.COM</a> y solicitar tu activacion inmediata.</p>
                   <p>En caso de que hayas sido retirado con causa justa, es necesario que te remitas ante el administrador para la eliminación de tus datos personales</p>
                  </div>';
          }else{
            echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            </script>';
            echo '<div class="alert alert-danger">
                   <h4 class="font-text-bold">¡OPPS!</h4>
                   <h5>Correo o contraseña incorrectos</h5>
                   <p>Si no tienes una cuenta,por favor clickea el enlace de abajo para registrarte</p>
                  </div>';
          }
        }
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
    }

    //Actualizar Nombre Usuario

    static public function ctrActualizarRegistroNombreUsuario(){
        try {
          if(isset($_POST["actualizarIdU"])){

            $tabla = "usuario";
            $datos = array("idUSUARIO"=>$_POST["actualizarIdU"],
                           "nombreUSUARIO" => $_POST["actualizarNombreUs"]
                         );

            $respuesta = ModeloUsuarios::mdlActualizarNombreUsuario($tabla,$datos);

            return $respuesta;            
        }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
    }

    //Actualizar contraseña del usuario por datos del cliente

    static public function ctrActualizarRegistroConUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "usuario";
            $datos = array("idUSUARIO"=>$_POST["actualizarIdU"],
                           "contrasenaUSUARIO" => $_POST["actualizarConU"]
                         );

            $respuesta = ModeloUsuarios::mdlActualizarContrasenaUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //ENVIO CORREO DE CONFIRMACIÓN CREACIÓN DE USUARIO
    static public function enviarCorreoUser($data){
      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = 0;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'rppsquimicos@gmail.com';                     // SMTP username
          $mail->Password   = 'luisblanco23';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('rppsquimicos@gmail.com');
          $mail->addAddress($data["registrarUsuario"]);     // Add a recipient


          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'CONFIRMACIÓN DE CUENTA';
          $mail->Body    = ' 
          <body>
          <main class="container-fluid">
              <header class="bg-danger p-2">
                  <p> RPPS QUÍMICOS</p>
              </header>
              <section>
                  <p>Felicidades, te confirmamos que tu correo ' .$data["registrarUsuario"]. ' se registro de manera satistactoria.<br>
                      Te invitamos a que inicies sesion en nuestra plataforma <br></p>
                  <a href="http://localhost/RPPSQUIMICOS.COM/index.php?paginasUsuario=InicioSesion" class="btn btn-success">Ir a inicio de sesión<a>
              </section>
              <footer class="row">
                  <div id="footer" class="col-lg-12"><p>©Copyright: GAROWARE SOFTWARE</p>
                  DERECHOS RESERVADOS 2020</div>
              </footer>
          </main>
          </body>';
          $mail->CharSet = 'UTF-8';  
          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
    
    //ENVIO DE RECUPERACIÓN DE CONTRASEÑA PARA USUARIO Y EMPLEADO
    static public function enviarCorreoRecUser($data){
    
      if (isset($data["recuperarUsuario"])) {
         
        $tabla = "usuario";
        $item = "nombreUSUARIO";
        $valor = $data["recuperarUsuario"];
        $respuestaU = ModeloUsuarios::mdlSeleccionarRegistroUsuarios($tabla, $item, $valor);

        $tabla1 = "empleado";
        $item1 = "correoEMPLEADO";
        $valor1 = $data["recuperarUsuario"];
        $respuestaA = ModeloAdministradores::mdlSeleccionarRegistroAdministradores($tabla1, $item1,$valor1);

        if ($respuestaU["nombreUSUARIO"] == $data["recuperarUsuario"]) {
          $mail = new PHPMailer(true);

          try {
                  //Server settings
              $mail->SMTPDebug = 0;                      // Enable verbose debug output
              $mail->isSMTP();                                            // Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
              $mail->Username   = 'rppsquimicos@gmail.com';                     // SMTP username
              $mail->Password   = 'luisblanco23';                               // SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
              $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                  //Recipients
              $mail->setFrom('rppsquimicos@gmail.com');
              $mail->addAddress($data["recuperarUsuario"]);     // Add a recipient


                  // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'RECUPERAR CUENTA';
              $mail->Body    = ' 
              <body>
              <main class="container-fluid">
              <header class="bg-danger p-2">
                  <p> RPPS QUÍMICOS</p>
              </header>
              <section>
                <p>Felicidades, encontramos una considencia ' .$data["recuperarUsuario"]. ' en la base de datos.<br>
                    Entra al link para recuperar la contraseña <br></p>
                    <a href="http://localhost/RPPSQUIMICOS.COM/index.php?paginasUsuario=RestauraContrasenaUs&id='.$respuestaU["idUSUARIO"].'" class="btn btn-success">Recupera tu contraseña<a>
              </section>
              <footer class="row">
                <div id="footer" class="col-lg-12"><p>©Copyright: GAROWARE SOFTWARE</p>
                DERECHOS RESERVADOS 2020</div>
              </footer>
              </main>
              </body>';
              $mail->CharSet = 'UTF-8';  
              $mail->send();
              //RESPUESTA QUE SE VA A MOSTRAR EN EL FORMULARIO//
              echo '<script>
                if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
                }
              </script>';
              echo '<div class="alert alert-success">
              <h4 class="font-text-bold">¡GENIAL!</h4>
              <p>Se ha enviado a tu correo '.$data["recuperarUsuario"].' para que puedas recuperar tu contraseña.</p>
              </div>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }elseif ($respuestaA["correoEMPLEADO"] == $data["recuperarUsuario"]) {
            $mail = new PHPMailer(true);

            try {
                    //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'rppsquimicos@gmail.com';                     // SMTP username
                $mail->Password   = 'luisblanco23';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                $mail->setFrom('rppsquimicos@gmail.com');
                $mail->addAddress($data["recuperarUsuario"]);     // Add a recipient


                    // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'RECUPERAR CUENTA';
                $mail->Body    = ' 
                <body>
                <main class="container-fluid">
                <header class="bg-danger p-2">
                    <p> RPPS QUÍMICOS</p>
                </header>
                <section>
                  <p>Felicidades, encontramos una considencia ' .$data["recuperarUsuario"]. ' en la base de datos.<br>
                      Entra al link para recuperar la contraseña <br></p>
                      <a href="http://localhost/RPPSQUIMICOS.COM/index.php?paginasAdministradores=RestauraContrasenaAd&id='.$respuestaA["idEMPLEADO"].'" class="btn btn-success">Recupera tu contraseña<a>
                </section>
                <footer class="row">
                  <div id="footer" class="col-lg-12"><p>©Copyright: GAROWARE SOFTWARE</p>
                  DERECHOS RESERVADOS 2020</div>
                </footer>
                </main>
                </body>';
                $mail->CharSet = 'UTF-8';  
                $mail->send();

                echo '<script>
                  if(window.history.replaceState){

                  window.history.replaceState(null,null,window.location.href);
                  }
                </script>';
                echo '<div class="alert alert-success">
                <h4 class="font-text-bold">¡GENIAL!</h4>
                <p>Se ha enviado a tu correo '.$data["recuperarUsuario"].' para que puedas recuperar tu contraseña.</p>
                </div>';
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
        }else{
            echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            </script>';
            echo '<div class="alert alert-danger">
                   <h4 class="font-text-bold">¡QUE PENA!</h4>
                   <p>No se encontro ningun usuario '.$data["recuperarUsuario"].' en nuestra base de datos.</p>
                   <p>Pueda que lo hayas escrito mal, por lo que debes volverlo a escribir.</p>
                  </div>';
        }
      }
    }
}