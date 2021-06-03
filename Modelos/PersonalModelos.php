<?php

require_once 'ConexionBD.php';

class PersonalModelos {
    /* =============================================
      CREAR PERSONAL
      ============================================= */

    static public function mdlCrearPersonal($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla ( idPersonal,Nombres,Apellidos,Dni,Fecha_Nacimiento,Direccion,Correo,Telefono,Celular,Foto,Estado) VALUES (:idPersonal,:Nombres,:Apellidos,:Dni,:Fecha_Nacimiento,:Direccion,:Correo,:Telefono,:Celular,:Foto,:Estado)");

        $stmt->bindParam(":idPersonal", $datos["idPersonal"], PDO::PARAM_INT);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Apellidos", $datos["Apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":Dni", $datos["Dni"], PDO::PARAM_INT);
        $stmt->bindParam(":Fecha_Nacimiento", $datos["Fecha_Nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
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
      EDITAR PERSONAL
      ============================================= */

    static public function mdlEditarPersonal($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET Nombres=:Nombres,Apellidos=:Apellidos,Dni=:Dni,Fecha_Nacimiento=:Fecha_Nacimiento,Direccion=:Direccion,Correo=:Correo,Telefono=:Telefono,Celular=:Celular,Foto=:Foto,Estado=:Estado WHERE idPersonal=:idPersonal");

        $stmt->bindParam(":idPersonal", $datos["idPersonal"], PDO::PARAM_STR);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Apellidos", $datos["Apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":Dni", $datos["Dni"], PDO::PARAM_INT);
        $stmt->bindParam(":Fecha_Nacimiento", $datos["Fecha_Nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarPersonal($tabla, $item, $valor) {
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
    
    
    
    static function mdlMostrarPersonalSinUsuario($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT P.idPersonal,P.Nombres,P.Apellidos FROM 
                                                      usuario as u RIGHT JOIN $tabla AS P 
                                                      ON P.idPersonal=U.idUsuario 
                                                      WHERE U.idUsuario IS NULL");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    
    
    
    
    /* =============================================
      ELIMINAR PERSONAL
      ============================================= */

    static public function mdlEliminarPersonal($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE idPersonal = :idPersonal");
        $stmt->bindParam(":idPersonal", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
