<?php

require_once "../Controlador/UsuariosControlador.php";
require_once "../Modelos/UsuariosModelo.php";

class AjaxUsuario {
    /* =============================================
      EDITAR dUsuario
      ============================================= */

    public $idUsuario;

    public function ajaxEditarUsuario() {

        $item = "idUsuario";
        $valor = $this->idUsuario;
        $orden = "idUsuario"; 
        $respuesta = UsuariosControlador::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
}


/* =============================================
  EDITAR dUsuario
  ============================================= */

if (isset($_POST["idUsuario"])) {
    $Usuario = new AjaxUsuario();
    $Usuario->idUsuario = $_POST["idUsuario"];
    $Usuario->ajaxEditarUsuario();
}
