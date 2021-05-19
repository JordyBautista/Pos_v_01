<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Modelos/ProductosModelo.php";

class ProductosComprasDataTableAjax {

    public $idProveedor;

    public function AjaxProductosCompras() {

        //  $item = null;
        //$valor = null;
        $item = "CodigoProveedor";
        $valor = $this->idProveedor=$_GET["idProveedor"];

        $Productos = ProductosControlador::ctrMostrarProductos($item, $valor);
        
     //   echo json_encode($Productos);
        
        if (count($Productos) == 0) {
            echo '{"data": []}';
            return;
        }
        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Productos); $i++) {


            /* =============================================
              TRAEMOS LA IMAGEN
              ============================================= */

            $Fotografia = "<img src='" . $Productos[$i]["Fotografia"] . "' class='img-fluid pl-3' width='50px'>";
            /* =============================================
              STOCK
              ============================================= */

            if ($Productos[$i]["Stock"] <= 10) {
                $stock = "<button class='btn btn-danger btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else if ($Productos[$i]["Stock"] >= 11 && $Productos[$i]["Stock"] <= 15) {

                $stock = "<button class='btn btn-warning  btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-success btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            }

            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group pl-3'><button class='btn btn-info btn-sm text-center btnAddProductosCompra' id='btnAddProductosCompra" . $Productos[$i]["idProducto"] . "' idProductoCompra='" . $Productos[$i]["idProducto"] . "'><i class='fas fa-cart-plus'></i></button></div>";

            $datosJson .='[
            "' . $Fotografia . ' ",
            "' . $Productos[$i]["NombreProducto"] . '",
            "' . 'S/. ' . $Productos[$i]["PrecioCompra"] . '",
            "' . $stock . '",
            "' . $botones . '"
          ],';
        }
        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 
     }';      
        echo $datosJson;
    }

}

if (isset($_GET["idProveedor"])) {
    $TablaStockVentas = new ProductosComprasDataTableAjax();
    $TablaStockVentas->AjaxProductosCompras();
}







