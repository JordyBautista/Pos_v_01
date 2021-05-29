<?php

require_once "../Controlador/ProductosControlador.php";
require_once "../Controlador/ProductosAlquilerControlador.php";
require_once "../Modelos/ProductosModelo.php";
require_once "../Modelos/ProductosAlquilerModelo.php";
require_once "../Modelos/ClientesModelo.php";
require_once "../Modelos/MarcasModelo.php";

class AjaxProductos {
    /* =============================================
      EDITAR Producto
      ============================================= */

    public $idProducto;
    public $dataForm;
    public $valor;
    public $item;
    public $data;
    public $estado;

    public function guardar_producto(){
      $result = ProductosControlador::ctrCrearProductos();
      if ($result) {
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }else{
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }
    }

    public function modificar_producto(){
      $result = ProductosControlador::ctrCrearProductos();
      if ($result) {
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }else{
        header("Location: http://localhost:8080/Pos_v_01/Productos");
      }
    }

    public function ajaxEditarProducto() {

        $item = "idProducto";
        $valor = $this->idProducto;

        $respuesta = ProductosControlador::ctrMostrarProductos($item, $valor);
//        foreach($respuesta as $row):
//          $response["NombreProducto"] = $row["NombreProducto"];
//          $response["Stock"] = $row["Stock"];
//          $response["PrecioVenta"] = $row["PrecioVenta"];
//        endforeach;
        
        echo json_encode($respuesta);
    }

    public function obtener_prod_alq(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarProductosAlquiler('idProductoAlquiler',$this->idProducto);
      echo json_encode($respuesta);
    }
    public function obtener_tod_prod_alq(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarProductosAlquilerDisponible($this->item,$this->valor);
      if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
      }

      $data = [];
      foreach ($respuesta as $key => $item) {
          $sub_array = array();

          $marca = MarcasModelos::mdlMostrarMarcas('marcas','Codigo',$item['idMarca']);
          $sub_array[] = $item['Placa'];
          $sub_array[] = $item['Descripcion'];
          $sub_array[] = $item['Serie'];
          $sub_array[] = $marca['Marca'];
          $sub_array[] = $item['PrecioAlquiler'];
          $sub_array[] ="<button id='btn_producto_".$item['idProductoAlquiler']."' class='btn btn-primary' onclick='agregar(" . $item['idProductoAlquiler'] . ")'><i class='fas fa-plus'></i></button>";

          $data[] = $sub_array;
      }
      $results = array(
          "sEcho"=>1, //Información para el datatables
          "iTotalRecords"=>count($data), //enviamos el total registros al datatable
          "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
          "aaData"=>$data);
      echo json_encode($results);
      
    }
    public function obtener_codigo_alq(){
      $respuesta = ProductosAlquilerControlador::ctrGetCode();
      if($respuesta){
          $codigo = $respuesta["Codigo"];
              
        $cod = $codigo +1;
        $nuevoCodigo = str_pad($cod, 10,"0",STR_PAD_LEFT);
      }else{
          $nuevoCodigo = "0000000001";
      }
      
      echo $nuevoCodigo;
    }
    public function ajaxRealizarAlquiler(){
      echo ProductosAlquilerControlador::ctrCrearAlquiler($this->data);
    }
    public function obtener_alq(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarAlquiler(null, $this->estado);
      if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
      }

      $data = [];
      foreach ($respuesta as $key => $item) {
          $sub_array = array();
          $cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$item['idCliente']);
          $btnCancelar = '-';
          if($item['Estado'] == '1'){
            $btnCancelar = "<button class='btn btn-danger' onclick='cancelar(" . $item['idAlquiler'] . ")'><i class='fas fa-eye'></i></button>";
          }
          $sub_array[] = $item['Codigo'];
          $sub_array[] = $cliente['Nombres'];
          $sub_array[] = $item['FechaRegistro'];
          $sub_array[] = 'S/. '.$item['PrecioAlquiler'];
          $sub_array[] ="<button class='btn btn-primary' onclick='verDetalle(" . $item['idAlquiler'] . "," . $item['Estado'] . ")'><i class='fas fa-eye'></i></button>";
          $sub_array[] =$btnCancelar;

          $data[] = $sub_array;
      }
      $results = array(
          "sEcho"=>1, //Información para el datatables
          "iTotalRecords"=>count($data), //enviamos el total registros al datatable
          "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
          "aaData"=>$data);
      echo json_encode($results);
    }
    public function obtener_alq_id(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarAlquiler('idAlquiler', $this->idProducto);
      $cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$respuesta[0]['idCliente']);
      $respuesta[0]['idCliente'] = $cliente['Nombres'];
      echo json_encode($respuesta);
    }
    public function obtener_alq_det(){
      $alq = ProductosAlquilerControlador::ctrMostrarAlquiler('idAlquiler', $this->idProducto);
      $respuesta = ProductosAlquilerControlador::ctrMostrarAlquilerDetalle($this->idProducto);
      if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
      }

      $data = [];
      foreach ($respuesta as $key => $item) {
          $sub_array = array();

          $button = '--';
          if($item['observacion'] == null && $alq[0]['Estado']=='1'){
            $button = "<button class='btn btn-primary' onclick='modificarInfo(" . $item['idAlquilerDetalle'] . "," . $item['idProductoAlquiler'] . ",".$this->idProducto.")'><i class='fas fa-pencil-alt'></i></button>";
          }else if($item['observacion'] != null && $alq[0]['Estado']=='2'){
            $button = "<button class='btn btn-primary' onclick='verMas(" . $item['idAlquilerDetalle'] . ")'><i class='fas fa-eye'></i></button>";
          }
          $producto = ProductosModelo::mdlMostrarProductos('productosalquiler','idProductoAlquiler',$item['idProductoAlquiler']);
          $sub_array[] = $producto[0]['Placa'];
          $sub_array[] = $item['fechaSalida'];
          $sub_array[] = $item['fechaDevolucion'];
          $sub_array[] = 'S/. '.$item['precio'];
          $sub_array[] =$button;

          $data[] = $sub_array;
      }
      $results = array(
          "sEcho"=>1, //Información para el datatables
          "iTotalRecords"=>count($data), //enviamos el total registros al datatable
          "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
          "aaData"=>$data);
      echo json_encode($results);
    }
    public function modificar_observacion(){
      echo ProductosAlquilerControlador::actualizar_observacion($this->data);
    }
    public function cancelar_alquiler(){
      echo ProductosAlquilerControlador::cancelar_alquiler($this->idProducto);
    }
    public function obtener_alq_det_id(){
      $respuesta = ProductosAlquilerControlador::ctrMostrarAlquilerDetallePorId($this->idProducto);
      echo json_encode($respuesta);
    }
}

