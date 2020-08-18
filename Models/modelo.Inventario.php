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

	static public function mdlSeleccionarUltimos6Prod($tabla){
		try{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estadoPRODUCTO='Activo' ORDER BY idPRODUCTO LIMIT 6 ");
			$stmt->execute();
			return $stmt->fetchAll();
		}catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	static public function mdlSeleccionarProductosBusqueda($tabla,$busqueda){
		try{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombrePRODUCTO LIKE '%$busqueda%' && estadoPRODUCTO='Activo'");
			$stmt->execute();
			return $stmt->fetchAll();
		}catch(PDOException $e) {
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
