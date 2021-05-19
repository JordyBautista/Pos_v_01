<?php

require_once "../Controlador/EmpresaControlador.php";
require_once "../Modelos/EmpresaModelo.php";

class AjaxEmpresa {
    /* =============================================
      EDITAR Empresa
      ============================================= */

    public $idEmpresa;

    public function ajaxEditarEmpresa() {

        $item = null;
        $valor = null;

        $respuesta = EmpresaControlador::ctrMostrarEmpresa($item, $valor);
        echo json_encode($respuesta);
    }
    
    
    
       

}

/* =============================================
  EDITAR Empresa
  ============================================= */

if (!isset($_POST["idEmpresa"])) {

    $Empresa = new AjaxEmpresa();
   // $Empresa->idEmpresa = $_POST["idEmpresa"];
    $Empresa->ajaxEditarEmpresa();
    
}