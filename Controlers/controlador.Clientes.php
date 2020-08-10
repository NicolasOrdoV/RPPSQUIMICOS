<?php
class ControladorClientes{

//////////////////////////////////////////////////////////////////////////////
/////////////////-------------------------------------////////////////////////
/////////////////////////Clientes/////////////////////////////////////////////
////////////////--------------------------------------////////////////////////
//////////////////////////////////////////////////////////////////////////////  

    //Registro Clientes

    public function ctrRegistroClientes(){
        if (isset($_POST['registroIdentificacion'])) {

            $tabla = "empresa_cliente";
            $item = "identificacionEC";
            $valor = $_POST["registroIdentificacion"];
            $answer = ModeloClientes::mdlVerifyId($tabla,$item,$valor);

            if ($answer["identificacionEC"] != $_POST["registroIdentificacion"]) {
                if (preg_match('/^[0-9]+$/', $_POST["registroIdentificacion"]) &&
                    preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ. ]+$/', $_POST["registroNombreCom"]) &&
                    preg_match('/^[0-9]+$/', $_POST["registroTelefono"]) &&
                    preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNContacto"]) &&
                    preg_match('/^[0-9]+$/', $_POST["registroTContacto"]) &&
                    filter_var($_POST['registroEmail'] , FILTER_VALIDATE_EMAIL)) {


                    $datos = array("identificacionEC"=>$_POST["registroIdentificacion"],
                                    "nombreEC"=>$_POST["registroNombreCom"],
                                    "telefonoEC"=>$_POST["registroTelefono"],
                                    "direccionEC"=>$_POST["registroDireccion"],
                                    "nombrecontEC"=>$_POST["registroNContacto"],
                                    "telefonocontEC"=>$_POST["registroTContacto"],
                                    "correocontEC"=>$_POST["registroEmail"],
                                    "idBARRIO_FK"=>$_POST["registroBarrios"]
                                    );
                    $respuesta = ModeloClientes::mdlRegistroClientes($tabla,$datos);
                    if(!is_null($respuesta)){
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location = "index.php?paginasUsuario=RegistrarUsuario&id='.$respuesta[0][0].'";
                    </script>';          
                    }
                }else{
                    echo '<div class="alert alert-danger">Los datos no tienen el formato correcto, verifique los datos.</div>';
                }
            }else{
                echo '<div class="alert alert-danger">El numero de identificación o el email ya existen en nuestro sistema, no se puede duplicar los datos.</div>';
            }   
        }          
    }

    //Consulta Clientes

    static public function ctrSeleccionarRegistroClientes($item,$valor){
        $tabla = "empresa_cliente";
        $respuesta = ModeloClientes::mdlSeleccionarRegistroClientes($tabla,$item,$valor);
        return $respuesta;
    }

    //Eliminar Clientes

    public function ctrEliminarRegistroClientes(){

        if(isset($_POST["eliminarRegistro"])){

            $tabla = "empresa_cliente";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloClientes::mdlEliminarRegistroClientes($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }

    //Actualizar Nombre completo del usuario por datos del cliente

    static public function ctrActualizarRegistroNombreComUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "nombrecontEC" => $_POST["actualizarNombreComC"]
                         );

            $respuesta = ModeloClientes::mdlActualizarNombreComUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar identificacion del usuario por datos del cliente

    static public function ctrActualizarRegistroIdentUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "identificacionEC" => $_POST["actualizarIdentEC"]
                         );

            $respuesta = ModeloClientes::mdlActualizarIdentUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar correo del usuario por datos del cliente

    static public function ctrActualizarRegistroCorreoUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "correocontEC" => $_POST["actualizarCorreoUs"]
                         );

            $respuesta = ModeloClientes::mdlActualizarCorreoUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar direccion del usuario por datos del cliente

    static public function ctrActualizarRegistroDireccionUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "direccionEC" => $_POST["actualizarDireccionUs"]
                         );

            $respuesta = ModeloClientes::mdlActualizarDireccionUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar barrio del usuario por datos del cliente

    static public function ctrActualizarRegistroBarrioUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "idBARRIO_FK" => $_POST["actualizarBarrioUs"]
                         );

            $respuesta = ModeloClientes::mdlActualizarBarrioUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar telefono del usuario por datos del cliente

    static public function ctrActualizarRegistroTelefonoUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "telefonocontEC" => $_POST["actualizarTelefonoUs"]
                         );

            $respuesta = ModeloClientes::mdlActualizarTelefonoUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //INACTIVAR UN CLIENTE
    public function ctrInactivarRegistroClientes(){

        if(isset($_POST["inactivarRegistro"])){

            $tabla = "usuario";
            $valor = $_POST["inactivarRegistro"];

            $respuesta = ModeloClientes::mdlInactivarRegistroClientes($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }

    //ACTIVAR UN CLIENTE
    public function ctrActivarRegistroClientes(){

        if(isset($_POST["activarRegistro"])){

            $tabla = "usuario";
            $valor = $_POST["activarRegistro"];

            $respuesta = ModeloClientes::mdlActivarRegistroClientes($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Roll/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    //Consultar roll

    static public function ctrSeleccionarRoll(){
        $tabla = "rol";
        $respuesta = ModeloClientes::mdlSeleccionarRoll($tabla);
        return $respuesta;
    }

}
