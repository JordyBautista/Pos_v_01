<?php

require_once "../Controlador/ClientesControlador.php";
require_once "../Modelos/ClientesModelo.php";


class ClientesDataTableAjax {

    public function mostrarTablaCliente() {

        $item = null;
        $valor = null;
        
        $Cliente = ClientesControlador::ctrMostrarClientes($item, $valor);
        if (count($Cliente) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Cliente); $i++) {

            
            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group'><button class='btn btn-sm bg-warning btnEditarCliente'   data-target='#ModalEditarCliente' idCliente='" . $Cliente[$i]["idCliente"] . "' data-toggle='modal'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarCliente' idCliente='" . $Cliente[$i]["idCliente"] . "' ><i class='fas fa-trash-alt'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Cliente[$i]["Nombres"] . '",
            "' . $Cliente[$i]["Dni"] . '",
             "' . $Cliente[$i]["FechaNacimiento"] . '",
            "' . $Cliente[$i]["Direccion"] . '",
            "' . $Cliente[$i]["Correo"] . '",
             "' . $Cliente[$i]["Telefono"] . '",
            "' . $Cliente[$i]["Celular"] . '",
            "' . $Cliente[$i]["Compras"] . '",
            "' . $Cliente[$i]["UltimaCompra"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaCliente = new ClientesDataTableAjax();
$TablaCliente->mostrarTablaCliente();


