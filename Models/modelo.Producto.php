<?php
    require_once "providers/conexion.php";

    class ModeloProducto{

        static public function nuevoProducto($datos){
            try{
                $stmt=Conexion::conectar()->prepare("INSERT INTO producto(imgPRODUCTO,nombrePRODUCTO,descripcionPRODUCTO,medidaPRODUCTO, cantPRODUCTO,valoruPRODUCTO,estadoPRODUCTO) VALUES (:imgPRODUCTO,:nombrePRODUCTO,:descripcionPRODUCTO,:medidaPRODUCTO,0,:valoruPRODUCTO,'AGOTADO')");

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
        }



?>