<?php

require_once 'ConexionBD.php';

class ProveedoresModelos {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearProveedor($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla 
            (Codigo, RazonSocial, Ruc, Direccion, Telefono, Celular,Correo) 
            VALUES (:Codigo,:RazonSocial,:Ruc,:Direccion,:Telefono,:Celular,:Correo)");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":RazonSocial", $datos["RazonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":Ruc", $datos["Ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR CONTACTO
      ============================================= */

    static public function mdlEditarProveedor($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla 
            SET RazonSocial=:RazonSocial,Ruc=:Ruc,
            Celular=:Celular,Telefono=:Telefono,Direccion=:Direccion,
            Correo=:Correo WHERE Codigo=:Codigo");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":RazonSocial", $datos["RazonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":Ruc", $datos["Ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarProveedores($tabla, $item, $valor) {
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
      ELIMINAR CONTACTO
      ============================================= */

    static public function mdlEliminarProveedor($tabla, $datos) {
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
