<?php

require_once "../Controlador/EmpresaControlador.php";
require_once "../Modelos/EmpresaModelo.php";

class AjaxMoneda {
    /* =============================================
      EDITAR Empresa
      ============================================= */

    public $idMoneda;
    
    
        public function ajaxEditarMoneda() {

        $item = "idMoneda";
        $valor = $this->idMoneda;

        $respuesta = EmpresaControlador::ctrMostrarMoneda($item, $valor);
        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Empresa
  ============================================= */

if (isset($_POST["idMoneda"])) {

    $Empresa = new AjaxMoneda();
    $Empresa->idMoneda = $_POST["idMoneda"];
    $Empresa->ajaxEditarMoneda();
}