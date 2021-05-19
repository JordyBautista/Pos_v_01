<?php

require_once 'ConexionBD.php';

class ProductosAlquilerModelo {
    /* =============================================
      CREAR Productos
      sdfjd stack par alos pros tengo que decirte algo estas ahi..?
      solo quiero decir que te extraño como mierda  y pasame el numero de la señora que me hizo el amarre para felicitarle y poderle decir que lo fortalezca mas xd, se que avecez tenemos pequeños inconvenientes oeri eso no significa que deje de sentir lo que siento por ti.
      Estare ahi para ti cuando mas me necesites, estarejunto a ti en los  malos y buenos momentos se que nos espera un camina largo y ardo pero si estamos juntos lo logramos te amo 
      ============================================= */

    static public function mdlCrearProductoAlquiler($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla (Descripcion, idMarca, Serie, Placa, Ubicacion, Observaciones, PrecioAlquiler, Fotografia, Estado) VALUES (:Descripcion, :idMarca, :Serie, :Placa, :Ubicacion, :Observaciones, :PrecioAlquiler, :Fotografia, :Estado)");

        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);
        $stmt->bindParam(":Serie", $datos["Serie"], PDO::PARAM_STR);
        $stmt->bindParam(":Placa", $datos["Placa"], PDO::PARAM_STR);
        $stmt->bindParam(":Ubicacion", $datos["Ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":Fotografia", $datos["Fotografia"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioAlquiler", $datos["PrecioAlquiler"], PDO::PARAM_STR);
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
      
     


    static public function mdlEditarProductoAlquiler($tabla, $datos) {
        $stmt = ConexionBD::Conecction()->prepare("UPDATE  $tabla SET Descripcion=:Descripcion, idMarca=:idMarca, Serie=:Serie, Placa=:Placa, Ubicacion=:Ubicacion, Observaciones=:Observaciones, PrecioAlquiler=:PrecioAlquiler, Fotografia=:Fotografia, Estado=:Estado WHERE idProductoAlquiler=:idProductoAlquiler ");
      $stmt->bindParam(":idProductoAlquiler", $datos["idProductoAlquiler"], PDO::PARAM_STR);
      $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);
        $stmt->bindParam(":Serie", $datos["Serie"], PDO::PARAM_STR);
        $stmt->bindParam(":Placa", $datos["Placa"], PDO::PARAM_STR);
        $stmt->bindParam(":Ubicacion", $datos["Ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":Fotografia", $datos["Fotografia"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioAlquiler", $datos["PrecioAlquiler"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    static function mdlMostrarProductosAlquiler($tabla, $item, $valor) {
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

    static public function mdlEliminarProductoAlquiler($tabla, $datos) {
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
