<?php

//require_once "providers/conexion.php";

class ModeloPedido{
    static public function nuevoPedido($datos){
      try{
          $date = date("Y-m-d");
          $stmt=Conexion::conectar()->prepare("INSERT INTO pedido (fecharPEDIDO,fechaenPEDIDO,totalPEDIDO,estadoPEDIDO,idEMPLEADO_FK, idEC_FK) VALUES (:fecharPEDIDO,:fechaenPEDIDO,:totalPEDIDO,'Pendiente',:idEMPLEADO_FK,:idEC_FK)");
          $stmt->bindParam(":idEMPLEADO_FK", $datos["IdEmple"], PDO::PARAM_INT);
          $stmt->bindParam(":fecharPEDIDO", $date, PDO::PARAM_STR);
          $stmt->bindParam(":fechaenPEDIDO", $datos["fechaEN"], PDO::PARAM_STR);
          $stmt->bindParam(":totalPEDIDO", $datos["Total"],  PDO::PARAM_INT);
          $stmt->bindParam(":idEC_FK", $datos["IdEmpCli"],  PDO::PARAM_INT);

          if($stmt->execute()){
              return true;
          }else{
              print_r(Conexion::conectar()->errorInfo());
          }

          //$stmt=close();
          $stmt=null;
      } catch(PDOException $e){
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

          $stmt=Conexion::conectar()->prepare("INSERT INTO detalle_pedido (cantidadDP,subtotalDP,idPRODUCTO_FK,idPEDIDO_FK) VALUES (:cant,:subtotal,:idPROD,:idped)");
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
        //$stmt->close();



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
    static public function consultarPed($valor){

        try {
            if ($item == null  && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT p.*,e.nombreEMPLEADO as empleado, c.nombreEC as clien FROM pedido p INNER JOIN empleado e INNER JOIN empresa_cliente c ON e.idEMPLEADO=p.idEMPLEADO_FK AND c.idEC=p.idEC_FK");
            $stmt->execute();
            return $stmt -> fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT p.*,e.nombreEMPLEADO as empleado, c.nombreEC as clien FROM pedido p INNER JOIN empleado e INNER JOIN empresa_cliente c ON e.idEMPLEADO=p.idEMPLEADO_FK AND c.idEC=p.idEC_FK WHERE p.idPEDIDO = :id");
                $stmt->bindParam(":id",$valor,PDO::PARAM_STR);
                $stmt->execute();
                return $stmt -> fetch();
            }
            $stmt->close();
            $stmt= null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    static public function consultarPedsCliente($id){

        try {
              $stmt = Conexion::conectar()->prepare("SELECT * FROM pedido WHERE idEC_FK=:id");
              $stmt->bindParam(":id",$id,PDO::PARAM_STR);
              $stmt->execute();
              return $stmt -> fetchAll();
              $stmt->close();
              $stmt= null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    static public function showPed($id){
      try {
        $stmt=Conexion::conectar()->prepare("SELECT p.*, d.*, prod.nombrePRODUCTO as producto,e.nombreEMPLEADO as empleado, c.nombreEC as clien FROM pedido p INNER JOIN empleado e INNER JOIN empresa_cliente c INNER JOIN detalle_pedido d INNER JOIN producto prod ON e.idEMPLEADO=p.idEMPLEADO_FK AND c.idEC=p.idEC_FK AND p.idPEDIDO=d.idPEDIDO_FK AND prod.idPRODUCTO=d.idPRODUCTO_FK WHERE d.idPEDIDO_FK=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetchAll();
        $stmt->close();
        $stmt= null;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }
    static public function editarEstado($estado,$valor){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE pedido SET estadoPEDIDO=:estado WHERE idPEDIDO = :id");


            $stmt->bindParam(":id",$valor,PDO::PARAM_INT);
            $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);

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
