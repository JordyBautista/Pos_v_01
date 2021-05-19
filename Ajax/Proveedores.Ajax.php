<?php

require_once "../Controlador/ProveedoresControlador.php";
require_once "../Modelos/ProveedoresModelo.php";

class AjaxProveedores {
    /* =============================================
      EDITAR Proveedores
      ============================================= */

    public $idProveedor;

    public function ajaxEditarProveedor() {

        $item = "Codigo";
        $valor = $this->idProveedor;

        $respuesta = ProveedoresControlador::ctrMostrarProveedores($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Proveedores
  ============================================= */

if (isset($_POST["idProveedor"])) {

    $Proveedor = new AjaxProveedores();
    $Proveedor->idProveedor = $_POST["idProveedor"];
    $Proveedor->ajaxEditarProveedor();
}