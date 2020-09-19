<?php
$clients = ControladorClientes::ctrSeleccionarRegistroClientes(null,null);
$pending_orders = ControladorPedidos::findOrdersPending();
$products = ControladorInventario::ctrSeleccionarProductosStock(null,null);
$lastClients = ControladorClientes::ctrLastClients();
$last_orders = ControladorPedidos::consultaGeneral5();
$lastProducts = ProdController::consult5();
$total_clients = count($clients);
$total_pending_orders = count($pending_orders);
$total_products = count($products);
//var_dump($lastProducts);
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Reporte diario</h1>
                <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                <a href="#" class="text-light">Reporte diario</a>
            </div>
        </div>
    </div>
</section>
<div class="row my-2"></div>
<section class="row">
	<aside id="blanco-h" class="col-lg-1"></aside>
	<aside class="col-lg-10">
		<div class="card w-100 m-auto">
			<div class="card-header container-fluid">
				<h2 class="m-auto">Reporte diario de usuarios, productos y pedidos</h2>
			</div>
			<div class="card-body w-100">
				<div class="row">
					<div class="col-lg-4 card bg-primary text-white mb-3 m-auto" style="max-width: 18rem;">
						<div class="card-header container">
							<h2 class="m-auto text-white">Cantidad de clientes totales</h2>
						</div>
						<div class="card-body">
							<h1 class="text-white"><?php echo $total_clients; ?></h1>
						</div>
					</div>
					<div class="col-lg-4 card bg-danger text-white mb-3 m-auto" style="max-width: 18rem;">
						<div class="card-header container">
							<h2 class="m-auto text-white">Cantidad de pedidos pendientes</h2>
						</div>
						<div class="card-body">
							<h1 class="text-white"><?php echo $total_pending_orders; ?></h1>
						</div>
					</div>
					<div class="col-lg-4 card bg-primary text-white mb-3 m-auto" style="max-width: 18rem;">
						<div class="card-header container">
							<h2 class="m-auto text-white">Cantidad de productos en stock</h2>
						</div>
						<div class="card-body">
							<h1 class="text-white"><?php echo $total_products; ?></h1>
						</div>
					</div>
				</div>
				<div class="row my-3">
					<div class="col-4">
						<h2 class="m-auto">Ultimos usuarios registrados</h2>
						<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<th scope="col">Correo</th>
								<th scope="col">Cliente</th>
								<th scope="col">Nombre</th>
							</thead>
							<tbody>
								<?php foreach ($lastClients as $client) { ?>
									<tr>
										<td><?php echo $client['correocontEC']?></td>
										<td>
											<?php if($client['img'] == null) { ?>
												<img src="/RPPSQUIMICOS/Assets/img/Perfil.jpg" class="img-fluid rounded-circle" width="30">
											<?php }else{ ?>
												<img src="/RPPSQUIMICOS/Assets/img/Usuarios/<?php echo $client['img']?>" class="img-fluid rounded-circle" width="30">
											<?php } ?>										
										</td>
										<td><?php echo $client['nombreEC']?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="col-4">
						<h2 class="m-auto">Ultimos pedidos realizados</h2>
						<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<th scope="col">Fecha pedido</th>
								<th scope="col">Cliente</th>
								<th scope="col">Empleado</th>
							</thead>
							<tbody>
								<?php foreach ($last_orders as $order) { ?>
									<tr>
										<td><?php echo $order['fecharPEDIDO']?></td>
										<td><?php echo $order['clien']?></td>
										<td><?php echo $order['empleado']?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="col-4">
						<h2 class="m-auto">Ultimos productos registrados</h2>
						<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<th scope="col">Producto</th>
								<th scope="col">Nombre</th>
								<th scope="col">cantidad</th>
							</thead>
							<tbody>
								<?php foreach ($lastProducts as $product) { ?>
									<tr>
										<td>
											<img src="/RPPSQUIMICOS/Assets/img/Productos/<?php echo $product['imgPRODUCTO']?>" class="img-fluid" width="20">
										</td>
										<td><?php echo $product['nombrePRODUCTO']?></td>
										<td><?php echo $product['cantPRODUCTO']?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</aside>
	<aside id="blanco-h" class="col-lg-1"></aside>
</section>
<div class="row my-5"></div>