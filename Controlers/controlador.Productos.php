<?php

    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Productos////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 

class ControladorProductos
{
    static public function ctrSeleccionarProductos(){
    	$tabla = "producto";
    	$respuesta = ModeloProductos::mdlSeleccionarProductos($tabla);
    	return $respuesta;
    }
    static public function ctrSeleccionarValorU(){
        $tabla = "producto";
        $respuesta = ModeloProductos::mdlSeleccionarValorU($tabla);
        return $respuesta;
    }
}