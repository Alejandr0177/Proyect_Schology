<?php

class ControladorCarrera{

    static public function ctrSeleccionarRegistros($item, $valor){
        
        $tabla = "carrera";

        $respuesta = ModeloCarrera::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }


}