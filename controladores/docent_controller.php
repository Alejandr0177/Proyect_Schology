<?php

class ControladorDocente{

    static public function ctrRegistro(){

        if(isset($_POST["registroNombre"])){

            $tabla = "docente";

            $datos = array( "nombre" => $_POST["registroNombre"],
                            "appat" => $_POST["registroAppat"],
                            "apmat" => $_POST["registroApmat"],
                            "titulo" => $_POST["registroTitulo"],
                            "email" => $_POST["registroEmail"],
                            "password" => $_POST["registroPassword"]);

            $respuesta = ModeloDocente::mdlRegistro($tabla, $datos);

            return $respuesta;

        }
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        
        $tabla = "docente";

        $respuesta = ModeloDocente::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrSeleccionarDocente_id(){
        
        $tabla = "docente";
        $item = "doc_email";
        $valor = $_SESSION["docent_email"];

        $respuesta = ModeloDocente::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    public function ctrIngreso(){

        if(isset($_POST["ingresoEmail"])){

            $tabla = "docente";
            $item = "doc_email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloDocente::mdlSeleccionarRegistros($tabla, $item, $valor);
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
            else if($respuesta["doc_password"] != $_POST["ingresoPassword"]){

                

                echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
      
                echo '
                        <div>
                            <div class="badge bg-danger text-wrap" >
                                Contraseña Incorrecta
                            </div>
                        </div>';

            }
            # Acceso 
            else if($respuesta["doc_email"] == $_POST["ingresoEmail"] && $respuesta["doc_password"] == $_POST["ingresoPassword"]){

                $_SESSION["validarIngreso"] = "ok";
                $_SESSION["docent_email"] = $_POST["ingresoEmail"];

                echo '  <script> 
                            if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}
                            window.location = "index.php?docentView=docent_view";
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

    static public function ctrActualizarDocente(){

        if(isset($_POST["actualizarNombre"])){

            if($_POST["actualizarPassword"] != ""){
                
                $password = $_POST["actualizarPassword"];

            }else{
                $password = $_POST["passwordActual"];
            }

            $tabla = "docente";

            $datos = array( "id" => $_POST["docenteId"],
                            "nombre" => $_POST["actualizarNombre"],
                            "appat" => $_POST["actualizarAppat"],
                            "apmat" => $_POST["actualizarApmat"],
                            "titulo" => $_POST["actualizarTitulo"],
                            "email" => $_POST["actualizarEmail"],
                            "password" => $password);

            $respuesta = ModeloDocente::mdlActualizarDocente($tabla, $datos);

            return $respuesta;

        }

    }


}