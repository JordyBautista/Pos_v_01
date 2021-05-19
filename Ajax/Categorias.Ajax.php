<?php

require_once "../Controlador/CategoriasControlador.php";
require_once "../Modelos/CategoriasModelo.php";

class AjaxCategorias {
    /* =============================================
      EDITAR Categorias
      ============================================= */

    public $idCategoria;

    public function ajaxEditarCategoria() {

        $item = "Codigo";
        $valor = $this->idCategoria;

        $respuesta = CategoriasControlador::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }

}

/* =============================================
  EDITAR Categorias
  ============================================= */

if (isset($_POST["idCategoria"])) {

    $Categoria = new AjaxCategorias();
    $Categoria->idCategoria = $_POST["idCategoria"];
    $Categoria->ajaxEditarCategoria();
}