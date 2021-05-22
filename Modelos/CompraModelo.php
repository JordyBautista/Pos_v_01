<?php

require_once 'ConexionBD.php';

class ComprasModelo {
    /* =============================================
      CREAR Productos
      ============================================= */
    public function __construct()
    {
    }
    static public function mdlGetCode(){

    $stmt = ConexionBD::Conecction()->prepare("SELECT codigoCompra FROM compras order by idCompra  desc limit 1");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static function mdlMostrarCompras($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla where estado = :estado ORDER BY idCompra DESC");
            $stmt->bindParam(":estado", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static function mdlMostrarCompraDetalle($tabla, $item, $valor) {
        $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :id ORDER BY idCompra DESC");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlActualizar_estado($estado, $id){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE compras SET  estado=:estado  WHERE idCompra=:id");

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
      }

    static public function mdlCrearCompra($tabla, $datos, $codigo) {
        $sql = ConexionBD::Conecction();
        $stmt = $sql->prepare("INSERT INTO ".$tabla."(codigoCompra, codProveedor,estado, subTotal, igv, dscto,total,idUsuario, fechaRegistro) VALUES (:codigoCompra,:codProveedor,:estado,:subTotal,:igv,:dscto,:total,:idUsuario,now())");
        $detault = '1';
        //$date = date('Y-m-d H:i:s');
        $idUsuario = $datos["idUsuario"];
        $stmt->bindParam(":codigoCompra", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":codProveedor", $datos["idProveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $detault, PDO::PARAM_STR);
        $stmt->bindParam(":subTotal", $datos["subtotal"], PDO::PARAM_STR);
        $stmt->bindParam(":igv", $datos["igv"], PDO::PARAM_STR);
        $stmt->bindParam(":dscto", $datos["dscto"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["totalfinal"], PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
        //$stmt->bindParam(":fechaRegistro", $date , PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $id = $sql->lastInsertId();
            return $id;
        }else{
            return 0;
        }
        
    }

    static public function mdlCrearCompraDetalle($tabla, $datos, $id) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO ".$tabla."(idCompra, idProducto, cantidad, importe) VALUES (:idCompra,:idProducto,:cantidad,:importe)");
        $stmt->bindParam(":idCompra", $id, PDO::PARAM_INT);
        $stmt->bindParam(":idProducto", $datos->idProducto, PDO::PARAM_STR_CHAR);
        $stmt->bindParam(":cantidad", $datos->cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":importe", $datos->total, PDO::PARAM_STR);
        return $stmt->execute();
    }

}
