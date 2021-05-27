<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Modelos/ProductosModelo.php";

require_once "../Controlador/PresentacionControlador.php";
require_once "../Modelos/PresentacionModelo.php";

require_once "../Controlador/CategoriasControlador.php";
require_once "../Modelos/CategoriasModelo.php";

require_once "../Controlador/MarcasControlador.php";
require_once "../Modelos/MarcasModelo.php";

require_once "../Controlador/ProveedoresControlador.php";
require_once "../Modelos/ProveedoresModelo.php";

class ProductosDataTableAjax {

    public function mostrarTablaProductos() {

        $item = null;
        $valor = null;
        $orden = "idProducto";

        $Productos = ProductosControlador::ctrMostrarProductos($item, $valor);
        if (count($Productos) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Productos); $i++) {


            /* =============================================
              TRAEMOS LA CATEGORIA
              ============================================= */
            $item1 = "Codigo";
            $valor1 = $Productos[$i]["CodigoCategoria"];
            $Categoria = CategoriasControlador::ctrMostrarCategorias($item1, $valor1);

            /* =============================================
              TRAEMOS LA PRESENTACION
              ============================================= */
            $item2 = "Codigo";
            $valor2 = $Productos[$i]["CodigoPresentacion"];
            $Presentacion = PresentacionControlador::ctrMostrarPresentacion($item2, $valor2);

            /* =============================================
              TRAEMOS LA MARCA
              ============================================= */
            $item3 = 'Codigo';
            $valor3 = $Productos[$i]["CodigoMarca"];
            $Marca = MarcasControlador::ctrMostrarMarcas($item3, $valor3);

            /* =============================================
              TRAEMOS EL PROVEEDOR
              ============================================= */
            $item4 = 'Codigo';
            $valor4 = $Productos[$i]["CodigoProveedor"];
            $Proveedor = ProveedoresControlador::ctrMostrarProveedores($item4, $valor4);

            /* =============================================
              TRAEMOS LA IMAGEN
              ============================================= */

            $Fotografia = "<img src='" . $Productos[$i]["Fotografia"] . "' width='40px'>";

            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group'><button class='btn btn-sm bg-warning btnEditarProducto' idProducto='" . $Productos[$i]["idProducto"] . "'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarProducto' idProducto='" . $Productos[$i]["idProducto"] . "'  fotoProducto='" .$Productos[$i]['Fotografia'] . "' ><i class='fas fa-trash-alt'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Fotografia . ' ",
            "' . $Productos[$i]["idProducto"] . '",
            "' . $Productos[$i]["NombreProducto"] . '",
            "' . $Productos[$i]["Descripcion"] . '",
            "' . $Presentacion["Presentacion"] . '",
            "' . $Categoria["Categoria"] . '",
            "' . $Marca["Marca"] . '",
            "' . $Proveedor["RazonSocial"] . '",               
            "' . $Productos[$i]["FechaRegistro"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaProductos = new ProductosDataTableAjax;
$TablaProductos->mostrarTablaProductos();


