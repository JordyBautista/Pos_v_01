<?php

require_once 'ConexionBD.php';

class PerfilModelo {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearPerfil($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla
            (idPerfil, Perfil, Descripcion) VALUES
            (:idPerfil,:Perfil,:Descripcion)");

        $stmt->bindParam(":idPerfil", $datos["idPerfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        

 
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR Perfil
      ============================================= */

    static public function mdlEditarPerfil($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET 
            Perfil=:Perfil,Descripcion=:Descripcion
            WHERE  idPerfil=:idPerfil");
       
        $stmt->bindParam(":idPerfil", $datos["idPerfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarPerfil($tabla, $item, $valor, $orden) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idPerfil DESC");
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
      ELIMINAR Perfil
      ============================================= */

    static public function mdlEliminarPerfil($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE idPerfil = :idPerfil ORDER BY idPerfil DESC");
        $stmt->bindParam(":idPerfil", $datos, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
