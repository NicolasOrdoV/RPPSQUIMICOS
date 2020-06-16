<?php

require_once "providers/conexion.php";

class ModeloProductos{

	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Productos////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Consulta productos

    static public function mdlSeleccionarProductos($tabla){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT idPRODUCTO, nombrePRODUCTO, valoruPRODUCTO FROM $tabla");
            $stmt->execute();
            return $stmt -> fetchAll(); 
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    static public function mdlSeleccionarValorU($tabla){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT valoruPRODUCTO FROM $tabla");
            $stmt->execute();
            return $stmt -> fetchAll(); 
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}