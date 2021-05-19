
<?php

require_once'ConexionBD.php';

class UsuariosModelo {
    

    static public function mdlCrearUsuario($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla
                            (idUsuario,idPerfil,Usuario,Password)VALUES
                            (:idUsuario,:idPerfil,:Usuario,:Password);");

        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":idPerfil", $datos["idPerfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR USUARIOS
      ============================================= */

    static public function mdlEditarUsuario($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET idPerfil=:idPerfil,Usuario=:Usuario,Password=:Password,Estado=:Estado WHERE idUsuario=:idUsuario");

        $stmt->bindParam(":idUsuario", $datos[" idUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":idPerfil", $datos[" idPerfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Usuario", $datos[" Usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $datos[" Password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      ELIMINAR USUARIO
      ============================================= */

    static public function mdlEliminarUsuario($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $datos, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    
    
    
    
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */

    static public function mdlMostrarUsuarios($tabla, $item, $valor){

        if($item != null){

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        }else{

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();

        }
        

        $stmt -> close();
        $stmt = null;

    }



    
}
