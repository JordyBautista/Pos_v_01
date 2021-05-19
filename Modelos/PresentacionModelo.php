<?php

require_once 'ConexionBD.php';

class PresentacionModelos {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearPresentacion($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla
            (Codigo, Presentacion, Descripcion, Estado) VALUES
            (:Codigo,:Presentacion,:Descripcion,:Estado)");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Presentacion", $datos["Presentacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
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
      EDITAR Presentacion
      ============================================= */

    static public function mdlEditarPresentacion($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET 
            Presentacion=:Presentacion,Descripcion=:Descripcion,Estado=:Estado 
            WHERE  Codigo=:Codigo");
       
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Presentacion", $datos["Presentacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarPresentacion($tabla, $item, $valor) {
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
      ELIMINAR Presentacion
      ============================================= */

    static public function mdlEliminarPresentacion($tabla, $datos) {
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
