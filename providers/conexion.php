<?php

class Conexion extends PDO{
    static public function conectar(){

        try {
            $link = new PDO('mysql:host=localhost;dbname=proyecto;charset=UTF8','root','');
            return $link;
        } catch (PDOException $e) {
            echo 'Se ha producido una excepción: '.$e->getMessage();
        die();
       }
    }

}