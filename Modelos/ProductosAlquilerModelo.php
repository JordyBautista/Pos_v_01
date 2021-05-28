<?php

require_once 'ConexionBD.php';

class ProductosAlquilerModelo {
    /* =============================================
      CREAR Productos
      sdfjd stack par alos pros tengo que decirte algo estas ahi..?
      solo quiero decir que te extraño como mierda  y pasame el numero de la señora que me hizo el amarre para felicitarle y poderle decir que lo fortalezca mas xd, se que avecez tenemos pequeños inconvenientes oeri eso no significa que deje de sentir lo que siento por ti.
      Estare ahi para ti cuando mas me necesites, estarejunto a ti en los  malos y buenos momentos se que nos espera un camina largo y ardo pero si estamos juntos lo logramos te amo 
      ============================================= */

      static public function mdlGetCode(){
        $stmt = ConexionBD::Conecction()->prepare("SELECT Codigo FROM alquiler order by idAlquiler  desc limit 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }
    static public function mdlCrearProductoAlquiler($tabla, $datos) {

        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO $tabla (Descripcion, idMarca, Serie, Placa, Ubicacion, Observaciones, PrecioAlquiler, Fotografia, Estado, FechaRegistro) VALUES (:Descripcion, :idMarca, :Serie, :Placa, :Ubicacion, :Observaciones, :PrecioAlquiler, :Fotografia, :Estado, now())");

        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);
        $stmt->bindParam(":Serie", $datos["Serie"], PDO::PARAM_STR);
        $stmt->bindParam(":Placa", $datos["Placa"], PDO::PARAM_STR);
        $stmt->bindParam(":Ubicacion", $datos["Ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":Fotografia", $datos["Fotografia"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioAlquiler", $datos["PrecioAlquiler"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

        return $stmt->execute();
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

    static function mdlMostrarProductosAlquilerDisponible($tabla, $item, $valor) {
        $sql = "SELECT * FROM $tabla WHERE ";
        if (count($item)> 0) {           
            foreach ($item as $key => $value) {
                $add = '';
                if ($key != 0) {
                    $add=' AND ';
                }
                $sql.=  $value.'= :'.$value.' AND ';
            }
        }
        $sql.= " Estado='Disponible'";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        if (count($item)> 0){
            foreach ($item as $key => $value) {
                $stmt->bindParam(":" . $value, $valor[$key], PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll();
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

    static function mdlMostrarAlquiler($tabla, $item, $valor) {
        if ($item != null) {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM $tabla where Estado = :estado ORDER BY idAlquiler DESC");
            $stmt->bindParam(":estado", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static function mdlMostrarAlquilerDetalle($id) {
            $stmt = ConexionBD::Conecction()->prepare("SELECT * FROM alquilerdetalle where idAlquiler = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        
    }

    static public function actualizar_observacion($observacion, $idProducto){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE alquilerdetalle SET  observacion=:observacion  WHERE idAlquilerDetalle=:idProducto");

        $stmt->bindParam(":observacion", $observacion, PDO::PARAM_STR);
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        return $stmt->execute();
    }


    static public function actualizar_estado($estado, $idProducto){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE productosalquiler SET  Estado=:estado  WHERE idProductoAlquiler=:idProducto");

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        return $stmt->execute();
    }
    static public function actualizar_estado_alquiler($estado, $idAlquiler){
        $stmt = ConexionBD::Conecction()->prepare("UPDATE alquiler SET  Estado=:estado  WHERE idAlquiler=:idAlquiler");

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idAlquiler", $idAlquiler, PDO::PARAM_INT);
        return $stmt->execute();
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

    static public function mdlCrearAlquiler($tabla, $datos) {
        $sql = ConexionBD::Conecction();
        $stmt = $sql->prepare("INSERT INTO $tabla (idCliente, PrecioAlquiler, Estado, FechaRegistro, idUsuario, Codigo) VALUES (:idCliente, :PrecioAlquiler, :Estado, now(), :idUsuario, :Codigo)");
        $estado = '1';
        $stmt->bindParam(":idCliente", $datos["cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioAlquiler", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $datos["usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":Codigo", $datos["codigo"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $id = $sql->lastInsertId();
            return $id;
        }else{
            return 0;
        }
    }

    static public function mdlCrearAlquilerDetalle($tabla, $datos, $id) {
        //$fecha = date('Y-d-m H:i:s',$datos->fecha.':00');
        $stmt = ConexionBD::Conecction()->prepare("INSERT INTO ".$tabla."(idProductoAlquiler, fechaDevolucion, precio, idAlquiler) VALUES (:idProductoAlquiler, :fechaDevolucion, :precio, :idAlquiler)");
        $stmt->bindParam(":idAlquiler", $id, PDO::PARAM_INT);
        $stmt->bindParam(":fechaDevolucion", $datos->fecha, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos->precio, PDO::PARAM_STR);
        $stmt->bindParam(":idProductoAlquiler", $datos->idproducto, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
