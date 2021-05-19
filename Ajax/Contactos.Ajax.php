<?php

require_once "../Controlador/ContactosControlador.php";
require_once "../Modelos/ContactosModelo.php";

class AjaxContactos {
    /* =============================================
      EDITAR CONTACTOS
      ============================================= */

    public $idContacto;

    public function ajaxEditarContacto() {

        $item = "Codigo";
        $valor = $this->idContacto;

        $respuesta = ContactosControlador::ctrMostrarContactos($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR CONTACTOS
  ============================================= */

if (isset($_POST["idContacto"])) {

    $Contacto = new AjaxContactos();
    $Contacto->idContacto = $_POST["idContacto"];
    $Contacto->ajaxEditarContacto();
}