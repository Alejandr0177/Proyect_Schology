<?php

require_once "conexion.php";

class ModeloCurso{

    static  public function mdlRegistro($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(cur_mat_id, cur_doc_id, cur_dias_clase, cur_horas_clase) VALUES (:matclave, :curiddoc, :schooldays, :classhours)");

        $stmt -> bindParam(":matclave", $datos["matclave"], PDO::PARAM_STR);
        $stmt -> bindParam(":curiddoc", $datos["curiddoc"], PDO::PARAM_STR);
        $stmt -> bindParam(":schooldays", $datos["schooldays"], PDO::PARAM_STR);
        $stmt -> bindParam(":classhours", $datos["classhours"], PDO::PARAM_STR);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            // $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
            // $stmt->execute();
            // return $stmt -> fetchAll();
            $stmt = Conexion::conectar() -> prepare(
                "SELECT curso.cur_id, materia.mat_nombre,
                    CONCAT(docente.doc_nombre, ' ', docente.doc_ap_pat, ' ', docente.doc_ap_mat) AS nombre_docente,
                    curso.cur_dias_clase, curso.cur_horas_clase
                    FROM $tabla
                    INNER JOIN curso
                        ON materia.mat_clave = curso.cur_mat_id
                    INNER JOIN docente
                        ON curso.cur_doc_id = doc_id
                    ORDER BY materia.mat_nombre ASC;
            ");
    
            //$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetchAll();

        }else{
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            # fetchAll() -> devuelve todos los registros de la base de datos
            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlSeleccionarCursosDocente($item, $valor){

        //$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE cur_doc_id = :$item");

        $stmt = Conexion::conectar() -> prepare(
            "SELECT curso.cur_id, materia.mat_nombre, curso.cur_dias_clase, curso.cur_horas_clase
	            FROM materia
                INNER JOIN curso
		            ON materia.mat_clave = curso.cur_mat_id
	            INNER JOIN docente
		            ON curso.cur_doc_id = doc_id
	            WHERE docente.$item = :$item;
        ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        # fetchAll() -> devuelve todos los registros de la base de datos
        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlSeleccionarCursosEstudiante($item, $valor){

        //$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE cur_doc_id = :$item");

        $stmt = Conexion::conectar() -> prepare(
            "SELECT curso.cur_id, materia.mat_nombre,
                CONCAT(docente.doc_nombre, ' ', docente.doc_ap_pat, ' ', docente.doc_ap_mat) AS nombre_docente,
                curso.cur_dias_clase, curso.cur_horas_clase

            FROM materia
            INNER JOIN curso
                    ON materia.mat_clave = curso.cur_mat_id
            INNER JOIN docente
		            ON curso.cur_doc_id = doc_id
            INNER JOIN inscripcion
                ON curso.cur_id = ins_cur_id
            INNER JOIN estudiante
                ON inscripcion.ins_est_id = est_id
            WHERE inscripcion.$item = :$item;
        ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        # fetchAll() -> devuelve todos los registros de la base de datos
        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlSeleccionarAlumnosDocente($item, $valor){

        //$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE cur_doc_id = :$item");

        $stmt = Conexion::conectar() -> prepare(
            "SELECT materia.mat_nombre, estudiante.est_id, CONCAT(estudiante.est_nombre, ' ', estudiante.est_ap_pat, ' ', estudiante.est_ap_mat) AS nombre_estudiante,
                carrera.car_nombre_completo

                FROM carrera # tabla derecha
                INNER JOIN estudiante # tabla izquierda
                    ON carrera.car_iniciales = est_car_id
                INNER JOIN inscripcion
                    ON estudiante.est_id = ins_est_id
                INNER JOIN curso
                    ON inscripcion.ins_cur_id = cur_id
                INNER JOIN materia
                    ON curso.cur_mat_id = mat_clave
                WHERE inscripcion.$item = :$item;
        ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        # fetchAll() -> devuelve todos los registros de la base de datos
        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
}