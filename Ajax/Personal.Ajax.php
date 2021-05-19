<?php

require_once "../Controlador/PersonalControlador.php";
require_once "../Modelos/PersonalModelos.php";

class AjaxPersonal {
    /* =============================================
      EDITAR PERSONAL
      ============================================= */

    public $idPersonal;

    public function ajaxEditarPersonal() {

        $item = "idPersonal";
        $valor = $this->idPersonal;

        $respuesta = PersonalControlador::ctrMostrarPersonal($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR PERSONAL
  ============================================= */

if (isset($_POST["idPersonal"])) {

    $Personal = new AjaxPersonal();
    $Personal->idPersonal = $_POST["idPersonal"];
    $Personal->ajaxEditarPersonal();
}