/* =============================================
  EDITAR Producto
  ============================================= */
if (isset($_GET["type"])) {
  if ($_GET["type"] == 'obtener_prod_alq') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_GET["id"];
    $Producto->obtener_prod_alq();
  }elseif ($_GET["type"] == 'obtener_alq_det_id') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_GET["id"];
    $Producto->obtener_alq_det_id();
  }
  elseif ($_GET["type"] == 'obtener_alq_det') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_GET["id"];
    $Producto->obtener_alq_det();
  }elseif ($_GET["type"] == 'obtener_alq') {
    $Producto = new AjaxProductos();
    $Producto->estado = $_GET['estado'];
    $Producto->obtener_alq();
  }elseif ($_GET["type"] == 'obtener_alq_id') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_GET['id'];
    $Producto->obtener_alq_id();
  }else if ($_GET["type"] == 'obtener_cod_alq') {
    $Producto = new AjaxProductos();
    $Producto->obtener_codigo_alq();
  }else if ($_GET["type"] == 'obtener_todo_prod_alq') {
    $Producto = new AjaxProductos();
    $valor = [];
    $item = [];
    if (isset($_GET["marca"])) {
      if (!empty($_GET["marca"])){
        $valor[] = $_GET["marca"];
        $item[] = 'idMarca';
      }
    }
    if (isset($_GET["serie"])) {
      if (!empty($_GET["serie"])){
        $valor[] = $_GET["serie"];
        $item[] = 'Serie';
      }
    }
    $Producto->valor = $valor;
    $Producto->item = $item;
    $Producto->obtener_tod_prod_alq();
  }
}

if (isset($_POST["type"])) {
  if ($_POST["type"] == 'guardar') {
    $Producto = new AjaxProductos();
    $Producto->guardar_producto();
  }else if ($_POST["type"] == 'modificar_observacion') {
    $Producto = new AjaxProductos();
    // $Producto->idProducto = $_POST['producto'];
    // $Producto->data = $_POST['id'];
    // $Producto->estado = $_POST['observacion'];
    // $Producto->item = $_POST['alquiler'];
    $Producto->data = [
      'producto'=>$_POST['producto'],
      'id'=>$_POST['id'],
      'observacion'=>$_POST['observacion'],
      'tipo_observacion'=>$_POST['tipo_observacion'],
      'alquiler'=>$_POST['alquiler'],
    ];
    $Producto->modificar_observacion();
  }else if ($_POST["type"] == 'modificar') {
    $Producto = new AjaxProductos();
    $Producto->guardar_producto();
  }else if ($_POST["type"] == 'cancelar_alquiler') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_POST['id'];
    $Producto->cancelar_alquiler();
  }
  else if ($_POST["type"] == 'obtener_producto') {
    $Producto = new AjaxProductos();
    $Producto->idProducto = $_POST["idProducto"];
    $Producto->ajaxEditarProducto();
  }else if($_POST["type"] == 'guardar_alquiler'){
    session_start();
    $Producto = new AjaxProductos();
    $Producto->data = [
      'usuario' => $_SESSION["idUsuario"] ,
      'codigo' => $_POST["codigo"] ,
      'cliente' => $_POST["cliente"] ,
      'total' => $_POST["total"] ,
      'items' => json_decode($_POST['items']),
    ];
    $Producto->ajaxRealizarAlquiler();
  }
}