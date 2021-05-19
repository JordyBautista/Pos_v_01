<?php

require_once 'ConexionBD.php';

class ProductosModelo {
    /* =============================================
      CREAR Productos
      ============================================= */

    static public function mdlCrearProducto($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla(idProducto, CodigoProveedor, NombreProducto, Descripcion, CodigoMarca, CodigoPresentacion, CodigoCategoria,Fotografia,Stock,StockMaximo,StockMinimo,PrecioCompra,PrecioVenta,VentasProducto)VALUES(:idProducto,:CodigoProveedor,:NombreProducto,:Descripcion,:CodigoMarca,:CodigoPresentacion,:CodigoCategoria,:Fotografia,:Stock,:StockMaximo,:StockMinimo,:PrecioCompra,:PrecioVenta,:VentasProducto)");

        $stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoProveedor", $datos["CodigoProveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":NombreProducto", $datos["NombreProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoMarca", $datos["CodigoMarca"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoCategoria", $datos["CodigoCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":CodigoPresentacion", $datos["CodigoPresentacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Fotografia", $datos["Fotografia"], PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
        $stmt->bindParam(":StockMaximo", $datos["StockMaximo"], PDO::PARAM_STR);
        $stmt->bindParam(":StockMinimo", $datos["StockMinimo"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);
        $stmt->bindParam(":VentasProducto", $datos["VentasProducto"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      STOCK PRODUCTOS
      ============================================= */

    static public function mdlActualizarStockProducto($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("UPDATE $tabla SET Stock=:Stock, StockMaximo=:StockMaximo, StockMinimo=:StockMinimo, PrecioCompra=:PrecioCompra, PrecioVenta=:PrecioVenta WHERE idProducto=:idProducto;");

        $stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_INT);
        $stmt->bindParam(":StockMaximo", $datos["StockMaximo"], PDO::PARAM_INT);
        $stmt->bindParam(":StockMinimo", $datos["StockMinimo"], PDO::PARAM_INT);
        $stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);
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

    static public function mdlEditarProducto($tabla, $datos) {
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

    static function mdlMostrarProductos($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla ORDER BY 1 DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      ELIMINAR Productos
      ============================================= */

    static public function mdlEliminarProducto($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");
        $stmt->bindParam(":idProducto", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

}
