<?php

require_once "providers/conexion.php";

class ModeloPedido{
static public function nuevoPedido($datos){
    try{
        $date = date("d-m-y");
        $stmt=Conexion::conectar()->prepare("INSERT INTO pedido (fecharPEDIDO,fechaenPEDIDO,totalPEDIDO,estadoPEDIDO,idEMPLEADO_FK, idEC_FK) VALUES (:fecharPEDIDO,:fechaenPEDIDO,:totalPEDIDO,'Pendiente',:idEMPLEADO_FK,:idEMPLEADO_FK)");
        $stmt->bindParam(":idEMPLEADO_FK",$datos["IdEmple"],PDO::PARAM_INT);
        $stmt->bindParam(":fecharPEDIDO",$date,PDO::PARAM_STR);
        $stmt->bindParam(":fechaenPEDIDO",$datos["fechaen"],PDO::PARAM_STR);
        $stmt->bindParam(":totalPEDIDO",$datos["Total"],PDO::PARAM_INT);
        $stmt->bindParam(":idEC_FK",$datos["IdEmpCli"],PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->execute()){
            return true;
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        //$stmt=close();
        $stmt=null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    }
    static public function saveDetalle($arrayDeta,$inId){
      try {

        foreach ($arrayDeta as $deta) {
          $data=[
          'cant'=>$deta['cantidad'],
          'idPROD'=> $deta['idPRODUCTO'],
          'idped'=>$inId,
          'subtotal' => $deta ['cantidad'] * $deta ['valoruPRODUCTO']
          ];

          $stmt=Conexion::conectar()->prepare("INSERT INTO detalle_pedido(cantidadDP,subtotalDP,idPRODUCTO_FK,idPEDIDO_FK)VALUES(:cant,:subtotal,:idPROD,:idped)");
          $stmt->bindParam(":cant",$data["cant"],PDO::PARAM_INT);
          $stmt->bindParam(":subtotal",$data["subtotal"],PDO::PARAM_INT);
          $stmt->bindParam(":idPROD",$data["idPROD"],PDO::PARAM_INT);
          $stmt->bindParam(":idped",$data["idped"],PDO::PARAM_INT);
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
    static public function editCantidad($array,$op){
      try {
        if ($op==1) {
          foreach ($arrayDeta as $deta) {
            $data=[
            'cant'=>$deta['cantidadDI'],
            'idMP'=> $deta['idMP'],
            'idIMP'=>$inId
            ];

            $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=cantMP+(:cant), estadoMP='EXISTENCIA' WHERE idMP=:idMP");
            $stmt->bindParam(":cant",$data['cant'],PDO::PARAM_INT);
            $stmt->bindParam(":idMP",$data['idMP'],PDO::PARAM_INT);
            $stmt->execute();
            $stmt->close();
            $stmt=null;

          }
          if($stmt->execute()){
              return true;
          }else{
              print_r(Conexion::conectar()->errorInfo());
          }
          $stmt->close();
        }

      } catch (PDOException $e) {
          return $e->getMessage();
      }
    }

    static public function getLastId(){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT MAX(idPEDIDO) as id FROM pedido ");
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
