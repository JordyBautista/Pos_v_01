<?php

require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";

class AjaxGetCode {
    /* =============================================
      EDITAR Venta
      ============================================= */
    public function ajaxGetCode() {
        $respuesta = VentasControlador::ctrGetCode();
        if(count($respuesta) > 0){
          
            $codigo = $respuesta["Codigo"];
                 
          $cod = $codigo +1;
          $nuevoCodigo = str_pad($cod, 10,"0",STR_PAD_LEFT);
        }else{
            $nuevoCodigo = "0000000001";
        }
        
        echo $nuevoCodigo;
    }

}

/* =============================================
  EDITAR Venta
  ============================================= */
    $Venta = new AjaxGetCode();
    $Venta->ajaxGetCode();
