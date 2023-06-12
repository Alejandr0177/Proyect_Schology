<?php

require_once "controladores/P_controlador.php";
require_once "controladores/student_controller.php";
require_once "controladores/docent_controller.php";
require_once "controladores/materia_controller.php";
require_once "controladores/course_controller.php";
require_once "controladores/carrera_controller.php";
require_once "controladores/inscripcion_controller.php";

require_once "modelos/inscripcion_model.php";
require_once "modelos/carrera_model.php";
require_once "modelos/course_model.php";
require_once "modelos/materia_model.php";
require_once "modelos/docent_model.php";
require_once "modelos/student_model.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();