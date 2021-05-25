<?php

require_once "../Controlador/ClientesControlador.php";
require_once "../Modelos/ClientesModelo.php";


class VentasSeleccionarClienteDataTableAjax {

    public function mostrarTablaClientes(){

        $item = null;
        $valor = null;


        $Clientes = ClientesControlador::ctrMostrarClientes($item, $valor);
        if (count($Clientes) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Clientes); $i++) {

   
            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */

             $botones ="<div class='btn-group pl-3'><button id='cliente_" . $Clientes[$i]['idCliente'] .  "' onclick='escogercliente(" . $Clientes[$i]['idCliente'] .  ")' class='btn btn-xs bg-info btnAddCliente'  nombre='" . $Clientes[$i]['Nombres'] . "'><i class='fas fa-upload'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Clientes[$i]["Nombres"] . '",
            "' . $Clientes[$i]["Dni"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaProveedor = new VentasSeleccionarClienteDataTableAjax();
$TablaProveedor->mostrarTablaClientes();


