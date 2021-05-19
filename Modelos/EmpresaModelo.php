<?php

require_once 'ConexionBD.php';

class EmpresaModelo {

    static function mdlMostrarRegistros($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR EMPRESA
      ============================================= */

    static public function mdlEditarEmpresa($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET RazonSocial=:RazonSocial,Ruc=:Ruc,Direccion=:Direccion,Telefono=:Telefono,Celular=:Celular,Correo=:Correo,idMoneda=:idMoneda,IGV=:IGV,Logo=:Logo,LogoCorto=:LogoCorto,LogoLogin=:LogoLogin WHERE  idEmpresa=:idEmpresa");

        $stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_INT);
        $stmt->bindParam(":RazonSocial", $datos["RazonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":Ruc", $datos["Ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":idMoneda", $datos["idMoneda"], PDO::PARAM_STR);
        $stmt->bindParam(":IGV", $datos["IGV"], PDO::PARAM_INT);
        $stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Celular", $datos["Celular"], PDO::PARAM_STR);
        $stmt->bindParam(":Logo", $datos["Logo"], PDO::PARAM_STR);
        $stmt->bindParam(":LogoCorto", $datos["LogoCorto"], PDO::PARAM_STR);
        $stmt->bindParam(":LogoLogin", $datos["LogoLogin"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
