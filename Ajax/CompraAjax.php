<?php

require_once "../Controlador/ComprasControlador.php";
require_once "../Modelos/CompraModelo.php";
require_once "../Modelos/ProductosModelo.php";
require_once "../Modelos/ProveedoresModelo.php";

class CompraAjax {
    /* =============================================
      EDITAR Venta
      ============================================= */

    public $data;
    public $idCompra;
    public $estado;

    public function mostrarTablaCompra() {
        $compras = ComprasControlador::ctrMostrarCompras(null, $this->estado);
        if (count($compras) == 0) {
            echo '{"data": []}';
            return;
        }

        $data = [];
        foreach ($compras as $key => $item) {
            $sub_array = array();
            $estado = '';
            $color = '';
            $funcion = '';
            if($item['estado'] == '1'){
                $estado = 'Vigente';
                $color = 'secondary';
                $funcion = "onclick='cambiarEstado(" . $item['idCompra'] . "," . $item['estado']. ")'";
            }else if($item['estado'] == '0'){
                $estado = 'Cancelado';
                $color = 'danger';
            }else if($item['estado'] == '2'){
                $estado = 'Realizado';
                $color = 'success';
            }
            $estado_boton = "<button class='btn btn-sm bg-".$color."' ".$funcion.">".$estado."</button>";
            $proveedor = ProveedoresModelos::mdlMostrarProveedores('proveedor','Codigo',$item['codProveedor']);
            $sub_array[] = $key +1;
            $sub_array[] = $item['codigoCompra'];
            $sub_array[] = $proveedor['RazonSocial'];
            $sub_array[] = $item['subTotal'];
            $sub_array[] = $item['igv'];
            $sub_array[] = $item['dscto'];
            $sub_array[] = $item['total'];
            $sub_array[] = $item['fechaRegistro'];
            $sub_array[] = $estado_boton;
            $sub_array[] ="<button class='btn btn-primary' onclick='verDetalle(" . $item['idCompra'] . ")'><i class='fas fa-eye'></i></button>";

            $data[] = $sub_array;
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    }

    public function ver_detalle(){
        $result = ComprasControlador::ctrDetalleCompra($this->idCompra);
        echo json_encode($result);
    }

    public function obtener_codigo(){
        echo ComprasControlador::ctrGetCode();
    }
    public function estado(){
        echo ComprasControlador::ctrActualizarEstado($this->estado, $this->idCompra);
    }

    public function ajaxRealizarCompra(){
      echo ComprasControlador::ctrCrearCompra($this->data);
    }
}

/* =============================================
  EDITAR Venta
  ============================================= */
if (isset($_GET["type"])){
    if($_GET["type"] == 'obtener_compras'){
        $Compra = new CompraAjax();
        $Compra->estado = $_GET["estado"];
        $Compra->mostrarTablaCompra();
    }

    if($_GET["type"] == 'ver_detalle'){
        $Compra = new CompraAjax();
        $Compra->idCompra = $_GET["id"];
        $Compra->ver_detalle();
    }
}else if (isset($_POST["type"])) {
    if($_POST["type"] == 'obtener_codigo'){
        $Compra = new CompraAjax();
        $Compra->obtener_codigo();
    }
    if($_POST["type"] == 'estado'){
        $Compra = new CompraAjax();
        $Compra->estado = $_POST["estado"];
        $Compra->idCompra = $_POST["id"];
        $Compra->estado();
    }
    if($_POST["type"] == 'crear_compra'){
        session_start();
        $Compra = new CompraAjax();
        $Compra->data = [
          'idUsuario' => $_SESSION["idUsuario"] ,
          'dscto' => $_POST["dscto"] ,
          'idProveedor' => $_POST['idProveedor'],
          'totalfinal' => $_POST['totalfinal'],
          'subtotal' => $_POST['subtotal'],
          'items' => json_decode($_POST['items']),
        ];
        $Compra->ajaxRealizarCompra();
    }
}