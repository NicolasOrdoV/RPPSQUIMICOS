<?php
 require_once "providers/conexion.php";

class ModeloIngresoMp{

    static public function nuevoIngreso($datos){
        try{
            $date=date("Y-n-j");
            $stmt=Conexion::conectar()->prepare("INSERT INTO ingreso_mp (fechaIMP,idEMPLEADO_FK) VALUES (:fecha,:idEMPLEADO_FK)");

            $stmt->bindParam(":idEMPLEADO_FK",$datos["idEMPLE"],PDO::PARAM_INT);
            $stmt->bindParam(":fecha",$date,PDO::PARAM_STR);

            if($stmt->execute()){
                return true;
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
        static public function saveDetalle($arrayDeta,$inId){
          try {
            foreach ($arrayDeta as $deta) {
              $data=[
              'cant'=>$deta['cantidadDI'],
              'idMP'=> $deta['idMP'],
              'idIMP'=>$inId
              ];

              $stmt=Conexion::conectar()->prepare("INSERT INTO detalle_ingreso(cantidadDI,idMP_FK,idIMP_FK)VALUES(:cant,:idMP,:idIMP)");
              $stmt->bindParam(":cant",$data["cant"],PDO::PARAM_INT);
              $stmt->bindParam(":idMP",$data["idMP"],PDO::PARAM_INT);
              $stmt->bindParam(":idIMP",$data["idIMP"],PDO::PARAM_INT);
              $stmt->execute();
              $stmt=null;

            }
            if($stmt->execute()){
                return true;
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();



          } catch (PDOException $e) {
              return $e->getMessage();
          }

        }
        static public function editCantidad($id,$cante,$cantn,$op){
          try {
            if ($op==1) {
              $total=$cante+$cantn;
              if ($total!= 0) {
                $estado="EXISTENCIA";
                $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=:cant, estadoMP=:estado WHERE idMP=:idMP");
                $stmt->bindParam(":idMP",$id,PDO::PARAM_INT);
            $stmt->bindParam(":cant",$total,PDO::PARAM_INT);
            $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
            $stmt->execute();
            $stmt->close();
            $stmt=null;
              }
            }

          } catch (PDOException $e) {
              return $e->getMessage();
          }
        }

        static public function getLastId(){

            try {
                $stmt = Conexion::conectar()->prepare("SELECT MAX(idIMP) as id FROM ingreso_mp ");
                $stmt->execute();
                return $stmt -> fetch();
                $stmt->close();
                $stmt= null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        static public function showIMP($id){
          try {
            $stmt=Conexion::conectar()->prepare("SELECT d.*, m.nombreMP as mp, i.*,e.nombreEMPLEADO as empleado FROM detalle_ingreso d INNER JOIN mp m INNER JOIN ingreso_mp i INNER JOIN empleado e ON e.idEMPLEADO = i.idEMPLEADO_FK AND i.idIMP=d.idIMP_FK AND m.idMP=d.idMP_FK WHERE d.idIMP_FK=:id");
            $stmt->bindParam(":id",$id,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetchAll();
            $stmt->close();
            $stmt= null;
          } catch (PDOException $e) {
            echo $e->getMessage();
          }

        }
    }
