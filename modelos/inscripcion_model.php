<?php

require_once "conexion.php";

class ModeloInscripcion{

    static public function mdlRegistro($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(ins_est_id, ins_cur_id) VALUES (:est_id, :cur_id)");

        $stmt -> bindParam(":est_id", $datos["est_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":cur_id", $datos["cur_id"], PDO::PARAM_INT);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }

        $stmt -> close();

        $stmt = null;

    }

}