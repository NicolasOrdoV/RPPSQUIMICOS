<?php
    require_once "providers/conexion.php";

    class ModeloIngresoMp{

        static public function nuevoIngreso($datos){
            try{
                $date=date("Y-n-j");
                $stmt=Conexion::conectar()->prepare("INSERT INTO ingreso_mp (fechaIMP,idEMPLEADO_FK) VALUES ($date,:idEMPLEADO_FK)");

                $stmt->bindParam(":idEMPLEADO_FK",$datos["idEMPLE"],PDO::PARAM_INT);

                if($stmt->execute()){
                    $stmt=Conexion::conectar()->prepare("SELECT MAX(idIMP) FROM ingreso_mp");
                    $stmt->execute();
                    return $stmt->fetchAll();
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                }
                $stmt->close();
                $stmt=null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            }
            static public function consultarIngreso($item,$valor){

                try {
                    if ($item == null  && $valor == null) {
                    $stmt = Conexion::conectar()->prepare("SELECT i.*,e.nombreEMPLEADO as empleado FROM ingreso_mp i INNER JOIN empleado e ON e.idEMPLEADO=i.idEMPLEADO_FK");
                    $stmt->execute();
                    return $stmt -> fetchAll();
                    }else{
                        $stmt = Conexion::conectar()->prepare("SELECT i.*,e.nombreEMPLEADO as empleado FROM ingreso_mp i INNER JOIN empleado e ON e.idEMPLEADO=i.idEMPLEADO_FK WHERE $item = :$item");
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
