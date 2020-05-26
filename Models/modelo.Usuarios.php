<?php

require_once "providers/conexion.php";

class ModeloUsuarios
{
	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Usuarios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 

    //Registro Usuarios


    static public function mdlRegistrarUsuarios($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreUSUARIO,contrasenaUSUARIO,estadoUSUARIO,idEC_FK,idROL_FK) VALUES
            (:nombreUSUARIO,:contrasenaUSUARIO,:estadoUSUARIO,:idEC_FK,:idROL_FK)");

            $stmt -> bindParam(":nombreUSUARIO",$datos["nombreUSUARIO"],PDO::PARAM_STR);
            $stmt -> bindParam(":contrasenaUSUARIO",$datos["contrasenaUSUARIO"],PDO::PARAM_STR);
            $stmt -> bindParam(":estadoUSUARIO",$datos["estadoUSUARIO"],PDO::PARAM_STR);
            $stmt -> bindParam(":idEC_FK",$datos["idEC_FK"],PDO::PARAM_INT);
            $stmt -> bindParam(":idROL_FK",$datos["idROL_FK"],PDO::PARAM_INT);
            if($stmt->execute()){

                return "ok";
            }else{
                return Conexion::conectar()->errorInfo();
            }
            $stmt -> close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Consulta usuarios

    static public function mdlSeleccionarRegistroUsuarios($tabla,$item,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT us.idUSUARIO,us.nombreUSUARIO,us.estadoUSUARIO,us.contrasenaUSUARIO,us.idEC_FK,us.idROL_FK,em.idEC,em.identificacionEC,em.telefonoEC,em.direccionEC,em.nombrecontEC,em.telefonocontEC,em.correocontEC,b.nombreBARRIO FROM $tabla us 
            INNER JOIN empresa_cliente em ON us.idEC_FK = em.idEC
            INNER JOIN barrio b ON em.idBARRIO_FK = b.idBARRIO WHERE  $item = :$item");
            $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();   
            $stmt->close();
            $stmt = null;  
        } catch (PDOException $e) {
            echo $e->getMessage();
        }      
    }

    //Actualizar Registro Nombre usuario
    static public function mdlActualizarNombreUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreUSUARIO = :nombreUSUARIO
            WHERE idUSUARIO = :idUSUARIO");

            $stmt->bindParam(":nombreUSUARIO",$datos["nombreUSUARIO"],PDO::PARAM_STR);
            $stmt->bindParam(":idUSUARIO",$datos["idUSUARIO"],PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt= null;
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }

    //Actualizar Registro Contraseña usuario
    static public function mdlActualizarContrasenaUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contrasenaUSUARIO = :contrasenaUSUARIO
            WHERE idUSUARIO = :idUSUARIO");

            $stmt->bindParam(":contrasenaUSUARIO",$datos["contrasenaUSUARIO"],PDO::PARAM_STR);
            $stmt->bindParam(":idUSUARIO",$datos["idUSUARIO"],PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt= null;
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
}