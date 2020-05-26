<?php

require_once "providers/conexion.php";

class ModeloBarrios{

	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Barrios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Consulta barrios

    static public function mdlSeleccionarBarrios($tabla){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT idBARRIO,nombreBARRIO,nombreLOCALIDAD FROM $tabla,localidad WHERE $tabla.idLOCALIDAD_FK = localidad.idLOCALIDAD");
            $stmt->execute();
            return $stmt -> fetchAll(); 
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}