<?php

require_once 'ConexionBD.php';

class VentasModelo {
    /* =============================================
      CREAR Productos
      ============================================= */
      public function __construct()
      {
      }
      static public function mdlGetCode(){

        $stmt = ConexionBD::Conecction()->prepare("SELECT Codigo FROM ventas order by idVenta  desc limit 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      static public function mdlVentas($idCliente){

        $stmt = ConexionBD::Conecction()->prepare("SELECT count(idVenta) as cantidad FROM ventas where idCliente = :idCliente");
        $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
      }

    static public function mdlCrearVenta($tabla, $datos, $estado) {
        $sql = ConexionBD::Conecction();
        $stmt = $sql->prepare("INSERT INTO ".$tabla."(Codigo, idCliente, idVendedor, Impuesto, Neto,Descuento,tipoVenta, Total, MetodoPago,Estado,efectivoRecibido) VALUES (:Codigo,:idCliente,:idVendedor,:Impuesto,:Neto,:Descuento,:tipoVenta,:Total,:MetodoPago,:Estado, :efectivoRecibido)");
        $idUsuario = $datos["idUsuario"];
        $codigo = trim($datos["codigoVenta"]);
        $efectivoRecibido = $datos["efectivoRecibido"] == '' ? '0.00' :$datos["efectivoRecibido"] ;
        $stmt->bindParam(":Codigo", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":idVendedor", $idUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":Impuesto", $datos["igv"], PDO::PARAM_STR);
        $stmt->bindParam(":Neto", $datos["subtotal"], PDO::PARAM_STR);
        $stmt->bindParam(":Descuento", $datos["dscto"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoVenta", $datos["tipoVenta"], PDO::PARAM_STR);
        $stmt->bindParam(":Total", $datos["totalfinal"], PDO::PARAM_STR);
        $stmt->bindParam(":MetodoPago", $datos["metodoPago"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $estado , PDO::PARAM_STR_CHAR);
        $stmt->bindParam(":efectivoRecibido", $efectivoRecibido , PDO::PARAM_STR_CHAR);
        
        if ($stmt->execute()) {
            $id = $sql->lastInsertId();
            return $id;
        }else{
            return 0;
        }
        
    }

    static public function mdlCrearVentaDetalle($tabla, $datos, $id) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO ".$tabla."(idVentaDV, idProductoDV, cantidad, importe) VALUES (:idVentaDV,:idProductoDV,:cantidad,:importe)");
        $stmt->bindParam(":idVentaDV", $id, PDO::PARAM_INT);
        $stmt->bindParam(":idProductoDV", $datos->idProducto, PDO::PARAM_STR_CHAR);
        $stmt->bindParam(":cantidad", $datos->cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":importe", $datos->total, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function mdlActualizar_data($data, $id){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE ventas SET  efectivoRecibido=:efectivoRecibido,Fecha=now()   WHERE idVenta=:id");

        $stmt->bindParam(":efectivoRecibido", $data['efectivoRecibido'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        return $stmt->execute();
    }
    static public function mdlActualizar_estado($estado, $id){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE ventas SET  Estado=:estado  WHERE idVenta=:id");

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    
    /* =============================================
      STOCK PRODUCTOS
      ============================================= */

    static public function mdlActualizarStockVenta($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET   Codigo=:Codigo, idCliente=:idCliente, idVendedor=:idVendedor, Impuesto=:Impuesto, Neto=:Neto, Total=:Total, MetodoPago=:MetodoPago WHERE idVenta=:idventa;");




        
        $stmt->bindParam(":idVenta", $datos["idVenta"], PDO::PARAM_STR);
       $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":idVendedor", $datos["idVendedor"], PDO::PARAM_STR);
        $stmt->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
        $stmt->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
        $stmt->bindParam(":MetodoPago", $datos["MetodoPago"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
          
     
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    

    /* =============================================
      EDITAR Productos
      ============================================= */

    static public function mdlEditarVenta($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET  CodigoProveedor=:CodigoProveedor, NombreProducto=:NombreProducto, Descripcion=:Descripcion, CodigoMarca=:CodigoMarca, CodigoPresentacion=:CodigoPresentacion, CodigoCategoria=:CodigoCategoria, Fotografia=:Fotografia  WHERE idProducto=:idProducto");

        $stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
        $stmt->bindParam(":CodigoProveedor", $datos["CodigoProveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":NombreProducto", $datos["NombreProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoMarca", $datos["CodigoMarca"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoPresentacion", $datos["CodigoPresentacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Fotografia", $datos["Fotografia"], PDO::PARAM_STR);   
        $stmt->bindParam(":CodigoCategoria", $datos["CodigoCategoria"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarVentas($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla where Estado = :estado");
            $stmt->bindParam(":estado", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static function mdlMostrarVentaDetalle($tabla, $item, $valor) {
        $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :id ORDER BY idVentaDV DESC");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /* =============================================
      ANULAR Venta
      ============================================= */

    static public function mdlAnularVenta($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET Estado=:Estado WHERE idVenta = :idVenta");
        $stmt->bindParam(":idVenta", $datos["Estado"], PDO::PARAM_INT);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
