<?php

require_once 'ConexionBD.php';

class CategoriasModelos {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearCategoria($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla
            (Codigo, Categoria, Estado) VALUES
            (:Codigo,:Categoria,:Estado)");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Categoria", $datos["Categoria"], PDO::PARAM_STR);
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
      EDITAR Categoria
      ============================================= */

    static public function mdlEditarCategoria($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET 
            Categoria=:Categoria,Estado=:Estado 
            WHERE  Codigo=:Codigo");
       
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Categoria", $datos["Categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarCategorias($tabla, $item, $valor) {
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
      ELIMINAR Categoria
      ============================================= */

    static public function mdlEliminarCategoria($tabla, $datos) {
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
