<?php include "header.php"; include '../Models/listadoProveedor.model.php';?>

<div class="container">
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<h3>Aside</h3>
		</div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

			<table class="table table-hover">
				<thead>
					<tr class="bg-success">
						<th>Codigo</th>
						<th>Fecha</th>
						<th>Nombre Proveedor</th>
						<th>Razon Social</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php 

				$listaprov = new ListadoProveedor();
				$data = $listaprov->Proveedor();
				while ($fila = $data->fetch_array()) {
					
				?>
					<tr>
						<td><?php echo $fila[0]; ?></td>
						<td><?php echo $fila[4]; ?></td>
						<td><?php echo $fila[1]; ?></td>
						<td><?php echo $fila[2]; ?></td>
						<td><?php echo $fila[3]; ?></td>
						<td>
							<a href="stock1.php?codigo=<?php echo $fila[0]; ?>" class="btn btn-success">Seleccionar</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

