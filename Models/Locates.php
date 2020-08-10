<?php

require_once 'providers/conexion.php';

class Locates
{
	static public function select($table)
	{
		try {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt = null;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}