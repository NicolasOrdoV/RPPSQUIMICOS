<?php

require 'config.php';


class Conexion extends PDO{
    static public function conectar(){

        try {
            $link = new PDO(DRIVER.':host='.HOST.';dbname='.DBNAME.';charset='.CHARSET , USER , PASSWORD);
            return $link;
        } catch (PDOException $e) {
            echo 'Se ha producido una excepción: '.$e->getMessage();
        die();
       }
    }

}