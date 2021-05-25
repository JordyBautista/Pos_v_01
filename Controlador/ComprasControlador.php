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

    static public function ctrDetalleCompra($id) : array{
        $compra = ComprasModelo::mdlMostrarCompras('compras','idCompra',$id);
        if ($compra) {
            $estado ='';
            if($compra['estado'] == '1'){
                $estado = 'Vigente';
            }else if($compra['estado'] == '0'){
                $estado = 'Cancelado';
            }else if($compra['estado'] == '2'){
                $estado = 'Realizado';
            }
            $result = [
                'codigo' => $compra['codigoCompra'],
                'proveedor' => $compra['codProveedor'],
                'fechaRegistro' => $compra['fechaRegistro'],
                'estado' => $estado ,
            ];
            $html = "<thead><tr><th>Producto</th><th>Cantidad</th><th>Importe</th></tr></thead><tbody>";
            $detalle = ComprasModelo::mdlMostrarCompraDetalle('compradetalle','idCompra',$id);
            foreach ($detalle as $key => $item) {
                $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProducto'])[0];
                $html.= "<tr><th>".$producto['NombreProducto']."</th><th>".$item['cantidad']."</th><th>".$item['importe']."</th></tr>";
            }
            $html.= "</tbody><tfoot><tr><td></td><td><p><b>SubTotal</b></p><p><b>IGV</b></p><p><b>Dscto</b></p><p><b>Total</b></p></td>";
            $html.= "<td><p>".$compra['subTotal']."</p><p>".$compra['igv']."</p><p>".$compra['dscto']."</p><p>".$compra['total']."</p></td></tr></tfoot>";
            $result['detalle'] = $html;

            return $result;
        }
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
        return $id;
    }
}
