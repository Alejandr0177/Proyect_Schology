<?php

require_once "conexion.php";

class ModeloEstudiante{

    static  public function mdlRegistro($tabla, $datos){
        # statement(declaracion)
        #   Debe ser una plantilla de sentencia SQL válida para el servidor de base de datos destino.
        # prepare():
        #   Prepared Statement, es una característica de algunos sistemas de bases de datos que 
        #   permite ejecutar la misma sentencia SQL ( PDOStatement::execute() ). La sentencia SQL
        #   puede contener cero o mas marcadores de parametros con nombre (:name) o signos de
        #   interrogacion (?) por los cuales los valores reales seran sustituidos cuando la sentencia
        #   sea ejecutada. Provocando una mejora en la seguridad y en el rendimiento de la aplicación

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(est_id, est_nombre, est_ap_pat, est_ap_mat, est_car_id, est_email, est_password) VALUES (:nua, :nombre, :appat, :apmat, :carrera, :email, :password)");
        # (:nombre, :email, :password) => Parametros Ocultos

        # bindParam():
        #   Vincula una variable de PHP a un parámetro de sustitucion con nombre o de signo
        #   interrogacion correspondiente de la sentencia SQL qur fue usada para preparar
        #   la sentencia
        #   - Parametros:
        #       parameter:
        #       El identificador del parámetro. Para sentencias preparadas que usen parámetros
        #       de sustición con nombre, esto será un nombre de parámetro con la forma :nombre.
        #       variable:
        #       Nombre de la variable de PHP a vincular al parámetro de la sentencia SQL.
        #       data_type:
        #       El tipo de datos explícito para el parámetro, usando las constantes PDO::PARAM_*.

        # Desocultamos los parametros ocultos
        $stmt -> bindParam(":nua", $datos["nua"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":appat", $datos["appat"], PDO::PARAM_STR);
        $stmt -> bindParam(":apmat", $datos["apmat"], PDO::PARAM_STR);
        $stmt -> bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

        #$stmt = PDOStatement Object ( [queryString] => INSERT INTO registros(name, email, password) VALUES (:nombre, :email, :password) )

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo);

        }

        # Para que la conexion no quede abierta usamos close() para poder cerrar
        # cualquier conexion que existe, para no tenerla abierta al momento de que
        # nos arroje un error
        $stmt -> close();

        # al vaciar el objeto, es una forma de reforzar la seguridad de tu sistema
        $stmt = null;

    }

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY est_ap_pat ASC");

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

    static  public function mdlActualizarEstudiante($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla 
            SET est_nombre = :nombre, est_ap_pat = :appat, est_ap_mat = :apmat, est_car_id = :carrera, est_email = :email, est_password = :password WHERE est_id = :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":appat", $datos["appat"], PDO::PARAM_STR);
        $stmt -> bindParam(":apmat", $datos["apmat"], PDO::PARAM_STR);
        $stmt -> bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
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