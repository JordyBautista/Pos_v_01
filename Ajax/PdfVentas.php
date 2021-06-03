<?php
require_once '../Controlador/dompdf/autoload.inc.php';
require_once "../Controlador/VentasControlador.php";
require_once "../Modelos/VentasModelo.php";
require_once "../Modelos/ProductosModelo.php";
require_once "../Modelos/ClientesModelo.php";

use Dompdf\Dompdf;
$id = $_GET['cod'];
$venta = VentasModelo::mdlMostrarVentas('ventas','Codigo',$id);
$cliente = ClientesModelo::mdlMostrarClientes('clientes','idCliente',$venta['idCliente']);

$html = '
<html>
<head>
<style>
.grande{
    font-size: 14pt;
    font-weight: bold;
}
.detalle{
    font-size: 9pt;
}
.ultimo{
    font-size: 8pt;
    text-align: center;
}
.center{text-align: center;}
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
.logo{
    height: 60px;
    margin-left: 26px;
} 
.nota{
    border: 1px solid black;
    border-collapse: collapse;
} 
</style>
</head>
<body>
<header>
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>

<td width="55%" style=" text-align: center">
<br /><span class="grande">SERVICIOS GENERALES ROBLADILLO E.I.E.L.</span><br />
<br /><span class="detalle">Alquiler de maquinaria para la mineria y construcción,<br />
Transporte de carga por carretera y Venta de materiales para la construcción<br />
<br />JUNIN NRO. 115 INT. B SEC. SAN MATEO LIMA - HUAROCHIRI - SAN MATEO<br />
TELF: 013782600 Cel: 945164084 correo: lg_robladillo@hotmail.com<br /></span>
</td>
<td width="5%">&nbsp;</td>
<td width="40%" style=" padding-left: 0; padding-right: 0; text-align:center;">

<table class="nota"  width="100%">
    <tr><td class="center" width="100%" style="padding:12.2px; border: 1px solid black; font-size: 16.1px;">R.U.C. 20602494293</td></tr>
    <tr><td class="center" width="100%" style="padding:12.5px; border: 1px solid black; letter-spacing: 2px; font-size: 16.7px; font-weight: bold; background-color: black; color: white">NOTA DE VENTA</td></tr>
    <tr><td class="center" width="100%" style="padding:12.2px; border: 1px solid black; font-size: 16.1px;">N° '.$venta['Codigo'].'</td></tr>
</table></td>
</header>
';
$html.='</tr></table>
<br />
<table width="100%">
<tr><td width="80%">Señor(es): '. $cliente['Nombres'].'</td></tr>
<tr><td width="50%">Dirección: '. $cliente['Direccion'].'</td><td width="50%">Guia de Remision N°: .......</td></tr>
<tr><td width="50%">DNI: '. $cliente['Dni'].'</td><td width="50%">Fecha: '.date_format(date_create($venta['Fecha']), 'd/m/Y H:i').'</td></tr>
</table><br>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; text-align: center; " cellpadding="8">
<thead>
<tr>
<td width="15%">CANT</td>
<td width="75%">DESCRIPCION</td>
<td width="20%">P. UNIT</td>
<td width="20%">IMPORTE</td>
</tr>
</thead>
<tbody>
';
$detalle = VentasModelo::mdlMostrarVentaDetalle('detalleventa','idVentaDV',$venta['idVenta']);
foreach ($detalle as $key => $item) {
    $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item['idProductoDV'])[0];
    $html.='
    <tr>
    <td align="center">'.$item['cantidad'].'</td>
    <td align="center">'.$producto['NombreProducto'].'</td>
    <td align="center">S/. '.$producto['PrecioVenta'].'</td>
    <td>S/. '.$item['importe'].'</td>
    </tr>
    
';
}


$html.='
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="2" rowspan="5"></td>
<td style="text-align: center" class="totals">SUB-TOTAL</td>
<td style="text-align: center" class="totals cost">S/. '.$venta['Neto'].'</td>
</tr>
<tr>
<td style="text-align: center" class="totals">IGV(18%)</td>
<td style="text-align: center" class="totals cost">S/. '.$venta['Impuesto'].'</td>
</tr>
<tr>
<td style="text-align: center" class="totals"><b>Total</b></td>
<td style="text-align: center" class="totals cost"><b>S/. '.$venta['Total'].'</b></td>
</tr>
</tbody>
</table>
<table class="ultimo" width="100%" style="font-family: serif;" cellpadding="10">
<tr><td width="20%"></td><td width="60%">
<p>COPIA SIN DERECHO A CREDITO FISCAL DEL I.G.V </p>
<p>CTA. CORRIENTE BCP: 191-2582816-0-48 </p>
<p>CTA. DETRACCION BCP: 00-097-000573 </p>
</td><td width="20%"></td></tr>
</table>
</body>
</html>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4');
$dompdf->render();
// solo descarga, quitar el return y no pasar parametros al string
return $dompdf->stream('SupplyDetail.pdf',array('Attachment'=>0));