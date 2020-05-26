<?php

require_once "providers/conexion.php";

class ModeloAdministradores
{

	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Administradores/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Registrar administradores
	static public function mdlRegistroAdministradores($tabla,$datos){

		try {
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(identificacionEMPLEADO,nombreEMPLEADO,telefonoEMPLEADO,correoEMPLEADO,contrasenaEMPLEADO,estadoEMPLEADO,idROL_FK) VALUES (:identificacionEMPLEADO,:nombreEMPLEADO,:telefonoEMPLEADO,:correoEMPLEADO,:contrasenaEMPLEADO,:estadoEMPLEADO,:idROL_FK);");

			$stmt -> bindParam(":identificacionEMPLEADO",$datos["identificacionEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":nombreEMPLEADO",$datos["nombreEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":telefonoEMPLEADO",$datos["telefonoEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":correoEMPLEADO",$datos["correoEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":contrasenaEMPLEADO",$datos["contrasenaEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":estadoEMPLEADO",$datos["estadoEMPLEADO"],PDO::PARAM_STR);
			$stmt -> bindParam(":idROL_FK",$datos["idROL_FK"],PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt->close();
			$stmt = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

    //Consultar Administradores
	static public function mdlSeleccionarRegistroAdministradores($tabla1,$item1,$valor1){

		try {
		   if ($item1 == null && $valor1 == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1");
	        $stmt->execute();
	        return $stmt -> fetchAll();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE $item1 = :$item1");
	            $stmt->bindParam(":".$item1,$valor1,PDO::PARAM_STR);
	            $stmt->execute();
	            return $stmt -> fetch();
			}
	        $stmt->close();
	        $stmt= null;	
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    // Eliminar administradores
    static public function mdlEliminarAdministrador($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":idEMPLEADO",$valor,PDO::PARAM_INT);

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

    //INACTIVAR UN ADMIN

    static public function mdlInactivarRegistroAdministradores($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoEMPLEADO = 'Inactivo' WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":idEMPLEADO",$valor,PDO::PARAM_INT);

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

    //ACTIVAR UN ADMIN

    static public function mdlActivarRegistroAdministradores($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoEMPLEADO = 'Activo' WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":idEMPLEADO",$valor,PDO::PARAM_INT);

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

    //Actualizar Registro nombre del empleado
    static public function mdlActualizarNombreEmAdmin($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreEMPLEADO = :nombreEMPLEADO
            WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":nombreEMPLEADO",$datos["nombreEMPLEADO"],PDO::PARAM_STR);
            $stmt->bindParam(":idEMPLEADO",$datos["idEMPLEADO"],PDO::PARAM_INT);

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

    //Actualizar Registro email del empleado
    static public function mdlActualizarEmailEmAdmin($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET correoEMPLEADO = :correoEMPLEADO
            WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":correoEMPLEADO",$datos["correoEMPLEADO"],PDO::PARAM_STR);
            $stmt->bindParam(":idEMPLEADO",$datos["idEMPLEADO"],PDO::PARAM_INT);

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

    //Actualizar Registro identificacion del empleado
    static public function mdlActualizarIdentEmAdmin($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET identificacionEMPLEADO = :identificacionEMPLEADO
            WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":identificacionEMPLEADO",$datos["identificacionEMPLEADO"],PDO::PARAM_STR);
            $stmt->bindParam(":idEMPLEADO",$datos["idEMPLEADO"],PDO::PARAM_INT);

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

    //Actualizar Registro telefono del empleado
    static public function mdlActualizarTelEmAdmin($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefonoEMPLEADO = :telefonoEMPLEADO
            WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":telefonoEMPLEADO",$datos["telefonoEMPLEADO"],PDO::PARAM_STR);
            $stmt->bindParam(":idEMPLEADO",$datos["idEMPLEADO"],PDO::PARAM_INT);

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

    //Actualizar Registro contraseña del empleado
    static public function mdlActualizarConEmAdmin($tabla,$datos){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contrasenaEMPLEADO = :contrasenaEMPLEADO
            WHERE idEMPLEADO = :idEMPLEADO");

            $stmt->bindParam(":contrasenaEMPLEADO",$datos["contrasenaEMPLEADO"],PDO::PARAM_STR);
            $stmt->bindParam(":idEMPLEADO",$datos["idEMPLEADO"],PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
}