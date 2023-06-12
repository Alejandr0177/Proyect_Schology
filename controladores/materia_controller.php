<?php

class ControladorMateria{

    static public function ctrRegistro(){

        if(isset($_POST["registroMatclave"])){

            $tabla = "materia";

            $datos = array( "matclave" => $_POST["registroMatclave"],
                            "matname" => $_POST["registroMatname"]);

            $respuesta = ModeloMateria::mdlRegistro($tabla, $datos);

            return $respuesta;

        }
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        
        $tabla = "materia";

        $respuesta = ModeloMateria::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarMatclave(){
        
        $tabla = "materia";
        $item = "mat_clave";
        $valor = $_SESSION["mat_clave"];

        $respuesta = ModeloMateria::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarMateria(){
        
        if(isset($_POST["registroMatclave"])){

            $tabla = "materia";
            $item = "mat_clave";
            $valor = $_SESSION["mat_clave"];

            $respuesta = ModeloMateria::mdlSeleccionarMateria($tabla, $item, $valor);

            return $respuesta;

        }

    }

}