<?php

require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";

class AjaxVentas {
    /* =============================================
      EDITAR Venta
      ============================================= */

    public $idVenta;

    public function ajaxEditarVenta() {

        $item = "idVenta";
        $valor = $this->idVenta;

        $respuesta = VentasControlador::ctrMostrarVentas($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Venta
  ============================================= */

if (isset($_POST["idVenta"])) {

    $Venta = new AjaxVentas();
    $Venta->idVenta = $_POST["idVenta"];
    $Venta->ajaxEditarVenta();
}