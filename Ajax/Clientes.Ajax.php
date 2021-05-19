<?php

require_once "../Controlador/ClientesControlador.php";
require_once "../Modelos/ClientesModelo.php";

class AjaxClientes {
    /* =============================================
      EDITAR Clientes
      ============================================= */

    public $idCliente;

    public function ajaxEditarCliente() {

        $item = "idCliente";
        $valor = $this->idCliente;

        $respuesta = ClientesControlador::ctrMostrarClientes($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Clientes
  ============================================= */

if (isset($_POST["idCliente"])) {

    $Cliente = new AjaxClientes();
    $Cliente->idCliente = $_POST["idCliente"];
    $Cliente->ajaxEditarCliente();
}