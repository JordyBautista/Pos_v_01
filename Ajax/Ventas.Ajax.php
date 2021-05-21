<?php

require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";
require_once "../Modelos/ProductosModelo.php";

class AjaxVentas {
    /* =============================================
      EDITAR Venta
      ============================================= */

      public $data;
    public $idVenta;

    public function ajaxEditarVenta() {

        $item = "idVenta";
        $valor = $this->idVenta;

        $respuesta = VentasControlador::ctrMostrarVentas($item, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxRealizarVenta(){
      echo VentasControlador::ctrCrearVenta($this->data);
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
if (isset($_POST["type"])) {

  session_start();
  $Venta = new AjaxVentas();
  $Venta->data = [
    'idUsuario' => $_SESSION["idUsuario"] ,
    'tipoVenta' => $_POST["tipoVenta"] ,
    'metodoPago' => $_POST['metodoPago'],
    'dscto' => $_POST['dscto'],
    'codigoVenta' => $_POST['codigoVenta'],
    'idCliente' => $_POST['idCliente'],
    'montopagar' => $_POST['montopagar'],
    'totalfinal' => $_POST['totalfinal'],
    'subtotal' => $_POST['subtotal'],
    'igv' => $_POST['igv'],
    'items' => json_decode($_POST['items']),
  ];
  $Venta->ajaxRealizarVenta();
}