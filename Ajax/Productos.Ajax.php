<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Modelos/ProductosModelo.php";

class AjaxProductos {
    /* =============================================
      EDITAR Producto
      ============================================= */

    public $idProducto;

    public function ajaxEditarProducto() {

        $item = "idProducto";
        $valor = $this->idProducto;

        $respuesta = ProductosControlador::ctrMostrarProductos($item, $valor);
//        foreach($respuesta as $row):
//          $response["NombreProducto"] = $row["NombreProducto"];
//          $response["Stock"] = $row["Stock"];
//          $response["PrecioVenta"] = $row["PrecioVenta"];
//        endforeach;
        
        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Producto
  ============================================= */

if (isset($_POST["idProducto"])) {

    $Producto = new AjaxProductos();
    $Producto->idProducto = $_POST["idProducto"];
    $Producto->ajaxEditarProducto();
}