<?php

    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Productos////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 

class ControladorProductos
{
    static public function ctrSeleccionarProductos(){
    	$tabla = "productos";
    	$respuesta = ModeloProductos::mdlSeleccionarProductos($tabla);
    	return $respuesta;
    }
}