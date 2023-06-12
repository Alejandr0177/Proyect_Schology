<?php

require_once "conexion.php";

class ModeloCarrera{

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");

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

}