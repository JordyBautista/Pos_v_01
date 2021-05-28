<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Modelos/ProductosModelo.php";

class StockProductosDataTableAjax {

    public function mostrarStockProductos() {

        $item = null;
        $valor = null;

        $Productos = ProductosControlador::ctrMostrarProductos($item, $valor);
        if (count($Productos) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Productos); $i++) {



            /* =============================================
              STOCK
              ============================================= */

            if ($Productos[$i]["Stock"] <= 10) {
                $stock = "<button class='btn btn-danger btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else if ($Productos[$i]["Stock"]>=11 && $Productos[$i]["Stock"] <= 15) {
                
                $stock = "<button class='btn btn-warning  btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-success btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            }

            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group pl-3'><button class='btn btn-sm bg-warning btnEditarStockProducto ' idProducto='" . $Productos[$i]["idProducto"] . "' data-toggle='modal'><i class='fas fa-edit'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Productos[$i]["idProducto"] . '",
            "' . $Productos[$i]["NombreProducto"] . '",
            "' . $Productos[$i]["StockMinimo"] . '",
            "' . $Productos[$i]["StockMaximo"] . '",
            "' .$stock.'",
            "' . $Productos[$i]["PrecioCompra"] . '",
            "' . $Productos[$i]["PrecioVenta"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }


      public function mostrarStockProductosVentas() {

        $item = null;
        $valor = null;

        $Productos = ProductosControlador::ctrMostrarProductos($item, $valor);
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

            $Fotografia = "<img src='" . $Productos[$i]["Fotografia"] . "' width='40px'>";
            /* =============================================
              STOCK
              ============================================= */

            if ($Productos[$i]["Stock"] <= 10) {
                $stock = "<button class='btn btn-danger btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else if ($Productos[$i]["Stock"]>=11 && $Productos[$i]["Stock"] <= 15) {
                
                $stock = "<button class='btn btn-warning  btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-success btn-sm'>" . $Productos[$i]["Stock"] . "</button>";
            }

            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group pl-3'><button class='btn btn-sm bg-warning btnEditarStockProducto ' data-target='#ModalEditarStockProducto' idProducto='" . $Productos[$i]["idProducto"] . "' data-toggle='modal'><i class='fas fa-edit'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Fotografia . ' ",
            "' . $Productos[$i]["NombreProducto"] . '",
            "' . $Productos[$i]["PrecioVenta"] . '",
            "' .$stock.'",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaStock = new StockProductosDataTableAjax();
$TablaStock->mostrarStockProductos();

if(isset($_POST["CrearVenta"])){
$TablaStockVentas = new StockProductosDataTableAjax();
$TablaStockVentas->mostrarStockProductosVentas();

}

