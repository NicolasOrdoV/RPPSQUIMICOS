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
			<html>
				<head>
					<title>RPPSQUIMICOS</title>
				</head>
				<body>
		            <table>
						<thead>
							<tr>
								<th>#</th>
			                    <th>Fecha Realizado</th>
			                    <th>Fecha Entrega</th>
			                    <th>Cliente</th>
			                    <th>Empleado</th>
			                    <th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>'.$_POST['idPEDIDO'].'</td>
								<td>'.$_POST['fecharPEDIDO'].'</td>
								<td>'.$_POST['fechaenPEDIDO'].'</td>
								<td>'.$_POST['clien'].'</td>
								<td>'.$_POST['empleado'].'</td>
								<td>'.$_POST['estadoPEDIDO'].'</td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<th>Producto</th>
			                    <th>Cantidad</th>
			                    <th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							    <td>'.$p['producto'].'</td>
					            <td>'.$p['cantidadDP'].'</td>
					            <th>'.$p['subtotalDP'].'</th>
							</tr>
						</tbody>
					</table>
				</body>
			</html>';
	}
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}