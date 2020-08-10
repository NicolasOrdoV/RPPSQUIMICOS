<?php

require_once "providers/conexion.php";

class ModeloBarrios{

	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Barrios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 
    
    //Consulta barrios

    static public function mdlSeleccionarBarrios($tabla , $item , $value){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT idBARRIO,nombreBARRIO,nombreLOCALIDAD FROM $tabla, localidad 
                WHERE $tabla.idLOCALIDAD_FK = localidad.idLOCALIDAD AND $item = :$item");
            $stmt->bindParam(":". $item,$value,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetchAll(); 
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}