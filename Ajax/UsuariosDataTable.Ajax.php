<?php

require_once "../Controlador/UsuariosControlador.php";
require_once "../Modelos/UsuariosModelo.php";

require_once "../Controlador/PerfilControlador.php";
require_once "../Modelos/PerfilModelo.php";

require_once "../Controlador/PersonalControlador.php";
require_once "../Modelos/PersonalModelos.php";

class UsuariosDataTableAjax {

    public function mostrarTablaUsuario() {

        $item = null;
        $valor = null;
        $orden = "idUsuario";

        $Usuario = UsuariosControlador::ctrMostrarUsuarios($item, $valor);
        if (count($Usuario) == 0) {
            echo '{"data": []}';
            return;
        }

        $datosJson = '{
      "data": [';
        for ($i = 0; $i < count($Usuario); $i++) {


            /* =============================================
              TRAEMOS EL PERSONAL
              ============================================= */
            $item2 = "idPersonal";
            $valor2 = $Usuario[$i]["idPersonal"];
            $Personal = PersonalControlador::ctrMostrarPersonal($item2, $valor2);
            $Personal2=$Personal["Nombres"].'  '.$Personal["Apellidos"];

            /* =============================================
              TRAEMOS EL PERFIL
              ============================================= */
            $item1 = 'idPerfil';
            $valor1 = $Usuario[$i]["idPerfil"];
            ;
            $orden = "idPerfil";
            $Perfil = PerfilControlador::ctrMostrarPerfil($item1, $valor1, $orden);
            
            
            /* =============================================
              TRAEMOS LAS ACCIONES
              ============================================= */
            $botones = "<div class='btn-group'><button class='btn btn-sm bg-warning btnEditarUsuario' idUsuario='" . $Usuario[$i]["idUsuario"] . "'><i class='fas fa-edit'></i></button><button class='btn btn-sm bg-danger btnEliminarUsuario' idUsuario='" . $Usuario[$i]["idUsuario"] . "' ><i class='fas fa-trash-alt'></i></button></div>";

            $datosJson .='[
            "' . ($i + 1) . '",
            "' . $Usuario[$i]["idUsuario"] . '",
            "' . $Personal2.' ",
            "' . $Perfil["Perfil"] . '",
            "' . $Usuario[$i]["Usuario"] . '",
            
            "' . $Usuario[$i]["Estado"] . '",
            "' . $Usuario[$i]["FechaRegistro"] . '",
            "' . $botones . '"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= '] 

     }';

        echo $datosJson;
    }

}

$TablaUsuario = new UsuariosDataTableAjax();
$TablaUsuario->mostrarTablaUsuario();


