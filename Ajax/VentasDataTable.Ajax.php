<?php

require_once "../Controlador/PersonalControlador.php";
require_once "../Modelos/PersonalModelos.php";

require_once "../Controlador/ClientesControlador.php";
require_once "../Modelos/ClientesModelo.php";

require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";

class VentasDataTableAjax {

    public function mostrarTablaVentas() {

        $item = null;
        $valor = null;
        $orden = "idVenta";

        $Ventas = VentasControlador::ctrMostrarVentas($item, $valor);
        if (count($Ventas) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Ventas); $i++) {


            /* =============================================
              TRAEMOS LA PERSNAL
              ============================================= */
            $item1 = "idPersonal";
            $valor1 = $Ventas[$i]["idVendedor"];
            $Personal = PersonalControlador::ctrMostrarPersonal($item1, $valor1);

            /* =============================================
              TRAEMOS EL CLIENTE
              ============================================= */
            $item2 = "idCliente";
            $valor2 = $Ventas[$i]["idCliente"];
            $Cliente = ClientesControlador::ctrMostrarClientes($item2, $valor2);



            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */

            $botones = "<div class='btn-group'><button idVenta='" . $Ventas[$i]["idVenta"] . "' type='button' class='btn btn-danger btn-sm'data-toggle='popover' data-content='Anular venta'><i class='fas fa-trash-alt'></i></button><button  idVenta='" . $Ventas[$i]["idVenta"] . "' type='button' class='btn btn-success btn-sm' data-toggle='popover' data-content='Ver detalle de la venta'><i class='far fa-list-alt'></i></button><button idVenta='" . $Ventas[$i]["idVenta"] . "' type='button' class='btn btn-warning btn-sm' data-toggle='popover' data-content='Ver comprobante'><i class='fas fa-file-invoice'></i></button><button idVenta='" . $Ventas[$i]["idVenta"] . "' type='button' class='btn btn-info btn-sm' data-toggle='popover' data-content=' Imprimir comprobante'><i class='fas fa-print'></i></button></div>";
            /* $botones = "<div class='fas fa-trash-alt'></i></button>
                <button type='button' class='btn btn-success' data-toggle='popover' data-content='Ver detalle de la venta'><i class='far fa-list-alt'></i></button>
                <button type='button' class='btn btn-warning' data-toggle='popover' data-content='Ver comprobante'><i class='fas fa-file-invoice'></i></button>
                <button type='button' class='btn btn-info' data-toggle='popover' data-content=' Imprimir comprobante'><i class='fas fa-print'></i>lass='btn-group'><button class='btn btn-sm bg-warning btnEditarVenta'   data-target='#ModalEditarVenta' idVenta='" . $Ventas[$i]["idVenta"] . "' data-toggle='modal'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarVenta' idVenta='" . $Ventas[$i]["idVenta"] . "'  fotoVenta='" .$Ventas[$i]['Fotografia'] . "' ><i class='fas fa-trash-alt'></i></button></div>"; */

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Ventas[$i]["Codigo"] . '",
            "' . $Cliente["Nombres"] . '", 
            "' . $Personal["Nombres"] . '", 
            "' . $Ventas[$i]["MetodoPago"] . '",
            "' . $Ventas[$i]["Neto"] . '",
            "' . $Ventas[$i]["Impuesto"] . '",
            "' . $Ventas[$i]["Total"] . '",
            "' . $Ventas[$i]["Fecha"] . '",
            "' . $Ventas[$i]["Estado"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaVentas = new VentasDataTableAjax;
$TablaVentas->mostrarTablaVentas();


