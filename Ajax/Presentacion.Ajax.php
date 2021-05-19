<?php

require_once "../Controlador/PresentacionControlador.php";
require_once "../Modelos/PresentacionModelo.php";

class AjaxPresentacion {
    /* =============================================
      EDITAR Presentacion
      ============================================= */

    public $idPresentacion;

    public function ajaxEditarPresentacion() {

        $item = "Codigo";
        $valor = $this->idPresentacion;

        $respuesta = PresentacionControlador::ctrMostrarPresentacion($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Presentacion
  ============================================= */

if (isset($_POST["idPresentacion"])) {

    $Presentacion = new AjaxPresentacion();
    $Presentacion->idPresentacion = $_POST["idPresentacion"];
    $Presentacion->ajaxEditarPresentacion();
}