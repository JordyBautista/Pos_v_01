<?php

require_once "../Controlador/ProductosAlquilerControlador.php";
require_once "../Modelos/ProductosAlquilerModelo.php";

require_once "../Controlador/MarcasControlador.php";
require_once "../Modelos/MarcasModelo.php";


class ProductosAlquilerDataTableAjax {

    public function mostrarTablaProductosAlquiler() {

        $item = null;
        $valor = null;
        $orden = "idProductoAlquiler";

        $Productos = ProductosAlquilerControlador::ctrMostrarProductosAlquiler($item, $valor);
        if (count($Productos) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Productos); $i++) {


      
            /* =============================================
              TRAEMOS LA MARCA
              ============================================= */
            $item3 = 'Codigo';
            $valor3 = $Productos[$i]["idMarca"];
            $Marca = MarcasControlador::ctrMostrarMarcas($item3, $valor3);

            

            /* =============================================
              TRAEMOS LA IMAGEN
              ============================================= */

            $Fotografia = "<img src='" . $Productos[$i]["Fotografia"] . "' width='40px'>";

            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group'><button class='btn btn-sm bg-warning' onclick='editarProductoAlguiler(" . $Productos[$i]["idProductoAlquiler"] . ")'   data-target='#ModalEditarProductoAlquiler' idProductoAlquiler='" . $Productos[$i]["idProductoAlquiler"] . "' data-toggle='modal'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarProductoAlquiler' idProductoAlquiler='" . $Productos[$i]["idProductoAlquiler"] . "'  fotoProductoAlquiler='" .$Productos[$i]['Fotografia'] . "' ><i class='fas fa-trash-alt'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Fotografia . ' ",
            "' . $Productos[$i]["Placa"] . '",
            "' . $Productos[$i]["Descripcion"] . '",
            "' . $Marca["Marca"] . '",  
            "' . $Productos[$i]["PrecioAlquiler"] . '",
            "' . $Productos[$i]["Ubicacion"] . '",
            "' . $Productos[$i]["Observaciones"] . '",
            "' . $Productos[$i]["FechaRegistro"] . '",
            "' . $Productos[$i]["Estado"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaProductos = new ProductosAlquilerDataTableAjax;
$TablaProductos->mostrarTablaProductosAlquiler();


