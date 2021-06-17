<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
        $proveedor = ProveedoresModelos::mdlMostrarProveedores('proveedor','Codigo',$compra['codProveedor']);
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
                'proveedor' => $proveedor['RazonSocial'],
                'fechaRegistro' => $compra['fechaRegistro'],
                'estado' => $estado ,
            ];
            $html = "<thead><tr><th>Producto</th><th>Cantidad</th><th>Importe</th></tr></thead><tbody>";
            $detalle = ComprasModelo::mdlMostrarCompraDetalle('compradetalle','idCompra',$id);
            foreach ($detalle as $key => $item) {
                $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProducto'])[0];
                $html.= "<tr><th>".$producto['NombreProducto']."</th><th>".$item['cantidad']."</th><th>".$item['importe']."</th></tr>";
            }
            $html.= "</tbody><tfoot><tr><td></td><td><p><b>SubTotal</b></p><p><b>Total</b></p></td>";
            $html.= "<td><p>".$compra['subTotal']."</p><p>".$compra['total']."</p></td></tr></tfoot>";
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
            ComprasControlador::ctrEnviarCorreo($id);
        }
        return $id;
    }

    static public function ctrEnviarCorreo($id){
        $mail = new PHPMailer(true);
        $compra = ComprasModelo::mdlMostrarCompras('compras','idCompra',$id);
        $proveedor = ProveedoresModelos::mdlMostrarProveedores('proveedor','Codigo',$compra['codProveedor']);
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
    
          
          $mail->addAddress($proveedor['Correo'], $proveedor['RazonSocial']); 
          //$mail->addAddress('', 'Joe User');     //Add a recipient
    
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Pedido de Abastecimiento';
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
             <img src="https://images.pexels.com/photos/4464887/pexels-photo-4464887.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" style="display: block; border: 0; max-width: 100%; height: auto;" width="640">
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
                   <span style="color: #464646;">Solicitud de Abastecimiento</a>
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
                    Buenas estimado(a): '.$proveedor['RazonSocial'].', se le envia este correo para requerirle un pedido de abastecimiento.</br>
                    En el siguiente boton se le abrira los productos requeridos.
                    </td>
                 </tr>
                </table>
               </td>
              </tr>
              <tr>
                     <td class="button" style="font-family: Geneva, Tahoma, Verdana, sans-serif; font-size: 16px; padding-top: 26px;" width="640" align="left">
                      <a href="http://localhost:8080/Pos_v_01/Ajax/PdfCompras.php?cod='.$compra["codigoCompra"].'"  style="background: #0c99d5; color: #fff; text-decoration: none; border: 14px solid #0c99d5; border-left-width: 50px; border-right-width: 50px; text-transform: uppercase; display: inline-block;">
                       Pedido
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
