<?php

class ControladorBarrios
{
	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Barrios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    //Seleccionar barrios

    static public function ctrSeleccionarBarrios($item , $value){
        $tabla = "barrio";
        $respuesta = ModeloBarrios::mdlSeleccionarBarrios($tabla , $item , $value);
        return $respuesta;
    }
}
