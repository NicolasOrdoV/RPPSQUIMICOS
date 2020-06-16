<?php
    require_once "providers/conexion.php";

    class ModeloMp{

        static public function nuevaMp($datos){
            try{
                $stmt=Conexion::conectar()->prepare("INSERT INTO mp (identificacionMP,nombreMP,tipoMP,cantMP,estadoMP) VALUES (:identificacionMP,:nombreMP,:tipoMP,0,'AGOTADO')");

                $stmt->bindParam(":identificacionMP",$datos["identMP"],PDO::PARAM_STR);
                $stmt->bindParam(":nombreMP",$datos["nombreMP"],PDO::PARAM_STR);
                $stmt->bindParam(":tipoMP",$datos["tipoMP"],PDO::PARAM_STR);

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
            static public function consultarMP($item,$valor){

                try {
                    if ($item == null  && $valor == null) {
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM mp");
                    $stmt->execute();
                    return $stmt -> fetchAll();
                    }else{
                        $stmt = Conexion::conectar()->prepare("SELECT * FROM mp WHERE $item = :$item");
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
            static public function actualizarMP($datos){
                try{
                    $stmt=Conexion::conectar()->prepare("UPDATE mp SET identificacionMP=:identificacionMP,nombreMP=:nombreMP,tipoMP=:tipoMP WHERE idMP=:idMP");
                    $stmt->bindParam(":identificacionMP",$datos["identMP"],PDO::PARAM_STR);
                $stmt->bindParam(":nombreMP",$datos["nombreMP"],PDO::PARAM_STR);
                $stmt->bindParam(":tipoMP",$datos["tipoMP"],PDO::PARAM_STR);
                $stmt->bindParam(":idMP",$datos["idMP"],PDO::PARAM_INT);

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

            static public function eliminarMP($valor){

                try {
                    $stmt = Conexion::conectar()->prepare("DELETE FROM mp WHERE idMP = :idMP");
        
                    $stmt->bindParam(":idMP",$valor,PDO::PARAM_INT);
        
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
