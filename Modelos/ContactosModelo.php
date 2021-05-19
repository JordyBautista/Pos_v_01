<?php

require_once 'ConexionBD.php';

class ContactosModelos {
    /* =============================================
      INSERTAR CONTACTO
      ============================================= */

    static public function mdlCrearContacto($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare(" INSERT INTO $tabla
            (Codigo, Nombres, Apellidos, DNI, Celular, Telefono, Direccion, Correo, Empresa)
            VALUES(:Codigo,:Nombres,:Apellidos,:DNI,:Celular,:Telefono,:Direccion,:Correo,:Empresa)");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Apellidos", $datos["Apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $datos["DNI"], PDO::PARAM_INT);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":Empresa", $datos["Empresa"], PDO::PARAM_STR);
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

    static public function mdlEditarContacto($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla 
            SET Nombres=:Nombres,Apellidos=:Apellidos,DNI=:DNI,
            Celular=:Celular,Telefono=:Telefono,Direccion=:Direccion,
            Correo=:Correo,Empresa=:Empresa WHERE Codigo=:Codigo");

        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Apellidos", $datos["Apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $datos["DNI"], PDO::PARAM_INT);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":Empresa", $datos["Empresa"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarContactos($tabla, $item, $valor) {
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

    static public function mdlEliminarContacto($tabla, $datos) {
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
