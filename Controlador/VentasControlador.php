<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class VentasControlador {

    static public function ctrMostrarVentas($item, $valor) {
        $tabla = "Ventas";
        return VentasModelo::mdlMostrarVentas($tabla, $item, $valor);
    }
    static public function ctrActualizarEstado($estado, $id, $data) {
        if ($estado == '2') {
            VentasModelo::mdlActualizar_data($data, $id);
            $detalle = VentasModelo::mdlMostrarVentaDetalle('detalleVenta','idVentaDV',$id);
            foreach ($detalle as $key => $item) {
                $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProductoDV'])[0];
                $nuevo_stock = $producto['Stock'] - $item['cantidad'];
                ProductosModelo::actualizar_stock($nuevo_stock, $item['idProductoDV']);
            }
        }

        return VentasModelo::mdlActualizar_estado($estado, $id);
    }
    
    static public function ctrDetalleVenta($id) : array{
        $venta = VentasModelo::mdlMostrarVentas('ventas','idVenta',$id);
        $cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$venta['idCliente']);
        $usuario = UsuariosModelo::mdlMostrarUsuarios('usuario','idUsuario',$venta['idVendedor']);
        if ($venta) {
            $estado ='';
            if($venta['Estado'] == '1'){
                $estado = 'Cotizado';
            }else if($venta['Estado'] == '0'){
                $estado = 'Cancelado';
            }else if($venta['Estado'] == '2'){
                $estado = 'Realizado';
            }
            $result = [
                'codigo' => $venta['Codigo'],
                'cliente' => $cliente['Nombres'],
                'vendedor' => $usuario['Usuario'],
                'fecha' => $venta['Fecha'],
                'estado' => $estado,
                'metodo' => $venta['MetodoPago'],
                'tipo' => $venta['tipoVenta'],
            ];
            $html = "<thead><tr><th>Producto</th><th>Cantidad</th><th>Importe</th></tr></thead><tbody>";
            $detalle = VentasModelo::mdlMostrarVentaDetalle('detalleventa','idVentaDV',$id);
            foreach ($detalle as $key => $item) {
                $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProductoDV'])[0];
                $html.= "<tr><th>".$producto['NombreProducto']."</th><th>".$item['cantidad']."</th><th>".$item['importe']."</th></tr>";
            }
            $html.= "</tbody><tfoot><tr><td></td><td><p><b>SubTotal</b></p><p><b>IGV</b></p><p><b>Dscto</b></p><p><b>Total</b></p></td>";
            $html.= "<td><p>".$venta['Neto']."</p><p>".$venta['Impuesto']."</p><p>".$venta['Descuento']."</p><p>".$venta['Total']."</p></td></tr></tfoot>";
            $result['detalle'] = $html;

            return $result;
        }
    }

    static public function ctrGetCode() {
        return VentasModelo::mdlGetCode();
    }

    static public function ctrCrearVenta($data) {
        $estado = $data['tipoVenta'] == 'venta' ? '2' : '1';
        $id = VentasModelo::mdlCrearVenta("ventas",$data, $estado);
        $value = false;

        //$cliente = ClientesModelo::mdlMostrarClientes('clientes', 'idCliente', $data["idCliente"]);

        if($id > 0){
            foreach ($data['items'] as $key => $item) {
                
                $value = VentasModelo::mdlCrearVentaDetalle('detalleventa',$item,$id);
                if($data['tipoVenta'] == 'venta'){
                    $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item->idProducto)[0];
                    $nuevo_stock = $producto['Stock'] - $item->cantidad;
                    ProductosModelo::actualizar_stock($nuevo_stock, $item->idProducto);
                }
            }
            $cliente_cantidad = VentasModelo::mdlVentas($data["idCliente"]);
            $cliente_arr = [
                'Compras' => $cliente_cantidad['cantidad'],
                'idCliente' => $data["idCliente"],
            ];
            ClientesModelo::mdlModificarUltimaVenta($cliente_arr);
            VentasControlador::ctrEnviarCorreo($id);
        }
        return $value;
    }

    static public function ctrEditarProducto() {

        if (isset($_POST["EditarProducto"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarProducto"])) {

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["EditarFoto"]["tmp_name"]) && !empty($_FILES["EditarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["EditarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "Vistas/img/Productos/" . $_POST["EditarCodigo"];

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);
                    } else {

                        mkdir($directorio, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["EditarFoto"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Productos/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["EditarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["EditarFoto"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Productos/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["EditarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }
                $tabla = "Productos";

                $datos = array("idProducto" => $_POST["EditarCodigo"],
                    "CodigoProveedor" => $_POST["EditarProveedor"],
                    "NombreProducto" => $_POST["EditarProducto"],
                    "Descripcion" => $_POST["EditarDescripcion"],
                    "CodigoMarca" => $_POST["EditarMarca"],
                    "CodigoPresentacion" => $_POST["EditarPresentacion"],
                    "CodigoCategoria" => $_POST["EditarCategoria"],
                    "Fotografia" => $ruta);

                $respuesta = ProductosModelo::mdlEditarProducto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Producto ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Productos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Producto no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Productos";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarProductos() {

        if (isset($_GET["idProducto"])) {

            $tabla = "Productos";
            $datos = $_GET["idProducto"];

            if ($_GET["fotoProducto"] != "") {

                unlink($_GET["fotoProducto"]);
                rmdir('Vistas/img/Productos/' . $_GET["idProducto"]);
            }

            $respuesta = ProductosModelo::mdlEliminarProducto($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El Producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Productos";

								}
							})

				</script>';
            }
        }
    }

    static public function ctrActualizarStockProductos() {

        if (isset($_POST["StockNombreProducto"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["StockNombreProducto"])) {

                $tabla = "Productos";

                $datos = array("idProducto" => $_POST["StockCodigo"],
                    "Stock" => $_POST["StockProducto"],
                    "StockMaximo" => $_POST["StockMaximo"],
                    "StockMinimo" => $_POST["StockMinimo"],
                    "PrecioCompra" => $_POST["StockPrecioCompra"],
                    "PrecioVenta" => $_POST["StockPrecioVenta"]);


                $respuesta = ProductosModelo::mdlActualizarStockProducto($tabla, $datos);
                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El stock se modifico correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "StockProductos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El stock no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "StockProductos";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEnviarCorreo($id){
    $mail = new PHPMailer(true);
    $venta = VentasModelo::mdlMostrarVentas('ventas','idVenta',$id);
    $cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$venta['idCliente']);
    try {
      //Server settings
      $mail->SMTPDebug = 2;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = '';                     //SMTP username
      $mail->Password   = '';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
      //$mail->setFrom('correo del que envi', 'nombre del que envia');
      $mail->setFrom('', '');

      
      $mail->addAddress($cliente['Correo'], $cliente['Nombres']); 
      //$mail->addAddress('', 'Joe User');     //Add a recipient

      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Envio de la Nota de Venta';
      $message = '
      <!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Mozilla</title>

    <style>

        body {margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;} img{line-height:100%; outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} a img{border: none;} #backgroundTable {margin:0; padding:0; width:100% !important; } a, a:link{color:#2A5DB0; text-decoration: underline;} table td {border-collapse:collapse;} span {color: inherit; border-bottom: none;} span:hover { background-color: transparent; }

    </style>

    <style>
 .scalable-image img{max-width:100% !important;height:auto !important}.button a{transition:background-color .25s, border-color .25s}.button a:hover{background-color:#e1e1e1 !important;border-color:#0976a5 !important}@media only screen and (max-width: 400px){.preheader{font-size:12px !important;text-align:center !important}.header--white{text-align:center}.header--white .header__logo{display:block;margin:0 auto;width:118px !important;height:auto !important}.header--left .header__logo{display:block;width:118px !important;height:auto !important}}@media screen and (-webkit-device-pixel-ratio), screen and (-moz-device-pixel-ratio){.sub-story__image,.sub-story__content{display:block
 !important}.sub-story__image{float:left !important;width:200px}.sub-story__content{margin-top:30px !important;margin-left:200px !important}}@media only screen and (max-width: 550px){.sub-story__inner{padding-left:30px !important}.sub-story__image,.sub-story__content{margin:0 auto !important;float:none !important;text-align:center}.sub-story .button{padding-left:0 !important}}@media only screen and (max-width: 400px){.featured-story--top table,.featured-story--top td{text-align:left}.featured-story--top__heading td,.sub-story__heading td{font-size:18px !important}.featured-story--bottom:nth-child(2) .featured-story--bottom__inner{padding-top:10px
 !important}.featured-story--bottom__inner{padding-top:20px !important}.featured-story--bottom__heading td{font-size:28px !important;line-height:32px !important}.featured-story__copy td,.sub-story__copy td{font-size:14px !important;line-height:20px !important}.sub-story table,.sub-story td{text-align:center}.sub-story__hero img{width:100px !important;margin:0 auto}}@media only screen and (max-width: 400px){.footer td{font-size:12px !important;line-height:16px !important}}
     @media screen and (max-width:600px) {
    table[class="columns"] {
        margin: 0 auto !important;float:none !important;padding:10px 0 !important;
    }
    td[class="left"] {
     padding: 0px 0 !important;
    </style>

</head>

<body style="background: #e1e1e1;font-family:Arial, Helvetica, sans-serif; font-size:1em;"><style type="text/css">
div.preheader 
{ display: none !important; } 
</style>
    <table id="backgroundTable" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#e1e1e1;">
        <tr>
            <td class="body" align="center" valign="top" style="background:#e1e1e1;" width="100%">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="640">
                            </td>
                    </tr>
                    <tr>
                        <td class="main" width="640" align="center" style="padding: 0 10px;">
                            <table style="min-width: 100%; " class="stylingblock-content-wrapper" width="100%" cellspacing="0" cellpadding="0"><tr><td class="stylingblock-content-wrapper camarker-inner"><table cellspacing="0" cellpadding="0">

</table></td></tr></table><table style="min-width: 100%; " class="stylingblock-content-wrapper" width="100%" cellspacing="0" cellpadding="0"><tr><td class="stylingblock-content-wrapper camarker-inner"><table class="featured-story featured-story--top" cellspacing="0" cellpadding="0">
 <tr>
  <td style="padding-bottom: 20px;">
   <table cellspacing="0" cellpadding="0">
    <tr>
     <td class="featured-story__inner" style="background: #fff;">
      <table cellspacing="0" cellpadding="0">
       <tr>
        <td class="scalable-image" width="640" align="center">
         <img src="https://images.pexels.com/photos/5632402/pexels-photo-5632402.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" style="display: block; border: 0; max-width: 100%; height: auto;" width="640">
        </td>
       </tr>
       <tr>
        <td class="featured-story__content-inner" style="padding: 32px 30px 45px;">
         <table cellspacing="0" cellpadding="0">
          <tr>
           <td class="featured-story__heading featured-story--top__heading" style="background: #fff;" width="640" align="left">
            <table cellspacing="0" cellpadding="0">
             <tr>
              <td style="font-family: Geneva, Tahoma, Verdana, sans-serif; font-size: 22px; color: #464646;" width="400" align="left">
               <span style="color: #464646;">Gracias por su Compra</a>
              </td>
             </tr>
            </table>
           </td>
          </tr>
          <tr>
           <td class="featured-story__copy" style="background: #fff;" width="640" align="center">
            <table cellspacing="0" cellpadding="0">
             <tr>
              <td style="font-family: Geneva, Tahoma, Verdana, sans-serif; font-size: 16px; line-height: 22px; color: #555555; padding-top: 16px;" align="left">
                Estimado(a): '.$cliente['Nombres'].', con numero de DNI: '.$cliente["Dni"].', se le esta haciendo entrega de su nota de venta electronica.
                </td>
             </tr>
            </table>
           </td>
          </tr>
          <tr>
                 <td class="button" style="font-family: Geneva, Tahoma, Verdana, sans-serif; font-size: 16px; padding-top: 26px;" width="640" align="left">
                  <a href="http://localhost:8080/Pos_v_01/Ajax/PdfVentas.php?cod='.$venta["Codigo"].'"  style="background: #0c99d5; color: #fff; text-decoration: none; border: 14px solid #0c99d5; border-left-width: 50px; border-right-width: 50px; text-transform: uppercase; display: inline-block;">
                   Nota de Venta
                  </a>
           </td>
                </tr>
         </table>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>
  </td>
 </tr>
</table></td></tr></table></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</custom></body>
</html>
      ';
      $mail->Body = $message;
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  
    }
}
