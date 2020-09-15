<?php

use Mpdf\Mpdf\Mpdf;
require_once "Controlers/controlador.Pedido.php";
require_once "Models/modeloPedidos.php";
require_once "../../providers/conexion.php";
require_once "../../vendor/autoload.php";


if (isset($_POST['idPEDIDO'])) {
	$mpdf = new \Mpdf\Mpdf();
    $data=ControladorPedidos::show($_POST['idPEDIDO']);
    foreach ($data as $p) {
	    $html = '
			<!DOCTYPE html>
			<html lang="en">
			  <head>
			    <meta charset="utf-8">
			    <title>Example 1</title>
			    <style>
			    .clearfix:after {
			      content: "";
			      display: table;
			      clear: both;
			    }

			    a {
			      color: #5D6975;
			      text-decoration: underline;
			    }

			    body {
			      position: relative;
			      width: 21cm;
			      height: 29.7cm;
			      margin: 0 auto;
			      color: #001028;
			      background: #FFFFFF;
			      font-family: Arial, sans-serif;
			      font-size: 12px;
			      font-family: Arial;
			    }

			    header {
			      padding: 10px 0;
			      margin-bottom: 30px;
			    }

			    #logo {
			      text-align: center;
			      margin-bottom: 10px;
			    }

			    #logo img {
			      width: 10em;
			    }

			    h1 {
			      border-top: 1px solid  #5D6975;
			      border-bottom: 1px solid  #5D6975;
			      color: #5D6975;
			      font-size: 2.4em;
			      line-height: 1.4em;
			      font-weight: normal;
			      text-align: center;
			      margin: 0 0 20px 0;
			      background: url(img/dimension.png);
			    }

			    #project {
			      float: left;
			    }

			    #project span {
			      color: #5D6975;
			      text-align: right;
			      width: 52px;
			      margin-right: 10px;
			      display: inline-block;
			      font-size: 0.8em;
			    }

			    #company {
			      float: right;
			      text-align: right;
			    }

			    #project div,
			    #company div {
			      white-space: nowrap;
			    }

			    table {
			      width: 100%;
			      border-collapse: collapse;
			      border-spacing: 0;
			      margin-bottom: 20px;
			    }

			    table tr:nth-child(2n-1) td {
			      background: #F5F5F5;
			    }

			    table th,
			    table td {
			      text-align: center;
			    }

			    table th {
			      padding: 5px 20px;
			      color: #5D6975;
			      border-bottom: 1px solid #C1CED9;
			      white-space: nowrap;
			      font-weight: normal;
			    }

			    table .service,
			    table .desc {
			      text-align: left;
			    }

			    table td {
			      padding: 20px;
			      text-align: right;
			    }

			    table td.service,
			    table td.desc {
			      vertical-align: top;
			    }

			    table td.unit,
			    table td.qty,
			    table td.total {
			      font-size: 1.2em;
			    }

			    table td.grand {
			      border-top: 1px solid #5D6975;;
			    }

			    #notices .notice {
			      color: #5D6975;
			      font-size: 1.2em;
			    }

			    footer {
			      color: #5D6975;
			      width: 100%;
			      height: 30px;
			      position: absolute;
			      bottom: 0;
			      border-top: 1px solid #C1CED9;
			      padding: 8px 0;
			      text-align: center;
			    }
			    </style>
			  </head>
			  <body>
			    <header class="clearfix">
			      <div id="logo">
			        <img style="width: 200px" src="img/logo.png">
			      </div>
			      <h1>RPPSQUIMICOS</h1>
			      <div id="company" class="clearfix">
			        <div>RPPSQUIMICOS</div>
			        <div>Bogotá,<br /> Kennedy</div>
			        <div>(+57) 555-555-5555</div>
			        <div><a href="mailto:rppsquimicos@gmail.com">rppsquimicos@gmail.com</a></div>
			      </div>
			      <div id="project">
			        <div><span>RAZÓN</span> Remisión</div>
			        <div><span>CLIENTE</span> '.$_POST['clien'].' </div>
			        <div><span>FECHA</span>'.$_POST['fecharPEDIDO'].'</div>
			      </div>
			    </header>
			    <main>
			      <table>
			        <thead>
			          <tr>
			            <th class="service">#</th>
			            <th class="desc">Fecha Realizado</th>
			            <th class="unit">Fecha Entrega</th>
			            <th class="qty">Empleado</th>
			            <th class="total">Estado</th>
			          </tr>
			        </thead>
			        <tbody>

			          <tr>
			            <td class="service">'.$_POST['idPEDIDO'].'</td>
			            <td class="desc">'.$_POST['fecharPEDIDO'].'</td>
			            <td class="unit">'.$_POST['fechaenPEDIDO'].'</td>
			            <td class="qty">'.$_POST['empleado'].'</td>
			            <td class="total">'.$_POST['estadoPEDIDO'].'</td>
			          </tr>
			        </tbody>
			      </table>
			      <table>
			        <thead>
			          <tr>
			            <th class="desc">Producto</th>
			            <th class="qty">Cantidad</th>
			            <th class="total">Subtotal</th>
			          </tr>
			        </thead>
			        <tbody>
			          <tr>
			            <td class="desc">'.$p['producto'].'</td>
			            <td class="qty">'.$p['cantidadDP'].'</td>
			            <th class="total">'.$p['subtotalDP'].'</th>
			          </tr>
			        </tbody>
			    </table>
			    </main>
			    <footer>
			      Todo los derechos reservados | GAROWARE SOFTWARE.
			    </footer>
			  </body>
			</html>';
	}
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}
