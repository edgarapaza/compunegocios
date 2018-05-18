<?php include "header4.php"; include '../Models/listadoProveedor.model.php';?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<table class="table table-hover">
				<thead>
					<tr class="thead-dark">
						<th>Codigo</th>
						<th>Nombre Proveedor</th>
						<th>Razon Social</th>
						<th>Email</th>
						<th>WebSite</th>
						<th>Telf. Fijo</th>
						<th>Celular</th>
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
						<td><?php echo $fila[1]; ?></td>
						<td><?php echo $fila[2]; ?></td>
						<td><?php echo $fila[3]; ?></td>
						<td><?php echo $fila[7]; ?></td>
						<td><?php echo $fila[4]; ?></td>
						<td><?php echo $fila[5]; ?></td>
						<td>
							<a href="facturas.php?codigo=<?php echo $fila[0]; ?>" class="btn btn-success">Seleccionar</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<?php include "footer4.html"; ?>