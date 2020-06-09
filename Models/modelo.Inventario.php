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
}
