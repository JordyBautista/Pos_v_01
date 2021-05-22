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
