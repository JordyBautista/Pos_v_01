<?php

class ComprasControlador {

    static public function ctrMostrarCompras($item, $valor) {
        // $tabla = "Ventas";
        // $respuesta = VentasModelo::mdlMostrarVentas($tabla, $item, $valor);
        // return $respuesta;
    }

    static public function ctrGetCode() :string {
        $respuesta = ComprasModelo::mdlGetCode();
        if($respuesta){
            $codigo = $respuesta["codigoCompra"];
            $cod = $codigo +1;
            $nuevoCodigo = str_pad($cod, 10,"0",STR_PAD_LEFT);
        }else{
            $nuevoCodigo = "0000000001";
        }
        return $nuevoCodigo;
    }

    static public function ctrCrearCompra($data) {
        $id = ComprasModelo::mdlCrearCompra("compras",$data,ComprasControlador::ctrGetCode());
        $value = false;
        if($id > 0){
            foreach ($data['items'] as $key => $item) {
                $value = ComprasModelo::mdlCrearCompraDetalle('compradetalle',$item,$id);
            }
        }
        return $value;
    }
}
