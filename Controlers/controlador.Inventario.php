<?php
require_once 'providers/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ControladorInventario
{
    //Consulta productos para mostrar al administrador

    static public function ctrSeleccionarProductosStock($item, $valor)
    {
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosStock($tabla, $item, $valor);
        return $respuesta;
    }

    //consulta productos para mostrar al cliente/usuario
    static public function ctrSeleccionarProductosUsuario($item, $valor){
        $tabla = "producto";
        $respuesta = ModeloInventario::mdlSeleccionarProductosUsuario($tabla, $item, $valor);
        return $respuesta;
    }

    //consultar ultimos 3 productos agregados
        static public function ctrSleccionarUltimos3Prod($item,$valor){
            $tabla="producto";
            $respuesta=ModeloInventario::mdlSeleccionarUltimos3Prod($tabla,$item,$valor);
            return $respuesta;
        }

    //INACTIVAR UN PRODUCTO
    public function ctrInactivarRegistroInventario(){

        if(isset($_POST["inactivarRegistro"])){

            $tabla = "producto";
            $valor = $_POST["inactivarRegistro"];

            $respuesta = ModeloInventario::mdlInactivarRegistroInventario($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=GestionInventario";
            },1000)
            </script>';
            }
        }
    }

    //ACTIVAR UN PRODUCTO
    public function ctrActivarRegistroInventario(){

        if(isset($_POST["activarRegistro"])){

            $tabla = "producto";
            $valor = $_POST["activarRegistro"];

            $respuesta = ModeloInventario::mdlActivarRegistroInventario($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasAdministradores=GestionInventario";
            },1000)
            </script>';
            }
        }
    }

    static public function ctrSendNotifyCuantity($user,$cuantity,$name){
        $mail=new PHPMailer(true);
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
            $mail->addAddress($user);     // Add a recipient
  
  
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Notificacion de cantidad de inventario';
            $mail->Body    = ' 
            <body>
            <main class="container-fluid">
                <header class="bg-danger p-2">
                    <p> RPPS QUÍMICOS</p>
                </header>
                <section>
                    <p> señor(a) <h1>'.$user.'</h1> nos permitimos informales que la cantidad del producto-materia prima <h1>'.$name.'</h1> esta a
                    punto de agotar sus existencias, el cual cuenta actualmente con <h1>'.$cuantity.'<h1> unidades en existencia. Se le recomienda insertar nuevas existencias <br></p>
                    
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
