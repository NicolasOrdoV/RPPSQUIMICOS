<?php
class ModeloInventario
{

	static public function mdlSeleccionarProductosStock($tabla, $item, $valor)
	{
		try {
			if ($item == null  && $valor == null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt->execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			}
			$stmt->close();
			$stmt = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	static public function mdlSeleccionarUltimos3Prod($tabla){
		try{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estadoPRODUCTO='Activo' ORDER BY idPRODUCTO DESC LIMIT 3 ");
			$stmt->execute();
			return $stmt->fetchAll();
		}catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public static function mdlSeleccionarProductosUsuario($tabla, $item, $valor){
		try {
			if ($item == null  && $valor == null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estadoPRODUCTO='Activo'");
				$stmt->execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			}
			$stmt->close();
			$stmt = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	static public function mdlCrearProducto($tabla, $datos)
	{
		try {
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombrePRODUCTO,descripcionPRODUCTO,cantPRODUCTO,estadoPRODUCTO,valoruPRODUCTO)VALUES(:nombrePRODUCTO,:descripcionPRODUCTO,:cantPRODUCTO,:estadoPRODUCTO,:valoruPRODUCTO)");

			$stmt->bindParam(":nombrePRODUCTO", $datos["nombrePRODUCTO"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcionPRODUCTO", $datos["descripcionPRODUCTO"], PDO::PARAM_STR);
			$stmt->bindParam(":cantPRODUCTO", $datos["cantPRODUCTO"], PDO::PARAM_INT);
			$stmt->bindParam(":estadoPRODUCTO", $datos["estadoPRODUCTO"], PDO::PARAM_STR);
			$stmt->bindParam(":valoruPRODUCTO", $datos["valoruPRODUCTO"], PDO::PARAM_INT);
			
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

	static public function mdlActualizarProducto($tabla, $datos)
	{
		try {
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrePRODUCTO =:nombrePRODUCTO,descripcionPRODUCTO = :descripcionPRODUCTO,cantPRODUCTO =:cantPRODUCTO, valoruPRODUCTO = :valoruPRODUCTO WHERE idPRODUCTO = :idPRODUCTO");

			$stmt->bindParam(":nombrePRODUCTO", $datos["nombrePRODUCTO"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcionPRODUCTO", $datos["descripcionPRODUCTO"], PDO::PARAM_STR);
			$stmt->bindParam(":cantPRODUCTO", $datos["cantPRODUCTO"], PDO::PARAM_INT);
			$stmt->bindParam(":valoruPRODUCTO", $datos["valoruPRODUCTO"], PDO::PARAM_INT);
			$stmt->bindParam(":idPRODUCTO",$datos["idPRODUCTO"],PDO::PARAM_INT);
			
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

	static public function mdlEliminarProducto($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPRODUCTO = :idPRODUCTO");

            $stmt->bindParam(":idPRODUCTO",$valor,PDO::PARAM_INT);

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
	
	//INACTIVAR UN PRODUCTO

    static public function mdlInactivarRegistroInventario($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoPRODUCTO = 'Inactivo' WHERE idPRODUCTO = :idPRODUCTO");

            $stmt->bindParam(":idPRODUCTO",$valor,PDO::PARAM_INT);

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

    //ACTIVAR UN PRODUCTO

    static public function mdlActivarRegistroInventario($tabla,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estadoPRODUCTO = 'Activo' WHERE idPRODUCTO = :idPRODUCTO");

            $stmt->bindParam(":idPRODUCTO",$valor,PDO::PARAM_INT);

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
