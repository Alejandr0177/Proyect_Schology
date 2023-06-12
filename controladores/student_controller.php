<?php

class ControladorEstudiante{

    static public function ctrRegistro(){

        if(isset($_POST["registroNombre"])){

            $tabla = "estudiante";

            $datos = array( "nombre" => $_POST["registroNombre"],
                            "appat" => $_POST["registroAppat"],
                            "apmat" => $_POST["registroApmat"],
                            "carrera" => $_POST["registroCarrera"],
                            "nua" => $_POST["registroNua"],
                            "email" => $_POST["registroEmail"],
                            "password" => $_POST["registroPassword"]);

            $respuesta = ModeloEstudiante::mdlRegistro($tabla, $datos);

            return $respuesta;

        }
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        
        $tabla = "estudiante";

        $respuesta = ModeloEstudiante::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarStudent_id(){
        
        $tabla = "estudiante";
        $item = "est_email";
        $valor = $_SESSION["student_email"];

        $respuesta = ModeloEstudiante::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    public function ctrIngreso(){

        if(isset($_POST["ingresoEmail"])){

            $tabla = "estudiante";
            $item = "est_email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloEstudiante::mdlSeleccionarRegistros($tabla, $item, $valor);
            $resp = ($respuesta);

            # Correo electronico incorrecto
            if($resp == false){

                

                echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
      
                echo '
                        <div>
                            <div class="badge bg-danger text-wrap" >
                                el correo: "'.$_POST["ingresoEmail"].'" no esta regitrado
                            </div>
                        </div>';
                return;

            }
            # Contraseña incorrecta
            else if($respuesta["est_password"] != $_POST["ingresoPassword"]){

                

                echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
      
                echo '
                        <div>
                            <div class="badge bg-danger text-wrap" >
                                Contraseña Incorrecta
                            </div>
                        </div>';

            }
            # Acceso 
            else if($respuesta["est_email"] == $_POST["ingresoEmail"] && $respuesta["est_password"] == $_POST["ingresoPassword"]){

                $_SESSION["validarIngreso"] = "ok";
                //echo $_SESSION["validarIngreso"];
                $_SESSION["student_email"] = $_POST["ingresoEmail"];

                echo '  <script> 
                            if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}
                            window.location = "index.php?studentView=student_view";studentView
                        </script>';

            }else{

                
                
                echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
      
                //echo '<div class="alert alert-danger"> Error al ingresar al sistema, email y contraseña invalidos </div>';
                echo '
                        <div>
                            <div class="badge bg-danger text-wrap" >
                                Error al ingresar al sistema, email o contraseña invalidos
                            </div>
                        </div>';

            }
        }

    }

    static public function ctrActualizarEstudiante(){

        if(isset($_POST["actualizarNombre"])){

            if($_POST["actualizarPassword"] != ""){
                
                $password = $_POST["actualizarPassword"];

            }else{
                $password = $_POST["passwordActual"];
            }

            $tabla = "estudiante";

            $datos = array( "id" => $_POST["estudianteId"],
                            "nombre" => $_POST["actualizarNombre"],
                            "appat" => $_POST["actualizarAppat"],
                            "apmat" => $_POST["actualizarApmat"],
                            "carrera" => $_POST["actualizarCarrera"],
                            "email" => $_POST["actualizarEmail"],
                            "password" => $password);

            $respuesta = ModeloEstudiante::mdlActualizarEstudiante($tabla, $datos);

            return $respuesta;

        }

    }

}