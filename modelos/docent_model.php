<?php

require_once "conexion.php";

class ModeloDocente{

    static  public function mdlRegistro($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(doc_nombre, doc_ap_pat, doc_ap_mat, doc_titulo_acad, doc_email, doc_password) VALUES (:nombre, :appat, :apmat, :titulo, :email, :password)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":appat", $datos["appat"], PDO::PARAM_STR);
        $stmt -> bindParam(":apmat", $datos["apmat"], PDO::PARAM_STR);
        $stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }

        $stmt->close();

        $stmt = null;

    }

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY doc_ap_pat ASC");

            $stmt->execute();
            # fetchAll() -> devuelve todos los registros de la base de datos
            return $stmt -> fetchAll();

        }else{
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            # fetchAll() -> devuelve todos los registros de la base de datos
            return $stmt -> fetch();

            $stmt -> close();

            $stmt = null;
        }

        

    }

    static  public function mdlActualizarDocente($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla 
            SET doc_nombre = :nombre, doc_ap_pat = :appat, doc_ap_mat = :apmat, doc_titulo_acad = :titulo, doc_email = :email, doc_password = :password WHERE doc_id = :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":appat", $datos["appat"], PDO::PARAM_STR);
        $stmt -> bindParam(":apmat", $datos["apmat"], PDO::PARAM_STR);
        $stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

        #$stmt = PDOStatement Object ( [queryString] => INSERT INTO registros(name, email, password) VALUES (:nombre, :email, :password) )

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }
        $stmt -> close();

        $stmt = null;

    }

}