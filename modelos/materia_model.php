<?php

require_once "conexion.php";

class ModeloMateria{

    static  public function mdlRegistro($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(mat_clave, mat_nombre) VALUES (:matclave, :matname)");

        $stmt -> bindParam(":matclave", $datos["matclave"], PDO::PARAM_STR);
        $stmt -> bindParam(":matname", $datos["matname"], PDO::PARAM_STR);

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

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY mat_nombre ASC");

            $stmt->execute();
            # fetchAll() -> devuelve todos los registros de la base de datos
            return $stmt -> fetchAll();

        }else{
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            # fetchAll() -> devuelve todos los registros de la base de datos
            return $stmt -> fetch();
        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlSeleccionarMateria($tabla, $item, $valor){

        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        # fetchAll() -> devuelve todos los registros de la base de datos

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }

        $stmt -> close();

        $stmt = null;

    }

}