<?php

class tools{

    public function randomCode() {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array();
                $pass[]="7"; 
                $alphaLength = strlen($alphabet) - 1; 
                for ($i = 0; $i < 12; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); 
    }
}