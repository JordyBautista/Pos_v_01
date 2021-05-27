<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Controlador/ProductosAlquilerControlador.php";
require_once "../Modelos/ProductosModelo.php";
require_once "../Modelos/ProductosAlquilerModelo.php";

class AjaxProductos {
    /* =============================================
      EDITAR Producto
      ============================================= */

    public $idProducto;
    public $dataForm;

    public function guardar_producto(){
      $result = ProductosControlador::ctrCrearProductos();
      if ($result) {
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }else{
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }
    }

    public function modificar_producto(){
      $result = ProductosControlador::ctrCrearProductos();
      if ($result) {
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }else{
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }
    }

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

    public function obtener_prod_alq(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarProductosAlquiler('idProductoAlquiler',$this->idProducto);
      echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Producto
  ============================================= */
if (isset($_GET["type"])) {
  if ($_GET["type"] == 'obtener_prod_alq') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_GET["id"];
    $Producto->obtener_prod_alq();
  }
}

if (isset($_POST["type"])) {
  if ($_POST["type"] == 'guardar') {
    $Producto = new AjaxProductos();
    $Producto->guardar_producto();
  }else if ($_POST["type"] == 'modificar') {
    $Producto = new AjaxProductos();
    $Producto->guardar_producto();
  }
  else if ($_POST["type"] == 'obtener_producto') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_POST["idProducto"];
    $Producto->ajaxEditarProducto();
  }
}