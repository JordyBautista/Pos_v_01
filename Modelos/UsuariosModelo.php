
<?php

require_once'ConexionBD.php';

class UsuariosModelo {
    

    static public function mdlCrearUsuario($tabla, $datos) {
        $estado = 1;
        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla(idPerfil,Usuario,Contrasena, Estado, FechaRegistro) VALUES(:idPerfil,:Usuario,:pw, :estado, now())");

        $stmt->bindParam(":idPerfil", $datos["idPerfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":pw", $datos["Password"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /* =============================================
      EDITAR USUARIOS
      ============================================= */

    static public function mdlEditarUsuario($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET idPerfil=:idPerfil,Usuario=:Usuario,Estado=:Estado WHERE idUsuario=:idUsuario");

        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":idPerfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":Usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);

        return $stmt->execute();
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
