<?php

require_once "connectionDB.php";

class ModeloFormularios
{
    static public function mdlRegistrar($tabla, $datos)
    {

        print_r($tabla);
        print_r($datos["name"]);
        print_r($datos["email"]);
        print_r($datos["password"]);

        $stmt = ConnectionDB::getConnection()->prepare(
            "INSERT INTO $tabla ( name, email, password) VALUES (:name, :email, :password)"
        );

        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(ConnectionDB::getConnection()->errorInfo());
        }
        #$stmt.close();
        $stmt = null;
    }

    static public function mdlListar($tabla)
    {
        $stmt = ConnectionDB::getConnection()->prepare("SELECT * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdConsultarUsuario($tabla, $campo, $valor)
    {
        $stmt = ConnectionDB::getConnection()->prepare("SELECT * from $tabla WHERE $campo = :$campo");
        $stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            print_r(ConnectionDB::getConnection()->errorInfo());
        }
        #$stmt.close();
        $stmt = null;
    }

    static public function mdElminarUsuario($tabla, $campo, $valor)
    {
        $stmt = ConnectionDB::getConnection()->prepare("DELETE FROM $tabla WHERE $campo = :$campo");
        $stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(ConnectionDB::getConnection()->errorInfo());
        }
        #$stmt.close();
        $stmt = null;
    }

    static public function mdlActualizar($tabla, $datos)
    {
        $stmt = ConnectionDB::getConnection()->prepare("UPDATE $tabla SET name=:name,email=:email,password=:password WHERE id=:id");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(ConnectionDB::getConnection()->errorInfo());
        }
        #$stmt.close();
        $stmt = null;
    }
}
