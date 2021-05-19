<?php

require_once 'ConexionBD.php';

class MarcasModelos {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearMarca($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla
            (Codigo, Marca, Marca_Corto, Estado) VALUES
            (:Codigo,:Marca,:Marca_Corto,:Estado)");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Marca", $datos["Marca"], PDO::PARAM_STR);
        $stmt->bindParam(":Marca_Corto", $datos["Marca_Corto"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR Marca
      ============================================= */

    static public function mdlEditarMarca($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET 
            Marca=:Marca,Marca_Corto=:Marca_Corto,Estado=:Estado 
            WHERE  Codigo=:Codigo");
       
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Marca", $datos["Marca"], PDO::PARAM_STR);
        $stmt->bindParam(":Marca_Corto", $datos["Marca_Corto"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarMarcas($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      ELIMINAR Marca
      ============================================= */

    static public function mdlEliminarMarca($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE Codigo = :Codigo");
        $stmt->bindParam(":Codigo", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
