<?php

class ComprasControlador {

    static public function ctrMostrarCompras($item, $valor) {
        $tabla = "compras";
        return ComprasModelo::mdlMostrarCompras($tabla, $item, $valor);
    }

    static public function ctrActualizarEstado($estado, $id) {
        if ($estado == '2') {
            $detalle = ComprasModelo::mdlMostrarCompraDetalle('compradetalle','idCompra',$id);
            foreach ($detalle as $key => $item) {
                $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProducto'])[0];
                $nuevo_stock = $producto['Stock'] + $item['cantidad'];
                ProductosModelo::actualizar_stock($nuevo_stock, $item['idProducto']);
            }
        }

            return ComprasModelo::mdlActualizar_estado($estado, $id);
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
