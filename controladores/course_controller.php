<?php

class ControladorCurso{

    static public function ctrRegistro(){

        if(isset($_POST["registroMatclave"])){

            $tabla = "curso";

            $datos = array( "matclave" => $_POST["registroMatclave"],
                            "curiddoc" => $_POST["registroCuriddoc"],
                            "schooldays" => $_POST["registroSchooldays"],
                            "classhours" => $_POST["registroClasshours"],);

            $respuesta = ModeloCurso::mdlRegistro($tabla, $datos);

            return $respuesta;

        }
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        
        $tabla = "materia";

        $respuesta = ModeloCurso::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarCursosDocente(){
        
        //$tabla = "curso";
        $item = "doc_id";
        $valor = $_SESSION["docent_id"];

        $respuesta = ModeloCurso::mdlSeleccionarCursosDocente($item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarAlumnosDocente($item, $valor){

        $respuesta = ModeloCurso::mdlSeleccionarAlumnosDocente($item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarCursosEstudiante(){
        
        //$tabla = "curso";
        $item = "ins_est_id";
        $valor = $_SESSION["student_id"];

        $respuesta = ModeloCurso::mdlSeleccionarCursosEstudiante($item, $valor);

        return $respuesta;

    }

}