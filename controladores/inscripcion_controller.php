<?php

class ControladorInscripcion{

    static public function ctrRegistro(){

        if(isset($_POST["registroIdstudent"])){

            $tabla = "inscripcion";

            $datos = array( "est_id" => $_POST["registroIdstudent"],
                            "cur_id" => $_POST["registroIdcourse"]);

            $respuesta = ModeloInscripcion::mdlRegistro($tabla, $datos);

            return $respuesta;

        }
    }

}