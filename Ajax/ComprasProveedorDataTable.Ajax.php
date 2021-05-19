<?php

require_once "../Controlador/ProveedoresControlador.php";
require_once "../Modelos/ProveedoresModelo.php";


class ComprasProveedorDataTableAjax {

    public function mostrarTablaProveedor(){

        $item = null;
        $valor = null;


        $Proveedor = ProveedoresControlador::ctrMostrarProveedores($item, $valor);
        if (count($Proveedor) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Proveedor); $i++) {

   
            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */


             $botones ="<div class='btn-group pl-3'><button class='btn btn-xs bg-info btnAddProveedor'  idProveedor='" . $Proveedor[$i]['Codigo'] . "'><i class='fas fa-upload'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Proveedor[$i]["RazonSocial"] . '",
            "' . $Proveedor[$i]["Ruc"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaProveedor = new ComprasProveedorDataTableAjax();
$TablaProveedor->mostrarTablaProveedor();


