<?php 
	class ModeloInventario {
		
		static public function mdlSeleccionarProductosStock($tabla,$item,$valor)
		{
			try {
				if ($item == null  && $valor == null) {
					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
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
		
	}
?>