<?php

require_once "../Controlador/ComprasControlador.php";
require_once "../Modelos/CompraModelo.php";
require_once "../Modelos/ProductosModelo.php";

class CompraAjax {
    /* =============================================
      EDITAR Venta
      ============================================= */

    public $data;
    public $idCompra;

    public function obtener_codigo(){
        echo ComprasControlador::ctrGetCode();
    }

    public function ajaxRealizarCompra(){
      echo ComprasControlador::ctrCrearCompra($this->data);
    }
}

/* =============================================
  EDITAR Venta
  ============================================= */
if (isset($_POST["type"])) {
    if($_POST["type"] == 'obtener_codigo'){
        $Compra = new CompraAjax();
        $Compra->obtener_codigo();
    }

    if($_POST["type"] == 'crear_compra'){
        session_start();
        $Compra = new CompraAjax();
        $Compra->data = [
          'idUsuario' => $_SESSION["idUsuario"] ,
          'dscto' => $_POST["dscto"] ,
          'idProveedor' => $_POST['idProveedor'],
          'totalfinal' => $_POST['totalfinal'],
          'subtotal' => $_POST['subtotal'],
          'igv' => $_POST['igv'],
          'items' => json_decode($_POST['items']),
        ];
        $Compra->ajaxRealizarCompra();
    }
}