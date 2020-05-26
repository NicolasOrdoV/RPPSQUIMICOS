<?php

require_once 'providers/conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ControladorAdministradores
{
	//////////////////////////////////////////////////////////////////////////////
	/////////////////-------------------------------------////////////////////////
	/////////////////////////Administradores/////////////////////////////////////////////
	////////////////--------------------------------------////////////////////////
	//////////////////////////////////////////////////////////////////////////////  

    //Registro administradores
	static public function ctrRegistroAdministradores(){

    try {
        if(isset($_POST["registrarIdentificacionAd"])) {
        
        $tabla = "empleado";
        $datos = array("identificacionEMPLEADO" => $_POST["registrarIdentificacionAd"],
                       "nombreEMPLEADO" => $_POST["registrarNombreAd"],
                       "telefonoEMPLEADO" => $_POST["registrarTelefonoAd"],
                       "correoEMPLEADO" => $_POST["registrarCorreoAd"],
                       "contrasenaEMPLEADO" => $_POST["registrarContraseñaAd"],
                       "estadoEMPLEADO" => $_POST["registrarEstadoAd"],
                       "idROL_FK" => $_POST["registrarRollAd"]
                    );
        $respuesta = ModeloAdministradores::mdlRegistroAdministradores($tabla,$datos);
        return $respuesta;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
	}

	//Consultar administradores

	static public function ctrSeleccionarRegistrosAdministradores($item1,$valor1){
      try {
          $tabla1 = "empleado";
          $respuesta = ModeloAdministradores::mdlSeleccionarRegistroAdministradores($tabla1,$item1,$valor1);
          return $respuesta;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
        
    }

    //Eliminar administradores

    public function ctrEliminarAdministrador(){

      try {
        if(isset($_POST["eliminarAd"])){

            $tabla = "empleado";
            $valor = $_POST["eliminarAd"];

            $respuesta = ModeloAdministradores::mdlEliminarAdministrador($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);

            }
            window.location = "index.php?paginasAdministradores=ConsultarAdmin";
            </script>';
            }
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    //INACTIVAR UN ADMINISTRADOR
    public function ctrInactivarRegistroAdministradores(){

        if(isset($_POST["inactivarRegistro"])){

            $tabla = "empleado";
            $valor = $_POST["inactivarRegistro"];

            $respuesta = ModeloAdministradores::mdlInactivarRegistroAdministradores($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=ConsultarAdmin";
            },1000)
            </script>';
            }
        }
    }

    //ACTIVAR UN ADMINISTRADOR
    public function ctrActivarRegistroAdministradores(){

        if(isset($_POST["activarRegistro"])){

            $tabla = "empleado";
            $valor = $_POST["activarRegistro"];

            $respuesta = ModeloAdministradores::mdlActivarRegistroAdministradores($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=ConsultarAdmin";
            },1000)
            </script>';
            }
        }
    }

    //Actualizar Nombre completo del empleado

    static public function ctrActualizarRegistroNombreEmAdmin(){

        if(isset($_POST["actualizarIdEm"])){

            $tabla = "empleado";
            $datos = array("idEMPLEADO"=>$_POST["actualizarIdEm"],
                           "nombreEMPLEADO" => $_POST["actualizarNombreEm"]
                         );
            $respuesta = ModeloAdministradores::mdlActualizarNombreEmAdmin($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar email del empleado

    static public function ctrActualizarRegistroEmailEmAdmin(){

        if(isset($_POST["actualizarIdEm"])){

            $tabla = "empleado";
            $datos = array("idEMPLEADO"=>$_POST["actualizarIdEm"],
                           "correoEMPLEADO" => $_POST["actualizarEmailEm"]
                         );
            $respuesta = ModeloAdministradores::mdlActualizarEmailEmAdmin($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar identificacion del empleado

    static public function ctrActualizarRegistroIdentEmAdmin(){

        if(isset($_POST["actualizarIdEm"])){

            $tabla = "empleado";
            $datos = array("idEMPLEADO"=>$_POST["actualizarIdEm"],
                           "identificacionEMPLEADO" => $_POST["actualizarIdentEm"]
                         );
            $respuesta = ModeloAdministradores::mdlActualizarIdentEmAdmin($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar telefono del empleado

    static public function ctrActualizarRegistroTelEmAdmin(){

        if(isset($_POST["actualizarIdEm"])){

            $tabla = "empleado";
            $datos = array("idEMPLEADO"=>$_POST["actualizarIdEm"],
                           "telefonoEMPLEADO" => $_POST["actualizarTelEm"]
                         );
            $respuesta = ModeloAdministradores::mdlActualizarTelEmAdmin($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar contraseña del empleado

    static public function ctrActualizarRegistroContraseñaEmAdmin(){

        if(isset($_POST["actualizarIdEm"])){

            $tabla = "empleado";
            $datos = array("idEMPLEADO"=>$_POST["actualizarIdEm"],
                           "contrasenaEMPLEADO" => $_POST["actualizarContraseñaEm"]
                         );
            $respuesta = ModeloAdministradores::mdlActualizarConEmAdmin($tabla,$datos);

            return $respuesta;            
        }
    }

    // ENVIAR CORREO DE INGRESO AL SISTEMA AL EMPLEADO
    static public function enviarCorreoAdmin($data){
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
          $mail->setFrom($data["registrarCorreoAd"]);
          $mail->addAddress($data["registrarCorreoAd"]);     // Add a recipient


          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'CONFIRMACIÓN DE CUENTA DE EMPLEADO';
          $mail->Body    = ' 
          <body>
          <main class="container-fluid">
              <header class="bg-danger p-2">
                  <p> RPPS QUÍMICOS</p>
              </header>
              <section>
                  <p>BIENVENIDO a la familia de RPPSQUIMICOS, ahora tendras un usuario con el cual acceder:</p>
                  <p>Correo electronico: '.$data["registrarCorreoAd"]. '</p>
                  <p>Contraseña: '.$data["registrarContraseñaAd"].'</p>
                  <p>Te recomendamos que cambies tu contraseña para que no tengas problemas al memorizarla.</p>
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
}