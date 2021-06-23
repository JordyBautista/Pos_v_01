<?php

require_once "../Controlador/IndicadorControlador.php";
require_once "../Modelos/IndicadorModelo.php";

class AjaxIndicador {
    public $data;

    public function volumenDeCompras() {
        $month = ['Ene','Feb','Mrz','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];

        $compras = IndicadorControlador::ctrSumatoriaCompras($this->data);
        
        $ventas = IndicadorControlador::ctrSumatoriaVentas($this->data);
        
        $response = [];
        $count = 12;
        for ($i=1; $i <= $count ; $i++) { 
            $compra = 0;
            $venta = 0;
            $iv = array_search($i, array_column($ventas, $this->data['grupo']));
            if($iv  !== false){
                $venta = $ventas[$iv]['sumatoriaVentas'] ;
            }
            $ic = array_search($i, array_column($compras, $this->data['grupo']));
            if($ic !== false){
               $compra = round($compras[$ic]['sumatoriaCompras'] / $compras[$ic]['cantidad'],0);
            }
            $indicador = round((($venta == 0) ? 0 : ($compra / $venta)), 2);
            $response[] = [
                'data' => [
                    'total_compras' => $compra,
                    'total_ventas' => $venta,
                ],
                'indicador' => $indicador,
                'month_or_day' => $month[$i - 1],
            ];
        }
        echo json_encode($response);
    }

    public function fechasAlquiler(){
        $resultado = IndicadorControlador::ctrFechasAlquiler($this->data);
        echo json_encode($resultado);
    }
    public function inventario(){
        $month = ['Ene','Feb','Mrz','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];

        $compras = IndicadorControlador::ctrSumatoriaCompras($this->data);
        
        $ventas = IndicadorControlador::ctrSumatoriaVentas($this->data);
        
        $response = [];
        $count = 12;
        for ($i=1; $i <= $count ; $i++) { 
            $compra = 0;
            $venta = 0;
            $iv = array_search($i, array_column($ventas, $this->data['grupo']));
            if($iv  !== false){
                $venta = $ventas[$iv]['cantidad'] ;
            }
            $ic = array_search($i, array_column($compras, $this->data['grupo']));
            if($ic !== false){
               $compra = round($compras[$ic]['cantidad'] / $compras[$ic]['cantidad'],2);
            }
            $indicador = round((($venta == 0) ? 0 : ($compra / $venta)), 1);
            $response[] = [
                'data' => [
                    'salidas' => $compra,
                    'indice_rotacion' => $venta,
                ],
                'indicador' => $indicador,
                'month_or_day' => $month[$i - 1],
            ];
        }
        echo json_encode($response);
    }
}
if (isset($_GET["type"])) {

    if ($_GET["type"] == 'uno') {
        $Cliente = new AjaxIndicador();
        $Cliente->data =[
            'grupo' => $_GET['grupo'],
            'year' => $_GET['year'],
            'idProducto' => $_GET['idProducto'],
        ];
        $Cliente->volumenDeCompras();
    }else if ($_GET["type"] == 'dates') {
        $Cliente = new AjaxIndicador();
        $Cliente->data =[
            'grupo' => $_GET['grupo'],
            'year' => $_GET['year'],
            'idProducto' => $_GET['idProducto'],
        ];
        $Cliente->fechasAlquiler();
    }else if ($_GET["type"] == 'inventario') {
        $Cliente = new AjaxIndicador();
        $Cliente->data =[
            'grupo' => $_GET['grupo'],
            'year' => $_GET['year'],
            'idProducto' => $_GET['idProducto'],
        ];
        $Cliente->inventario();
    }
}