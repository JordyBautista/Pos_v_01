<?php

require_once "../Controlador/MarcasControlador.php";
require_once "../Modelos/MarcasModelo.php";

class AjaxMarcas {
    /* =============================================
      EDITAR Marcas
      ============================================= */

    public $idMarca;

    public function ajaxEditarMarca() {

        $item = "Codigo";
        $valor = $this->idMarca;

        $respuesta = MarcasControlador::ctrMostrarMarcas($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Marcas
  ============================================= */

if (isset($_POST["idMarca"])) {

    $Marca = new AjaxMarcas();
    $Marca->idMarca = $_POST["idMarca"];
    $Marca->ajaxEditarMarca();
}