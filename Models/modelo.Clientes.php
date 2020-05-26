<?php

require_once "providers/conexion.php";


class ModeloClientes{

    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Clientes/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Registro Clientes
    static public function mdlRegistroClientes($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(identificacionEC, nombreEC,telefonoEC, direccionEC, nombrecontEC, telefonocontEC, correocontEC,idBARRIO_FK) VALUES(:identificacionEC, :nombreEC,:telefonoEC, :direccionEC, :nombrecontEC,:telefonocontEC, :correocontEC,:idBARRIO_FK)");

            $stmt->bindParam(":identificacionEC",$datos["identificacionEC"],PDO::PARAM_STR);
            $stmt->bindParam(":nombreEC",$datos["nombreEC"],PDO::PARAM_STR);
            $stmt->bindParam(":telefonoEC",$datos["telefonoEC"],PDO::PARAM_STR);
            $stmt->bindParam(":direccionEC",$datos["direccionEC"],PDO::PARAM_STR);
            $stmt->bindParam(":nombrecontEC",$datos["nombrecontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":telefonocontEC",$datos["telefonocontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":correocontEC",$datos["correocontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idBARRIO_FK",$datos["idBARRIO_FK"],PDO::PARAM_INT);

            if($stmt->execute()){
                $stmt = Conexion::conectar()->prepare("SELECT MAX(idEC) FROM $tabla ");
                $stmt->execute();
                return $stmt -> fetchAll();
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt= null;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Consulta registros

    static public function mdlSeleccionarRegistroClientes($tabla,$item,$valor){

        try {
            if ($item == null  && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT em.idEC,em.identificacionEC,em.nombreEC,em.telefonoEC,em.direccionEC,b.nombreBarrio,em.nombrecontEC,em.telefonocontEC,em.correocontEC,us.idUSUARIO,us.nombreUSUARIO,us.estadoUSUARIO FROM $tabla em 
                INNER JOIN barrio b ON em.idBARRIO_FK = b.idBARRIO
                INNER JOIN usuario us ON em.idEC = us.idEC_FK");
            $stmt->execute();
            return $stmt -> fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
                $stmt->execute();
                return $stmt -> fetch();
            }
            $stmt->close();
            $stmt= null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //Eliminar Registro
    static public function mdlEliminarRegistroClientes($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEC = :idEC");

            $stmt->bindParam(":idEC",$valor,PDO::PARAM_INT);

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

    //Actualizar Registro Nombre completo cliente
    static public function mdlActualizarNombreComUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrecontEC = :nombrecontEC
            WHERE idEC = :idEC");

            $stmt->bindParam(":nombrecontEC",$datos["nombrecontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //Actualizar identificacion cliente
    static public function mdlActualizarIdentUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET identificacionEC = :identificacionEC
            WHERE idEC = :idEC");

            $stmt->bindParam(":identificacionEC",$datos["identificacionEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //Actualizar correo cliente
    static public function mdlActualizarCorreoUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET correocontEC = :correocontEC
            WHERE idEC = :idEC");

            $stmt->bindParam(":correocontEC",$datos["correocontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //Actualizar direccion cliente
    static public function mdlActualizarDireccionUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET direccionEC = :direccionEC
            WHERE idEC = :idEC");

            $stmt->bindParam(":direccionEC",$datos["direccionEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //Actualizar Barrio cliente
    static public function mdlActualizarBarrioUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idBARRIO_FK = :idBARRIO_FK
            WHERE idEC = :idEC");

            $stmt->bindParam(":idBARRIO_FK",$datos["idBARRIO_FK"],PDO::PARAM_INT);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //Actualizar telefono cliente
    static public function mdlActualizarTelefonoUsuario($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefonocontEC = :telefonocontEC
            WHERE idEC = :idEC");

            $stmt->bindParam(":telefonocontEC",$datos["telefonocontEC"],PDO::PARAM_STR);
            $stmt->bindParam(":idEC",$datos["idEC"],PDO::PARAM_INT);

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

    //INACTIVAR UN USUARIO

    static public function mdlInactivarRegistroClientes($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoUSUARIO = 'Inactivo' WHERE idUSUARIO = :idUSUARIO");

            $stmt->bindParam(":idUSUARIO",$valor,PDO::PARAM_INT);

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

    //ACTIVAR UN USUARIO

    static public function mdlActivarRegistroClientes($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoUSUARIO = 'Activo' WHERE idUSUARIO = :idUSUARIO");

            $stmt->bindParam(":idUSUARIO",$valor,PDO::PARAM_INT);

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
    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Roll/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Consulta Roll

    static public function mdlSeleccionarRoll($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt -> fetchAll(); 
        $stmt->close();
        $stmt= null;
        
    }
}