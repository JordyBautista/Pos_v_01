<?php

require_once 'ConexionBD.php';

class IndicadorModelo {

    static function mdlYears(){
        $sql = "select year(fechaRegistro) as year from compras group by(year)";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static function mdlYearsAlquiler(){
        $sql = "select year(FechaRegistro) as year from alquiler group by(year)";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function mdlSumatoriaCompras($data) {
        $grupo = $data['grupo'];
        $year = $data['year'];
        $id = $data['idProducto'];
        $sql = "select ".$grupo."(c.fechaRegistro) as ".$grupo.", c2.idProducto,count(c2.idProducto) as cantidad, sum(c2.cantidad) as sumatoriaCompras from compras c";
        $sql.= " inner join compradetalle c2  on c.idCompra = c2.idCompra ";
        $sql.= " where c2.idProducto = :id ";
        $sql.= " and year(c.fechaRegistro) = :year ";
        
        $sql.= " group by(".$grupo.") ";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        //$stmt->bindParam(":grupo", $grupo, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":year", $year, PDO::PARAM_STR);
    
        $stmt->execute();
        return $stmt->fetchAll();
            //return $sql;
    }
    static function mdlSumatoriaVentas($data) {
        $grupo = $data['grupo'];
        $year = $data['year'];
        $id = $data['idProducto'];
        $sql = "select ".$grupo."(v.Fecha) as ".$grupo.", v2.idProductoDV,count(v2.idProductoDV) as cantidad, sum(v2.cantidad) as sumatoriaVentas from ventas v";
        $sql.= " inner join detalleventa v2 on v.idVenta = v2.idVentaDV   ";
        $sql.= " where v2.idProductoDV = :id ";
        $sql.= " and year(v.Fecha) = :year ";
  
        $sql.= " group by(".$grupo.") ";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        //$stmt->bindParam(":grupo", $grupo, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":year", $year, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function mdlFechasAlquiler($data){
        $grupo = $data['grupo'];
        $year = $data['year'];
        $id = $data['idProducto'];
        $sql = "select ".$grupo."(a2.FechaRegistro) as ".$grupo.", p.Placa , a.fechaSalida , a.fechaDevolucion from alquilerdetalle a ";
        $sql.= " inner join productosalquiler p on a.idProductoAlquiler = p.idProductoAlquiler    ";
        $sql.= " inner join alquiler a2 on a.idAlquiler = a2.idAlquiler    ";
        $sql.= " where a.idProductoAlquiler = :id ";
        $sql.= " and year(a2.FechaRegistro) = :year ";
     
        $sql.= " group by(".$grupo.") ";
        $stmt = ConexionBD::Conecction()->prepare($sql);
        //$stmt->bindParam(":grupo", $grupo, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":year", $year, PDO::PARAM_STR);
      
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
