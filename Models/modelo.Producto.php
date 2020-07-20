<?php
    require_once "providers/conexion.php";

    class ModeloProducto{

        static public function nuevoProducto($datos){
            try{
                $stmt=Conexion::conectar()->prepare("INSERT INTO producto(imgPRODUCTO,nombrePRODUCTO,descripcionPRODUCTO,medidaPRODUCTO, cantPRODUCTO,valoruPRODUCTO,estadoPRODUCTO) VALUES (:imgPRODUCTO,:nombrePRODUCTO,:descripcionPRODUCTO,:medidaPRODUCTO,0,:valoruPRODUCTO,'Activo')");

                $stmt->bindParam(":imgPRODUCTO",$datos["imgPROD"],PDO::PARAM_STR);
                $stmt->bindParam(":nombrePRODUCTO",$datos["nombrePROD"],PDO::PARAM_STR);
                $stmt->bindParam(":descripcionPRODUCTO",$datos["descripPROD"],PDO::PARAM_STR);
                $stmt->bindParam(":medidaPRODUCTO",$datos["medidaPROD"],PDO::PARAM_STR);
                $stmt->bindParam(":valoruPRODUCTO",$datos["valoruPROD"],PDO::PARAM_INT);

                if($stmt->execute()){
                    return "ok";
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                }
                $stmt->close();
                $stmt=null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            }
            static public function consultarProducto($item,$valor){

                try {
                    if ($item == null  && $valor == null) {
                    $stmt = Conexion::conectar()->prepare("SELECT *FROM producto");
                    $stmt->execute();
                    return $stmt -> fetchAll();
                    }else{
                        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE $item = :$item");
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
            static public function actualizarProducto($datos){
                try{
                    $stmt=Conexion::conectar()->prepare("UPDATE producto SET imgPRODUCTO=:imgPRODUCTO,nombrePRODUCTO=:nombrePRODUCTO,descripcionPRODUCTO=:descripcionPRODUCTO,medidaPRODUCTO=:medidaPRODUCTO,valoruPRODUCTO=:valoruPRODUCTO WHERE idPRODUCTO=:idPRODUCTO");
                    $stmt->bindParam(":imgPRODUCTO",$datos["imgPROD"],PDO::PARAM_STR);
                $stmt->bindParam(":nombrePRODUCTO",$datos["nombrePROD"],PDO::PARAM_STR);
                $stmt->bindParam(":descripcionPRODUCTO",$datos["descripPROD"],PDO::PARAM_STR);

                $stmt->bindParam(":medidaPRODUCTO",$datos["medidaPROD"],PDO::PARAM_STR);
                $stmt->bindParam(":valoruPRODUCTO",$datos["valoruPROD"],PDO::PARAM_INT);
                $stmt->bindParam(":idPRODUCTO",$datos["idPROD"],PDO::PARAM_INT);

                if($stmt->execute()){
                    return "ok";
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                }
                $stmt->close();
                $stmt=null;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            static public function eliminarProducto($valor){

                try {
                    $stmt = Conexion::conectar()->prepare("DELETE FROM producto WHERE idPRODUCTO = :idPRODUCTO");

                    $stmt->bindParam(":idPRODUCTO",$valor,PDO::PARAM_INT);

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
            static public function saveDetalle($arrayDeta,$prodId,$cant,$medidaProd){
              try {

                foreach ($arrayDeta as $deta) {
                  $data=[
                  'idMP'=> $deta['idMP']
                  ];

                  $stmt=Conexion::conectar()->prepare("INSERT INTO envasado(cantENVASADO,idMP_FK,idPRODUCTO_FK)VALUES(:cant,:idMP,:idPROD)");
                  $stmt->bindParam(":cant",$cant,PDO::PARAM_INT);
                  $stmt->bindParam(":idMP",$data["idMP"],PDO::PARAM_INT);
                  $stmt->bindParam(":idPROD",$prodId,PDO::PARAM_INT);
                  $stmt->execute();
                  $stmt=null;

                }
                foreach ($arrayDeta as $deta) {
                  $datam=[
                  'idMP'=> $deta['idMP']
                  ];
                  $mp=ModeloMp::consultarMP("idMP",$datam['idMP']);

                  if ($mp["tipoMP"]=="ENVASE") {
                    $cantT=$mp["cantMP"]-$cant;
                    if ($cantT>0) {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=:cant WHERE idMP=:idMP");
                      $stmt->bindParam(":cant",$cantT,PDO::PARAM_INT);
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }else {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=0, estadoMP='AGOTADO' WHERE idMP=:idMP");
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }
                  }elseif ($mp["tipoMP"]=="LIQUIDO") {
                    $cantT=(($mp["cantMP"]*3785)-($cant*$medidaProd))/3785;
                    if ($cantT>0) {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=:cant WHERE idMP=:idMP");
                      $stmt->bindParam(":cant",$cantT,PDO::PARAM_STR);
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }else {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=0, estadoMP='AGOTADO' WHERE idMP=:idMP");
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }
                  }elseif ($mp["tipoMP"]=="SOLIDO") {
                    $cantT=(($mp["cantMP"]*1000)-($cant*$medidaProd))/1000;
                    if ($cantT>0) {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=:cant WHERE idMP=:idMP");
                      $stmt->bindParam(":cant",$cantT,PDO::PARAM_STR);
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }else {
                      $stmt=Conexion::conectar()->prepare("UPDATE mp SET cantMP=0, estadoMP='AGOTADO' WHERE idMP=:idMP");
                      $stmt->bindParam(":idMP",$datam["idMP"],PDO::PARAM_INT);
                      $stmt->execute();
                      $stmt=null;
                    }
                  }
                  }


                  $stmt=Conexion::conectar()->prepare("UPDATE producto SET cantPRODUCTO=cantPRODUCTO+(:cant) WHERE idPRODUCTO=:idPROD");
                  $stmt->bindParam(":cant",$cant,PDO::PARAM_INT);
                  $stmt->bindParam(":idPROD",$prodId,PDO::PARAM_INT);
                  $stmt->execute();
                  $stmt=null;

                
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
        }



?>
