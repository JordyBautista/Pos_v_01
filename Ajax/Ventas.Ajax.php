<?php

require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";
require_once "../Modelos/ProductosModelo.php";
require_once "../Modelos/ClientesModelo.php";
require_once "../Modelos/UsuariosModelo.php";

class AjaxVentas {
    /* =============================================
      EDITAR Venta
      ============================================= */

    public $data;
    public $idVenta;
    public $estado;

    public function ajaxEditarVenta() {

        $item = "idVenta";
        $valor = $this->idVenta;

        $respuesta = VentasControlador::ctrMostrarVentas($item, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxRealizarVenta(){
      echo VentasControlador::ctrCrearVenta($this->data);
    }

    public function mostrarTablaVenta() {
      $ventas = VentasControlador::ctrMostrarVentas(null, $this->estado);
      if (count($ventas) == 0) {
          echo '{"data": []}';
          return;
      }

      $data = [];
      foreach ($ventas as $key => $item) {
          $sub_array = array();
          $estado = '';
          $color = '';
          $funcion = '';
          if($item['Estado'] == '1'){
              $estado = 'Cotizado';
              $color = 'secondary';
              $funcion = "onclick='cambiarEstado(" . $item['idVenta'] . "," . $item['Estado']. "," . $item['Total']. ")'";
          }else if($item['Estado'] == '0'){
              $estado = 'Cancelado';
              $color = 'danger';
          }else if($item['Estado'] == '2'){
              $estado = 'Realizado';
              $color = 'success';
          }
          $estado_boton = "<button class='btn btn-sm bg-".$color."' ".$funcion.">".$estado."</button>";
          $cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$item['idCliente']);
          $usuario = UsuariosModelo::mdlMostrarUsuarios('usuarios','idUsuario',$item['idVendedor']);
          $sub_array[] = $key +1;
          $sub_array[] = $item['Codigo'];
          $sub_array[] = $cliente['Nombres'];
          $sub_array[] = $usuario['Usuario'];
          $sub_array[] = $item['MetodoPago'];
          $sub_array[] = $item['Total'];
          $sub_array[] = $item['Fecha'];
          $sub_array[] = $estado_boton;
          $sub_array[] ="<button class='btn btn-primary' onclick='verDetalle(" . $item['idVenta'] . ")'><i class='fas fa-eye'></i></button>";

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
    $result = VentasControlador::ctrDetalleVenta($this->idVenta);
    echo json_encode($result);
  }
  public function estado(){
    echo VentasControlador::ctrActualizarEstado($this->estado, $this->idVenta, $this->data);
  }

  public function obtener_codigo() {
    $respuesta = VentasControlador::ctrGetCode();
    if($respuesta){
      
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

if (isset($_POST["idVenta"])) {

    $Venta = new AjaxVentas();
    $Venta->idVenta = $_POST["idVenta"];
    $Venta->ajaxEditarVenta();
}else if (isset($_GET["type"])){
  if($_GET["type"] == 'obtener_ventas'){
      $Venta = new AjaxVentas();
      $Venta->estado = $_GET["estado"];
      $Venta->mostrarTablaVenta();
  }else if($_GET["type"] == 'ver_detalle'){
      $Venta = new AjaxVentas();
      $Venta->idVenta = $_GET["id"];
      $Venta->ver_detalle();
  }
}else if(isset($_POST["type"])) {
  if($_POST["type"] == 'obtener_codigo'){
    $Venta = new AjaxVentas();
    $Venta->obtener_codigo(); 
  }else if($_POST["type"] == 'estado'){
    $Venta = new AjaxVentas();
    $Venta->estado = $_POST["estado"];
    $Venta->idVenta = $_POST["id"];
    $Venta->data = $_POST["data"];
    $Venta->estado();
  }else if($_POST["type"] == 'crear_venta'){
    session_start();
    $Venta = new AjaxVentas();
    $Venta->data = [
      'idUsuario' => $_SESSION["idUsuario"] ,
      'tipoVenta' => $_POST["tipoVenta"] ,
      'metodoPago' => $_POST['metodoPago'],
      'dscto' => $_POST['dscto'],
      'codigoVenta' => $_POST['codigoVenta'],
      'idCliente' => $_POST['idCliente'],
      'montopagar' => $_POST['montopagar'],
      'totalfinal' => $_POST['totalfinal'],
      'subtotal' => $_POST['subtotal'],
      'efectivoRecibido' => $_POST['efectivoRecibido'],
      'igv' => $_POST['igv'],
      'items' => json_decode($_POST['items']),
    ];
    $Venta->ajaxRealizarVenta();
  }
}