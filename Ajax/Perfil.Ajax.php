<?php

require_once "../Controlador/PerfilControlador.php";
require_once "../Modelos/PerfilModelo.php";

class AjaxPerfil {
    /* =============================================
      EDITAR dPerfil
      ============================================= */

    public $idPerfil;

    public function ajaxEditarPerfil() {

        $item = "idPerfil";
        $valor = $this->idPerfil;
        $orden = "idPerfil";

        $respuesta = PerfilControlador::ctrMostrarPerfil($item, $valor, $orden);

        echo json_encode($respuesta);
    }





    public function mostrarTablaPerfil(){

      $item = null;
      $valor = null;
      $orden = "idPerfil";

       $Perfil = PerfilControlador::ctrMostrarPerfil($item, $valor, $orden);


      if(count($Perfil) == 0){

        echo '{"data": []}';

        return;
      }
    
      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($Perfil); $i++){

        
       


        /*=============================================
      TRAEMOS LAS ACCIONES
        =============================================*/ 
        

       

             $botones =  "<div class='btn-group'><button class='btn btn-sm bg-warning btnEditarPerfil'   data-target='#ModalEditarPerfil' idPerfil='".$Perfil[$i]["idPerfil"]."' data-toggle='modal'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarPerfil' idPerfil='".$Perfil[$i]["idPerfil"]."' ><i class='fas fa-trash-alt'></i></button></div>"; 



     
        $datosJson .='[
            "'.($i+1).'",
            "'.$Perfil[$i]["idPerfil"].'",
            "'.$Perfil[$i]["Perfil"].'",
            "'.$Perfil[$i]["Descripcion"].'",
            "'.$botones.'"
          ],';

      }

      $datosJson = substr($datosJson, 0, -1);

     $datosJson .=   '] 

     }';
    
    echo $datosJson;


  }

}


if (!isset($_POST["idPerfil"])) {

$activarPerfil =  new AjaxPerfil();
$activarPerfil -> mostrarTablaPerfil();
}
/* =============================================
  EDITAR dPerfil
  ============================================= */

if (isset($_POST["idPerfil"])) {

    $Perfil = new AjaxPerfil();
    $Perfil->idPerfil = $_POST["idPerfil"];
    $Perfil->ajaxEditarPerfil();
}
