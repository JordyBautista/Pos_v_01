<?php

require_once 'ConexionBD.php';

class InicioModelo {
    
    static function mdlSumaVenta() {
        $stmt = ConexionBD::Conecction()->prepare("SELECT sum(total) as suma_venta FROM ventas where Month(Fecha) = Month(now())");
        $stmt->execute();
        return $stmt->fetch();
    }

    static function mdlSumaCompra() {
        $stmt = ConexionBD::Conecction()->prepare("SELECT sum(total) as suma_compra FROM compras where Month(fechaRegistro) = Month(now())");
        $stmt->execute();
        return $stmt->fetch();
    }

    static function mdlCantidadPersonal() {
        $stmt = ConexionBD::Conecction()->prepare("SELECT count(idPersonal) as cont_personal FROM personal");
        $stmt->execute();
        return $stmt->fetch();
    }

    static function mdlCantidadProducto() {
        $stmt = ConexionBD::Conecction()->prepare("SELECT count(idProducto) as cont_producto FROM productos");
        $stmt->execute();
        return $stmt->fetch();
    }
}
