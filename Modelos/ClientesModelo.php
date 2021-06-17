<?php

require_once 'ConexionBD.php';

class ClientesModelo {
    /* =============================================
      INSERTAR Cliente
      ============================================= */

    static public function mdlCrearCliente($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare(" INSERT INTO $tabla(idCliente, Nombres, Dni, Correo, Telefono, Celular, Direccion, FechaNacimiento) VALUES(:idCliente,:Nombres,:Dni,:Correo,:Telefono,:Celular,:Direccion,:FechaNacimiento)");

        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Dni", $datos["Dni"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaNacimiento", $datos["FechaNacimiento"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error"; 
            
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR Cliente
      ============================================= */

    static public function mdlEditarCliente($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla 
            SET Nombres=:Nombres,Dni=:Dni,Correo=:Correo,Telefono=:Telefono,Celular=:Celular,Direccion=:Direccion,FechaNacimiento=:FechaNacimiento WHERE idCliente=:idCliente");

        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":Dni", $datos["Dni"], PDO::PARAM_INT);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaNacimiento", $datos["FechaNacimiento"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarClientes($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idCliente DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla ORDER BY idCliente DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlModificarUltimaVenta($datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE clientes SET UltimaCompra = now(), Compras = :Compras  WHERE idCliente = :idCliente");
        $stmt->bindParam(":Compras", $datos['Compras'], PDO::PARAM_INT);
        $stmt->bindParam(":idCliente", $datos['idCliente'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      ELIMINAR Cliente
      ============================================= */

    static public function mdlEliminarCliente($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE idCliente = :idCliente");
        $stmt->bindParam(":idCliente", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
